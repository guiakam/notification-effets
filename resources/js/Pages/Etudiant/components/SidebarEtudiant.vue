<template>
  <div>
    <!-- BOUTON HAMBURGER -->
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
      <h2 class="text-2xl font-bold mb-4">Menu</h2>
      <nav class="flex flex-col gap-3">
        <a
          href="/etudiant/dashboard"
          :class="linkClass('/etudiant/dashboard')"
          @click="fermerMenu"
        >📄 Effets Académiques</a>

        <a
          href="/etudiant/notifications"
          :class="linkClass('/etudiant/notifications')"
          @click="fermerMenu"
        >🔔 Notifications</a>

        <a
          href="/etudiant/aide"
          :class="linkClass('/etudiant/aide')"
          @click="fermerMenu"
        >❓ Aide</a>

        <a
          href="/logout"
          class="hover:text-orange-400 px-3 py-2"
          @click="fermerMenu"
        >🚪 Déconnexion</a>
      </nav>
    </aside>

    <!-- OVERLAY NOIR -->
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
    ? 'bg-purple-700 text-orange-300 font-semibold px-3 py-2 rounded'
    : 'hover:bg-purple-800 px-3 py-2 rounded'
}

const fermerMenu = () => {
  menuOuvert.value = false
}
</script>
