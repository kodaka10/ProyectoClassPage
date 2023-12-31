<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'materia',
        'seccion',
        'color',
        'codigo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
