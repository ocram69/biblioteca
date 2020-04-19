@extends("themes.$theme.layout")
@section('title','Listar menu')
@section('styles')
    <!-- jquery-nestable -->
    <link rel="stylesheet" href="{{asset("assets/jquery-nestable/jquery-nestable.css")}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title">Lista de Menus</h3>
                    <a  href="{{route('menu.crear')}}" class="btn-accion-tabla float-right"><i class="fas fa-plus-circle"></i> Nuevo</a>
                </div>
                <div class="card-body">
                        <div class="dd" id="nestable" >
                            <ol class="dd-list">
                                @foreach($menus as $item)
                                    @if($item['menu_id']!=0)
                                        @break
                                    @else
                                        @include('admin.menus.menu_item',['item'=>$item])
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('scripts')
    <!-- jquery-nestable -->
    <script src="{{asset("assets/jquery-nestable/jquery.nestable.js")}}"></script>
    <!-- index -->
    <script src="{{asset("assets/pages/admin/menus/js/index.js")}}"></script>

@endsection

