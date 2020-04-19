@if ($menu['submenu']==[])
    <li class="nav-item">
        <a href="{{url($menu['url'])}}" class="nav-link {{getMenuActivo($menu["url"])}}">
            <i class="nav-icon {{$menu['icono']}}"></i>
            <p>{{$menu['nombre']}}</p>
        </a>
    </li>
@else
    <li class="nav-item has-treeview">
        <a href="{{url($menu['url'])}}" class="nav-link">
            <i class="nav-icon {{$menu['icono']}}"></i>
            <p>{{$menu['nombre']}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @foreach ($menu['submenu'] as $item)
                @include('themes.adminLte.menu-item',['menu'=>$item])
            @endforeach
        </ul>
    </li>
@endif
