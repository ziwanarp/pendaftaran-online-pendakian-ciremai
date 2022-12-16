
@extends('user.template.main')

@section('container')

    <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 mx-auto text-center">
          <div class="intro-wrap">
            <h2 class="mb-4 text-white">Detail Order</h2>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Nama Pemesan</b> </p>
                    </div>
                    <div class="col-lg-5 text-white">
                      <input type="text" name="name" value="{{ $order[0]->user->name }}" readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Kode Order</b> </p>
                    </div>
                    <div class="col-lg-5 text-white">
                      <input type="text" name="name" value="{{ $order[0]->kode_order }}" readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Status</b> </p>
                    </div>
                    <div class="col-lg-5 text-white">
                      @if ($order[0]->status == 'Konfirmasi')
                      <p class="btn-success btn-sm">{{ $order[0]->status }}</p>
                      @elseif ($order[0]->status == 'Tolak')
                      <p class="btn-danger btn-sm">{{ $order[0]->status }}</p>
                      @else
                      <p class="btn-warning btn-sm">{{ $order[0]->status }}</p>
                      @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Total Harga</b> </p>
                    </div>
                    <div class="col-lg-5 text-white">
                      <input type="text" name="harga" value="{{ $order[0]->harga }}" readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Jalur</b> </p>
                    </div>
                    <div class="col-lg-5 text-white">
                      <input type="text" name="jalur" value="{{ $order[0]->kuota->jalur }}" readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Tanggal Naik</b> </p>
                    </div>
                    <div class="col-lg-5 text-white">
                      <input type="text" name="tanggal_naik" value="{{ $order[0]->tanggal_naik }}" readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Tanggal Turun</b> </p>
                    </div>
                    <div class="col-lg-5 text-white">
                      <input type="text" name="tanggal_turun" value="{{ $order[0]->tanggal_turun }}" readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Jumlah Pendaki</b> </p>
                    </div>
                    <div class="col-lg-5 text-white">
                      <input type="number" name="jumlah_kuota" value="{{ $order[0]->jumlah_kuota }}" readonly>
                      <input type="hidden" name="status" value="Pending" >
                      <input type="hidden" name="kode_order" value="CRM-" >
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center text-white">
                    <div class="col-lg-5">
                      <p class="mb-0 text-left"><b>Bukti pembayaran</b></p>
                    </div>
                    <div class="col-lg-5 text-white">
                      <img src="{{ asset('storage/'. $order[0]->bukti_pembayaran) }}" class="img-preview mt-3" width="250px">
                    </div>
                  </div>

                  <div class="mt-4 text-left">
                    <a href="/order/myorders" class="btn btn-primary">Kembali</a>
                    @if ($order[0]->status == 'Konfirmasi')
                    <form class="d-inline" action="/order/struk/{{ $order[0]->kode_order }}" method="get">
                      <button type="submit" class="text-white btn btn-danger border-0" >Download <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                      </svg></button>
                    </form>
                    @endif
                  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
@endsection