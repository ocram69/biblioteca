<div class="card-body">
    @csrf
    <div class="form-agroup row">
        <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
        <input type="text" class="form-control @error('nombre') ? is-invalid @enderror " name="titulo" id="titulo" value="{{old('titulo',$libro->titulo)}}">
        @error('titulo')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-agroup row">
        <label for="isbn" class="col-sm-2 col-form-label">Isbn</label>
        <input type="text" class="form-control @error('isbn') ? is-invalid @enderror " name="isbn" id="isbn" value="{{old('isbn'),$libro->isbn}}" readonly>
        @error('isbn')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-agroup row">
        <label for="autor" class="col-sm-2 col-form-label">Autor</label>
        <input type="text" class="form-control @error('autor') ? is-invalid @enderror " name="autor" id="autor" value="{{old('autor'),$libro->autor}}" readonly>
        @error('autor')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-agroup row">
        <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
        <input type="text" class="form-control @error('cantidad') ? is-invalid @enderror " name="cantidad" id="cantidad" value="{{old('cantidad'),$libro->cantidad}}" readonly>
        @error('cantidad')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-agroup row">
        <label for="editorial" class="col-sm-2 col-form-label">Editorial</label>
        <input type="text" class="form-control @error('editorial') ? is-invalid @enderror " name="editorial" id="editorial" value="{{old('editorial'),$libro->editorial}}" readonly>
        @error('editorial')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-agroup row">
        <label class="col-sm-2 col-form-label" for="imagen" >Imagen</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="imagen" name="imagen">
            <label class="custom-file-label" for="imagen" data-browse="Buscar">Seleccionar archivo</label>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-default"><i class="fas fa-upload"></i> {{$btn_text}}</button>
</div>

@section('scripts')
<script src="{{asset("assets/adminLte/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}" type="text/javascript"></script>
<script>
    bsCustomFileInput.init()
    
</script>
@endsection