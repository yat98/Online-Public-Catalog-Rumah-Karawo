@extends('admin.template_admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Ubah Password</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert"><b>{{ $error }}</b></div>
                    @endforeach
                    @endif
                    {!! Form::open(['url'=>'admin/password','method'=>'POST']) !!}
                    <div class="form-group">
                        @if ($errors->has('password_lama'))
                        <label for="password_lama">Password Lama</label>
                        {!! Form::password('password_lama',
                        ['class'=>'form-control is-invalid','id'=>'password_lama','placeholder'=>'Password Lama..']) !!}
                        @else
                        <label for="password_lama">Password Lama</label>
                        {!! Form::password('password_lama',
                        ['class'=>'form-control','id'=>'password_lama','placeholder'=>'Password Lama..']) !!}
                        @endif
                    </div>

                    <div class="form-group">
                        @if ($errors->has('password_baru'))
                        <label for="password_baru">Password Lama</label>
                        {!! Form::password('password_baru',
                        ['class'=>'form-control is-invalid','id'=>'password_baru','placeholder'=>'Password Baru..']) !!}
                        @else
                        <label for="password_baru">Password Lama</label>
                        {!! Form::password('password_baru',
                        ['class'=>'form-control','id'=>'password_baru',
                        'placeholder'=>'Password Baru..']) !!}
                        @endif
                    </div>

                    <div class="form-group">
                        @if ($errors->has('password_baru_confirmation'))
                        <label for="password_baru_confirmation">Konfirmasi Password Baru</label>
                        {!! Form::password('password_baru_confirmation',
                        ['class'=>'form-control is-invalid','id'=>'password_baru_confirmation',
                        'placeholder'=>'Konfirmasi Password Baru..']) !!}
                        @else
                        <label for="password_baru_confirmation">Konfirmasi Password Baru</label>
                        {!! Form::password('password_baru_confirmation',
                        ['class'=>'form-control','id'=>'password_baru_confirmation',
                        'placeholder'=>'Konfimasi Password Baru..']) !!}
                        @endif
                    </div>
                    {{ csrf_field() }}
                    {!! Form::submit('Update Password', ['class'=>'btn btn-info']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection