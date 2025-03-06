<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    
    protected $table = 'empresas'; // Asegúrate de que coincida con la tabla en PostgreSQL
    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'telefono',
        'correo',
        'sitio_web'
    ];// Ajusta según las columnas de tu tabla
}
