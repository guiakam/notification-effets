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
        Schema::create('notifications', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('etudiant_id')->nullable();
    $table->unsignedBigInteger('admin_id')->nullable();
    $table->text('contenu');
    $table->enum('type', ['telechargement', 'deblocage', 'reponse']);
    $table->timestamps();

    $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');
    $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
