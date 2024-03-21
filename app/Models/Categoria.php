<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [

        'Categoria'
    ];
    public function productes()
    {
        return $this->hasMany(Producte::class, 'categoria_id');
    }
    
}
