<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivosEgresos extends Model
{
    use HasFactory;
    protected $fillable=[
        'motivoegresoDescripcion',
    ];
}
