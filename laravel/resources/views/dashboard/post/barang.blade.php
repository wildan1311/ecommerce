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
                                <div class="col">
                                    <a href="/post/{{$item->id}}" class="btn btn-primary btn-block">Edit</a>
                                </div>

                                <div class="col">
                                    <form method="POST" action="/post/{{$item->id}}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger btn-block" value="Delete">
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