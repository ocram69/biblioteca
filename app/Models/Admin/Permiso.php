<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Permiso extends Model
{
    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
    protected $table = "permisos";
    /*asignacion masiva*/
    protected $fillable = ['nombre'];
    /*definimos los campos que no se asignen masivamente viene por default activado, para dehabiltar la proteccion [] */
    //protected $guarded = ['id'];


    /**
     * Relacion de muchos roles
     */
    public function  roles()
    {
        return $this->belongsToMany(Rol::class, 'permiso_rol')->withTimestamps();
    }
}
