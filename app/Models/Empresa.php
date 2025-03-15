<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $fillable = [
        'ruc', 'nombre', 'direccion', 'telefono1', 'telefono2',
        'email', 'web', 'descripcion', 'banner', 'logotipo',
        'pais_id', 'departamento_id', 'empresa_tipo_id',
    ];    

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function tipo()
    {
        return $this->belongsTo(EmpresaTipo::class, 'empresa_tipo_id');
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }
}
