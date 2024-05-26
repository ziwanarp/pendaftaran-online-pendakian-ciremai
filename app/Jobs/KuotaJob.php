<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Kuota;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class KuotaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $today = Carbon::now()->format('Y-m-d');
        $futureDate = Carbon::now()->addDays(30)->format('Y-m-d');

        //hapus kuota jika <= hari ini
        Kuota::where('tanggal','<' ,$today)->delete();

        // create kuota untuk kedepannya
        $kuota= new Kuota();
        $kuota->jalur = "palutungan";
        $kuota->jumlah_kuota = 100;
        $kuota->tanggal = $futureDate;
        $kuota->bulan = substr($futureDate, 5, 2);
        $kuota->tahun = substr($futureDate, 0, 4);
        $kuota->save();

        $kuota= new Kuota();
        $kuota->jalur = "Apuy";
        $kuota->jumlah_kuota = 100;
        $kuota->tanggal = $futureDate;
        $kuota->bulan = substr($futureDate, 5, 2);
        $kuota->tahun = substr($futureDate, 0, 4);
        $kuota->save();

        $kuota= new Kuota();
        $kuota->jalur = "Linggasana";
        $kuota->jumlah_kuota = 100;
        $kuota->tanggal = $futureDate;
        $kuota->bulan = substr($futureDate, 5, 2);
        $kuota->tahun = substr($futureDate, 0, 4);
        $kuota->save();

        $kuota= new Kuota();
        $kuota->jalur = "Linggarjati";
        $kuota->jumlah_kuota = 100;
        $kuota->tanggal = $futureDate;
        $kuota->bulan = substr($futureDate, 5, 2);
        $kuota->tahun = substr($futureDate, 0, 4);
        $kuota->save();
    }
}
