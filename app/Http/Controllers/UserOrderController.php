<?php

namespace App\Http\Controllers;

use App\Models\Kuota;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\App;
use RealRashid\SweetAlert\Facades\Alert;

define('HARGA', '50000');

class UserOrderController extends Controller
{
    public function order()
    {

        if (request()->kuota != null) {
            $kuota = Kuota::where('id', request()->kuota)->get();

            return view('user.order.order', [
                'title' => 'Detail Order',
                'kuota' => $kuota
            ]);
        } else {
            return redirect('/');
        }
    }

    public function konfirmasiOrder()
    {

        $harga = HARGA * request()->jumlah_kuota;
        return view('user.order.konfirmasi', [
            'title' => 'Upload Bukti Pembayaran',
            'order' => request(),
            'harga' => $harga
        ]);
    }

    public function orderStore(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'kuota_id' => 'required',
            'kode_order' => 'required',
            'status' => 'required',
            'harga' => 'required',
            'jalur' => 'required',
            'tanggal_naik' => 'required',
            'tanggal_turun' => 'required',
            'jumlah_kuota' => 'required',
            'bukti_pembayaran' => 'required|file|image|max:1024',
        ];

        $validatedData = $request->validate($rules);

        // set kode order
        $tgl = preg_replace("/[^a-zA-Z0-9]/", "", $validatedData['tanggal_naik']);
        $validatedData['kode_order'] = $validatedData['kode_order'] . strtoupper(substr($validatedData['jalur'], 0, 3)) . $tgl . $validatedData['jumlah_kuota'] . (rand(10, 99));;

        //simpan foto di storage
        $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('user-buktipembayaran', 'public');


        $result = Order::create($validatedData);
        if ($result === false) {
            Alert::error('Booking Gagal !');
            return redirect('/');
        } else {
            // dapatkan kuota berdasarkan id
            $kuota = Kuota::where('id', $validatedData['kuota_id'])->get();
            // jumlah kuota dikurang jumlah order
            $kuota = $kuota[0]->jumlah_kuota - $validatedData['jumlah_kuota'];
            // update kuota
            Kuota::where('id', $validatedData['kuota_id'])->update(['jumlah_kuota' => $kuota]);

            Alert::success('Booking Berhasil !!', 'Lihat status pesanan di menu orders');
            return redirect('/order/myorders');
        }
    }

    public function myOrders()
    {
        if (request()->order != null) {
            $order = Order::where('kode_order', request()->order)->get();
            return view('user.order.detail', [
                'title' => 'Detail Order',
                'order' => $order,
            ]);
        } else {
            $order = Order::where('user_id', auth()->user()->id)->get();
            return view('user.order.myorder', [
                'title' => 'My Orders',
                'orders' => $order,
            ]);
        }
    }

    public function struk($request)
    {
        $data = Order::where('kode_order', $request)->get();
        $data = $data[0];

        // return view('user.strukpembayaran.index', ['data' => $data]);

        $pdf = Pdf::loadView('user.strukpembayaran.index', ['data' => $data]);
        return $pdf->download('Struk.pdf');
    }
}
