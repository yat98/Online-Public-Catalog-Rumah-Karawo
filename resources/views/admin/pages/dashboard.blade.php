@extends('admin.template_admin')

@section('content')
<div class="content">
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
                                <p class="card-category">Data Kategori</p>
                                <p class="card-title">{{ $countKategori }} Kategori<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    @if ($countKategori > 0)
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update {{ $lastUpdateKategori }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
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
                                <p class="card-title">{{ $countJenisKain }} Jenis<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    @if ($countJenisKain > 0)
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update {{ $lastUpdateJenisKain }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
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
                                <p class="card-title">{{ $countProduk }} Produk<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    @if ($countProduk > 0)
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update {{ $lastUpdateProduk }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-single-02 text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Data User</p>
                                <p class="card-title">150GB<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update 5 Menit Lalu
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Statistik Produk Berdasarkan Ketegori</h5>
                </div>
                <div class="card-body ">
                    <canvas id="chartKategori" width="400" height="100"></canvas>
                </div>
                <div class="card-footer ">
                    @if ($countProduk > 0)
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated {{ $lastUpdateProduk }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Statistik Produk Berdasarkan Jenis Kain</h5>
                </div>
                <div class="card-body ">
                    <canvas id="chartJenisKain" width="400" height="100"></canvas>
                </div>
                <div class="card-footer ">
                    @if ($countProduk > 0)
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated {{ $lastUpdateProduk }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript-internal')
<script>
    let chartKategori = $('#chartKategori')[0].getContext("2d");
    let chartJenisKain = $('#chartJenisKain')[0].getContext("2d");
    createChart(chartKategori,
            [@foreach ($kategoris as $kategori)
                "{{$kategori->nama_kategori}}",
            @endforeach],
            [@foreach ($produksKategoriStatistik as $kategori)
                "{{$kategori}}",
            @endforeach]);
    createChart(chartJenisKain,[@foreach ($jenisKains as $jenisKain)
                "{{$jenisKain->jenis_kain}}",
            @endforeach],
            [@foreach ($produksJenisKainStatistik as $jenisKain)
                "{{$jenisKain}}",
                
            @endforeach])
</script>
@endsection