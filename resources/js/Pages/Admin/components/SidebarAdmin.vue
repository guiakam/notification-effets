<template>
  <div>
    <!-- BOUTON HAMBURGER (affiché uniquement sur mobile) -->
    <button
      @click="menuOuvert = !menuOuvert"
      class="md:hidden fixed top-4 left-4 z-50 text-white text-3xl bg-purple-900 p-2 rounded"
    >
      ☰
    </button>

    <!-- SIDEBAR -->
    <aside
      :class="[
        'bg-purple-900 text-white w-64 p-6 space-y-6 fixed top-0 left-0 h-full z-40 transition-transform duration-300 md:relative md:translate-x-0',
        menuOuvert ? 'translate-x-0' : '-translate-x-full'
      ]"
    >
      <!-- LOGO -->
      <div class="flex items-center space-x-2 mb-6">
        <img src="/images/logo.png" alt="Logo eTransPV" class="w-8 h-8" />
        <h1 class="text-xl font-bold">eTransPV</h1>
      </div>

      <!-- MENU -->
      <nav class="space-y-4">
        <a
          href="/admin/dashboard"
          :class="linkClass('/admin/dashboard')"
          @click="fermerMenu"
        >📊 Tableau de bord</a>

        <a
          href="/admin/publications"
          :class="linkClass('/admin/publications')"
          @click="fermerMenu"
        >📁 Publication des Effets</a>

        <a
          href="/admin/deblocages"
          :class="linkClass('/admin/deblocages')"
          @click="fermerMenu"
        >🔓 Demandes de Déblocage</a>

        <a
          href="/admin/historiques"
          :class="linkClass('/admin/historiques')"
          @click="fermerMenu"
        >📜 Historique des actions</a>

        <a
          href="/admin/hierarchie"
          :class="linkClass('/admin/hierarchie')"
          @click="fermerMenu"
        >🏫 Gestion Hiérarchie</a>

        <a
          href="/logout"
          class="block hover:text-orange-400"
          @click="fermerMenu"
        >🚪 Déconnexion</a>
      </nav>
    </aside>

    <!-- OVERLAY NOIR (clic pour fermer) -->
    <div
      v-if="menuOuvert"
      class="fixed inset-0 bg-black opacity-50 z-30 md:hidden"
      @click="menuOuvert = false"
    ></div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { usePage } from '@inertiajs/vue3'

const currentRoute = usePage().url
const menuOuvert = ref(false)

const linkClass = (route) => {
  return currentRoute === route
    ? 'text-orange-400 font-semibold border-l-4 border-orange-400 pl-2 block'
    : 'hover:text-orange-400 block'
}

const fermerMenu = () => {
  menuOuvert.value = false
}
</script>
