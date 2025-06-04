<template>
  <div class="flex flex-col md:flex-row min-h-screen">
    <!-- Partie gauche (Message de bienvenue) -->
    <div class="w-full md:w-1/2 bg-purple-900 text-white flex flex-col justify-center items-center p-10">
      <h1 class="text-4xl font-bold mb-4 text-center">WELCOME BACK!</h1>
      <p class="text-center text-lg max-w-sm">
        Vous pouvez vous connecter pour accéder à votre espace étudiant.
      </p>
    </div>

    <!-- Partie droite (Formulaire) -->
    <div class="w-full md:w-1/2 bg-white p-8 sm:p-12 flex flex-col justify-center">
      <h2 class="text-3xl font-bold mb-6 text-center">CONNEXION</h2>

      <!-- Sélecteur Admin/Étudiant -->
      <div class="flex justify-center gap-4 mb-8">
        <button class="border border-black px-4 py-2 rounded flex items-center gap-2">
          ⚙️ <span>Admin</span>
        </button>
        <button class="border border-black px-4 py-2 rounded flex items-center gap-2 bg-orange-500 text-white">
          🎓 <span>Étudiant</span>
        </button>
      </div>

      <!-- Formulaire -->
      <form @submit.prevent="submit" class="space-y-5">
        <div>
          <label class="block font-semibold mb-1">Matricule</label>
          <input
            v-model="form.matricule"
            type="text"
            placeholder="Entrez votre matricule"
            class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500"
            required
          />
        </div>

        <div>
          <label class="block font-semibold mb-1">Mot de passe</label>
          <input
            v-model="form.password"
            type="password"
            placeholder="Mot de passe"
            class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500"
            required
          />
        </div>

        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center gap-2">
            <input type="checkbox" v-model="form.remember" />
            Se souvenir de moi
          </label>
          <a href="#" class="text-gray-500 hover:text-purple-700">Mot de passe oublié ?</a>
        </div>

        <button
          type="submit"
          class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded font-bold text-lg transition"
        >
          Se connecter
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  matricule: '',
  password: '',
  remember: false,
})

const submit = () => {
  router.post('/etudiant/login', form)
}
</script>
