@extends('admin.template_admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title"> Detail Produk</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Nama Produk</strong>
                        </div>
                        <div class="col-8">
                            {{ $produk->nama_produk }}
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Kategori</strong>
                        </div>
                        <div class="col-8">
                            {{ $produk->kategori->nama_kategori }}
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Jenis Kain</strong>
                        </div>
                        <div class="col-8">
                            {{ $produk->jenisKain->jenis_kain }}
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Stok</strong>
                        </div>
                        <div class="col-8">
                            {{ $produk->stok }}
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Harga</strong>
                        </div>
                        <div class="col-8">
                            {{ 'Rp. '.number_format($produk->harga) }}
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Detail Produk</strong>
                        </div>
                        <div class="col-8 text-justify">
                            {{ $produk->detail_produk }}
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Di Buat</strong>
                        </div>
                        <div class="col-8">
                            {{ $produk->created_at->format('d M Y - H:i:s') }}
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Di Ubah</strong>
                        </div>
                        <div class="col-8">
                            {{ $produk->updated_at->format('d M Y - H:i:s') }}
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            <strong>Foto Produk</strong>
                        </div>
                        <div class="col-8">
                            <img src="{{ asset('img/product-img/'.$produk->foto_produk) }}" class="img-detail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection