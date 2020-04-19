@extends("themes/$theme/layout")
@section('title','Editar permiso')
@section('content')
<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <div class="card card-info">
            <div class="card-header bg-light">
                <h3 class="card-title">Modificar Permiso</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{route('permiso.actualizar',['permiso'=>$permiso])}}" autocomplete="off">
                @method('put')
                @include('admin.permisos.form',['btn_text'=>'Actualizar'])
            </form>
        </div>
    </div> 
</div>
@endsection
