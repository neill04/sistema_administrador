<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaAtributo extends Model
{
    use HasFactory;

    protected $table = 'ofertas_atributos';

    protected $fillable = [
        'oferta_id',
        'tipo',
        'valor',
    ];

    public function oferta()
    {
        return $this->belongsTo(Oferta::class);
    }
}
