<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "permisos";
    /*asignacion masiva*/
    protected $fillable = ['nombre', 'slug'];
    /*definimos los campos que no se asignen masivamente viene por default activado, para dehabiltar la proteccion [] */
    //protected $guarded = ['id'];

    /**
     * Relacion de muchos roles
     */
    public function  roles()
    {
        return $this->belongsToMany(Rol::class, 'permiso_rol');
    }
}
