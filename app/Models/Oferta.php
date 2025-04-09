<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'ofertas';

    protected $fillable = [
        'empresa_id',
        'titulo_oferta',
        'informacion_adicional',
        'url',
        'cargo',
        'area',
        'numero_vacantes',
        'celular_contacto',
        'correo_contacto',
        'fecha_vencimiento',
        'tipo_oferta',
        'salario',
        'jornada_laboral',
        'disponibilidad',
        'ubicacion_oferta',
        'dirigido',
        'carrera',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function atributos()
    {
        return $this->hasMany(OfertaAtributo::class);
    }

    public function postulantes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'postulaciones', 'oferta_id', 'user_id')
                    ->withTimestamps();
    }
}
