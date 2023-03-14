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
        Schema::create('administracion', function (Blueprint $table) {
            $table->bigIncrements('id');
           /* $table->timestamp('fecha_de_inicio');*/
            $table->string('proveedor');
            $table->string('tipo_de_recurso');
            $table->string('gerencia');
            $table->string('supervisor');
            $table->string('sufijo');
            $table->string('cargo');
            $table->string('op_id');
           /* $table->unsignedBigInteger('id_users'); 
            $table->foreign("id_users")->references("id")->on("users");  */          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administracion');
    }
};
