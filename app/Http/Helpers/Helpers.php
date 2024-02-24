<?php

namespace App\Http\Helpers;

use App\Models\Order;

trait Helpers {
    
    protected function getOrderByKodeOrder($kode_order) : object{
        return Order::where('kode_order',$kode_order)->get();
    }

    protected function getOrderByUserId($userId) : object{
        return Order::where('user_id', $userId)->get();
    }

    protected function getOrderByCheckin() : object{
        return Order::where('checkin',1)->get();
    }

}