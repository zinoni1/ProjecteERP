<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [

        'FechaCompra',
        'Cantidad',
        'producte_id',
        'usuari_id',
        'vendedor_id'

    ];
    use HasFactory;
    public function producte()
    {
        return $this->belongsToMany(Producte::class, 'producte_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'usuari_id');
    }
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id');
    }
}
