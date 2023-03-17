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
        Schema::create('aplicativo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_del_aplicativo');
             $table->string('descripcion');
             $table->string('aplicacion');
             $table->string('responsable');
             $table->string('tipo_de_prueba');
             $table->string('fecha_de_inicio');
             $table->unsignedBigInteger('id_edicion'); 
             $table->foreign("id_edicion")->references("id")->on("edicion");      
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplicativo');
    }
};
