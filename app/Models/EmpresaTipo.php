<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaTipo extends Model
{
    use HasFactory;

    protected $table = 'empresa_tipos';
    protected $fillable = ['nombre'];

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }
}
