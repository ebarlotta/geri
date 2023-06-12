<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ingrediente;

class Menuingrediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'ingrediente_id',
        'cantidad',
    ];

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class);
    }
}
