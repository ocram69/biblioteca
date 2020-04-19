<div class="card-body">
    @csrf
    <div class="form-agroup row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <input type="text" class="form-control @error('nombre') ? is-invalid @enderror " name="nombre" id="nombre" value="{{old('nombre',$permiso->nombre)}}">
        @error('nombre')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-agroup row">
        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
        <input type="text" class="form-control @error('slug') ? is-invalid @enderror " name="slug" id="slug" value="{{old('slug',$permiso->slug)}}" readonly>
        @error('slug')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>


</div>
<div class="card-footer">
    <button type="submit" class="btn btn-default"><i class="fas fa-upload"></i> {{$btn_text}}</button>
</div>

@section('scripts')
    <script src="{{asset('assets/pages/admin/permisos/js/index.js')}}"></script>
    <script src="{{asset('assets/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            $('#nombre').stringToSlug({
                getPut: "#slug"
            });
        }); 
</script>
@endsection