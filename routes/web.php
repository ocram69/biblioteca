<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //in_array('Administrador', array_column(session()->get('roles'), "nombre"));
    //dd(in_array('Administrador', array_column(session()->get('roles'), "nombre")));
    //dd(session()->all());
    return view('inicio');
})->name('inicio');
Route::get('seguridad/login',       'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login',      'Seguridad\LoginController@login')->name('seguridad.login');
Route::get('seguridad/logout',      'Seguridad\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'administrador']],  function () {

    /* USUARIOS*/
    Route::get('/usuarios',               'UsuarioController@index')->name('usuario.index');
    Route::get('/usuarios/crear',         'UsuarioController@crear')->name('usuario.crear');
    Route::post('/usuarios',              'UsuarioController@guardar')->name('usuario.guardar');
    Route::get('/usuarios/{usuario}',     'UsuarioController@ver')->where('usuario', '[0-9]+')->name('usuario.ver');
    Route::get('/usuarios/{usuario}/editar', 'UsuarioController@modificar')->where('usuario', '[0-9]+')->name('usuario.modificar');
    Route::put('/usuarios/{usuario}',     'UsuarioController@actualizar')->where('usuario', '[0-9]+')->name('usuario.actualizar');
    Route::delete('/menus/{usuario}',     'UsuarioController@eliminar')->where('usuario', '[0-9]+')->name('usuario.eliminar');
    /*RUTAS DEL MENUS*/
    Route::get('/menus',                  'MenuController@index')->name('menu.index');
    Route::get('/menus/crear',            'MenuController@crear')->name('menu.crear');
    Route::post('/menus',                 'MenuController@guardar')->name('menu.guardar');
    Route::get('/menus/{menu}/editar',    'MenuController@modificar')->where('menu', '[0-9]+')->name('menu.modificar');
    Route::put('/menus/{menu}',           'MenuController@actualizar')->where('menu', '[0-9]+')->name('menu.actualizar');
    Route::delete('/menus/{menu}',        'MenuController@eliminar')->where('menu', '[0-9]+')->name('menu.eliminar');
    Route::match(['get', 'post'],         '/menus/guardar-orden', 'MenuController@guardarOrden')->name('menu.guardarOrden');
    /*RUTAS DEL ROLES*/
    Route::get('/roles',                  'RolController@index')->name('rol.index');
    Route::get('/roles/crear',            'RolController@crear')->name('rol.crear');
    Route::post('/roles',                 'RolController@guardar')->name('rol.guardar');
    Route::get('/roles/{rol}/editar',     'RolController@modificar')->where('rol', '[0-9]+')->name('rol.modificar');
    Route::put('/roles/{rol}',            'RolController@actualizar')->where('rol', '[0-9]+')->name('rol.actualizar');
    Route::delete('/roles/{rol}',         'RolController@eliminar')->where('rol', '[0-9]+')->name('rol.eliminar');
    /*MENU ROL*/
    Route::get('/menus-roles',            'MenuRolController@index')->name('menu-rol.index');
    Route::post('/menus-roles',           'MenuRolController@gestionar')->name('menu-rol.index');
    /* PERMISOS*/
    Route::get('/permisos',               'PermisoController@index')->name('permiso.index');
    Route::get('/permisos/crear',         'PermisoController@crear')->name('permiso.crear');
    Route::post('/permisos',              'PermisoController@guardar')->name('permiso.guardar');
    Route::get('/permisos/{permiso}/editar', 'PermisoController@modificar')->where('permiso', '[0-9]+')->name('permiso.modificar');
    Route::put('/permisos/{permiso}',     'PermisoController@actualizar')->where('permiso', '[0-9]+')->name('permiso.actualizar');
    Route::delete('/permisos/{permiso}',  'PermisoController@eliminar')->where('permiso', '[0-9]+')->name('permiso.eliminar');
    /**
     * PERMISO-ROL
     */
    Route::get('/permisos-roles',         'PermisoRolController@index')->name('permisoRol.index');
    Route::post('/permisos-roles',        'PermisoRolController@gestionar')->name('permiso-rol.index');
});
Route::middleware(['auth'])->group(function () {
    /*HOME*/
    Route::get('/admin',                  'Admin\AdminController@index')->name('home');
    /*LIBRO*/
    Route::get('/libros',                 'LibroController@index')->name('libro.index');
    Route::get('/libros/crear',           'LibroController@crear')->name('libro.crear');
    Route::post('/libros',                'LibroController@guardar')->name('libro.guardar');
    Route::post('/libros/{libro}',        'LibroController@ver')->where('libro', '[0-9]+')->name('libro.ver');
    Route::get('/libros/{libro}/editar',  'LibroController@modificar')->where('libro', '[0-9]+')->name('libro.modificar');
    Route::put('/libros/{libro}',         'LibroController@actualizar')->where('libro', '[0-9]+')->name('libro.actualizar');
    Route::delete('/libros/{libro}',      'LibroController@eliminar')->where('libro', '[0-9]+')->name('libro.eliminar');
    Route::delete('/libros_imagen/{libro}', 'LibroController@eliminar_imagen')->where('libro', '[0-9]+')->name('libro.eliminar_imagen');
    /*PRESTAMO */
    Route::get('/prestamos',                        'LibroUsuarioController@index')->name('libroUsuario.index');
    Route::get('/prestamos/crear',                  'LibroUsuarioController@crear')->name('libroUsuario.crear');
    Route::post('/prestamos',                       'LibroUsuarioController@guardar')->name('libroUsuario.guardar');
    // Route::post('/prestamos/{libroUsuario}',        'LibroUsuarioController@ver')->where('libroUsuario', '[0-9]+')->name('libroUsuario.ver');
    // Route::get('/prestamos/{libroUsuario}/editar',  'LibroUsuarioController@modificar')->where('librousuario', '[0-9]+')->name('libroUsuario.modificar');
    Route::put('/prestamos/{libroUsuario}',         'LibroUsuarioController@devolver')->where('libroUsuario', '[0-9]+')->name('libroUsuario.devolver');
    //Route::put('/prestamos/{libroUsuario}',         'LibroUsuarioController@actualizar')->where('libroUsuario', '[0-9]+')->name('libroUsuario.actualizar');
    //Route::delete('/prestamos/{libroUsuario}',      'LibroUsuarioController@eliminar')->where('libroUsuario', '[0-9]+')->name('libroUsuario.eliminar');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
