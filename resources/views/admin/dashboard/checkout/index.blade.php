@extends('admin.template.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Check Out</h1>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mx-0" role="alert">
     {{ session('success') }}
     <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Check Out Pendakian</h6>
        </div>
        <div class="card-body">
            <div class="row col-lg-12">
                <div class="col-lg-6">
                    <div class="card mb-4">
                      <div class="card-body">
                        <form action="/dashboard/checkout/" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('post')
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0"><b>Kode Order</b> </p>
                          </div>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="kode_order" required >
                          </div>
                        </div>
                        <br>
                        <div class="text-right">
                          <button type="submit" class="btn btn-info">Check Out</button>
                        </div>
                      </form>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="justify-content-center">
                          <form id="formCheckin" action="/dashboard/checkout/" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <h4 class="mb-2 text-center"><b>Scan QR Code</b> </h4>
                            <video id="video" width="460" height="435" autoplay style="display: none"></video>
                            <canvas id="canvas" width="460" height="435" style="display:'';"></canvas>
                            <p class="mb-0"><b>Generated QR:</b> </p>
                            <input type="text" class="form-control" id="kode_order_qr" name="kode_order" readonly >
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
                    @if ($data != null)
                        <div class="col-lg-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kode Order</th>
                                                <th>Jalur</th>
                                                <th>Waktu Checkout</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        @foreach ($data as $item)
                                            
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td><a href="order?kode_order={{ $item->kode_order }}">{{ $item->kode_order }}</a></td>
                                                <td>{{ $item->kuota->jalur }}</td>
                                                <td>{{ $item->checkout_time }} <br><small>({{\Carbon\Carbon::parse($item->checkout_time)->diffForHumans()}})</small></td>
                                                <td>Rp.{{ number_format($item->harga, 0, ".", ".") }}</td>
                                                @if ($item->checkout == 1)
                                                <td><p class="badge bg-success text-white">Checked Out</p></td>
                                                @endif 
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
            </div>
        </div>

</div>
<!-- /.container-fluid -->

@endsection

