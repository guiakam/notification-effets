<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Importation des controllers Laravel
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ImportCsvController; // pour importation CSV plus tard

// ============================
// 🔐 AUTH ÉTUDIANT
// ============================
Route::get('/etudiant/login', fn () => Inertia::render('Etudiant/LoginEtudiant'))->name('etudiant.login');

Route::prefix('etudiant')->group(function () {
    Route::get('/dashboard', fn () => Inertia::render('Etudiant/Dashboard'))->name('etudiant.dashboard');
    Route::get('/notifications', fn () => Inertia::render('Etudiant/Notifications'))->name('etudiant.notifications');
    Route::get('/aide', fn () => Inertia::render('Etudiant/Aide'))->name('etudiant.aide');
});


// ============================
// 🌐 PAGES PUBLIQUES
// ============================
Route::get('/', fn () => Inertia::render('Public/Accueil'))->name('public.accueil');
Route::get('/connexion', fn () => Inertia::render('Public/Connexion'))->name('public.connexion');
Route::get('/verification', fn () => Inertia::render('Public/Verification'))->name('public.verification');
Route::get('/tarification', fn () => Inertia::render('Public/Tarification'))->name('public.tarification');
Route::get('/aide-publique', fn () => Inertia::render('Public/Aide'))->name('public.aide');
Route::get('/mentions-legales', fn () => Inertia::render('Public/MentionsLegales'))->name('public.mentions-legales');


// ============================
// 🛠️  ADMINISTRATION
// ============================
Route::prefix('admin')->group(function () {

    // Interfaces principales
    Route::get('/dashboard', fn () => Inertia::render('Admin/AdminDashboard'))->name('admin.admindashboard');
    Route::get('/deblocages', fn () => Inertia::render('Admin/DemandesDeblocage'))->name('admin.deblocages');
    Route::get('/publications', fn () => Inertia::render('Admin/PublicationEffets'))->name('admin.publications');
    Route::get('/utilisateurs', fn () => Inertia::render('Admin/GestionHierarchie'))->name('admin.utilisateurs');
    Route::get('/hierarchie', fn () => Inertia::render('Admin/GestionHierarchie'))->name('admin.hierarchie');
    Route::get('/historiques', fn () => Inertia::render('Admin/HistoriqueActions'))->name('admin.historiques');

    // 🌐 API REST pour la hiérarchie académique
    Route::resource('annees-scolaires', AnneeScolaireController::class);
    Route::resource('formations', FormationController::class);
    Route::resource('departements', DepartementController::class);
    Route::resource('niveaux', NiveauController::class);
    Route::resource('filieres', FiliereController::class);
    Route::resource('etudiants', EtudiantController::class);

    // 📥 Importation CSV (sera traité plus tard)
    Route::post('/import-csv', [ImportCsvController::class, 'import'])->name('admin.import.csv');
});
