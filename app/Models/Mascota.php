<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mascota';

    protected $fillable = [
        'nombre',
        'meses',
        'años',
        'peso',
        'id_tipo_mascota',
        'id_genero',
        'id_raza',
        'id_etapa',
        'id_cliente'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function tipoMascota()
    {
        return $this->belongsTo(TipoMascota::class, 'id_tipo_mascota');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero');
    }

    public function raza()
    {
        return $this->belongsTo(Raza::class, 'id_raza');
    }

    public function etapa()
    {
        return $this->belongsTo(Etapa::class, 'id_etapa');
    }
}
