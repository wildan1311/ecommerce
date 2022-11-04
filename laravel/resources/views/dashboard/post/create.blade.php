@extends('dashboard.admin')

@section('judul')
    Tambah Barang
@endsection

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
    <div class="card card-success">
        <div class="card-header">
        <h3 class="card-title">@yield('judul')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/post" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Enter Description"></textarea>
                @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                @error('harga')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                @error('jumlah')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Input Gambar</label>
            <div class="input-group">
                <div class="custom-file">
                <input type="file" name="gambar" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                <span class="input-group-text">Upload</span>
                </div>
            </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @if($notif == 'berhasil')
        <button type="button" class="btn btn-success swalDefaultSuccess" hidden>
            Launch Success Toast
        </button>
        <button type="button" class="btn btn-danger swalDefaultError" hidden>
            Launch Error Toast
        </button>
    <script>
        $(document).ready(function(){
            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
                $('.swalDefaultSuccess').trigger("click");
            });
        })
        $('.swalDefaultError').click(function() {
            Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
        });
        </script>
    @endif

</section>
@endsection

@push('toastcss')
    <link rel="stylesheet" href="{{asset('dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/toastr/toastr.min.css')}}">
@endpush

@push('toast')
    <script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('dashboard/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('dashboard/plugins/toastr/toastr.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dashboard/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dashboard/dist/js/demo.js')}}"></script>
    <!-- Page specific script -->
    
@endpush
