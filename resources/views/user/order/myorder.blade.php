
@extends('user.template.main')

@section('container')

@if ($orders->count())
    <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-10 mx-auto text-center">
          <div class="intro-wrap">
            <h2 class="mb-3 text-white">My Orders</h2>
                    <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Order</th>
                                <th>Status</th>
                                <th>Jalur</th>
                                <th>Tanggal Naik</th>
                                <th>Cetak Struk Pembayaran</th>
                            </tr>
                        </thead>
    
                            @foreach ($orders as $order)
                                
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a class="btn-primary btn-sm" href="?order={{ $order->kode_order }}">{{ $order->kode_order }}</a></td>
                                    @if ($order->status == 'Konfirmasi')
                                    <td><p class="btn-success btn-sm">{{ $order->status }}</p></td>
                                    @elseif ($order->status == 'Tolak')
                                    <td><p class="btn-danger btn-sm">{{ $order->status }}</p></td>
                                    @else
                                    <td><p class="btn-warning btn-sm">{{ $order->status }}</p></td>
                                    @endif
                                    <td>{{ $order->kuota->jalur }}</td>
                                    <td>{{ $order->tanggal_naik  }}</td>
                                    @if ($order->status == 'Konfirmasi')
                                      <td>
                                        <form action="/order/struk/{{ $order->kode_order }}" method="get">
                                          <button type="submit" class="text-white btn-danger btn-sm border-0" >Download <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                          </svg></button>
                                        </form>
                                      </td>
                                    @else
                                    <td><a class="text-white btn-secondary btn-sm " data-toggle="modal" data-target="#modalPrint" href="">Download <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                      <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                      <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                    </svg></a></td>
                                    @endif
                                </tr>
                            </tbody>
                            @endforeach
                    </table>
          <div class="text-left my-5">
            <a href="/"  class="btn btn-primary" >Kembali</a>
        </div>
        </div>
      </div>
    </div>
  </div>

@else

  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-10 mx-auto text-center">
          <div class="intro-wrap">
            <h1 class="mb-3 text-white">Anda Belum Melakukan Order </h1>
          </div>
          <div class="text-center mt-3">
            <a href="/"  class="btn btn-primary" >Kembali</a>
        </div>
        </div>
      </div>
    </div>
  </div>
  
@endif

  {{-- Modal aksi Print --}}
  <div class="modal fade" id="modalPrint" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tidak Dapat Cetak Struk !!!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Anda dapat mencetak struk pembayaran ketika status pesanan sudah di <strong>"Konfirmasi"</strong>.</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


 
@endsection