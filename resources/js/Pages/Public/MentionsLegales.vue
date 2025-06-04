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
        <a href="/tarification" class="hover:underline">Tarification</a>
        <a href="/mentions-legales" class="underline text-orange-300">Mentions légales</a>
        <a href="/connexion" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500">Connexion</a>
      </nav>
    </header>

    <!-- CONTENU -->
    <main class="flex-1 px-4 py-10 max-w-4xl mx-auto text-gray-800">
      <h2 class="text-3xl sm:text-4xl font-bold text-purple-800 mb-6 text-center sm:text-left">
        📜 Mentions légales & politique de confidentialité
      </h2>

      <div class="space-y-8 text-sm sm:text-base">
        <section>
          <h3 class="text-xl font-semibold text-purple-800 mb-1">1. Éditeur du site</h3>
          <p>
            Le présent site est édité par l’équipe eTransPV, solution numérique pour la gestion des effets académiques.
          </p>
        </section>

        <section>
          <h3 class="text-xl font-semibold text-purple-800 mb-1">2. Hébergement</h3>
          <p>
            Le site est hébergé par un prestataire sécurisé, conforme aux normes de protection des données.
          </p>
        </section>

        <section>
          <h3 class="text-xl font-semibold text-purple-800 mb-1">3. Collecte des données</h3>
          <p>
            Les données collectées (nom, matricule, téléphone, email, documents académiques) sont strictement utilisées
            pour l'identification et la gestion des services proposés par eTransPV. Elles ne sont jamais partagées à des
            tiers non autorisés.
          </p>
        </section>

        <section>
          <h3 class="text-xl font-semibold text-purple-800 mb-1">4. Cookies</h3>
          <p>
            Aucune donnée personnelle n’est collectée à l’insu des utilisateurs. Des cookies peuvent être utilisés à des
            fins de statistiques anonymes.
          </p>
        </section>

        <section>
          <h3 class="text-xl font-semibold text-purple-800 mb-1">5. Droits d’accès et de rectification</h3>
          <p>
            Conformément à la réglementation en vigueur, vous disposez d’un droit d’accès, de rectification et
            d’opposition sur les données vous concernant. Vous pouvez exercer ce droit en contactant l’administration de
            votre établissement.
          </p>
        </section>
      </div>
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-4 text-sm text-gray-500 border-t px-2">
      © 2025 eTransPV. Tous droits réservés.
    </footer>
  </div>
</template>

<script setup>
// Aucun script nécessaire
</script>

<style scoped>
h3 {
  color: #4c1d95;
}
</style>
