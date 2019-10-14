<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="{{ url('/') }}"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>

<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="http://rumahkarawo.com/"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            @if (!empty($halaman) && $halaman == 'home')
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            @else
            <li><a href="{{ url('/') }}">Home</a></li>
            @endif

            @if (!empty($halaman) && $halaman == 'product')
            <li class="active"><a href="{{ url('product') }}">Product</a></li>
            @else
            <li><a href="{{ url('product') }}">Product</a></li>
            @endif
    
            <li><a href="mailto:rumahkarawo1@gmail.com">Ask Us</a></li>
            
        </ul>
    </nav>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100 mt-5">
        <a href="#" class="search-nav"><img src="{{ asset('img/core-img/search.png') }}" alt=""> Search</a>
    </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="https://www.instagram.com/rumahkarawo/?hl=id" target="_blank"><i class="fa fa-instagram"
                aria-hidden="true"></i></a>
        <a href="https://www.facebook.com/pages/Rumah-Karawo-Store/1213811481978118" target="_blank"><i
                class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="https://twitter.com/rumahkarawo" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>
<!-- Header Area End -->