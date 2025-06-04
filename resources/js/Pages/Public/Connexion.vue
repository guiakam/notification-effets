<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-10">
      <div class="bg-white p-6 sm:p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-purple-800 mb-6 text-center">
          🔐 Connexion Administrateur
        </h1>
  
        <form @submit.prevent="seConnecter">
          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
            <input
              v-model="email"
              id="email"
              type="email"
              required
              class="mt-1 block w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            />
          </div>
  
          <!-- Mot de passe -->
          <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input
              v-model="password"
              id="password"
              type="password"
              required
              class="mt-1 block w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            />
          </div>
  
          <!-- Bouton -->
          <button
            type="submit"
            class="w-full bg-purple-700 text-white py-2 rounded font-semibold hover:bg-purple-800 transition"
          >
            Se connecter
          </button>
        </form>
  
        <!-- Message d'erreur -->
        <p v-if="erreur" class="text-red-500 text-sm mt-4 text-center">
          ⚠️ {{ erreur }}
        </p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { router } from '@inertiajs/vue3'
  
  const email = ref('')
  const password = ref('')
  const erreur = ref('')
  
  // Simulation de validation des identifiants
  const seConnecter = () => {
    const comptes = [
      { email: 'admin@univ.cm', password: 'admin123', actif: true },
      { email: 'demo@exemple.com', password: 'demo123', actif: false }
    ]
  
    const admin = comptes.find(
      c => c.email === email.value && c.password === password.value
    )
  
    if (admin) {
      if (admin.actif) {
        router.visit('/admin/dashboard')
      } else {
        erreur.value = "Votre établissement n’a pas encore souscrit. Redirection..."
        setTimeout(() => router.visit('/tarification'), 2500)
      }
    } else {
      erreur.value = "Identifiants invalides."
    }
  }
  </script>
  