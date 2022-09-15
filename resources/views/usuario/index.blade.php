@extends('layouts.app')

@section('template_title')
    Usuarios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            
       
            <div class="col-sm-12">
                
                <div class="card">
                    
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado Usuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Usuario') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                            <form action="{{ route('usuarios.index') }}" method="GET">
                                <div class="form-row">
                                    <div class="col sm-4">
                                        <input type="text" class="form-control" name = "buscar" value="{{$search}}">
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Cedula</th>
										<th>Email</th>
										<th>Pais</th>
										<th>Direccion</th>
										<th>Celular</th>
										<th>Categoria</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $usuario->nombres }}</td>
											<td>{{ $usuario->apellidos }}</td>
											<td>{{ $usuario->cedula }}</td>
											<td width="50">{{ $usuario->email }}</td>
											<td>{{ $usuario->pais }}</td>
											<td>{{ $usuario->direccion }}</td>
											<td>{{ $usuario->celular }}</td>
											<td>{{ $usuario->nombre }}</td>
                                            
                                            <td width="250">
                                                <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show',$usuario->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$usuario->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $usuarios->links() !!}
            </div>
        </div>
    </div>
@endsection
