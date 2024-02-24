<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Helpers\Helpers;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCheckoutController extends Controller
{
    use Helpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = $this->getOrderByCheckout();
        if(count($order) > 0){
            return view('admin.dashboard.checkout.index',['page' => 'Check In','data'=> $order]);
        } else {
            return view('admin.dashboard.checkout.index',['page' => 'Check In','data'=> null]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->kode_order == null || $request->kode_order == ""){
            Alert::error('Masukan Kode order !');
            return back();
        }

        // $order = Order::where('kode_order', $request->kode_order)->get();
        $order = $this->getOrderByKodeOrder($request->kode_order);
        if(count($order) > 0){
            if($order[0]->checkout == 1){
                Alert::error('Kode order sudah checkout !');
                return back();
            } else {
                // Konfirmasi case sensitif
                if($order[0]->checkin == 1){
                    $order[0]->checkout = 1;
                    $order[0]->checkout_time = now();
                    $order[0]->save();
                    Alert::success('Check Out Berhasil !');
                    return redirect('/dashboard/checkout');
                } else {
                    Alert::error('Kode order belum checkin !');
                    return back();
                }
            }

        } else {
            Alert::error('Kode order tidak ditemukan !');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
