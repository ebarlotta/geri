<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombrecategoria',
        'empresa_id',
    ];
    public function empresa()
    {
        return $this->hasOne(Empresa::class,'id','empresa_id');
        // return $this->hasMany('App\Models\Unidad');
    }

}
