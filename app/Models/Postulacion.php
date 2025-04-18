<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Pivot
{
    protected $table = 'postulaciones';

    protected $fillable = [
        'user_id',
        'oferta_id',
        'dni',
        'telefono',
        'nombres',
        'apellidos',
        'cv',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class);
    }
}
