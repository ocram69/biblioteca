@extends("themes/$theme/layout")
@section('title','Permisos y roles')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Menús - Rol</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-bordered table-hover" id="tabla-data">
                        <thead>
                            <tr>
                                <th>Menú</th>
                                @foreach ($roles as $id => $nombre)
                                    <th class="text-center">{{$nombre}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permisos as $permiso)
                            <tr>
                                <td class="font-weight-bold">{{$permiso['nombre']}}</td>
                                @foreach ($roles as $id=>$nombre)
                                    <td class='text-center'> 
                                        <input 
                                            type="checkbox" 
                                            class="permiso_rol"
                                            name="menu_rol[]"
                                            value={{$id}}
                                            data-permisoid={{$permiso[ "id"]}}
                                            {{in_array($id, array_column($permisosRoles[$permiso["id"]], "id"))? "checked" : ""}}
                                        >
                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset("assets/pages/admin/permisos-roles/js/index.js")}}" type="text/javascript"></script>
@endsection