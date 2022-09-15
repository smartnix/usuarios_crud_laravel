@extends('layouts.app')

@section('template_title')
    {{ $usuario->name ?? 'Show Usuario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Deatalle Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $usuario->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $usuario->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $usuario->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $usuario->email }}
                        </div>
                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $usuario->pais }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $usuario->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $usuario->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $usuario->categoria_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
