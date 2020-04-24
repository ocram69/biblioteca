@extends("themes/$theme/layout")
@section('title','Crear rol')
@section('styles')
<link href="{{asset("assets/adminLte/plugins/select2/css/select2.min.css")}}" rel="stylesheet">
<link href="{{asset("assets/adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-sm-10 col-lg-8 mx-auto">
        <div class="card card-info">
            <div class="card-header bg-light">
                <h3 class="card-title">Nuevo Usurio</h3>
            </div>
            <form  method="post" action="{{route('usuario.guardar')}}" id="form-usuario" autocomplete="off">
                @include('admin.usuarios.form',['btn_text'=>'Guardar'])
            </form>
        </div>
    </div> 
</div>
@endsection
@section('scripts')
<script src="{{asset("assets/adminLte/plugins/select2/js/select2.min.js")}}"></script>
<script src="{{asset("assets/pages/admin/usuarios/js/crear.js")}}"></script>
    
@endsection