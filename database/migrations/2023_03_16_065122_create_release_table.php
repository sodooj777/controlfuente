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
        Schema::create('release', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('año');
            $table->string('estatus');
            $table->unsignedBigInteger('id_solicitud'); 
            $table->foreign("id_solicitud")->references("id")->on("solicitud");
           /* $table->unsignedBigInteger('id_aplicativo'); 
            $table->foreign("id_aplicativo")->references("id")->on("aplicativo");*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('release');
    }
};
