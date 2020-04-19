@extends("themes/$theme/layout")
@section('title','Editar rol')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title">Modificar Rol</h3>
                </div>
                <form action="{{route('rol.actualizar',['rol'=>$rol->id])}}" method="post">
                    @method('put')
                    @include('admin.roles.form',['btn_text'=>'Actualizar'])
                </form>
            </div>
        </div>
    </div>
@endsection
