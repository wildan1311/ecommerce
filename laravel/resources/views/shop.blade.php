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
                <form action="" method="POST">
                    @csrf
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
                                        <img src="" alt="ksoson">
                                    </div>
                                    <div class="col-6">
                                        <h2 class="fs-5">Nama</h2>
                                            <p id="name"></p>
                                        <hr>
                                        <h2 class="fs-5">Harga</h2>
                                            <p id="harga"></p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                
            {{-- ENS MODALS --}}

            {{-- END TAMPIL BRAND --}}

    </div>
    </section>
        
@endsection

@push('css')
    <style>
    .wrapper{
        height: 30px;
        width: 100px;
        min-width: 5px;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: rgba(0,0,0,0.2);
    }
    .wrapper span{
        width: 100%;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
    }

    .wrapper span.num{
        border-right: 2px solid rgba(0,0,0,0.2);
        border-left: 2px solid rgba(0,0,0,0.2);
        pointer-events: none;
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
                    $('#name').text(data.name);
                    $('#harga').text("Rp. "+ data.harga);
                })

                return false;
            });
        });
    </script> 

    <script>
        const plus = document.querySelector('.plus');
        const minus = document.querySelector('.minus');
        const num = document.querySelector('.num');
        const count = document.querySelector('input[name="jumlah"]');

        let a = 1;
        count.setAttribute("value", a); 
        plus.addEventListener("click", ()=>{
            a++;
            num.innerText = a;
            count.setAttribute("value", a);
        })
        minus.addEventListener("click", ()=>{ 
            if(a>1){
                a--;
                num.innerText = a;
                count.setAttribute("value", a);
            }
        })
    </script>
@endpush