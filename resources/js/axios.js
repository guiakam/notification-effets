import axios from 'axios'

// Définir l'URL de base pour les requêtes HTTP
axios.defaults.baseURL = '/'

// Indiquer que les requêtes sont envoyées en AJAX
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

// Si ton application utilise un token CSRF (ce qui est le cas par défaut avec Laravel)
const token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.warn('⚠️ CSRF token non trouvé dans le <head>')
}

export default axios
