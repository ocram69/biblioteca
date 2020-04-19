<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Rol;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $fillable = [
        'usuario', 'email', 'nombre', 'password',
    ];
    /**
     * Relacion de un usuario muchos roles
     */
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_usuario');
    }
    /**
     * Almaceno informacion del rol
     */
    public function setSession($rolesPorUsuario)
    {
        Session::put([
            'usuario_id' => $this->id,
            'usuario' => $this->usuario,
            'nombre_usuario' => $this->nombre,
            'rol_id' => array_column($rolesPorUsuario, 'id'),
            'rol_nombre' => array_column($rolesPorUsuario, 'nombre')
        ]);
        //dd(session()->all());
        /*if (count($rolesPorUsuario) == 1) {
            Session::put(
                [
                    'rol_id' => $rolesPorUsuario[0]['id'],
                    'rol_nombre' => $rolesPorUsuario[0]['nombre'],
                ]
            );
        } else {
            Session::put('roles', $rolesPorUsuario);
        }*/
    }
    /**
     * Este mutador será ejecutado automáticamente cuando intentamos establecer el valor del atributo 
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
