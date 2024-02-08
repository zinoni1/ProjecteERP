<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaPropuesta extends Model
{
    use HasFactory;
    protected $fillable = [

        'PropuestaID',
        'ClienteID',
        'FechaCreacion',
        'Estado',
        'Detalles',
        

    ];
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
    public function productes()
    {
        return $this->belongsToMany(Producte::class);
    }
}
