@extends('admin.template.main')
 
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Kuota </h1>

    <div class="my-3">
        <a href="" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#ModalTambahKuota">
            <span class="icon text-white-50">
                <i class="fas fa-calendar-plus"></i>
            </span>
            <span class="text">Tambah Kuota</span>
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jalur Pendakian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jalur Pendakian</th>
                            <th>Lokasi Pos</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($kuotas as $kuota)
                        
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kuota[0]->jalur }}</td>
                            @if ($kuota[0]->jalur == 'Palutungan')
                                <td> Desa Cisantana, Kecamatan Cigugur, Kabupaten Kuningan</td>
                            @elseif ($kuota[0]->jalur == 'Apuy')
                                <td> Desa Argamukti, Kecamatan Argapura, Kabupaten Majalengka</td>
                            @elseif ($kuota[0]->jalur == 'Linggasana')
                                <td> Desa Linggasana, Kecamatan Cilimus, Kabupaten Kuningan</td>
                            @elseif ($kuota[0]->jalur == 'Linggarjati')
                                <td> Desa Linggajati, Kecamatan Cilimus, Kabupaten Kuningan</td>
                            @endif
                            <td>
                                <a href="kuota?jalur={{ $kuota[0]->jalur }}" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <span class="text">Lihat Kuota</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>

                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Tambah Kuota -->
  <div class="modal fade" id="ModalTambahKuota" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Kuota</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/kuota" method="post">
                    @csrf
                    <div>
                        <label for="jalur" class="form-label mr-3">Jalur Pendakian :</label>
                        <select class="form-select" aria-label="Default select example" id="jalur" name="jalur" required>
                            <option value="">Pilih Jalur</option>
                            <option value="Palutungan">Palutungan</option>
                            <option value="Linggarjati">Linggarjati</option>
                            <option value="Linggasana">Linggasana</option>
                            <option value="Apuy">Apuy</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_kuota" class="form-label">Jumlah Kuota :</label>
                        <input type="number" class="form-control" id="jumlah_kuota" name="jumlah_kuota"   required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal :</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"  required>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            </div>
        
        </div>
    </div>
</div>

@endsection