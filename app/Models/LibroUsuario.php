<?php

namespace App\models;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Model;

class LibroUsuario extends Model
{
    protected  $table = 'libro_usuario';
    protected $fillable = [
        'usuario_id', 'libro_id', 'fecha_prestamo', 'prestado_a', 'fecha_devolucion'
    ];
    /**
     * relacion el perstamo tiene un suario
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    /**
     * relacion el prestamo tienen un libro
     */

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
