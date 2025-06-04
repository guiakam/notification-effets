<template>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 py-10">
      <div class="bg-white p-6 sm:p-8 rounded shadow-md w-full max-w-md text-center">
        <h1 class="text-2xl font-bold text-purple-800 mb-4">🔐 Vérification Anti-Robot</h1>
        <p class="text-sm text-gray-600 mb-6">
          Veuillez compléter la vérification pour accéder à la connexion.
        </p>
  
        <!-- Simulation : Drag & Drop -->
        <div class="relative w-full h-24 sm:h-28 bg-gray-200 rounded-lg flex items-center justify-between px-4 mb-6">
          <div
            class="w-12 h-12 sm:w-14 sm:h-14 bg-purple-500 rounded cursor-move"
            draggable="true"
            @dragstart="onDragStart"
          ></div>
          <div
            class="w-16 h-16 sm:w-20 sm:h-20 border-2 border-dashed border-purple-400 flex items-center justify-center text-xl"
            @dragover.prevent
            @drop="onDrop"
          >
            🎯
          </div>
        </div>
  
        <div v-if="verifie" class="text-green-600 font-medium mb-4">
          ✅ Vérification réussie !
        </div>
  
        <button
          :disabled="!verifie"
          @click="continuer"
          class="w-full py-2 bg-purple-700 text-white font-semibold rounded hover:bg-purple-800 disabled:bg-gray-400"
        >
          Continuer
        </button>
      </div>
    </div>
  </template>
  
  <script setup>
  import { router } from '@inertiajs/vue3'
  import { ref } from 'vue'
  
  const verifie = ref(false)
  
  const onDragStart = (e) => {
    e.dataTransfer.setData('text/plain', 'valide')
  }
  
  const onDrop = (e) => {
    const data = e.dataTransfer.getData('text')
    if (data === 'valide') {
      verifie.value = true
    }
  }
  
  const continuer = () => {
    if (verifie.value) {
      router.visit('/admin/login')
    }
  }
  </script>
  