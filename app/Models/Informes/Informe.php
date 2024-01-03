<?php

namespace App\Models\Informes;

use App\Models\Areas;
use App\Models\Periodo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombreinforme',
        'periodo_id',
        'area_id',
        'Observaciones',
        'empresa_id',
    ];

    public function periodo()
    {
        return $this->hasOne(Periodo::class,'id','periodo_id');
    }

    public function area()
    {
        return $this->hasOne(Areas::class,'id','area_id');
    }
}
