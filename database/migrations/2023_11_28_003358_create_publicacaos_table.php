<?php

use App\Models\Publicacao;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

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
            $table->string('iframe_trailer');
            $table->foreign('tipo_publi')->references('id')->on('tipo_publicacaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    $pubs = Publicacao::all();

    foreach ($pubs as $pub) {
        if ($pub->img && Storage::exists('/assets/imgPubli/' . $pub->img)) {
            Storage::delete('/assets/imgPubli/' . $pub->img);
        }
    }
    
    Schema::dropIfExists('publicacaos');

}
};
