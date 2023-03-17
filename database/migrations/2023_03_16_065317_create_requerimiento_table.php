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
        Schema::create('requerimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_de_requerimiento');
            $table->string('numero_de_requerimiento');
            $table->string('requerimientos_asociados');
            $table->unsignedBigInteger('id_release'); 
            $table->foreign("id_release")->references("id")->on("release");
            $table->unsignedBigInteger('id_solicitud'); 
            $table->foreign("id_solicitud")->references("id")->on("solicitud");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requerimiento');
    }
};
