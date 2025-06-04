<template>
  <div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
    <!-- Sidebar -->
    <SidebarAdmin active="📥 Deblocages" />

    <!-- Contenu principal -->
    <main class="flex-1 p-6 space-y-6">
      <h1 class="text-2xl font-bold text-purple-800">📥 Demandes de déblocage</h1>

      <div v-if="demandes.length === 0" class="text-gray-600">Aucune demande pour le moment.</div>

      <div
        v-for="demande in demandes"
        :key="demande.id"
        class="bg-white rounded shadow p-4 border border-gray-200 space-y-2"
      >
        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-2">
          <div>
            <p class="font-bold text-purple-700">{{ demande.nomEtudiant }}</p>
            <p class="text-sm text-gray-600">📄 {{ demande.nomDocument }}</p>
            <p class="text-sm text-gray-500">🗓️ {{ demande.date }}</p>
          </div>
          <div class="text-sm text-gray-600 italic">{{ demande.motif }}</div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 mt-3">
          <button
            @click="valider(demande)"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 w-full sm:w-auto"
          >
            ✅ Valider
          </button>
          <button
            @click="ouvrirModalRefus(demande)"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 w-full sm:w-auto"
          >
            ❌ Refuser
          </button>
        </div>
      </div>

      <!-- Modal de refus -->
      <div v-if="refusDemande" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 px-4">
        <div class="bg-white p-6 rounded shadow max-w-md w-full space-y-4">
          <h2 class="text-xl font-bold text-red-600">❌ Refuser la demande</h2>
          <p class="text-gray-700">
            Étudiant : <span class="font-semibold">{{ refusDemande.nomEtudiant }}</span><br />
            Document : <span class="font-semibold">{{ refusDemande.nomDocument }}</span>
          </p>
          <textarea
            v-model="motifRefus"
            placeholder="Motif du refus"
            class="w-full border rounded px-3 py-2"
            rows="3"
          ></textarea>
          <div class="flex justify-end gap-4">
            <button @click="refuser" class="bg-red-600 text-white px-4 py-2 rounded">Refuser</button>
            <button @click="refusDemande = null" class="px-4 py-2 border rounded">Annuler</button>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import SidebarAdmin from './components/SidebarAdmin.vue'

const demandes = ref([
  {
    id: 1,
    nomEtudiant: 'Tamo Audrey',
    nomDocument: 'Relevé Session 4',
    date: '2025-05-20',
    motif: 'J’ai téléchargé depuis 3 appareils différents...'
  },
  {
    id: 2,
    nomEtudiant: 'Jean F. Ngono',
    nomDocument: 'Relevé Session 3',
    date: '2025-05-21',
    motif: 'Perte de mon téléphone, besoin de récupérer...'
  }
])

const refusDemande = ref(null)
const motifRefus = ref('')

const valider = (demande) => {
  alert(`✅ Demande de ${demande.nomEtudiant} validée.`)
  demandes.value = demandes.value.filter((d) => d.id !== demande.id)
}

const ouvrirModalRefus = (demande) => {
  refusDemande.value = demande
  motifRefus.value = ''
}

const refuser = () => {
  alert(`❌ Refus de ${refusDemande.value.nomEtudiant} avec motif : ${motifRefus.value}`)
  demandes.value = demandes.value.filter((d) => d.id !== refusDemande.value.id)
  refusDemande.value = null
}
</script>

<style scoped>
textarea {
  resize: vertical;
}
</style>
