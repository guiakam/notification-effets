<template>
  <div class="min-h-screen flex flex-col bg-white">
    <!-- HEADER -->
    <header class="bg-purple-900 text-white py-6 px-4 flex flex-col md:flex-row justify-between items-center gap-4 shadow-md">
      <div class="flex items-center space-x-3">
        <img src="/images/logo.png" alt="eTransPV" class="w-8 h-8" />
        <h1 class="text-2xl font-bold">eTransPV</h1>
      </div>
      <nav class="flex flex-wrap justify-center gap-3 text-sm">
        <a href="/aide" class="hover:underline">Aide</a>
        <a href="/tarification" class="underline text-orange-300">Tarification</a>
        <a href="/mentions-legales" class="hover:underline">Mentions légales</a>
        <a href="/connexion" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500">Connexion</a>
      </nav>
    </header>

    <!-- TARIFICATION -->
    <main class="flex-1 px-4 py-12 max-w-6xl mx-auto text-gray-800">
      <h2 class="text-3xl sm:text-4xl font-bold text-purple-800 mb-10 text-center">
        📊 Choisissez votre forfait eTransPV
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Gratuit -->
        <div class="border rounded-lg shadow p-6 text-center bg-white">
          <h3 class="text-xl font-bold text-purple-700 mb-4">Forfait Gratuit</h3>
          <p class="text-gray-600 mb-2">📧 Notification Email uniquement</p>
          <p class="text-gray-600 mb-2">🗓️ Durée : 1 mois</p>
          <p class="text-3xl font-bold text-purple-800 mb-4">0 FCFA</p>
          <button class="bg-purple-700 text-white px-5 py-2 rounded hover:bg-purple-800 w-full">Souscrire</button>
        </div>

        <!-- Standard -->
        <div class="border rounded-lg shadow p-6 text-center bg-white">
          <h3 class="text-xl font-bold text-purple-700 mb-4">Forfait Standard</h3>
          <p class="text-gray-600 mb-2">📧 Email + 📱 SMS</p>
          <p class="text-gray-600 mb-2">🗓️ Durée : 12 mois</p>
          <p class="text-3xl font-bold text-purple-800 mb-4">120 000 FCFA</p>
          <button class="bg-purple-700 text-white px-5 py-2 rounded hover:bg-purple-800 w-full">Souscrire</button>
        </div>

        <!-- Premium -->
        <div class="border rounded-lg shadow p-6 text-center bg-white">
          <h3 class="text-xl font-bold text-purple-700 mb-4">Forfait Premium</h3>
          <p class="text-gray-600 mb-2">📧 Email + 📱 SMS illimité</p>
          <p class="text-gray-600 mb-2">🔁 Accès définitif</p>
          <p class="text-3xl font-bold text-purple-800 mb-4">300 000 FCFA</p>
          <button class="bg-purple-700 text-white px-5 py-2 rounded hover:bg-purple-800 w-full">Souscrire</button>
        </div>
      </div>

      <p class="text-sm text-gray-500 text-center mt-10 px-4">
        Des options personnalisées peuvent être discutées avec notre équipe commerciale.
      </p>
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-4 text-sm text-gray-500 border-t px-2">
      © 2025 eTransPV. Tous droits réservés.
    </footer>
  </div>
</template>

<script setup>
// Aucun script pour l’instant
</script>

<style scoped>
button {
  transition: background-color 0.2s;
}
</style>
