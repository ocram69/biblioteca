@extends("themes/$theme/layout")
@section('title','Menu y roles')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Permiso - Rol</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-bordered table-hover" id="tabla-data">
                        <thead>
                            <tr>
                                <th>Permisos</th>
                                @foreach ($roles as $id => $nombre)
                                    <th class="text-center">{{$nombre}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                @if ($menu["menu_id"] != 0)
                                    @break
                                @endif
                                @include('admin.menus-roles.menu_roles',['menu'=>$menu,'padin'=>0])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset("assets/pages/admin/menus-roles/index.js")}}" type="text/javascript"></script>
@endsection