<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInClase extends Model
{
    use HasFactory;

    protected $table = 'usersclases';
    protected $fillable = [
        'user_id',
        'clase_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }


}
