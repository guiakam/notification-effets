<template>
  <div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
    <!-- SIDEBAR -->
    <SidebarAdmin />

    <!-- MAIN -->
    <main class="flex-1 p-6">
      <!-- ENTÊTE -->
      <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-center">
        <div>
          <h1 class="text-2xl font-bold text-purple-800">Bienvenue, {{ admin.nom }}</h1>
          <p class="text-sm text-gray-600">Établissement : {{ admin.etablissement }}</p>
        </div>
      </div>

      <!-- STATS -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-4 rounded shadow text-center">
          <h2 class="text-xl font-semibold text-purple-800">📄 Effets publiés</h2>
          <p class="text-2xl font-bold text-gray-700 mt-2">{{ stats.effets }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow text-center">
          <h2 class="text-xl font-semibold text-purple-800">📥 Téléchargements</h2>
          <p class="text-2xl font-bold text-gray-700 mt-2">{{ stats.telechargements }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow text-center">
          <h2 class="text-xl font-semibold text-purple-800">❌ Limites atteintes</h2>
          <p class="text-2xl font-bold text-gray-700 mt-2">{{ stats.bloques }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow text-center">
          <h2 class="text-xl font-semibold text-purple-800">📬 Déblocages</h2>
          <p class="text-2xl font-bold text-gray-700 mt-2">{{ stats.deblocages }}</p>
        </div>
      </div>

      <!-- HISTORIQUE -->
      <div class="bg-white p-6 rounded shadow overflow-auto">
        <h2 class="text-xl font-bold text-purple-800 mb-4">📜 Historique des actions</h2>
        <table class="w-full table-auto text-sm text-left">
          <thead class="bg-purple-100 text-purple-800">
            <tr>
              <th class="px-4 py-2">Date</th>
              <th class="px-4 py-2">Administrateur</th>
              <th class="px-4 py-2">Action</th>
              <th class="px-4 py-2">Détail</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="action in historiques" :key="action.id" class="border-t hover:bg-gray-50">
              <td class="px-4 py-2">{{ action.date }}</td>
              <td class="px-4 py-2">{{ action.admin }}</td>
              <td class="px-4 py-2">{{ action.type }}</td>
              <td class="px-4 py-2">{{ action.details }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import SidebarAdmin from './components/SidebarAdmin.vue'

const admin = ref({
  nom: 'Mme Audrey Tamo',
  etablissement: 'ENSP Douala'
})

const stats = ref({
  effets: 125,
  telechargements: 310,
  bloques: 8,
  deblocages: 6
})

const historiques = ref([
  {
    id: 1,
    date: '2025-05-15',
    admin: 'Mme Audrey Tamo',
    type: 'Publication',
    details: 'Relevés L1 Info session 1'
  },
  {
    id: 2,
    date: '2025-05-16',
    admin: 'M. Mbouombouo',
    type: 'Validation de déblocage',
    details: 'Effet n°54 – étudiant E20590'
  },
  {
    id: 3,
    date: '2025-05-18',
    admin: 'Mme Audrey Tamo',
    type: 'Ajout étudiant',
    details: 'L2 Génie civil – TCHOUAMO Lionel'
  }
])
</script>
