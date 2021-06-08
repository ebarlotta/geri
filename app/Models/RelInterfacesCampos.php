<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelInterfacesCampos extends Model
{
    use HasFactory;

    protected $fillable = [
        'interface_id',
        'campo_id',
    ];
}
