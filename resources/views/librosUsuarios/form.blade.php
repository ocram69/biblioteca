<div class="card-body">
    @csrf
    <div class="form-group row">
        <label for="libro-id" class="col-sm-2 col-form-label col-form-label-sm requerido">Libro</label>
        <div class="col-sm-10">
            <select class="form-control form-control-sm @error('libro_id') is-invalid @enderror" name="libro_id" id="libro_id" >
                <option value="">Seleccione el libro</option>
                @foreach ($libros as $id=>$titulo)
                    <option value="{{$id}}"
                    {{ old('libro_id')<>null ? (old('libro_id')==$id ? 'selected' : '') : ''}}
                    >{{$titulo}}</option>
                @endforeach iss
            </select>
            @error('libro_id')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>    
    <div class="form-group row">
        <label for="prestado_a" class="col-sm-2 col-form-label col-form-label-sm requerido">Prestado a</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm @error('prestado_a') is-invalid @enderror"  name="prestado_a" id="prestado_a" value="{{old('prestado_a')}}" maxlength="100">
            @error('prestado_a')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="fecha_prestamo" class="col-sm-2 col-form-label col-form-label-sm requerido">Fecha de prestamo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm @error('fecha_prestamo') is-invalid @enderror " name="fecha_prestamo" id="fecha_prestamo" value="{{old('cantidad',date('Y-m-d'))}}" maxlength="10" >
            @error('fecha_prestamo')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-default"><i class="fas fa-upload"></i> {{$btn_text}}</button>
</div>

