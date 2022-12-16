<?php

namespace App\Http\Controllers;

use App\Models\Kuota;
use Illuminate\Http\Request;

class AdminKuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request('jalur')) {
            return view('admin.dashboard.kuota.detail', [
                'title' => 'Detail Penjualan Barang',
                'kuotas' => Kuota::Where('jalur', request('jalur'))->get()->groupBy('tanggal'),
            ]);
        } else {
            // jika tidak ada request, tampilkan index
            return view('admin.dashboard.kuota.index', [
                'kuotas' => Kuota::all()->groupBy('jalur')
            ]);
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
        $rules = [
            'jalur' => 'required',
            'jumlah_kuota' => 'required|min:1',
            'tanggal' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $bulan = substr($validatedData['tanggal'], 5, 2);
        $tahun = substr($validatedData['tanggal'], 0, 4);

        $validatedData['bulan'] = $bulan;
        $validatedData['tahun'] = $tahun;

        Kuota::create($validatedData);

        return redirect('/dashboard/kuota')->with('success', 'Kuota Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuota  $kuota
     * @return \Illuminate\Http\Response
     */
    public function show(Kuota $kuota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuota  $kuota
     * @return \Illuminate\Http\Response
     */
    public function edit(Kuota $kuota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuota  $kuota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kuota $kuota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuota  $kuota
     * @return \Illuminate\Http\Response
     */
    public function destroy($kuota)
    {
        $tanggal = substr($kuota, 0, 10);
        $jalur = substr($kuota, 10,);

        $jalur = Kuota::where('jalur', $jalur)->where('tanggal', $tanggal)->delete();

        return redirect('/dashboard/kuota');
    }
}
