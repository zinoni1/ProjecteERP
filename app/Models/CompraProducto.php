<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    use HasFactory;

    protected $table = 'compra_producte';
    protected $fillable = ['producte_id','compra_id','Cantidad'];

    public function compra()
{
    return $this->belongsTo(Compra::class, 'compra_id');
}


    // Definir relación con el producto
    public function producte()
    {
        return $this->belongsTo(Producte::class);
    }
    public $timestamps = false;

}
