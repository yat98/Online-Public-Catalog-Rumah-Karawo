@if (isset($produk))
{!! Form::hidden('id',$produk->id) !!}
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert"><b>{{ $error }}</b></div>
@endforeach
@endif

<div class="form-group">
    @if ($errors->has('nama_produk'))
    <label for="nama_produk">Nama Produk</label>
    {!! Form::text('nama_produk', null,
    ['class'=>'form-control is-invalid','id'=>'nama_produk','placeholder'=>'Nama Produk..']) !!}
    @else
    <label for="nama_produk">Nama Produk</label>
    {!! Form::text('nama_produk', null,
    ['class'=>'form-control','id'=>'nama_produk','placeholder'=>'Nama Produk..']) !!}
    @endif
</div>

<div class="form-group">
    @if (count($kategoriList) > 0)
    @if ($errors->has('id_kategori'))
    <label for="id_kategori">Kategori</label>
    {!! Form::select('id_kategori', $kategoriList , null, ['class'=>"is-invalid custom-select",'placeholder'=>'-Pilih
    Kategori-']) !!}
    @else
    <label for="id_kategori">Kategori</label>
    {!! Form::select('id_kategori', $kategoriList, null, ['class'=>"custom-select",'placeholder'=>'-Pilih Kategori-'])
    !!}
    @endif
    @else
    <label for="id_kategori">Kategori</label>
    {!! Form::select('id_kategori', [], null, ['class'=>"is-invalid custom-select",
    'placeholder'=>'Silahkan Buat Data Kategori Terlebih Dahulu!','disabled'=>'disabled']) !!}
    @endif
</div>

<div class="form-group">
    @if (count($jenisKainList) > 0)
    @if ($errors->has('id_jenis_kain'))
    <label for="id_jenis_kain">Jenis Kain</label>
    {!! Form::select('id_jenis_kain', $jenisKainList, null, ['class'=>"is-invalid custom-select",
    'placeholder'=>'-Pilih Jenis Kain-']) !!}
    @else
    <label for="id_jenis_kain">Jenis Kain</label>
    {!! Form::select('id_jenis_kain', $jenisKainList, null, ['class'=>"custom-select",'placeholder'=>'-Pilih Jenis
    Kain-'])
    !!}
    @endif
    @else
    <label for="id_jenis_kain">Jenis Kain</label>
    {!! Form::select('id_jenis_kain', [] , null, ['class'=>"is-invalid custom-select",
    'placeholder'=>'Silahkan Buat Data Jenis Kain Terlebih Dahulu!','disabled'=>'disabled']) !!}
    @endif
</div>

<div class="form-group">
    @if ($errors->has('harga'))
    <label for="harga">Harga</label>
    {!! Form::text('harga', null,
    ['class'=>'form-control is-invalid','id'=>'harga','placeholder'=>'Harga..']) !!}
    @else
    <label for="harga">Harga</label>
    {!! Form::text('harga', null,
    ['class'=>'form-control','id'=>'harga','placeholder'=>'Harga..']) !!}
    @endif
</div>

<div class="form-group">
    @if ($errors->has('stok'))
    <label for="stok">Stok</label>
    {!! Form::text('stok', null,
    ['class'=>'form-control is-invalid','id'=>'stok','placeholder'=>'Stok..']) !!}
    @else
    <label for="harga">Stok</label>
    {!! Form::text('stok', null,
    ['class'=>'form-control','id'=>'stok','placeholder'=>'Stok..']) !!}
    @endif
</div>

<div class="form-group">
    @if ($errors->has('detail_produk'))
    <label for="detail_produk">Detail Produk</label>
    {!! Form::textarea('detail_produk', null,
    ['class'=>'form-control is-invalid','id'=>'detail_produk','placeholder'=>'Detail Produk..','rows'=>'100']) !!}
    @else
    <label for="detail_produk">Detail Produk</label>
    {!! Form::textarea('detail_produk', null,
    ['class'=>'form-control','id'=>'detail_produk','placeholder'=>'Detail Produk..','rows'=>'100']) !!}
    @endif
</div>

<div class="custom-file mt-3">
    @if ($errors->has('detail_produk'))
    {!! Form::file('foto_produk', ['class'=>"is-invalid custom-file-input",'id'=>"foto_produk"]) !!}
    <label class="custom-file-label" for="foto_produk">Upload Foto Produk...</label>
    @else
    {!! Form::file('foto_produk', ['class'=>"custom-file-input",'id'=>"foto_produk"]) !!}
    <label class="custom-file-label" for="foto_produk">Upload Foto Produk...</label>
    @endif
</div>


{{ csrf_field() }}
{!! Form::submit($buttonLabel, ['class'=>'btn btn-info']) !!}