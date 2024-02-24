<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Checkin;
use Illuminate\Http\Request;
use App\Http\Helpers\Helpers;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCheckinController extends Controller
{
    //trait
    use Helpers;

    public function index()
    {
        $order = Order::where('checkin',1)->get();
        if(count($order) > 0){
            return view('admin.dashboard.checkin.index',['page' => 'Check In','data'=> $order]);
        } else{
            return view('admin.dashboard.checkin.index',['page' => 'Check In','data'=> null]);
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

    //checkin
    public function store(Request $request)
    {
        if($request->kode_order == null || $request->kode_order == ""){
            Alert::error('Masukan Kode order !');
            return back();
        }

        $order = Order::where('kode_order', $request->kode_order)->get();
        if(count($order) > 0){
            if($order[0]->checkin == 1){
                Alert::error('Kode order sudah pernah checkin !');
                return back();
            } else {
                // Konfirmasi case sensitif
                if($order[0]->status == "Konfirmasi"){
                    if($order[0]->tanggal_naik == Carbon::now()->format('Y-m-d') ){
                        $order[0]->checkin = 1;
                        $order[0]->checkin_time = now();
                        $order[0]->save();
                        Alert::success('Check In Berhasil !');
                        return redirect('/dashboard/checkin');
                    } else if($order[0]->tanggal_naik < Carbon::now()->format('Y-m-d')){
                        Alert::error('Kode order terlewat '.$order[0]->tanggal_naik.' ');
                        return back();
                    } else {
                        Alert::error('Kode order untuk tanggal '.$order[0]->tanggal_naik.' ');
                        return back();
                    }
                } else {
                    Alert::error('Status kode order tidak valid '.$order[0]->status.'');
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
     * @param  \App\Models\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function show(Checkin $checkin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkin $checkin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkin $checkin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkin $checkin)
    {
        //
    }
}
