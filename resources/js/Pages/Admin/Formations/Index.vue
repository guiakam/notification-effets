<template>
  <div>
    <h1>Liste des formations</h1>

    <Link href="/admin/formations/create">➕ Nouvelle formation</Link>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Année scolaire</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="formation in formations" :key="formation.id">
          <td>{{ formation.id }}</td>
          <td>{{ formation.nom }}</td>
          <td>{{ formation.annee_scolaire?.annee }}</td>
          <td>
            <Link :href="`/admin/formations/${formation.id}/edit`">✏️ Modifier</Link>
            |
            <button @click="supprimer(formation.id)">🗑️ Supprimer</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
defineProps(['formations'])

function supprimer(id) {
  if (confirm('Voulez-vous supprimer cette formation ?')) {
    router.delete(`/admin/formations/${id}`)
  }
}
</script>
