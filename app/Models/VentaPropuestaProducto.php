<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaPropuestaProducto extends Model
{
    use HasFactory;
    public function ventaPropuestas()
    {
        return $this->belongsToMany(VentaPropuesta::class, 'venta_propuesta_productos', 'producto_id', 'venta_propuesta_id');
    }

    // Definir relación con el producto
    public function producte()
    {
        return $this->belongsTo(Producte::class);
    }
}
