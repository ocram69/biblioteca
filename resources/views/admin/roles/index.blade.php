@extends("themes/$theme/layout")
@section('title','Listar Roles')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title">Lista de Roles</h3>
                    <a  href="{{route('rol.crear')}}" class="btn-accion-tabla float-right"><i class="fas fa-plus-circle"></i> Nuevo</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-hover" id="tabla-data">
                        <thead>
                        <th>Nombre</th>
                        <th class="width70"></th>
                        </thead>
                        <tbody>
                            @foreach($roles as $rol)
                                <tr>
                                    <td>{{$rol->nombre}}</td>
                                    <td>
                                        <a href="{{route('rol.modificar',['rol'=>$rol])}}" class="btn-accion-tabla" data-toggle="tooltip" data-placement="top" title="Editar este registro"><i class="fas fa-pencil-alt"></i></a>
                                        <form  method="post" action="{{route('rol.eliminar',['rol'=>$rol])}}" class="d-inline form-eliminar">
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
    <script src="{{asset('assets/pages/js/index.js')}}"></script>
@endsection
