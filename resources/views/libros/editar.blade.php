@extends("themes/$theme/layout")
@section('title','Modificar Libro')
@section('content')
<div class="row">
    <div class="col-12 col-sm-10 col-lg-8 mx-auto">
        <div class="card card-info">
            <div class="card-header bg-light">
                <h3 class="card-title">Modificar Libro</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{route('libro.actualizar',['libro'=>$libro])}}" id="form-libro" autocomplete="off"  enctype="multipart/form-data" >
                @method('put')
                @include('libros.form',['btn_text'=>'Actualizar'])
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
                //initialCaption: 'Initial-Image.jpg',
                dropZoneEnabled: false,
                theme: "fas",
                msgDeleteError:'Mensaje de Error',
                //url: "http://localhost/avatar/delete",
                initialPreview: [
                    "{{isset($libro->foto) ? url(Storage::url('imagenes/caratulas/'.$libro->foto)) : url(Storage::url('imagenes/caratulas/default.png'))}}"
                ],
                initialPreviewConfig: [
                   {
                        caption: "{{isset($libro->titulo)? $libro->titulo : ''}}", 
                        width: '100px', 
                        url: "{{route('libro.eliminar_imagen',['libro'=>$libro])}}", // server delete action 
                        key: {{$libro->id}}, 
                        extra: function() { 
                            //return {id: $('#id').val()};
                            return {
                                _method:'delete',
                                _token: $("meta[name=csrf-token]").attr("content")
                            };
                        },
                    }
                ]   
            });
    </script>
@endsection