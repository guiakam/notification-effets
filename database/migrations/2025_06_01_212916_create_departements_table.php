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
      Schema::create('departements', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('formation_id');
    $table->string('libelle');
    $table->boolean('active')->default(true);
    $table->timestamps();

    $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departements');
    }
};
