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
        Schema::create('effets_academiques', function (Blueprint $table) {
            $table->id();
    $table->string('type'); // Relevé, PV, diplôme, etc.
    $table->string('titre');
    $table->string('fichier'); // chemin du fichier
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('effets_academiques');
    }
};
