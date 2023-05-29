<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = ['autor', 'titulo', 'historia', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
