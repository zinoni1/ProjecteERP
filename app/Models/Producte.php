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
        'ruta',
        'categoria_id', // Asegúrate de que la clave foránea esté en fillable si es necesario


    ];
    use HasFactory;
    public function ventaPropuestas()
    {
        return $this->belongsToMany(VentaPropuesta::class, 'venta_propuesta_productes', 'producte_id', 'venta_propuesta_id');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

}
