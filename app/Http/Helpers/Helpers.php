<?php

namespace App\Http\Helpers;

use App\Models\Order;

trait Helpers {
    protected function cekStatusPembayaran($kode_booking) : bool
    {
        $order = Order::where('kode_booking',$kode_booking)->get();
        if($order[0]->status == "konfirmasi"){
            return true;
        } else {
            return false;
        }
    }

}