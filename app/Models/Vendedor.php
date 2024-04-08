<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $fillable = [

        'NombreVendedor',
        'Direccion',
        'Telefono',
        

    ];
    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

 
}
