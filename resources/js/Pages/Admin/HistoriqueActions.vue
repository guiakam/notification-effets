<template>
  <div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
    <!-- SIDEBAR -->
    <SidebarAdmin active="🕓 historiques" />

    <!-- CONTENU -->
    <main class="flex-1 p-6">
      <h1 class="text-2xl font-bold text-purple-800 mb-6">🕓 Historique des actions</h1>

      <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-purple-800 text-white">
            <tr>
              <th class="px-4 py-3 text-sm font-semibold text-left">📅 Date</th>
              <th class="px-4 py-3 text-sm font-semibold text-left">👤 Administrateur</th>
              <th class="px-4 py-3 text-sm font-semibold text-left">⚙️ Action</th>
              <th class="px-4 py-3 text-sm font-semibold text-left">🎯 Cible</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 text-gray-700 text-sm">
            <tr v-for="action in historiques" :key="action.id" class="hover:bg-gray-50">
              <td class="px-4 py-2">{{ action.date }}</td>
              <td class="px-4 py-2 font-medium">{{ action.admin }}</td>
              <td class="px-4 py-2">{{ action.action }}</td>
              <td class="px-4 py-2">{{ action.cible }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div v-if="historiques.length === 0" class="text-center text-gray-500 mt-6">
        Aucune action enregistrée pour le moment.
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import SidebarAdmin from './components/SidebarAdmin.vue'

const historiques = ref([
  {
    id: 1,
    date: '2025-05-21 08:45',
    admin: 'Audrey Tamo',
    action: 'Ajout d’un étudiant',
    cible: 'Fabrice M. - Génie Logiciel'
  },
  {
    id: 2,
    date: '2025-05-21 09:10',
    admin: 'Audrey Tamo',
    action: 'Publication PV',
    cible: 'Session 2 - Niveau 1'
  },
  {
    id: 3,
    date: '2025-05-21 10:15',
    admin: 'Ngono R.',
    action: 'Validation déblocage',
    cible: 'Jean F. Ngono - Relevé S4'
  }
])
</script>

<style scoped>
th, td {
  white-space: nowrap;
}
</style>
