<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_empleado';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'cargo'
    ];

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_empleado');
    }
}

