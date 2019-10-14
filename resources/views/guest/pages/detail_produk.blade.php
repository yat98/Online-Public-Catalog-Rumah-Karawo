@extends('guest.template_guest')

@section('main')
<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">
    @include('guest.pages.search')
    @include('guest.pages.navbar')
    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="{{ asset('img/product-img/'.$produk->foto_produk) }}">
                                        <img data-src="{{ asset('img/product-img/'.$produk->foto_produk) }}" alt=""
                                            class="img-detail-guest lazy d-block w-100">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">{{ 'IDR. '.number_format($produk->harga) }}</p>
                            <a href="product-details.html">
                                <h6>{{ $produk->nama_produk }}</h6>
                            </a>
                            @if ($produk->stok > 0)
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            @else
                            <p class="avaibility"><i class="fa fa-circle text-danger"></i> Out Stock</p>
                            @endif
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <p class="text-dark">Categori : {{ $produk->kategori->nama_kategori }}</p>
                                <p class="text-dark">Fabrics : {{ $produk->jenisKain->jenis_kain }}</p>
                                <p class="text-dark">Stock : {{ $produk->stok }}</p>
                            </div>
                        </div>

                        <div class="short_overview mt-5">
                            <p>{{ $produk->detail_produk }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection