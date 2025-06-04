<template>
  <div>
    <h1>Modifier une formation</h1>

    <form @submit.prevent="submit">
      <div>
        <label>Nom</label>
        <input v-model="form.nom" type="text" />
      </div>

      <div>
        <label>Année scolaire</label>
        <select v-model="form.annee_id">
          <option v-for="annee in annees" :key="annee.id" :value="annee.id">
            {{ annee.annee }}
          </option>
        </select>
      </div>

      <button type="submit">Mettre à jour</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

defineProps(['formation', 'annees'])

const form = useForm({
  nom: formation.nom,
  annee_id: formation.annee_id
})

function submit() {
  form.put(`/admin/formations/${formation.id}`)
}
</script>
