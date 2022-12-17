
@extends('admin.template.main')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">About Ciremai</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">About Ciremai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        <tr>
                            <td>{{ $data->tentang_title }}</td>
                            <td>{{ $data->tentang_body }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="card-header py-3">
                <h6 class="my-2 font-weight-bold text-primary">Update About</h6>
            </div>
            <form action="/dashboard/interface/about/" method="post">
                @csrf
                <div class="form-group">
                  <label for="tentang_title">Title</label>
                  <input type="text" class="form-control" id="tentang_title" name="tentang_title" value="{{ old('tentang_title', $data->tentang_title) }}">
                </div>
                <div class="form-group">
                  <label for="tentang_body">Body</label>
                  <textarea class="form-control" id="tentang_body" name="tentang_body" value="{{ old('tentang_body', $data->tentang_body) }}" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-icon-split"><span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">Save</span>
                </button>
              </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection