<template>
    <div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
      <!-- Sidebar -->
      <SidebarAdmin active="📤 Publications" />
  
      <!-- Contenu -->
      <main class="flex-1 p-6 space-y-6">
        <h1 class="text-2xl font-bold text-purple-800">📤 Publier un effet académique</h1>
  
        <!-- Sélecteurs -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <select v-model="selection.formation" class=" border rounded px-3 py-2 w-full"> 
            <option disabled value="">-- Formation --</option>
            <option>Ingénierie</option>
            <option>Alternance</option>
          </select>
          <select v-model="selection.departement" class=" border rounded px-3 py-2 w-full"> 
            <option disabled value="">-- Département --</option>
            <option>Génie Logiciel</option>
            <option>Génie Civil</option>
          </select>
          <select v-model="selection.niveau" class=" border rounded px-3 py-2 w-full"> 
            <option disabled value="">-- Niveau --</option>
            <option>L1</option>
            <option>L2</option>
          </select>
          <select v-model="selection.filiere" class=" border rounded px-3 py-2 w-full"> 
            <option disabled value="">-- Filière --</option>
            <option>Mécatronique</option>
            <option>Logiciel</option>
          </select>
          <select v-model="selection.etudiant" class=" border rounded px-3 py-2 w-full">
            <option value="">-- Tous les étudiants --</option>
            <option>Audrey TAMO</option>
            <option>Jean F. NGONO</option>
          </select>
          <input type="file" class=" border rounded px-3 py-2 w-full" />
        </div>
  
        <!-- Bouton publier -->
        <button
          @click="publierEffet"
          class="bg-purple-700 text-white px-6 py-2 rounded hover:bg-purple-800 mt-4"
        >
          📤 Publier
        </button>
  
        <p v-if="message" class="mt-4 text-green-600 font-semibold">{{ message }}</p>
      </main>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import SidebarAdmin from './components/SidebarAdmin.vue'
  
  const selection = ref({
    formation: '',
    departement: '',
    niveau: '',
    filiere: '',
    etudiant: ''
  })
  
  const message = ref('')
  
  const publierEffet = () => {
    message.value = '✅ Effets publiés avec succès.'
  }
  </script>
  
  
  