<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    use HasFactory;

    protected $fillable = [

        'ClienteID',
        'Nombre',
        'Apellido',
        'Email',
        'Telefon',
        'Direccion',
        'TipoClienteID'

    ];
    public function ventaPropuestas()
    {
        return $this->belongsToMany(VentaPropuesta::class);
    }
    public function tipoclientes()
    {
        return $this->hasMany(TipoCliente::class);
    }

}
