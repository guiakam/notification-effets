<template>
    <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
      <div class="bg-white p-6 rounded-lg max-w-md w-full shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-purple-700">🔓 Formulaire de déblocage</h2>
  
        <form @submit.prevent="$emit('envoyer', motif)">
          <div class="mb-4">
            <label class="block font-semibold text-sm">Nom du document</label>
            <input type="text" :value="nomDocument" disabled class="w-full border px-3 py-2 rounded bg-gray-100" />
          </div>
  
          <div class="mb-4">
            <label class="block font-semibold text-sm">Nom de l’étudiant</label>
            <input type="text" :value="nomEtudiant" disabled class="w-full border px-3 py-2 rounded bg-gray-100" />
          </div>
  
          <div class="mb-4">
            <label class="block font-semibold text-sm">Motif</label>
            <textarea v-model="motif" class="w-full border px-3 py-2 rounded" placeholder="Expliquer pourquoi vous avez besoin d'un nouveau téléchargement..." required></textarea>
          </div>
  
          <div class="flex justify-end gap-2 mt-4">
            <button type="button" @click="$emit('fermer')" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
              Annuler
            </button>
            <button type="submit" class="bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded">
              Envoyer
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  defineProps({
    nomDocument: String,
    nomEtudiant: String,
  })
  
  const motif = defineModel()
  </script>
  
  <style scoped>
  button:focus {
    outline: none;
  }
  </style>
  