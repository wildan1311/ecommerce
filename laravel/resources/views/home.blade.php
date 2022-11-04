@extends('index')

@section('content')
@include('partial.slider')
<!-- end slider section -->
</div>


<!-- about section -->

<section class="about_section layout_padding">
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <div class="detail-box">
        <div class="heading_container">
            <h2>
            About Us
            </h2>

        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam
        </p>
        <a href="">
            Read More
        </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="img-box">
        <img src="{{asset('template/images/about-img.png')}}" alt="">
        </div>
    </div>
    </div>
</div>
</section>

<!-- end about section -->

<!-- trending section -->

<section class="trending_section layout_padding">
<div id="accordion">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="detail-box">
            <div class="heading_container">
            <h2>
                Trending Categories
            </h2>
            </div>
            <div class="tab_container">
            <div class="t-link-box" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                <div class="number">
                <h5>
                    01
                </h5>
                </div>
                <hr>
                <div class="t-name">
                <h5>
                    Chairs
                </h5>
                </div>
            </div>
            <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="false" aria-controls="collapseTwo">
                <div class="number">
                <h5>
                    02
                </h5>
                </div>
                <hr>
                <div class="t-name">
                <h5>
                    Tables
                </h5>
                </div>
            </div>
            <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="false" aria-controls="collapseThree">
                <div class="number">
                <h5>
                    03
                </h5>
                </div>
                <hr>
                <div class="t-name">
                <h5>
                    Bads
                </h5>
                </div>
            </div>
            <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="false" aria-controls="collapseFour">
                <div class="number">
                <h5>
                    04
                </h5>
                </div>
                <hr>
                <div class="t-name">
                <h5>
                    Furnitures
                </h5>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="img_container ">
            <div class="box b-1">
                <div class="img-box">
                <img src="{{asset('template/images/t-1.jpg')}}" alt="">
                </div>
                <div class="img-box">
                <img src="{{asset('template/images/t-2.jpg')}}" alt="">
                </div>
            </div>
            <div class="box b-2">
                <div class="img-box">
                <img src="{{asset('template/images/t-3.jpg')}}" alt="">
                </div>
                <div class="img-box">
                <img src="{{asset('template/images/t-4.jpg')}}" alt="">
                </div>
            </div>
            </div>
        </div>
        <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="img_container ">
            <div class="box b-1">
                <div class="img-box">
                <img src="images/t-3.jpg" alt="">
                </div>
                <div class="img-box">
                <img src="images/t-4.jpg" alt="">
                </div>
            </div>
            <div class="box b-2">

                <div class="img-box">
                <img src="images/t-1.jpg" alt="">
                </div>
                <div class="img-box">
                <img src="images/t-2.jpg" alt="">
                </div>
            </div>
            </div>
        </div>
        <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="img_container ">
            <div class="box b-1">
                <div class="img-box">
                <img src="images/t-4.jpg" alt="">
                </div>
                <div class="img-box">
                <img src="images/t-1.jpg" alt="">
                </div>
            </div>
            <div class="box b-2">
                <div class="img-box">
                <img src="images/t-3.jpg" alt="">
                </div>
                <div class="img-box">
                <img src="images/t-2.jpg" alt="">
                </div>
            </div>
            </div>
        </div>
        <div class="collapse" id="collapseFour" aria-labelledby="headingfour" data-parent="#accordion">
            <div class="img_container ">
            <div class="box b-1">
                <div class="img-box">
                <img src="images/t-1.jpg" alt="">
                </div>

                <div class="img-box">
                <img src="images/t-4.jpg" alt="">
                </div>
            </div>
            <div class="box b-2">
                <div class="img-box">
                <img src="images/t-3.jpg" alt="">
                </div>
                <div class="img-box">
                <img src="images/t-2.jpg" alt="">
                </div>
            </div>
            </div>
        </div>

        </div>
    </div>
    </div>
</div>

</section>

<!-- end trending section -->

<!-- discount section -->

<section class="discount_section  layout_padding">
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <div class="detail-box">
        <h2>
            The Latest Collection
        </h2>
        <h2 class="main_heading">
            50% DISCOUNT
        </h2>

        <div class="">
            <a href="">
            Buy Now
            </a>
        </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="img-box">
        <img src="images/discount-img.png" alt="">
        </div>
    </div>
    </div>
</div>
</section>


<!-- end discount section -->

<!-- brand section -->

<section class="brand_section">
<div class="container">
    <div class="heading_container">
    <h2>
        Featured Brands
    </h2>
    </div>
    <div class="brand_container layout_padding2">
    <div class="box">
        <a href="">
        <div class="new">
            <h5>
            New
            </h5>
        </div>
        <div class="img-box">
            <img src="images/slider-img.png" alt="">
        </div>
        <div class="detail-box">
            <h6 class="price">
            $100
            </h6>
            <h6>
            Chair
            </h6>
        </div>
        </a>
    </div>
    <div class="box">
        <a href="">
        <div class="img-box">
            <img src="images/slider-img.png" alt="">
        </div>
        <div class="detail-box">
            <h6 class="price">
            $100
            </h6>
            <h6>
            Chair
            </h6>
        </div>
        </a>
    </div>
    <div class="box">
        <a href="">
        <div class="img-box">
            <img src="images/slider-img.png" alt="">
        </div>
        <div class="detail-box">
            <h6 class="price">
            $100
            </h6>
            <h6>
            Chair
            </h6>
        </div>
        </a>
    </div>
    <div class="box">
        <a href="">
        <div class="img-box">
            <img src="images/slider-img.png" alt="">
        </div>
        <div class="detail-box">
            <h6 class="price">
            $100
            </h6>
            <h6>
            Chair
            </h6>
        </div>
        </a>
    </div>
    </div>
    <a href="/shop" class="brand-btn">
    See More
    </a>
</div>
</section>

<!-- end brand section -->
<!-- contact section -->

<section class="contact_section layout_padding">
<div class="container ">
    <div class="heading_container">
    <h2 class="">
        Contact Us
    </h2>
    </div>

</div>
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <form action="">
        <div>
            <input type="text" placeholder="Name" />
        </div>
        <div>
            <input type="email" placeholder="Email" />
        </div>
        <div>
            <input type="text" placeholder="Phone" />
        </div>
        <div>
            <input type="text" class="message-box" placeholder="Message" />
        </div>
        <div class="d-flex ">
            <button>
            SEND
            </button>
        </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="map_container">
        <div class="map-responsive">
            <iframe
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
            width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
            allowfullscreen></iframe>
        </div>
        </div>
    </div>
    </div>
</div>
</section>

<!-- end contact section -->

<!-- client section -->
<section class="client_section layout_padding-bottom">
<div class="container">
    <div class="heading_container">
    <h2>
        Testimonial
    </h2>
    </div>
</div>

<div class="container">
    <div class="client_container layout_padding2">
    <div class="client_box b-1">
        <div class="client-id">
        <div class="img-box">
            <img src="images/client-1.png" alt="" />
        </div>
        <div class="name">
            <h5>
            Magna
            </h5>
            <p>
            Consectetur adipiscing
            </p>
        </div>
        </div>
        <div class="detail">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
        </p>
        <div>
            <div class="arrow_img">
            </div>
        </div>
        </div>
    </div>
    <div class="client_box b-2">
        <div class="client-id">
        <div class="img-box">
            <img src="images/client-2.png" alt="" />
        </div>
        <div class="name">
            <h5>
            Aliqua
            </h5>
            <p>
            Consectetur adipiscing
            </p>

        </div>
        </div>
        <div class="detail">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
        </p>
        <div>
            <div class="arrow_img">
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</section>
@endsection