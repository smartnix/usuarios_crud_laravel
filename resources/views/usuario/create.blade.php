@extends('layouts.app')

@section('template_title')
    Create Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Usuario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('usuarios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('nombres') }}
                                        {{ Form::text('nombres', $usuario->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                                        {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('apellidos') }}
                                        {{ Form::text('apellidos', $usuario->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                                        {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('cedula') }}
                                        {{ Form::text('cedula', $usuario->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) }}
                                        {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('email') }}
                                        {{ Form::text('email', $usuario->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('pais') }}
                                        {{ Form::select('pais', $paises, null, ['class' => 'form-control'.($errors->has('pais') ? ' is-invalid' : '')]) }}
                                        {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('dirección') }}
                                        {{ Form::text('direccion', $usuario->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                                        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('celular') }}
                                        {{ Form::text('celular', $usuario->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
                                        {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('categoria') }}
                                        {{ Form::select('categoria_id', $categorias, null, ['class' => 'form-control'. ($errors->has('categoria_id') ? ' is-invalid' : '')]) }}
                                        {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a class="btn btn-danger" href="{{ route('usuarios.index') }}"> Regresar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
