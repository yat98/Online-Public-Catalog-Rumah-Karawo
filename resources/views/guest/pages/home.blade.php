@extends('guest.template_guest')

@section('main')
<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">
    @include('guest.pages.search')
    @include('guest.pages.navbar')
    @if ($countProduks > 0)
    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">

            @foreach ($produks as $produk)
            <div class="single-products-catagory clearfix">
                <a href="{{ url('product/detail/'.$produk->id) }}">
                    <img data-src="{{ asset('img/product-img/'.$produk->foto_produk) }}" class="lazy img-potrait">
                    <!-- Hover Content -->
                    <div class="hover-content">
                        <div class="line"></div>
                        <p class="bg-success p-2 text-white">{{ 'IDR. '.number_format($produk->harga) }}</p>
                        <h4 class="bg-dark p-2 text-white">{{ $produk->nama_produk }}</h4>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Product Catagories Area End -->
    @else
    {{-- Product Empty State --}}
    <div class="products-catagories-area clearfix">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="empty-states text-center p-5">
                <img src={{ asset('svg/box.svg') }} alt="" style="width:200px; height 200px;">
                <h1 class="mt-5">Product Empty</h1>
                <h5>Try it Later!</h5>
            </div>
        </div>
    </div>
    {{-- Product Empty State End --}}
    @endif
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection