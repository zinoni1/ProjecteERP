<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $fillable = [
        'PrecioUnitario',

    ];
    use HasFactory;
    public function ventaPropuestas()
    {
        return $this->hasMany(VentaPropuesta::class, 'id', 'VentaPropuestaID' );
    }
    public function productes()
    {
        return $this->belongsToMany(Producte::class);
    }
}

