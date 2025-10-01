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
        Schema::create('livro_autor', function (Blueprint $table) {
            $table->unsignedBigInteger('livro_cod_l');
            $table->unsignedBigInteger('autor_cod_au');

            $table->timestamps();
            $table->primary(['livro_cod_l', 'autor_cod_au']);

            $table->foreign('livro_cod_l', 'livro_autor_fkindex1')->references('cod_l')->on('livro')->onDelete('cascade');
            $table->foreign('autor_cod_au', 'livro_autor_fkindex2')->references('cod_au')->on('autor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_autor');
    }
};
