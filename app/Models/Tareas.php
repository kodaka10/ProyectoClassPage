<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    protected $fillable = ['id_fromClase', 'titulo', 'informacion', 'tipo', 'archivo' , 'nombre_original' ,'fecha_vencimiento', 'creador_anuncio', 'fecha_publicacion'];

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'id_fromClase');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'creador_anuncio');
    }

}

