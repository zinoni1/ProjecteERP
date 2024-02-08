<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $fillable = [

        'DetalleVentaID',
        'PropuestaID',
        'ProductoServicioID',
        'CantidadVendida',
        'PrecioUnitario',

    ]; 
    use HasFactory;
}
