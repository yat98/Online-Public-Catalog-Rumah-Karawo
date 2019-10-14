@php
$username = Session::get('username');
@endphp
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-normal">
            <img src="{{ asset('img/core-img/logo.png') }}">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">

            @if (!empty($halamanAdmin) && $halamanAdmin == 'dashboard')
            <li class="active ">
                <a href="{{ url('admin') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @else
            <li>
                <a href="{{ url('admin') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @endif

            @if (!empty($halamanAdmin) && $halamanAdmin == 'kategori')
            <li class="active">
                <a href="{{ url('admin/kategori')}}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Kategori</p>
                </a>
            </li>
            @else
            <li>
                <a href="{{ url('admin/kategori')}}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Kategori</p>
                </a>
            </li>
            @endif

            @if (!empty($halamanAdmin) && $halamanAdmin == 'jenis kain')
            <li class="active">
                <a href="{{ url('admin/jenis-kain')}}">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    <p>Jenis Kain</p>
                </a>
            </li>
            @else
            <li>
                <a href="{{ url('admin/jenis-kain') }}">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    <p>Jenis Kain</p>
                </a>
            </li>
            @endif

            @if (!empty($halamanAdmin) && $halamanAdmin == 'produk')
            <li class="active">
                <a href="{{ url('admin/product') }}">
                    <i class="nc-icon nc-tag-content"></i>
                    <p>Product</p>
                </a>
            </li>
            @else
            <li>
                <a href="{{ url('admin/product') }}">
                    <i class="nc-icon nc-tag-content"></i>
                    <p>Product</p>
                </a>
            </li>
            @endif

            @if (!empty($halamanAdmin) && $halamanAdmin == 'password')
            <li class="active">
                <a href="{{ url('admin/password') }}">
                    <i class="nc-icon nc-settings-gear-65"></i>
                    <p>Ubah password</p>
                </a>
            </li>
            @else
            <li>
                <a href="{{ url('admin/password') }}">
                    <i class="nc-icon nc-settings-gear-65"></i>
                    <p>Ubah password</p>
                </a>
            </li>
            @endif

            <li>
                <a href="{{ url('admin/cetak') }}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Laporan</p>
                </a>
            </li>

            <li>
                <a href="{{ url('admin/logout') }}">
                    <i class="nc-icon nc-user-run"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <p class="navbar-brand">{{ !empty($halamanAdmin) ? ucwords($halamanAdmin) : '' }}</p>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-single-02"></i>
                            @if (isset($username))
                            <p>
                                <span>{{ $username }}</span>
                            </p>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('admin/logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>