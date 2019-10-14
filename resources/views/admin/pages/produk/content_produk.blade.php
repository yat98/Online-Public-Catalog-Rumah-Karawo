<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-tag-content text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Data Produk</p>
                            <p class="card-title">{{ isset($countAllProduk)? $countAllProduk:$countProduk }} Produk<p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                @if ($countProduk > 0 || (isset($countAllProduk) > 0))
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Update {{ $lastUpdateProduk }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            {!! Form::open(['url'=>'admin/product/search','method'=>'get','class'=>'d-flex']) !!}
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-11 col-9">
                        {!! Form::text('cari', isset($cari) ? $cari:null, ['class'=>'form-control',
                        'placeholder'=>'Masukan Nama Produk..'])
                        !!}
                    </div>
                    <div class="col-md-1 text-center col-3">
                        {!! Form::submit('Cari', ['class'=>'btn btn-success']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title"> Produk</h4>
                    </div>
                    <div class="col-6 text-right">
                        {!! link_to('admin/product/create', 'Tambah Produk',['class'=>'btn btn-info']) !!}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($produksList) > 0)
                    <table class="table">
                        <thead class="text-center text-success">
                            <th>
                                No.
                            </th>
                            <th>
                                Nama Produk
                            </th>
                            <th>
                                Kategori
                            </th>
                            <th>
                                Jenis Kain
                            </th>
                            <th>
                                Stok
                            </th>
                            <th>
                                Harga
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody class="text-center">
                            @php
                            $i=1;
                            @endphp
                            @foreach ($produksList as $produk)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->kategori->nama_kategori }}</td>
                                <td>{{ $produk->jenisKain->jenis_kain }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>{{ 'Rp. '.number_format($produk->harga) }}</td>
                                <td>
                                    {!! link_to('admin/product/'.$produk->id, 'Detail', ['class'=>'btn
                                    btn-primary'])
                                    !!}
                                    {!! link_to('admin/product/'.$produk->id.'/edit', 'Edit', ['class'=>'btn
                                    btn-warning']) !!}
                                    {!!
                                    Form::open(['action'=>['ProdukController@destroy',$produk->id],'method'=>'delete','class'=>'d-inline-block'])
                                    !!}
                                    {!! Form::submit('Hapus', ['class'=>'delete-button btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mr-md-5">
                        <div class="col-md-6 offset-md-6 mr-4">
                            <div class="row justify-content-end">
                                <p>{{ $produksList }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <tr>
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="empty-states text-center p-5">
                                <img src={{ asset('svg/box.svg') }} alt="" style="width:200px; height 200px;">
                                <h3 class="mt-5">
                                    @if (Session::has('search-message-title'))
                                    {{ Session::get('search-message-title') }}
                                    @else
                                    Data Produk Kosong
                                    @endif
                                </h3>
                                <p>
                                    @if (Session::has('search-message-subtitle'))
                                    {{ Session::get('search-message-subtitle') }}
                                    @else
                                    Silahkan tambahkan produk terlebih dahulu!
                                    @endif
                                </p>
                            </div>
                        </div>
                    </tr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>