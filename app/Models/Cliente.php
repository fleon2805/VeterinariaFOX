<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre', 'apellidos', 'dni', 'telefono', 'direccion'
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'id_cliente', 'id_cliente');
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_cliente', 'id_cliente');
    }

    public function carrito()
    {
        return $this->hasOne(Carrito::class, 'id_cliente', 'id_cliente');
    }
}
