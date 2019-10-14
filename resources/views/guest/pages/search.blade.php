<!-- Search Wrapper Area Start -->
<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <form action="{{ url('product/search') }}" method="get">
                        <input type="search" name="cari" id="cari" placeholder="Masukkan Nama Produk.."
                            value="{{ isset($cari) ?$cari:null }}">
                        <button type="submit"><img src="{{ asset('img/core-img/search.png') }}" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Wrapper Area End -->