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
        'user_id',
        'vendedor_id',
        'PrecioTotal',

    ];
    use HasFactory;
    public function producte()
    {
        return $this->belongsTo(Producte::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id');
    }
}
