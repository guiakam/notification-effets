<template>
    <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
      <div class="bg-white p-6 rounded-lg max-w-md w-full shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-red-600">🚫 Limite de téléchargement atteinte</h2>
        <p class="text-gray-700 mb-4">
          Vous avez atteint la limite autorisée de <strong>3 téléchargements</strong> pour ce document.
          <br />
          Si vous souhaitez obtenir un accès supplémentaire, veuillez soumettre une demande de déblocage.
        </p>
  
        <div class="flex justify-end gap-2 mt-4">
          <button @click="$emit('fermer')" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
            Fermer
          </button>
          <button
            @click="$emit('deblocage')"
            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded"
          >
            Envoyer une requête de déblocage
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  // Événements émis :
  // - "fermer" : fermeture du modal
  // - "deblocage" : ouverture du modal de demande de déblocage
  </script>
  
  <style scoped>
  button:focus {
    outline: none;
  }
  </style>