<?php

namespace App\Http\Controllers;

use App\Models\Kuota;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{
    public function index()
    {

        return view('user.index', [
            'jalur' => Kuota::all()->groupBy('jalur'),
            'title' => 'Home',
        ]);
    }

    public function about()
    {
        return view('user.about', ['title' => 'About']);
    }

    public function contact()
    {
        return view('user.contact', ['title' => 'Contact']);
    }

    public function direct()
    {
        return redirect('/');
    }

    public function checkKuota()
    {
        return view('user.kuota.index', [
            'jalur' => Kuota::all()->groupBy('jalur'),
            'bulan' => Kuota::all()->groupBy('bulan'),
            'tahun' => Kuota::all()->groupBy('tahun'),
            'kuota' => Kuota::filter(request(['jalur', 'tanggal', 'jumlah_kuota']))->get(),
            'title' => 'Check Kuota'
        ]);
    }

    public function kuotaPerBulan()
    {
        return view('user.kuota.kuotaperbulan', [
            'jalur' => Kuota::all()->groupBy('jalur'),
            'bulan' => Kuota::all()->groupBy('bulan'),
            'tahun' => Kuota::all()->groupBy('tahun'),
            'kuota' => Kuota::filter(request(['jalur', 'bulan', 'tahun']))->get(),
            'title' => 'Check Kuota per Bulan'
        ]);
    }
}
