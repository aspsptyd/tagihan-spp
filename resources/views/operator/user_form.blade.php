@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">

        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Data {{ $access_menu }} / </span>{{ $title }}</h4>

        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                        <div class="form-group">
                            <lable for="name">Nama</lable>
                            {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <lable for="email">Email</lable>
                            {!! Form::text('email', null, ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <lable for="nohp">No. HP</lable>
                            {!! Form::text('nohp', null, ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('nohp') }}</span>
                        </div>
                        @if (\Route::is('user.create'))
                            <div class="form-group mt-3">
                                <lable for="akses">Hak Akses</lable>
                                {!! Form::select(
                                    'akses', 
                                    [
                                        'operator' => 'Operator',
                                        'admin' => 'Administrator'
                                    ], 
                                    null, 
                                    ['class' => 'form-control']) 
                                !!}
                                <span class="text-danger">{{ $errors->first('akses') }}</span>
                            </div>
                        @elseif(\Route::is('user.edit'))
                            <div class="form-group mt-3">
                                <lable for="akses">Hak Akses</lable>
                                {!! Form::select(
                                    'akses', 
                                    [
                                        'operator' => 'Operator',
                                        'admin' => 'Administrator'
                                    ], 
                                    null, 
                                    ['class' => 'form-control']) 
                                !!}
                                <span class="text-danger">{{ $errors->first('akses') }}</span>
                            </div>
                        @endif
                        
                        <div class="form-group mt-3">
                            <lable for="password">Password</lable>
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
