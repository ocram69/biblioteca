@extends("themes/$theme/layout")
@section('title','Listar Usuarios')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title">Lista de Usuarios</h3>
                    <a  href="{{route('usuario.crear')}}" class="btn-accion-tabla float-right"><i class="fas fa-plus-circle"></i> Nuevo</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-hover" id="tabla-data">
                        <thead>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th class="width70"></th>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->nombre}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>
                                        @foreach ($usuario->roles as $roles)
                                            {{$loop->last ?$roles->nombre: $roles->nombre.' ,'}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('usuario.modificar',['usuario'=>$usuario])}}" class="btn-accion-tabla" data-toggle="tooltip" data-placement="top" title="Editar este registro"><i class="fas fa-pencil-alt"></i></a>
                                        <form  method="post" action="{{route('usuario.eliminar',['usuario'=>$usuario])}}" class="d-inline form-eliminar">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn-accion-tabla" data-toggle="tooltip" data-placement="top" title="Eliminar este registro">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>    
@endsection
@section('scripts')
    
@endsection
