@extends("themes/$theme/layout")
@section('title','Listar Libros')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title">Lista de Libros</h3>
                    <a  href="{{route('libro.crear')}}" class="btn-accion-tabla float-right"><i class="fas fa-plus-circle"></i> Nuevo</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-hover" id="tabla-data">
                        <thead>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Cantidad</th>
                        <th class="width80"></th>
                        </thead>
                        <tbody>
                            @foreach($libros as $libro)
                                <tr>
                                    <td>{{$libro->titulo}}</td>
                                    <td>{{$libro->autor}}</td>
                                    <td>{{$libro->cantidad}}</td>
                                    <td>
                                        <a href="{{route('libro.ver',['libro'=>$libro])}}" class="btn-accion-tabla ver-libro" data-toggle="tooltip" data-placement="top" title="Ver este registro"><i class="far fa-eye"></i></a>
                                        <a href="{{route('libro.modificar',['libro'=>$libro])}}" class="btn-accion-tabla" data-toggle="tooltip" data-placement="top" title="Editar este registro"><i class="fas fa-pencil-alt"></i></a>
                                        <form  method="post" action="{{route('libro.eliminar',['libro'=>$libro])}}" class="d-inline form-eliminar">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn-accion-tabla" data-toggle="tooltip" data-placement="top" title="Eliminar este registro">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
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
    <div class="modal fade" id="modal-ver-libro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Libro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>  
@endsection
@section('scripts')
    <script src="{{asset('assets/pages/libros/js/index.js')}}"></script>
@endsection
