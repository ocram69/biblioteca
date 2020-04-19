@if ($item['submenu']==[])
    <li class="dd-item dd3-item" data-id="{{$item['id']}}">
        <div class="dd-handle dd3-handle"> </div>
        <div class="dd3-content">
            <i  class="{{isset($item["icono"]) ? $item["icono"] : ""}}" ></i>
            {{$item["nombre"]}}
            <form  method="post" action="{{route('menu.eliminar', ['menu' => $item["id"]])}}" class=" float-right form-eliminar">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla" data-toggle="tooltip" data-placement="top" title="Eliminar este registro">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
            <a href="{{route('menu.modificar', ['menu' => $item["id"]])}}" class="float-right" data-toggle="tooltip" data-placement="top" title="Modificar este menú"><i class="fas fa-pencil-alt "></i></a>
            
        </div>
    </li>
@else
    <li class="dd-item dd3-item" data-id="{{$item['id']}}">
        <div class="dd-handle dd3-handle"> </div>
        <div class="dd3-content">
            <i  class="{{isset($item["icono"]) ? $item["icono"] : ""}}" ></i>
            {{$item["nombre"]}}
            <form  method="post" action="{{route('menu.eliminar', ['menu' => $item["id"]])}}" class=" float-right form-eliminar">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla" data-toggle="tooltip" data-placement="top" title="Eliminar este registro">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
            <a href="{{route('menu.modificar', ['menu' => $item["id"]])}}" class="float-right" data-toggle="tooltip" data-placement="top" title="Modificar este menú"><i class="fas fa-pencil-alt "></i></a>

        </div>
        <ol class="dd-list">
            @foreach($item['submenu'] as $itemSubmenu)
                @include('admin.menus.menu_item',['item'=>$itemSubmenu])
            @endforeach
        </ol>
    </li>

@endif
