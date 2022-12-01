@extends('dashboard.admin')

@section('judul')
    Barang
@endsection

@section('content')
    <div class="container">
        <div class="d-flex row">
            @forelse ($barang as $item)
                    <div class="card col-4 mt-3" style="width: 18rem;">
                        <img src="{{asset('template/images/'.$item->gambar)}}" class="card-img-top" alt="{{$item->name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">{{$item->deskripsi}}</p>
                            <div class="row">
                                <div class="col paket" id="paket">
                                    <a id="detailBarang" type="button" class="btn btn-primary btn-block text-white detailBarang" data-bs-toggle="modal" data-bs-target="#exampleModal" href="" data-url="{{ route('post.show', $item->id) }}" data-id="{{$item->id}}" data-desc="{{$item->deskripsi}}">Update</a>
                                </div>
                                {{-- <div class="col">
                                    <a href="/post/{{$item->id}}" class="btn btn-primary btn-block">Edit</a>
                                </div> --}}

                                <div class="col">
                                    <button class="btn btn-danger btn-block" onclick="deleteConfirm('{{$item->id}}')">Delete</button>
                                    <form method="POST" action="/post/{{$item->id}}" id="{{$item->id}}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" hidden class="btn btn-danger btn-block" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
            @empty
                Data Kosong
            @endforelse
        </div>
    </div>

    <div class="round-button"><a href="/create_post"><i class="fa fa-plus-circle fa-3x round-button-circle" aria-hidden="true"></a></i></div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title fs-5" id="exampleModalLabel">DETAIL</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/post/" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 justify-content-center align-items-center">
                        <img alt="ksoson" class="gambar" src="">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <p class="fs-5">Nama</p>
                            <input type="text" value="" id="name" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <p class="fs-5">Deskripsi</p>
                            <textarea type="text" value="" id="desc" class="form-control" rows="3" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <p class="fs-5">Harga</p>
                            <input type="text" value="" id="harga" class="form-control" name="harga">
                        </div>
                        <div class="form-group">
                            <p class="fs-5">jumlah</p>
                            <input type="number" value="" id="jumlah" class="form-control" name="jumlah">
                        </div>
                            {{-- <p id="name"></p> --}}
                        
                    </div>
                </div>
            </div>
                <input type="number" name="id_barang" id="id_barang" value="" hidden>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
        </div>
    </div>
    
@endsection

@push('button')
<style>
    .round-button {
        position: fixed;
        right: 0;
        bottom: 0;
        margin-right: 10px;
    }
    .round-button-circle {
        color: green; 
    }
    .round-button a {
        display:block;
        width:100%;
        padding-top:50%;
        padding-bottom:50%;
        line-height:1em;
        margin-top:-0.5em;
            
        text-align:center;
        color:#e2eaf3;
        font-family:Verdana;
        font-size:1.2em;
        font-weight:bold;
        text-decoration:none;
    } 
</style>
   
@endpush

@push('modal')
    <script>
        $(document).ready(function(){
            $('.paket').on('click','.detailBarang',function(){
                // AJAX request
                console.log('aku diclick')
                var userURL = $(this).data('url');
                console.log(userURL)
    
                $.get(userURL, function (data) {
                    console.log(data);
                    $('#exampleModal').modal('show');
                    $('#name').val(data.name);
                    $('#harga').val(data.harga);
                    $('#desc').val(data.deskripsi);
                    $('#jumlah').val(data.jumlah);
                    $('#id_barang').attr('value', data.id);
                    $('form').attr('action', '/post/'+data.id);
                    $('.gambar').attr("src", "{{asset('template/images')}}" + '/'+data.gambar);
                })
                return false;
            });
        });
    </script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deleteConfirm(formId){
            Swal.fire({
                icon: 'warning',
                text: 'Do you want to delete this?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endpush