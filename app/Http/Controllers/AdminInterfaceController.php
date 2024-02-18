<?php

namespace App\Http\Controllers;

use App\Models\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminInterfaceController extends Controller
{
    public function slide()
    {
        // jika ada data interface
        $data = Interfaces::where('id', 1)->get();
        if (count($data) > 0) {
            $data = $data[0];
            return view('admin.dashboard.interface.slide', [
                'data' => $data,
                'page' => 'Interface',
            ]);
        }
        //jika tidak ada data
        return view('admin.dashboard.interface.slide', []);
    }

    public function update_slide()
    {
        if (request()->file('slide_palutungan')) {
            if (request()->old_palutungan) {
                Storage::disk('public')->delete(request()->old_palutungan);
            }
            $validatedData['slide_palutungan'] = request()->file('slide_palutungan')->store('interface-slide', 'public');
        }

        if (request()->file('slide_linggarjati')) {
            if (request()->old_linggarjati) {
                Storage::disk('public')->delete(request()->old_linggarjati);
            }
            $validatedData['slide_linggarjati'] = request()->file('slide_linggarjati')->store('interface-slide', 'public');
        }

        if (request()->file('slide_linggasana')) {
            if (request()->old_linggasana) {
                Storage::disk('public')->delete(request()->old_linggasana);
            }
            $validatedData['slide_linggasana'] = request()->file('slide_linggasana')->store('interface-slide', 'public');
        }

        if (request()->file('slide_apuy')) {
            if (request()->old_apuy) {
                Storage::disk('public')->delete(request()->old_apuy);
            }
            $validatedData['slide_apuy'] = request()->file('slide_apuy')->store('interface-slide', 'public');
        }

        $result = Interfaces::where('id', request()->id)->update($validatedData);

        if ($result == 1) {
            Alert::success('Berhasil !!', 'Foto Slide Berhasil Di update !!');
            return redirect('/dashboard/interface/slide');
        } else {
            Alert::error('Gagal !!', 'Foto Slide Gagal Di update !!');
            return redirect('/dashboard/interface/slide');
        }
    }

    public function about()
    {
        // jidak ada data interface tampilkan
        $data = Interfaces::where('id', 1)->get();
        if ($data->count() > 0) {
            $data = $data[0];
            return view('admin.dashboard.interface.about', [
                'data' => $data,
                'page' => 'About',
            ]);
        }
        // jika data interface tidak ada
        return view('admin.dashboard.interface.about', []);
    }

    public function update_about()
    {
        $validatedData['tentang_title'] = request()->tentang_title;
        $validatedData['tentang_body'] = request()->tentang_body;

        $result = Interfaces::where('id', 1)->update($validatedData);

        if ($result == 1) {
            Alert::success('Berhasil !!', 'About Berhasil Di update !!');
            return redirect('/dashboard/interface/about');
        } else {
            Alert::error('Gagal !!', 'About Gagal Di update !!');
            return redirect('/dashboard/interface/about');
        }
    }
}
