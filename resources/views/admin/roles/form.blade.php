<div class="card-body">
    @csrf
    <div class="form-agroup row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <input type="text" class="form-control @error('nombre') ? is-invalid @enderror " name="nombre" value="{{old('nombre',$rol->nombre)}}">
        @error('nombre')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

</div>
<div class="card-footer">
    <button type="submit" class="btn btn-default"><i class="fas fa-upload"></i> {{$btn_text}}</button>
</div>
