<?php

namespace App\Imports;

use App\Models\Kuota;
use Maatwebsite\Excel\Concerns\ToModel;

class KuotaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $date = explode('-',$row[2]);
        $tahun = $date[2];
        $bulan = $date[1];
        $tanggal = $date[2]."-".$date[1]."-".$date[0];

        return new Kuota([
            'jalur'     => $row[0],
            'jumlah_kuota'  => $row[1],
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);     
    }

}
