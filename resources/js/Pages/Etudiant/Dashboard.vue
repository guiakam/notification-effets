<template>
  <div class="flex flex-col md:flex-row min-h-screen">
    <!-- SIDEBAR ÉTUDIANT -->
    <SidebarEtudiant />

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 bg-gray-50 p-6">
      <div class="mb-6">
        <h1 class="text-3xl font-bold">👋 Bienvenue, {{ etudiant.nom }}</h1>
        <p class="text-gray-600">Voici vos documents académiques</p>
      </div>

      <div v-for="(effets, annee) in groupedEffects" :key="annee" class="mb-8">
        <h2 class="text-xl font-semibold text-purple-700 mb-4 border-b pb-1">
          Année scolaire : {{ annee }}
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <div
            v-for="effet in effets"
            :key="effet.id"
            @click="previsualiser(effet.id)"
            class="cursor-pointer bg-white p-5 rounded-lg shadow hover:shadow-md border border-gray-200 transition"
          >
            <h3 class="text-lg font-bold text-gray-800">{{ effet.nom }}</h3>
            <p class="text-sm text-gray-500 mb-2">📅 Publié le {{ effet.date }}</p>
            <div class="flex justify-between items-center mt-3">
              <span
                :class="[ 
                  'text-xs font-semibold px-2 py-1 rounded-full',
                  effet.compteur < 3
                    ? 'bg-green-100 text-green-800'
                    : 'bg-red-100 text-red-800'
                ]"
              >
                Téléchargé : {{ effet.compteur }}/3
              </span>
              <button
                @click.stop="handleClick(effet)"
                :class="[
                  'text-sm font-bold px-3 py-1 rounded transition',
                  effet.compteur < 3
                    ? 'bg-blue-500 text-white hover:bg-blue-600'
                    : 'bg-orange-500 text-white hover:bg-orange-600'
                ]"
              >
                {{ effet.compteur < 3 ? 'Télécharger' : 'Débloquer' }}
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- MODAUX -->
      <ModalAlerte
        v-if="showAlerte"
        @fermer="fermerModals"
        @deblocage="ouvrirDeblocage"
      />
      <ModalDeblocage
        v-if="showDeblocage"
        :nom-document="selectedEffet?.nom"
        :nom-etudiant="etudiant.nom"
        v-model="selectedMotif"
        @fermer="fermerModals"
        @envoyer="envoyerDemande"
      />
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { usePage, router } from '@inertiajs/vue3'
import SidebarEtudiant from './components/SidebarEtudiant.vue'
import ModalAlerte from './components/ModalAlerte.vue'
import ModalDeblocage from './components/ModalDeblocage.vue'

const etudiant = ref({ nom: 'Audrey Tamo', matricule: '20232001' })
const showAlerte = ref(false)
const showDeblocage = ref(false)
const selectedEffet = ref(null)
const selectedMotif = ref('')

const groupedEffects = ref({
  '2023-2024': [
    { id: 1, nom: 'Relevé Session 1', date: '12/03/2024', compteur: 1 },
    { id: 2, nom: 'Relevé Session 2', date: '20/05/2024', compteur: 3 },
  ]
})

const handleClick = (effet) => {
  if (effet.compteur >= 3) {
    selectedEffet.value = effet
    showAlerte.value = true
  } else {
    alert(`📥 Téléchargement : ${effet.nom}`)
    effet.compteur++
  }
}

const ouvrirDeblocage = () => {
  showAlerte.value = false
  showDeblocage.value = true
}

const fermerModals = () => {
  showAlerte.value = false
  showDeblocage.value = false
}

const envoyerDemande = (motif) => {
  alert(`📨 Demande envoyée pour ${selectedEffet.value.nom} avec motif: ${motif}`)
  fermerModals()
}

const previsualiser = (id) => {
  router.get(`/etudiant/preview/${id}`)
}
</script>

<style scoped>
button:focus {
  outline: none;
}
</style>
