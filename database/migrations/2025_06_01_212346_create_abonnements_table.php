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
       Schema::create('abonnements', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('universite_id');
    $table->string('type_messagerie'); // SMS ou Email
    $table->string('duree'); // mensuel, annuel, définitif
    $table->date('date_debut');
    $table->date('date_fin')->nullable();
    $table->timestamps();

    $table->foreign('universite_id')->references('id')->on('universites')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
