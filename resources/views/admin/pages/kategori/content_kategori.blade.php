<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-bullet-list-67 text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Kategori</p>
                            <p class="card-title">{{ isset($countAllKategori) ? $countAllKategori : $countKategori }}
                                Kategori<p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                @if ($countKategori > 0 || (isset($countAllKategori) > 0))
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Update {{ $lastUpdateKategori }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            {!! Form::open(['url'=>'admin/kategori/search','class'=>'d-flex','method'=>'get']) !!}
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-11 col-9">
                        {!! Form::text('cari',isset($cari) ? $cari:null,['class'=>'form-control',
                        'placeholder'=>'Masukan Kategori..'])
                        !!}
                    </div>
                    <div class="col-md-1 text-center col-3">
                        {!! Form::submit('Cari', ['class'=>'d-inline-block btn btn-success']) !!}
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
                        <h4 class="card-title"> Kategori</h4>
                    </div>
                    <div class="col-6 text-right">
                        {!! link_to('admin/kategori/create', 'Tambah Kategori',['class'=>'btn btn-info']) !!}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($kategoris_list) > 0)
                    <table class="table">
                        <thead class="text-center text-success">
                            <th>
                                No.
                            </th>
                            <th>
                                Kategori
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody class="text-center">
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($kategoris_list as $kategori)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>
                                    {!! link_to('admin/kategori/'.$kategori->id.'/edit', 'Edit', ['class'=>'btn
                                    btn-warning']) !!}
                                    {!!
                                    Form::open(['action'=>['KategoriController@destroy',$kategori->id],'method'=>'delete','class'=>'form-delete
                                    d-inline-block'])
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
                                <p>{{ $kategoris_list }}</p>
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
                                    Data Kategori Kosong
                                    @endif
                                </h3>
                                <p>
                                    @if (Session::has('search-message-subtitle'))
                                    {{ Session::get('search-message-subtitle') }}
                                    @else
                                    Silahkan tambahkan kategori terlebih dahulu!
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