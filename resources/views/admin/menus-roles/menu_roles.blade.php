@if ($menu['submenu']==[])
    <tr>
        <td class="{{$menu['menu_id']==0 ? 'font-weight-bold' :''}}"><i class="{{$menu['menu_id']==0 ? 'fa fa-arrows-alt':'pl-'.$padin.' fa fa-arrow-right'}}"></i> {{$menu['nombre']}}</td>
        @foreach ($roles as $id=>$nombre)
            <td class='text-center'> 
                <input 
                    type="checkbox" 
                    class="menu_rol"
                    name="menu_rol[]"
                    value={{$id}}
                    data-menuid={{$menu[ "id"]}}
                    {{in_array($id, array_column($menusRoles[$menu["id"]], "id"))? "checked" : ""}}
                >
            </td>
        @endforeach
    </tr>
@else
<tr>
    <td class="{{$menu['menu_id']==0 ? 'font-weight-bold' :''}}"><i class="{{$menu['menu_id']==0 ? 'fa fa-arrows-alt':'pl-'.$padin.' fa fa-arrow-right'}}"></i> {{$menu['nombre']}}</td>
    @foreach ($roles as $id=>$nombre)
        <td class="text-center"> 
            <input 
                type="checkbox" 
                class="menu_rol"
                name="menu_rol[]"
                value={{$id}}
                data-menuid={{$menu[ "id"]}}
                {{in_array($id, array_column($menusRoles[$menu["id"]], "id"))? "checked" : ""}}
            >
        </td>
    @endforeach
    @foreach ($menu['submenu'] as $submenu)
        @include('admin.menus-roles.menu_roles',['menu'=>$submenu,'roles'=>$roles,'menusRoles','padin'=>$padin+1])
    @endforeach
</tr>
@endif