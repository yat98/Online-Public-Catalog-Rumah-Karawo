<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-chart-bar-32 text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Data Jenis Kain</p>
                            <p class="card-title">{{ isset($countAllJenisKain) ? $countAllJenisKain:$countJenisKain }}
                                Jenis<p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                @if ($countJenisKain > 0 || (isset($countAllJenisKain) > 0))
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Update {{ $lastUpdateJenisKain }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            {!! Form::open(['class'=>'d-flex','method'=>'get','url'=>'admin/jenis-kain/search']) !!}
            <div class="card-body">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-11 col-9">
                        {!! Form::text('cari', isset($cari) ? $cari:null, ['class'=>'form-control',
                        'placeholder'=>'Masukan Jenis Kain..'])
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
                        <h4 class="card-title"> Jenis Kain</h4>
                    </div>
                    <div class="col-6 text-right">
                        {!! link_to('admin/jenis-kain/create', 'Tambah Jenis Kain',['class'=>'btn btn-info']) !!}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($jenisKainsList) > 0)
                    <table class="table">
                        <thead class="text-center text-success">
                            <th>
                                No.
                            </th>
                            <th>
                                Jenis Kain
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody class="text-center">
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($jenisKainsList as $jenisKain)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $jenisKain->jenis_kain }}</td>
                                <td>
                                    {!! link_to('admin/jenis-kain/'.$jenisKain->id.'/edit', 'Edit', ['class'=>'btn
                                    btn-warning']) !!}
                                    {!!
                                    Form::open(['class'=>'d-inline-block','method'=>'delete','action'=>['JenisKainController@destroy',$jenisKain->id]])
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
                                <p>{{ $jenisKainsList }}</p>
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
                                    Data Jenis Kain Kosong
                                    @endif
                                </h3>
                                <p>
                                    @if (Session::has('search-message-subtitle'))
                                    {{ Session::get('search-message-subtitle') }}
                                    @else
                                    Silahkan tambahkan jenis kain terlebih dahulu!
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