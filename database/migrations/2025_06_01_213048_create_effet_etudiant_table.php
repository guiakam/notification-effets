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
        Schema::create('effet_etudiant', function (Blueprint $table) {
            $table->id();

            // ✅ UNE SEULE FOIS chaque clé étrangère
            $table->foreignId('etudiant_id')->constrained('etudiants')->onDelete('cascade');
            $table->foreignId('effet_id')->constrained('effets_academiques')->onDelete('cascade');

            $table->integer('telechargements')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('effet_etudiant');
    }
};
