@extends("themes/$theme/layout")
@section('title','Libros Prestados')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title">Lista de Libros Prestados</h3>
                    <a  href="{{route('libroUsuario.crear')}}" class="btn-accion-tabla float-right"><i class="fas fa-plus-circle"></i> Nuevo</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-hover" id="tabla-data">
                        <thead>
                        <th>Titulo</th>
                        <th>Prestado por</th>
                        <th>Prestado a</th>
                        <th>Fecha de prestamo</th>
                        <th>Fecha de devolucion</th>
                        <th class="width70"></th>
                        </thead>
                        <tbody>
                            @foreach($librosUsuarios as $libroUsuario)
                                <tr>
                                    <td>{{$libroUsuario->libro->titulo}}</td>
                                    <td>{{$libroUsuario->usuario->nombre}}</td>
                                    <td>{{$libroUsuario->prestado_a}}</td>
                                    <td>{{$libroUsuario->fecha_prestamo}}</td>
                                    <td class="fecha-devolucion">
                                        {{$libroUsuario->fecha_devolucion ?? 'Prestado'}}
                                    </td>
                                    <td>
                                        @if(!$libroUsuario->fecha_devolucion)
                                            <a href="{{route('libroUsuario.devolver', $libroUsuario->id)}}" class="libro-devolucion btn-accion-tabla" data-toggle="tooltip" data-placement="top" title="Devolver este libro">
                                                <i class="fa fa-fw fa-reply-all"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('scripts')
    <script src="{{asset('assets/pages/librosUsuarios/js/index.js')}}"></script>
@endsection
