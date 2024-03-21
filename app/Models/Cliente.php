<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VentaPropuesta;
use App\Models\TipoCliente;

class Cliente extends Model
{

    use HasFactory;

    protected $fillable = [

        'Nombre',
        'Apellido',
        'Email',
        'Telefono',
        'Direccion',
        'Poblacion',

    ];
    public function ventaPropuestas()
    {
        return $this->belongsToMany(VentaPropuesta::class);
    }
    public function tipoClientes()
    {
        return $this->belongsToMany(TipoCliente::class);
    }


}
