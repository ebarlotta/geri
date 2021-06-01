<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidades extends Model
{
    use HasFactory;

    protected $fillable=[
        'nacionalidadDescripcion',
    ];
}
