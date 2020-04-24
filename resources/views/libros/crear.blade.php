@extends("themes/$theme/layout")
@section('title','Crear Libro')
@section('content')
<div class="row">
    <div class="col-12 col-sm-10 col-lg-8 mx-auto">
        <div class="card card-info">
            <div class="card-header bg-light">
                <h3 class="card-title">Nuevo Libro</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{route('libro.guardar')}}" id="form-libro" autocomplete="off" enctype="multipart/form-data" >
                @include('libros.form',['btn_text'=>'Guardar'])
            </form>
        </div>
    </div> 
</div>
@endsection
@section('scripts')
    <script src="{{asset("assets/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/libros/js/crear.js")}}" type="text/javascript"></script>
    <script  type="text/javascript">
        $("#foto").fileinput({
        language: "es",
        allowedFileExtensions: ["jpg", "jpeg", "png"],
        maxFileSize: 1000,
        showUpload: false,
        showClose: true,
        //required: true,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fas",
    });
    </script>
@endsection