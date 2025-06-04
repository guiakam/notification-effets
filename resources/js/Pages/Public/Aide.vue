<template>
  <div class="min-h-screen flex flex-col bg-white">
    <!-- HEADER -->
    <header class="bg-purple-900 text-white py-6 px-4 flex flex-col md:flex-row justify-between items-center gap-4 shadow-md">
      <div class="flex items-center space-x-3">
        <img src="/images/logo.png" alt="eTransPV" class="w-8 h-8" />
        <h1 class="text-2xl font-bold">eTransPV</h1>
      </div>
      <nav class="flex flex-wrap justify-center gap-3 text-sm">
        <a href="/aide" class="underline text-orange-300">Aide</a>
        <a href="/tarification" class="hover:underline">Tarification</a>
        <a href="/mentions-legales" class="hover:underline">Mentions légales</a>
        <a href="/connexion" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500">Connexion</a>
      </nav>
    </header>

    <!-- CONTENU -->
    <main class="flex-1 px-4 py-10 max-w-4xl mx-auto text-gray-800">
      <h2 class="text-3xl sm:text-4xl font-bold text-purple-800 mb-6 text-center sm:text-left">🧭 Guide d'utilisation du logiciel eTransPV</h2>

      <section class="space-y-8">
        <!-- Étudiant -->
        <div>
          <h3 class="text-xl sm:text-2xl font-semibold text-purple-700">🎓 Côté Étudiant</h3>
          <ul class="list-disc list-inside ml-4 mt-2 space-y-1 text-sm sm:text-base">
            <li>Connexion avec matricule et mot de passe.</li>
            <li>Consultation des effets classés par année scolaire.</li>
            <li>Téléchargement limité à 3 fois par effet.</li>
            <li>Demande de déblocage en cas de limite atteinte.</li>
            <li>Notifications et rappels disponibles dans leur tableau de bord.</li>
          </ul>
        </div>

        <!-- Admin -->
        <div>
          <h3 class="text-xl sm:text-2xl font-semibold text-purple-700">🏫 Côté Administrateur</h3>
          <ul class="list-disc list-inside ml-4 mt-2 space-y-1 text-sm sm:text-base">
            <li>Création de formations, départements, niveaux, filières et étudiants par année.</li>
            <li>Publication des effets académiques après scan ou upload.</li>
            <li>Envoi de notifications de disponibilité et de rappel.</li>
            <li>Gestion des demandes de déblocage (refus ou validation).</li>
            <li>Suivi des actions via l'historique du tableau de bord.</li>
          </ul>
        </div>
      </section>
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-4 text-sm text-gray-500 border-t px-2">
      © 2025 eTransPV. Tous droits réservés.
    </footer>
  </div>
</template>

<script setup>
// Aucun script requis ici
</script>

<style scoped>
nav a {
  transition: color 0.2s;
}
</style>
