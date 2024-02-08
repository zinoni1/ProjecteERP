<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $fillable = [

        'TipoClienteID',
        'Descripcion'

    ];
    use HasFactory;
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class);
    }
}
