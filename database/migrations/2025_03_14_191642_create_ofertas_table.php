<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->string('titulo_oferta');
            $table->text('informacion_adicional')->nullable();
            $table->string('url')->nullable();
            $table->string('cargo');
            $table->string('area');
            $table->integer('numero_vacantes');
            $table->string('celular_contacto');
            $table->string('correo_contacto');
            $table->date('fecha_vencimiento');
            
            // Campos ENUM
            $table->enum('tipo_oferta', ['Contrato a plazo fijo', 'Contrato por hora', 'Prácticas profesionales', 'Prácticas preprofesionales', 'No mostrar']);
            $table->enum('salario', ['A tratar', '1025 - 1500', '1510 - 2000', '2010 - 2500', '2510 - 3000', '3010 - 3500']);
            $table->enum('jornada_laboral', ['Tiempo completo', 'Medio tiempo', 'Horario por horas', 'No mostrar']);
            $table->enum('disponibilidad', ['Inmediata', 'Proceso de selección', 'No mostrar']);
            $table->enum('ubicacion_oferta', ['Trabajo en Sede principal', 'Trabajo en Lima', 'No mostrar']);
            $table->enum('dirigido', ['Estudiante', 'Egresado', 'Bachiller', 'Titulado', 'Magister', 'Doctorado']);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
