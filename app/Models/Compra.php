<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [

        'FechaCompra',
        'PrecioTotal',

    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id');
    }
}
