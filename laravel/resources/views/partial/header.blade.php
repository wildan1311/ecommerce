<header class="header_section">
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="/home">
        <img src="{{asset('template/images/logo.png')}}" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
            <li class="nav-item" id="home">
            <a class="nav-link" href="/" >Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" id="about">
            <a class="nav-link" href="/about" > About</a>
            </li>
            <li class="nav-item" id="shop">
            <a class="nav-link" href="/shop">Shop </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="furniture.html"> Furniture </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact us</a>
            </li>
        </ul>
        @guest
            <div class="user_option">
                <a href="/login">
                <img src="images/user.png" alt="">
                <span>
                    Login
                </span>
                </a>
                <ul class="navbar-nav  ">
                    <li><a class="nav-link" href="/cart"><img src="{{asset('cart_template/images/cart.svg')}}"></a></li>
                </ul>
            </div>   
        @endguest
        @auth
        <div class="user_option">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
            <ul class="navbar-nav  ">
                {{-- CEK LAGI
                    MIDLLEWARE UNTUK CART YA
                    --}}
                <li><a class="nav-link" href="/cart"><img src="{{asset('cart_template/images/cart.svg')}}"></a></li>
            </ul>
        </div>
        @endauth
        
        </div>
        <div>
        <div class="custom_menu-btn ">
            <button>
            <span class=" s-1">

            </span>
            <span class="s-2">

            </span>
            <span class="s-3">

            </span>
            </button>
        </div>
        </div>

    </nav>
    </div>
</header>
@push('active')
    @if($title == 'about')

    <script>
        $(function() {
            $('#about').addClass('active');
        });
    </script>
    @elseif ($title == 'home')
        <script>
            $(function() {
                $('#home').addClass('active');
            });
        </script>
    @elseif ($title == 'shop')
        <script>
            $(function() {
                $('#shop').addClass('active');
            });
        </script>
    @endif
@endpush