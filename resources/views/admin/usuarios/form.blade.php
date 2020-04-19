<div class="card-body">
    @csrf
    <div class="form-group row">
        <label for="nombre" class="col-sm-2 col-form-label col-form-label-sm requerido">Nombre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm @error('nombre')is-invalid @enderror"  name="nombre" id="nombre" value="{{old('nombre',$usuario->nombre)}}"  maxlength="50">
            @error('nombre')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label col-form-label-sm requerido">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-sm @error('email')is-invalid @enderror" name="email" id="email" value="{{old('email',$usuario->email)}}"  maxlength="100">
            @error('email')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="usuario" class="col-sm-2 col-form-label col-form-label-sm requerido">Usuario</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm @error('usuario')is-invalid @enderror" name="usuario" id="usuario" value="{{old('usuario',$usuario->usuario)}}"  maxlength="50">
            @error('usuario')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label col-form-label-sm {{isset($usuario->password)?'':'requerido'}}">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control form-control-sm @error('password')is-invalid @enderror" name="password" id="password"  maxlength="100">
            @error('password')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="confirmarPassword" class="col-sm-2 col-form-label col-form-label-sm {{isset($usuario->password)?'':'requerido'}}">Confirmar</label>
        <div class="col-sm-10">
            <input type="password" class="form-control form-control-sm @error('confirmarPassword')is-invalid @enderror" name="confirmarPassword" id="confirmarPassword">
            @error('confirmarPassword')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="rol-id" class="col-sm-2 col-form-label col-form-label-sm requerido">Rol</label>
        <div class="col-sm-10">
            <select class="form-control form-control-sm @error('rol')is-invalid @enderror" name="rol[]" id="rol_id" multiple="multiple">
                @foreach ($roles as $id=>$nombre)
                    <option value="{{$id}}"
                    {{is_array(old('rol')) ? (in_array($id, old('rol')) ? 'selected' : '')  : (in_array($id, array_column($usuario->roles()->get()->toArray(),'id')) ? 'selected' : '') }}
                    >{{$nombre}}</option>
                @endforeach
            </select>
            @error('rol')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

</div>
<div class="card-footer">
    <button type="submit" class="btn btn-default"><i class="fas fa-upload"></i> {{$btn_text}}</button>
</div>
{{-- <p>{{isset($usuario->password)}}</p> --}}
{{-- {{dd(array_column($usuario->roles()->get()->toArray(),'id'))}}</p> --}}