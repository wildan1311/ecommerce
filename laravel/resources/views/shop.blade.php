@extends('index')

@section('content')
    <section class="brand_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                Featured Brands
                </h2>
            </div>

        {{-- TAMPIL BRAND --}}

            <div class="brand_container layout_padding2">
                @forelse ($barang as $item)
                    <div class="box">
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
                            <div class="row paket" id="paket">
                                <a id="detailBarang" type="button" class="btn btn-success btn-block text-white detailBarang" data-bs-toggle="modal" data-bs-target="#exampleModal" href="" data-url="{{ route('post.show', $item->id) }}" data-id="{{$item->id}}">Buy</a>
                            </div>
                    </div>
                @empty
                    Tidak ada barang
                @endforelse
            </div>

            {{-- MODALS --}}
                
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">DETAIL</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <img alt="ksoson" class="gambar" src="">
                                    </div>
                                    <div class="col-6">
                                        <h2 class="fs-5">Nama</h2>
                                            <p id="name"></p>
                                        <hr>
                                        <h2 class="fs-5">Harga</h2>
                                            <p id="harga"></p>
                                        <hr>
                                        <form action="/cart" method="POST">
                                            @csrf
                                            <div class="wrapper col-6">
                                                <span class="minus">-</span>
                                                <span class="num">1</span>
                                                <span class="plus">+</span>
                                            </div>
                                            <input type="number" name="jumlah" id="jumlah1" value="" hidden>
                                            @error('jumlah')
                                                    ERROR
                                            @enderror
                                    </div>
                                </div>
                            </div>
                                <input type="number" name="id_barang" id="id_barang" value="" hidden>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                
            {{-- ENS MODALS --}}

            {{-- END TAMPIL BRAND --}}

    </div>
    </section>
        
@endsection

@push('css')
    <style>
        .wrapper{
        height: 40px;
        width: 150px;
        min-width: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFF;
        border-radius: 12px;
        border: rgba(0,0,0,0.2) solid;
    }
    .wrapper span{
        width: 100%;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        cursor: pointer;
        user-select: none;
    }
    .wrapper span.num{
        font-size: 20px;
        border-right: 2px solid rgba(0,0,0,0.2);
        border-left: 2px solid rgba(0,0,0,0.2);
        pointer-events: none;
    }
    </style>
@endpush

@push('modal')
    <script>
        const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        num = document.querySelector(".num");
        let a = 1;
        $('#jumlah1').attr('value', a);
        plus.addEventListener("click", ()=>{
        a++;
        num.innerText = a;
        $('#jumlah1').attr('value', a);
        });
    
        minus.addEventListener("click", ()=>{
        if(a > 1){
            a--;
            num.innerText = a;
            $('#jumlah1').attr('value', a);
        }
        });
        $(document).ready(function(){
            $('.paket').on('click','.detailBarang',function(){
                // AJAX request
                console.log('aku diclick')
                var userURL = $(this).data('url');
                console.log(userURL)
    
                $.get(userURL, function (data) {
                    console.log(data);
                    $('#exampleModal').modal('show');
                    $('#name').text(data.name);
                    $('#harga').text("Rp. "+ data.harga);
                    $('#id_barang').attr('value', data.id);
                    $('.gambar').attr("src", "{{asset('template/images')}}" + '/'+data.gambar);
                })
                return false;
            });
        });
    </script> 
@endpush