<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class TipoCliente extends Model
{
    protected $fillable = [


        'Descripcion'

    ];
    use HasFactory;
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

}
