<template>
  <div class="flex flex-col md:flex-row min-h-screen">
    <!-- MENU LATÉRAL ÉTUDIANT -->
    <SidebarEtudiant />

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 bg-gray-100 p-6">
      <div class="max-w-5xl mx-auto bg-white shadow rounded-lg overflow-hidden">
        <div class="bg-purple-700 text-white px-6 py-4 text-xl font-semibold">
          📬 Centre de notifications — eTransPV
        </div>

        <ul class="divide-y divide-gray-200">
          <li
            v-for="(notif, index) in notifications"
            :key="index"
            class="hover:bg-gray-50 transition cursor-pointer px-6 py-4"
          >
            <div class="flex justify-between items-start">
              <div>
                <p class="font-medium text-gray-800">
                  {{
                    notif.type === 'depot'
                      ? '📄 Document disponible'
                      : notif.type === 'reponse'
                      ? '✅ Réponse à votre demande'
                      : '🔔 Notification'
                  }}
                </p>
                <p class="text-sm text-gray-600 mt-1">
                  {{ notif.message }}
                </p>
                <p v-if="notif.admin" class="text-xs text-purple-700 mt-1">
                  👤 Par : {{ notif.admin }}
                </p>
              </div>
              <div class="text-xs text-gray-400 whitespace-nowrap">
                {{ notif.date }}
              </div>
            </div>
          </li>
        </ul>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import SidebarEtudiant from './components/SidebarEtudiant.vue'

const notifications = ref([
  {
    type: 'depot',
    message: "Le relevé de notes de la session 2 est désormais disponible.",
    date: '21 Mai 2025'
  },
  {
    type: 'reponse',
    message: "Votre demande de déblocage du relevé de notes session 1 a été acceptée.",
    admin: 'M. Ngono Henri',
    date: '20 Mai 2025'
  },
  {
    type: 'rappel',
    message: "Rappel : vous n'avez pas encore téléchargé votre relevé de notes session 2.",
    date: '19 Mai 2025'
  },
  {
    type: 'reponse',
    message: "Votre demande de déblocage a été rejetée. Merci de contacter le secrétariat.",
    admin: 'Mme. Mbengue',
    date: '18 Mai 2025'
  }
])
</script>

<style scoped>
ul::-webkit-scrollbar {
  width: 6px;
}
ul::-webkit-scrollbar-thumb {
  background-color: rgba(156, 163, 175, 0.5);
  border-radius: 3px;
}
</style>
