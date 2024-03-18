<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VentaPropuesta;

class Producte extends Model
{
    protected $fillable = [

        'Nombre',
        'Descripcion',
        'Precio',
        'Stock',
        'FechaEntrada',
        'Imagen',

    ];
    use HasFactory;
    public function ventaPropuestas()
    {
        return $this->belongsToMany(VentaPropuesta::class, 'venta_propuesta_productes', 'producte_id', 'venta_propuesta_id');
    }


}
