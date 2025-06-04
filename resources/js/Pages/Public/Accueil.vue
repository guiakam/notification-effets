<template>
  <div class="min-h-screen flex flex-col bg-white">
    <!-- HEADER -->
    <header class="bg-purple-900 text-white py-6 px-4 flex flex-col md:flex-row justify-between items-center shadow-md space-y-4 md:space-y-0">
      <div class="flex items-center space-x-3">
        <img src="/images/logo.png" alt="eTransPV" class="w-8 h-8" />
        <h1 class="text-2xl font-bold">eTransPV</h1>
      </div>
      <nav class="flex flex-wrap justify-center gap-3 text-sm">
        <a href="/aide" class="hover:underline">Aide</a>
        <a href="/tarification" class="hover:underline">Tarification</a>
        <a href="/mentions-legales" class="hover:underline">Mentions légales</a>
        <a href="/connexion" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500">Connexion</a>
      </nav>
    </header>

    <!-- HERO -->
    <section class="flex-1 flex flex-col justify-center items-center text-center px-4 py-20 bg-gray-50">
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-purple-800 mb-4 max-w-4xl">
        Simplifiez la gestion et la notification des effets académiques
      </h2>
      <p class="text-gray-600 text-base sm:text-lg mb-6 max-w-2xl">
        eTransPV est une solution numérique innovante permettant aux établissements d'enseignement supérieur de gérer efficacement la diffusion des relevés de notes et autres effets officiels à leurs étudiants.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="/tarification" class="bg-purple-700 text-white px-6 py-3 rounded hover:bg-purple-800 text-center">
          Découvrir les offres
        </a>
        <a href="/connexion" class="bg-gray-200 text-purple-800 px-6 py-3 rounded hover:bg-gray-300 text-center">
          Se connecter
        </a>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center py-4 text-sm text-gray-500 border-t px-2">
      © 2025 eTransPV. Tous droits réservés.
    </footer>
  </div>
</template>

<script setup>
// Aucune logique pour l’instant
</script>

<style scoped>
a {
  transition: color 0.2s, background-color 0.2s;
}
</style>
