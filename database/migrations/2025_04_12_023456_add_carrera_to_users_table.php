<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('carrera', [
                'Desarrollo de Sistemas de Información',
                'Construcción Civil',
                'Contabilidad',
                'Electricidad Industrial',
                'Electrónica Industrial',
                'Mecatrónica Automotriz',
                'Mecánica de Producción Industrial',
                'Producción Agropecuaria',
                'Secretariado Ejecutivo',
            ])->after('otro_campo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('carrera');
        });
    }
};
