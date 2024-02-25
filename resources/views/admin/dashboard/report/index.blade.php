@extends('admin.template.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Report</h1>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mx-0" role="alert">
     {{ session('success') }}
     <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Report Order</h6>
        </div>
        <div class="card-body">
            <div class="row col-lg-12">
                <div class="col-lg-12">
                    <div class="card mb-2">
                      <div class="card-body">
                        <form action="/dashboard/report" method="get" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-sm-2 ml-0">
                            <p class="mb-0"><b>Filter Laporan</b> </p>
                            <input type="number" class="form-control" name="hari" min="1" max="31" placeholder="Hari">
                        </div>
                        <div class="col-sm-2 ml-0">
                            <br>
                            <input type="number" class="form-control" name="bulan" min="1" max="12" placeholder="Bulan">
                        </div>
                        <div class="col-sm-2 ml-0">
                            <br>
                            <input type="number" class="form-control" name="tahun" min="2020" max="2030" placeholder="Tahun">
                        </div>
                        <div class="col-sm-2 ml-0">
                            <br>
                            <select class="form-control" aria-label="Default select example"  name="status">
                                <option value="">Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Konfirmasi">Konfirmasi</option>
                                <option value="Tolak">Tolak</option>
                                <option value="Checkin">Check In</option>
                                <option value="Checkout">Check Out</option>
                            </select>
                          </div>
                        <div class="col-sm-3 ml-0">
                            <br>
                            <select class="form-control" aria-label="Default select example"  name="userId">
                                <option value="">User</option>
                                @forelse ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                    <option value="">User Tidak Ada</option>
                                @endforelse
                            </select>
                          </div>
                        <div class="col-sm-1 ml-0">
                            <br>
                            <input type="hidden" name="search" value="true">
                            <button type="submit" class="btn btn-info">Submit</button>
                          </div>
                        </div>
                        <br>
                        <div class="text-right">
                          
                        </div>
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

