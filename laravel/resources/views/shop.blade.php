@extends('index')

@section('content')
    <section class="brand_section layout_padding">
        <div class="container">
        <div class="heading_container">
            <h2>
            Featured Brands
            </h2>
        </div>
        <div class="brand_container layout_padding2">
            @forelse ($barang as $item)
            <a href="/post/{{$item->id}}" style="display:block">
                <div class="box">
                        {{-- <div class="new">
                        <h5>
                            New
                        </h5>
                        </div> --}}
                        <div class="img-box">
                        <img src="{{asset('template/images/'.$item->gambar)}}" alt="">
                        </div>
                        <div class="detail-box">
                        <h6 class="price">
                            {{$item->harga}}
                        </h6>
                        <h6>
                            {{$item->name}}
                        </h6>
                        </div>
                    </div>
                </a>
            @empty
                Tidak ada barang
            @endforelse
            
        </div>
        <a href="" class="brand-btn">
        See More
        </a>
    </div>
    </section>
@endsection