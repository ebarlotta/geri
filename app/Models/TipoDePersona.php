<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDePersona extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipodepersona',
    ];

    public function interfaces()
    {
        return $this->hasMany('App\Models\Interfaces');
    }
}
