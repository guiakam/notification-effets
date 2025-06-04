<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriquesTable extends Migration
{
    public function up(): void
    {
        Schema::create('historiques', function (Blueprint $table) {
            $table->id();

            // Clé étrangère vers la table 'admins' (nullable car une action peut venir d'un étudiant)
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            // Clé étrangère vers la table 'etudiants' (nullable car une action peut venir d’un admin)
            $table->unsignedBigInteger('etudiant_id')->nullable();
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');

            // Description de l’action enregistrée dans l’historique
            $table->string('action');

            // Type de cible de l’action (fichier publié, déblocage, hiérarchie, etc.)
            $table->string('cible')->nullable();

            // Informations complémentaires optionnelles (ID de document concerné, etc.)
            $table->string('details')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historiques');
    }
}
