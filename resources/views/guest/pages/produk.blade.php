@extends('guest.template_guest')

@section('main')
<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">
    @include('guest.pages.search')
    @include('guest.pages.navbar')
    <div class="shop_sidebar_area">

        {!! Form::open(['url'=>'product/search','method'=>'get']) !!}
        <!-- ##### Single Widget ##### -->
        <div class="widget brands mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Categori</h6>

            <div class="widget-desc">
                @if (count($kategoris) > 0)
                <!-- Single Form Check -->
                @foreach ($kategoris as $kategori)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $kategori->id }}" name="kategori[]"
                        id="amado" @if (isset($inputKategori)) @if (in_array($kategori->id,$inputKategori)) checked
                    @endif
                    @endif>

                    <label class="form-check-label" for="amado">{{ $kategori->nama_kategori }}</label>
                </div>
                @endforeach
                @else
                <p>Categori Empty</p>
                @endif
            </div>
        </div>

        <!-- ##### Single Widget ##### -->
        <div class="widget brands mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Fabrics</h6>

            <div class="widget-desc">
                @if (count($jenisKains) > 0)
                <!-- Single Form Check -->
                @foreach ($jenisKains as $jenisKain)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $jenisKain->id }}" name="jenis-kain[]"
                        id="amado" @if (isset($inputJenisKain)) @if (in_array($jenisKain->id,$inputJenisKain)) checked
                    @endif
                    @endif>
                    <label class="form-check-label" for="amado">{{ $jenisKain->jenis_kain }}</label>
                </div>
                @endforeach
                @else
                <p>Fabrics Empty</p>
                @endif

            </div>
        </div>

        <!-- ##### Single Widget ##### -->
        <div class="widget price mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Price</h6>

            <div class="widget-desc">
                <div class="slider-range">
                    <div data-min="{{ isset($minHargaTable) ? $minHargaTable:$minHarga }}" data-max="{{ $maxHarga }}"
                        data-unit="$"
                        class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                        data-value-min="{{ isset($minHargaTable) ? $minHargaTable:$minHarga }}"
                        data-value-max="{{ $maxHarga }}" data-label-result="">
                        {{-- data-value-min:repopulate --}}
                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                        <span class="ui-slider-handle ui-state-default ui-corner-all act" tabindex="0"></span>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    </div>
                    <div class="range-price">{{ number_format($minHarga) }} - {{ number_format($maxHarga) }}</div>
                    {!! Form::hidden('min-harga', $minHarga, ['class'=>'slider-value-min']) !!}
                    {!! Form::hidden('max-harga', $maxHarga, ['class'=>'slider-value-max']) !!}

                    <button type="submit" class="mt-5 btn btn-green">Tampilkan</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @if ($countProduks > 0)
    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                @foreach ($produks as $produk)
                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <a href="{{ url('product/detail/'.$produk->id) }}">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img data-src="{{ asset('img/product-img/'.$produk->foto_produk) }}" alt=""
                                    class="img-potrait lazy">
                                <!-- Hover Thumb -->
                                <img class="hover-img lazy img-potrait"
                                    data-src="{{ asset('img/product-img/'.$produk->foto_produk) }}" alt="">
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">{{ 'IDR. '.number_format($produk->harga) }}</p>

                                    <h6>{{ $produk->nama_produk }}</h6>
                                </div>
                            </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                {{ $produks->links('pagination.default') }}
            </div>
        </div>
    </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@else
{{-- Product Empty State --}}
<div class="amado_product_area section-padding-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="empty-states text-center p-5">
            <img src={{ asset('svg/box.svg') }} alt="" style="width:200px; height 200px;">
            <h1 class="mt-5">
                @if (Session::has('search-message-title'))
                {{ Session::get('search-message-title') }}
                @else
                Product Empty
                @endif
            </h1>
            <h5>
                @if (Session::has('search-message-subtitle'))
                {{ Session::get('search-message-subtitle') }}
                @else
                Try it later!
                @endif
            </h5>
        </div>
    </div>
</div>
{{-- Product Empty State End --}}
@endif
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection