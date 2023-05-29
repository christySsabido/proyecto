<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = ['nota_id', 'contenido', 'user_id'];

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
