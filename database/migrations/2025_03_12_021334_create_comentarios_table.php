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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('publicacion_id');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('publicacion_id')->references('id')->on('publicacions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
