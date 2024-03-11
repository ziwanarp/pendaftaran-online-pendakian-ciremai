<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query= "";
        $filterBy ="";
        $listUser = DB::select('SELECT * FROM users WHERE username NOT IN("admin")');
        $request = request();

        if($request->search == true){
            if($request->hari != null){
                $filterBy .= " Hari ".$request->hari.",";
                $query .= " AND DAY(created_at) = ".$request->hari;
            }
            if($request->bulan != null){
                $filterBy .= " Bulan ".$request->bulan.",";
                $query .= " AND MONTH(created_at) = ".$request->bulan;
            }
            if($request->tahun != null){
                $filterBy .= " Tahun ".$request->tahun.",";
                $query .= " AND YEAR(created_at) = ".$request->tahun;
            }
            if($request->status != null){
                $filterBy .= " Status ".$request->status.",";
                $query .= " AND status = '$request->status'";
            }
            if($request->userId != null){
                $filterBy .= " User ".$request->userId.",";
                $query .= " AND user_id = ".$request->userId;
            }

            $result = DB::select('SELECT * FROM orders WHERE 1 = 1 '.$query);
            $data = Order::hydrate($result);
        } else {
            $filterBy = "null";
            $data = [];
        }

        // dd($user);
        return view('admin.dashboard.report.index', ['page' => 'Report', 'data' => $data, 'user' => $listUser, 'filterBy' => $filterBy]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
