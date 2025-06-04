<template>
  <div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
    <SidebarAdmin active="🏫 Hierarchie" />

    <main class="flex-1 bg-gray-50 p-6">
      <h2 class="text-2xl font-bold text-purple-800 mb-6">🏫 Gestion de la hiérarchie académique</h2>

      <!-- AJOUT MANUEL -->
      <div class="bg-white shadow rounded-lg p-4 mb-8 space-y-6">
        <h3 class="text-lg font-semibold text-purple-700">➕ Ajout manuel</h3>

        <!-- ANNEE -->
        <div>
          <label class="block font-medium">Année scolaire</label>
          <input v-model="annee" placeholder="Ex: 2024-2025" class="border rounded w-full px-3 py-2 mt-1" />
          <button @click="ajouterAnnee" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 mt-2">Ajouter</button>
          <ul class="list-disc ml-6 mt-2 text-sm text-gray-700">
            <li v-for="a in annees" :key="a.id" class="flex justify-between">
              {{ a.nom }} <button @click="supprimerAnnee(a.id)" class="text-red-600">Supprimer</button>
            </li>
          </ul>
        </div>

        <!-- FORMATION -->
        <div>
          <label class="block font-medium">Formation</label>
          <select v-model="anneeSelectionnee" class="border rounded w-full px-3 py-2 mt-1">
            <option disabled value="">-- Choisir une année --</option>
           <option v-for="a in annees" :key="a.id" :value="a.id">{{ a.nom }}</option>
          </select>
          <input v-model="formation" placeholder="Ex: Ingénierie" class="border rounded w-full px-3 py-2 mt-1 " />
          <button @click="ajouterFormation" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 mt-2">Ajouter</button>
        </div>

        <!-- DEPARTEMENT -->
        <div>
          <label class="block font-medium">Département</label>
          <select v-model="formationSelectionnee" class="border rounded w-full px-3 py-2 mt-1">
            <option disabled value="">-- Choisir une formation --</option>
           <option v-for="f in formations" :key="f.id" :value="f.id">{{ f.nom }}</option>
          </select>
          <input v-model="departement" placeholder="Ex: Informatique" class="border rounded w-full px-3 py-2 mt-1 " />
          <button @click="ajouterDepartement" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 mt-2">Ajouter</button>
        </div>

        <!-- NIVEAU -->
        <div>
          <label class="block font-medium">Niveau</label>
          <select v-model="departementSelectionne" class="border rounded w-full px-3 py-2 mt-1">
            <option disabled value="">-- Choisir un département --</option>
            <option v-for="d in departements" :key="d.id" :value="d.id">{{ d.nom }}</option>
          </select>
          <input v-model="niveau" placeholder="Ex: Niveau 1" class="border rounded w-full px-3 py-2 mt-1 " />
          <button @click="ajouterNiveau" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 mt-2">Ajouter</button>
        </div>

        <!-- FILIERE -->
        <div>
          <label class="block font-medium">Filière</label>
          <select v-model="niveauSelectionne" class="border rounded w-full px-3 py-2 mt-1">
            <option disabled value="">-- Choisir un niveau --</option>
            <option v-for="n in niveaux" :key="n.id" :value="n.id">{{ n.nom }}</option>
          </select>
          <input v-model="filiere" placeholder="Ex: Génie Logiciel" class="border rounded w-full px-3 py-2 mt-1 " />
          <button @click="ajouterFiliere" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 mt-2">Ajouter</button>
        </div>
      </div>

      <!-- IMPORT CSV -->
      <div class="bg-white shadow rounded-lg p-4 space-y-4">
        <h3 class="text-lg font-semibold text-purple-700">📥 Importation CSV</h3>
        <input type="file" @change="handleCsvUpload" accept=".csv" class="input" />
        <button @click="importerCsv" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 mt-2">Importer</button>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from '@/axios' // Ton fichier axios.js
import SidebarAdmin from './components/SidebarAdmin.vue'

// Champs liés aux entités
const annee = ref('')
const annees = ref([])
const anneeSelectionnee = ref('')

const formation = ref('')
const formations = ref([])
const formationSelectionnee = ref('')

const departement = ref('')
const departements = ref([])
const departementSelectionne = ref('')

const niveau = ref('')
const niveaux = ref([])
const niveauSelectionne = ref('')

const filiere = ref('')

// 🟪 Chargement des données dès le montage
onMounted(() => {
  chargerToutesDonnees()
})

const chargerToutesDonnees = async () => {
  try {
    const [a, f, d, n] = await Promise.all([
      axios.get('/admin/annees-scolaires'),
      axios.get('/admin/formations'),
      axios.get('/admin/departements'),
      axios.get('/admin/niveaux')
    ])
    annees.value = a.data
    formations.value = f.data
    departements.value = d.data
    niveaux.value = n.data
  } catch (err) {
    alert('❌ Erreur chargement : ' + err.message)
  }
}

// ➕ Ajout entités
const ajouterAnnee = async () => {
  if (!annee.value) return
  const res = await axios.post('/admin/annees-scolaires', { nom: annee.value })
  annees.value.push(res.data)
  annee.value = ''
}

const ajouterFormation = async () => {
  if (!formation.value || !anneeSelectionnee.value) return
  const res = await axios.post('/admin/formations', {
    nom: formation.value,
    annee_scolaire_id: anneeSelectionnee.value
  })
  formations.value.push(res.data)
  formation.value = ''
}

const ajouterDepartement = async () => {
  if (!departement.value || !formationSelectionnee.value) return
  const res = await axios.post('/admin/departements', {
    nom: departement.value,
    formation_id: formationSelectionnee.value
  })
  departements.value.push(res.data)
  departement.value = ''
}

const ajouterNiveau = async () => {
  if (!niveau.value || !departementSelectionne.value) return
  const res = await axios.post('/admin/niveaux', {
    nom: niveau.value,
    departement_id: departementSelectionne.value
  })
  niveaux.value.push(res.data)
  niveau.value = ''
}

const ajouterFiliere = async () => {
  if (!filiere.value || !niveauSelectionne.value) return
  await axios.post('/admin/filieres', {
    nom: filiere.value,
    niveau_id: niveauSelectionne.value
  })
  filiere.value = ''
  alert('✅ Filière ajoutée')
}

// ❌ Suppression année scolaire (exemple pour supprimer)
const supprimerAnnee = async (id) => {
  if (confirm('❌ Supprimer cette année ?')) {
    await axios.delete(`/admin/annees-scolaires/${id}`)
    annees.value = annees.value.filter(a => a.id !== id)
  }
}

// 📥 Import CSV
const fichierCsv = ref(null)

const handleCsvUpload = (e) => {
  fichierCsv.value = e.target.files[0]
}

const importerCsv = async () => {
  if (!fichierCsv.value) return alert('Sélectionnez un fichier')
  const form = new FormData()
  form.append('csv', fichierCsv.value)
  try {
    await axios.post('/admin/import-csv', form)
    alert('✅ Importation réussie')
    chargerToutesDonnees()
  } catch (err) {
    alert('❌ Échec importation : ' + err.message)
  }
}
</script>


