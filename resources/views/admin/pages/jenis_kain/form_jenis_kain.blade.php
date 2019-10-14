<div class="form-group">
    @if (isset($jenisKain))
    {!! Form::hidden('id',$jenisKain->id) !!}
    @endif
    @if ($errors->has('jenis_kain'))
    @php
    toast($errors->first('jenis_kain'),'error');
    @endphp
    <label for="jenis_kain">Jenis Kain</label>
    {!! Form::text('jenis_kain', null,
    ['class'=>'form-control is-invalid','id'=>'jenis_kain','placeholder'=>'Jenis Kain..']) !!}
    @else
    <label for="jenis_kain">Jenis Kain</label>
    {!! Form::text('jenis_kain', null,
    ['class'=>'form-control','id'=>'jenis_kain','placeholder'=>'Jenis Kain..']) !!}
    @endif
    {{ csrf_field() }}
</div>
{!! Form::submit($buttonLabel, ['class'=>'btn btn-info']) !!}