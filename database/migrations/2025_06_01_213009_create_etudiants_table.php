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
       Schema::create('etudiants', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('filiere_id');
    $table->string('matricule')->unique();
    $table->string('nom');
    $table->string('prenom');
    $table->string('email')->nullable();
    $table->timestamps();

    $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
