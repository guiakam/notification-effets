<template>
  <div class="flex flex-col md:flex-row min-h-screen">
    <!-- MENU LATÉRAL -->
    <SidebarEtudiant />

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 bg-gray-50 p-6">
      <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-purple-700 mb-4">🧑‍🎓 Guide d'utilisation pour les étudiants</h1>

        <ol class="space-y-4 list-decimal list-inside text-gray-800">
          <li>
            <strong>Connexion :</strong> Cliquez sur le lien reçu dans votre notification (email ou SMS),
            puis entrez votre <em>matricule</em> et votre <em>mot de passe</em> pour vous connecter.
          </li>

          <li>
            <strong>Tableau de bord :</strong> Une fois connecté, vous verrez tous vos <em>effets académiques classés par année</em> avec un bouton pour les télécharger.
          </li>

          <li>
            <strong>Téléchargement :</strong> Cliquez sur <code>Télécharger</code> à côté de l'effet académique.
            Vous pouvez le faire <strong>3 fois maximum</strong>.
          </li>

          <li>
            <strong>Blocage de téléchargement :</strong> Une fois la limite atteinte, le bouton devient <code>Débloquer</code>. Cliquez dessus pour envoyer une demande.
          </li>

          <li>
            <strong>Notification :</strong> Vous recevrez une réponse dans la rubrique <em>Notifications</em> dès qu’un administrateur traite votre requête.
          </li>

          <li>
            <strong>Support :</strong> En cas de problème, contactez le service académique ou visitez cette page pour plus d’explications.
          </li>
        </ol>
      </div>
    </main>
  </div>
</template>

<script setup>
import SidebarEtudiant from './components/SidebarEtudiant.vue'
</script>

<style scoped>
ol li strong {
  color: #4c1d95;
}
</style>
