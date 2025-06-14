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
       Schema::create('niveaux', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('departement_id');
    $table->string('libelle'); // N1, N2, etc.
    $table->timestamps();

    $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveaux');
    }
};
