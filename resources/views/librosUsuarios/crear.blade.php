@extends("themes/$theme/layout")
@section('title','Prestar Libro')
@section('content')
<div class="row">
    <div class="col-12 col-sm-10 col-lg-8 mx-auto">
        <div class="card card-info">
            <div class="card-header bg-light">
                <h3 class="card-title">Nuevo Prestamo</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{route('libroUsuario.guardar')}}" id="form-prestamo" autocomplete="off">
                @include('librosUsuarios.form',['btn_text'=>'Guardar'])
            </form>
        </div>
    </div> 
</div>
@endsection
@section('scripts')
    
@endsection