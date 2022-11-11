@extends('index')

@section('content')
    
    <div class="untree_co-section before-footer-section mt-5 mb-5">
    <div class="container">
    <div class="row mb-5">
    <form class="col-md-12" method="post">
    <div class="site-blocks-table">
    <table class="table">
    <thead>
        <tr>
        <th class="product-thumbnail">Image</th>
        <th class="product-name">Product</th>
        <th class="product-price">Price</th>
        <th class="product-quantity">Quantity</th>
        <th class="product-total">Total</th>
        <th class="product-remove">Remove</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cart as $item)
        <tr>
            <td class="product-thumbnail">
                <img src="{{asset('template/images/'.$item->gambar)}}" alt="Image" class="img-fluid" width="100px">
            </td>
            <td class="product-name">
                <h2 class="h5 text-black">{{$item->name}}</h2>
            </td>
            <td>{{$item->harga}}</td>
            <td>
                <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center quantity-amount" value="{{$item->jumlah}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                    <button class="btn btn-outline-black increase" type="button">&plus;</button>
                </div>
                </div>
    
            </td>
            <td>{{$item->harga * $item->jumlah}}</td>
            @php
                $total += $item->harga * $item->jumlah
            @endphp
            <td><a href="#" class="btn btn-outline-danger btn-sm">X</a></td>
            </tr>
        @empty
            KOK GAADA
        @endforelse
    </tbody>
    </table>
    </div>
    </form>
    </div>
    <div class="row">
    <div class="col-md-6">
    </div>
        <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-4">
                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                    </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                    <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                    <strong class="text-black">Rp. {{number_format($total, 2)}}</strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <button class="btn btn-success btn-lg py-3 btn-block" onclick="window.location='/checkout'">Proceed To Checkout</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection