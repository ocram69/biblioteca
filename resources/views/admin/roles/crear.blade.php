@extends("themes/$theme/layout")
@section('title','Crear rol')
@section('content')
<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <div class="card card-info">
            <div class="card-header bg-light">
                <h3 class="card-title">Nuevo rol</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{route('rol.guardar')}}">
                @include('admin.roles.form',['btn_text'=>'Guardar'])
            </form>
        </div>
    </div> 
</div>
@endsection
