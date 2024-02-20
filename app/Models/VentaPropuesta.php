<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Producte;

class VentaPropuesta extends Model
{
    use HasFactory;
    protected $fillable = [


        'FechaCreacion',
        'Estado',
        'Detalles',


    ];
    public function cliente()
{
    return $this->belongsTo(Cliente::class, 'cliente_id');
}

    public function productes()
    {
        return $this->belongsToMany(Producte::class);
    }
}
