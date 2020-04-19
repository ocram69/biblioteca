@extends("themes.$theme.layout")
@section('title','Crear menu')
@section('content')
    <!-- /.card -->
    <!-- Horizontal Form -->
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title">Modificar Menu</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{route('menu.actualizar',['menu'=>$menu])}}" id="form-general" autocomplete="off">
                    @method('put')
                    @include('admin.menus.form',['btn_text'=>'Actualizar'])
                </form>
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection
@section('scripts')
<script src="{{asset("assets/pages/admin/menus/js/crear.js")}}"></script>
@endsection
