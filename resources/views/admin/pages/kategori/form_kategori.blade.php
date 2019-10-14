<div class="form-group">
    @if (isset($kategori))
    {!! Form::hidden('id',$kategori->id) !!}
    @endif
    @if ($errors->has('nama_kategori'))
    @php
    toast($errors->first('nama_kategori'),'error');
    @endphp
    <label for="nama_kategori">Nama Kategori</label>
    {!! Form::text('nama_kategori', null,
    ['class'=>'form-control is-invalid','id'=>'nama_kategori','placeholder'=>'Nama Kategori..']) !!}
    @else
    <label for="nama_kategori">Nama Kategori</label>
    {!! Form::text('nama_kategori', null,
    ['class'=>'form-control','id'=>'nama_kategori','placeholder'=>'Nama Kategori..']) !!}
    @endif
    {{ csrf_field() }}
</div>
{!! Form::submit($buttonLabel, ['class'=>'btn btn-info']) !!}