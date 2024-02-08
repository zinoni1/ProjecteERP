<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
    protected $fillable = [

        'ProductoServicioID',
        'Nombre',
        'Descripcion',
        'Precio',
        'Stock',
        'FechaEntrada'

    ];
    use HasFactory;
    public function ventaPropuestas()
    {
        return $this->belongsToMany(VentaPropuesta::class);
    }
}
