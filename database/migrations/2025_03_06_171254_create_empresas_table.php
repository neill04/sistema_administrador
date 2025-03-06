<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
        	$table->id();
        	$table->string('nombre');
        	$table->text('descripcion')->nullable();
        	$table->string('direccion')->nullable();
        	$table->string('telefono')->nullable();
        	$table->string('correo')->unique();
        	$table->string('sitio_web')->nullable();
        	$table->timestamps();
    		});
    }
		
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
