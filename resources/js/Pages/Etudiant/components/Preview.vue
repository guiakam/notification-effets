<template>
    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center p-6">
      <div class="w-full max-w-4xl bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold text-purple-800 mb-4">📄 Prévisualisation du document</h1>
  
        <iframe
          :src="urlPDF"
          class="w-full h-[500px] border rounded"
          frameborder="0"
          allowfullscreen
        ></iframe>
  
        <div class="mt-6 flex justify-end">
          <button
            @click="telechargerDocument"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow"
          >
            📥 Télécharger ce document
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { onMounted, ref } from 'vue'
  import { usePage } from '@inertiajs/vue3'
  import { useRoute } from 'vue-router'
  
  // Simule l'ID reçu en paramètre (à adapter avec Inertia ou route dynamique)
  const page = usePage()
  const route = useRoute()
  const id = route.params.id || 1 // fallback exemple
  
  const urlPDF = ref(`/storage/effets/pv_${id}.pdf`)
  
  const telechargerDocument = () => {
    alert(`Téléchargement du document ID #${id}`)
  }
  </script>
  
  <style scoped>
  iframe:focus {
    outline: none;
  }
  </style>
  