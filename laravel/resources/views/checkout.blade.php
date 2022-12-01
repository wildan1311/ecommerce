@extends('index')

@section('content')
    <div class="untree_co-section">
            <div class="container">
                <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border bg-white">
                    <div class="form-group">
                        <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                        <select id="c_country" class="form-control">
                        <option value="1">Select a country</option>    
                        <option value="2">bangladesh</option>    
                        <option value="3">Algeria</option>    
                        <option value="4">Afghanistan</option>    
                        <option value="5">Ghana</option>    
                        <option value="6">Albania</option>    
                        <option value="7">Bahrain</option>    
                        <option value="8">Colombia</option>    
                        <option value="9">Dominican Republic</option>    
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                        <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_fname" name="c_fname">
                        </div>
                        <div class="col-md-6">
                        <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_lname" name="c_lname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                        <label for="c_companyname" class="text-black">Company Name </label>
                        <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                        <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                        <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                        </div>
                        <div class="col-md-6">
                        <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                        </div>
                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-6">
                        <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                        </div>
                        <div class="col-md-6">
                        <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c_order_notes" class="text-black">Order Notes</label>
                        <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                    </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                        <table class="table site-block-order-table mb-5">
                            <thead>
                            <th>Product</th>
                            <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                    $array_id = array()
                                @endphp
                                @forelse ($cart as $item)
                                @php
                                    array_push($array_id, $item->id)
                                @endphp
                                    <tr>
                                        <td>{{$item->name}} <strong class="mx-2">x</strong> {{$item->jumlah}}</td>
                                        @php
                                            $total += $item->jumlah * $item->harga
                                        @endphp
                                        <td>{{number_format($item->jumlah * $item->harga)}}</td>
                                    </tr>
                                @empty
                                    Kosong
                                @endforelse
                            <tr>
                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                <td class="text-black font-weight-bold"><strong>{{number_format($total)}}</strong></td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="border p-3 mb-3">
                            <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                            <div class="collapse" id="collapsebank">
                            <div class="py-2">
                                <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                            </div>
                            </div>
                        </div>

                        <div class="border p-3 mb-3">
                            <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                            <div class="collapse" id="collapsecheque">
                            <div class="py-2">
                                <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                            </div>
                            </div>
                        </div>

                        <div class="border p-3 mb-5">
                            <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                            <div class="collapse" id="collapsepaypal">
                            <div class="py-2">
                                <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                            </div>
                            </div>
                        </div>

                            <form action="/cart/{{json_encode($array_id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <button class="btn btn-dark btn-lg py-3 btn-block" type="submit">Place Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
                </div>
                <!-- </form> -->
            </div>
            </div>
@endsection

@push('css')
    <link href="{{asset('cart_template/css/tiny-slider.css')}}" rel="stylesheet">
    <link href="{{asset('cart_template/css/style.css')}}" rel="stylesheet">
@endpush