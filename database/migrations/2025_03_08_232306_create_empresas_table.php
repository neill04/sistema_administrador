<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 20)->unique();
            $table->string('nombre', 255);
            $table->string('direccion', 255);
            $table->string('telefono1', 20);
            $table->string('telefono2', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('web', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('banner', 255)->nullable();
            $table->string('logotipo', 255)->nullable();

            $table->foreignId('pais_id')->constrained('paises')->onDelete('cascade');
            $table->foreignId('departamento_id')->constrained('departamentos')->onDelete('cascade');
            $table->foreignId('empresa_tipo_id')->constrained('empresa_tipos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
