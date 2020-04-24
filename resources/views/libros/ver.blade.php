<form class="form-horizontal">
    <fieldset disabled>
        <div class="form-group row">
            <label for="titulo" class="col-sm-2 col-form-label col-form-label-sm ">Titulo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm " name="titulo" id="titulo" value="{{$libro->titulo}}">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="isbn" class="col-sm-2 col-form-label col-form-label-sm ">Isbn</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="isbn" id="isbn" value="{{$libro->isbn}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="autor" class="col-sm-2 col-form-label col-form-label-sm ">Autor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="autor" id="autor" value="{{$libro->autor}}" >
            </div>
        </div>
        <div class="form-group row">
            <label for="cantidad" class="col-sm-2 col-form-label col-form-label-sm ">Cantidad</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="cantidad" id="cantidad" value="{{$libro->cantidad}}" >
            </div>
        </div>
        <div class="form-group row">
            <label for="editorial" class="col-sm-2 col-form-label col-form-label-sm">Editorial</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="editorial" id="editorial" value="{{$libro->editorial}}" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-sm" for="imagen" >Caratula</label>
            <div class="col-sm-10">
                <div><img src="{{isset($libro->foto) ?url(Storage::url("imagenes/caratulas/$libro->foto")) : url(Storage::url("imagenes/caratulas/default.png"))}}" class="img-thumbnail" alt="Caratula del libro"></div>
            </div>
        </div>
    </fieldset>
</form>