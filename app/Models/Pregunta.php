<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable=[
        'textopregunta',
        'area_id',
        'escala_id',
        'informe_id',
    ];


    public function nombrearea()
    {
        return $this->hasOne(Areas::class,'id','area_id');
    }

    public function nombreescala()
    {
        return $this->hasOne(Escala::class,'id','escala_id');
    }

}
