@section('styles')
    <link href="{{asset("assets/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet">
@endsection
<div class="card-body">
    @csrf
    <div class="form-group row">
        <label for="titulo" class="col-sm-2 col-form-label col-form-label-sm requerido">Titulo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm @error('titulo')  is-invalid @enderror " name="titulo" id="titulo" value="{{old('titulo',$libro->titulo)}}" maxlength="100">
            @error('titulo')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label for="isbn" class="col-sm-2 col-form-label col-form-label-sm requerido">Isbn</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm @error('isbn') is-invalid @enderror " name="isbn" id="isbn" value="{{old('isbn',$libro->isbn)}}" maxlength="30">
            @error('isbn')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="autor" class="col-sm-2 col-form-label col-form-label-sm requerido">Autor</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm @error('autor') is-invalid @enderror"  name="autor" id="autor" value="{{old('autor',$libro->autor)}}" maxlength="100">
            @error('autor')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="cantidad" class="col-sm-2 col-form-label col-form-label-sm requerido">Cantidad</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm @error('cantidad') is-invalid @enderror " name="cantidad" id="cantidad" value="{{old('cantidad',$libro->cantidad)}}" maxlength="2" >
            @error('cantidad')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="editorial" class="col-sm-2 col-form-label col-form-label-sm">Editorial</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm @error('editorial') is-invalid @enderror " name="editorial" id="editorial" value="{{old('editorial',$libro->editorial)}}" maxlength="50">
            @error('editorial')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm" for="imagen" >Imagen</label>
        <div class="col-sm-10">
            <div class="custom-file">
                <input type="file" class="custom-file-input"  id="foto" name="foto"   accept="image/*">
                @error('foto')
                    <div class="invalid-imagen">{{$message}}</div>
                    
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-default"><i class="fas fa-upload"></i> {{$btn_text}}</button>
</div>

