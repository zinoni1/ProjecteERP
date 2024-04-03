<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaPropuestaProducto extends Model
{
    use HasFactory;

    protected $table = 'producte_venta_propuesta';
    protected $fillable = ['producte_id','venta_propuesta_id','CantidadVendida'];

    public function ventaPropuestas()
{
    return $this->belongsTo(VentaPropuesta::class, 'venta_propuesta_id');
}


    // Definir relación con el producto
    public function producte()
    {
        return $this->belongsTo(Producte::class);
    }
    public $timestamps = false;

}
