<div class="card-body">
    @csrf
    <div class="form-group row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$menu->nombre)}}" placeholder="Nombre" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="url" class="col-sm-2 col-form-label">Url</label>
        <div class="col-sm-10">
            <input type="text"  name="url" class="form-control @error('url') is-invalid @enderror" value="{{old('url',$menu->url)}}" placeholder="Url" >
            @error('url')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="icono" class="col-sm-2 col-form-label">Icono</label>
        <div class="col-sm-10">
            <input type="text" name="icono" id="icono" class="form-control @error('icono') is-invalid @enderror" value="{{old('icono',$menu->icono)}}" placeholder="Icono">
            @error('icono')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
        <div class="col-sm-10">
            <span><i class="{{old('icono',$menu->icono)}}" id="mostrar-icono"></i></span>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-default"><i class="fas fa-upload"></i> {{$btn_text}}</button>
</div>
<!-- /.card-footer -->

