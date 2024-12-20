<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';

    protected $primaryKey = 'id_carrito';

    protected $fillable = ['id_cliente'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function productos()
    {
        return $this->hasMany(CarritoProducto::class, 'id_carrito', 'id_carrito');
    }
}
