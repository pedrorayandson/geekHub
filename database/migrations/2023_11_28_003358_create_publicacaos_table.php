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
        Schema::create('publicacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_publi');
            $table->string('titulo');
            $table->string('sinopse');
            $table->binary('img');
            $table->string('trailer_url');
            $table->foreign('tipo_publi')->references('id')->on('tipo_publicacaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacaos');
    }
};
