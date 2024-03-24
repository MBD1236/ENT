<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalerieController;
use App\Http\Controllers\GenieInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Import\EmploiController;
use App\Http\Controllers\ModuleEtudiant\DepartementController;
use App\Http\Controllers\ModuleEtudiant\EnseignantController;
use App\Http\Controllers\ModuleEtudiant\EtudiantController;
use App\Http\Controllers\ModuleEtudiant\InscriptionController;
use App\Http\Controllers\moduleEtudiant\MatiereController;
use App\Http\Controllers\ModuleEtudiant\NiveauController;
use App\Http\Controllers\ModuleEtudiant\ProgrammeController;
use App\Http\Controllers\ModuleEtudiant\PromotionController;
use App\Http\Controllers\moduleEtudiant\SemestreController;
use App\Http\Controllers\ModuleEtudiant\AnneeUniversitaireController;
use App\Http\Controllers\PartenaireController;
use App\Livewire\Departements\GiEmploisTables;
use App\Livewire\Departements\GiEnseigantsTables;
use App\Livewire\Departements\GiEnseignantsTables;
use App\Livewire\Departements\GiEtudiantsTables;
use App\Livewire\Departements\GiInscriptionsTables;
use App\Livewire\Departements\GiMatieresTables;
use App\Livewire\Departements\GiProgrammeCoursTables;
use App\Livewire\Departements\ImpEtudiantsTables;
use App\Livewire\Departements\ImpMatieresTables;
use App\Livewire\Departements\SeEmploisTables;
use App\Livewire\Departements\SeEtudiantsTables;
use App\Livewire\Departements\SeMatieresTables;
use App\Livewire\Departements\StEtudiantsTables;
use App\Livewire\Departements\StMatieresTables;
use App\Livewire\Departements\TebEtudiantsTables;
use App\Livewire\Departements\TebMatieresTables;
use App\Livewire\Departements\TlEtudiantsTables;
use App\Livewire\Departements\TlMatieresTables;
use App\Livewire\Etudiants\EntEtudiantsListTables;
use App\Livewire\Etudiants\EntEtudiantsTables;
use App\Livewire\Etudiants\EntInscriptionListTables;
use App\Livewire\Etudiants\EntInscriptionTables;
use App\Livewire\Etudiants\EntMatiereTables;
use App\Livewire\Scolarite\CreateEtudiant;
use App\Livewire\Scolarite\CreateInscription;
use App\Livewire\Scolarite\EditEtudiant;
use App\Livewire\Scolarite\EditInscription;
use App\Livewire\Scolarite\EtudiantTables;
use App\Livewire\Scolarite\InscriptionTables;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// les routes pour les etudiants
Route::prefix('ent-etudiant')->name('etudiant.')->group(function(){
    Route::get("/inscription", EntEtudiantsTables::class)->name('inscription');
    Route::get("/list-inscrit", EntEtudiantsListTables::class)->name('list-inscrit');
    Route::get('/reinscription', EntInscriptionTables::class)->name('reinscription');
    Route::get('/list-reinscrit', EntInscriptionListTables::class)->name('list-reinscrit');
    Route::get('/matiere', EntMatiereTables::class)->name('matiere');
});


/* Routes de l'interface de la scolarité */
Route::prefix('scolarite')->middleware('scolarite')->name('scolarite.')->group(function () {
    Route::get('/etudiants', EtudiantTables::class)->name('etudiant.index');
    Route::get('/etudiants/create', CreateEtudiant::class)->name('etudiant.create');
    Route::get('/etudiant/edit/{etudiant}', EditEtudiant::class)->name('etudiant.edit');

    Route::get('/inscriptions', InscriptionTables::class)->name('inscription.index');
    Route::get('/inscription/create', CreateInscription::class)->name('inscription.create');
    Route::get('/inscritption/edit/{inscription}', EditInscription::class)->name('inscription.edit');
});

/* Routes des interfaces des departements */
Route::prefix('genieinfo')->middleware('genie_info')->name("genieinfo.")->group(function(){
    Route::get("/etudiants", GiEtudiantsTables::class)->name('etudiants');
    Route::get("/matieres", GiMatieresTables::class)->name('matieres');
    Route::get('/pdf', [DepartementController::class, 'pdf'])->name('pdf');
    Route::get("/enseignants", GiEnseignantsTables::class)->name('enseignants');
    Route::get("/enseigners", GiProgrammeCoursTables::class)->name('enseigners');
    Route::get("/inscriptions", GiInscriptionsTables::class)->name('inscriptions');

    // route pour emploi
    Route::get('/emploi-temps', GiEmploisTables::class)->name('emploi-temps');
    Route::post('upload', [EmploiController::class, 'upload'])->name('upload');
});

Route::prefix('scienceenergie')->middleware('s_energie','admin')->name('scienceenergie.')->group(function(){
    Route::get('/etudiants', SeEtudiantsTables::class)->name('etudiantindex');
    Route::get('/matieres', SeMatieresTables::class)->name('matiereindex');
    Route::get('/emploi-temps', SeEmploisTables::class)->name('emploiindex');

});

Route::prefix('sciencetechnique')->middleware('s_technique')->name('sciencetechnique.')->group(function(){
    Route::get('/etudiants', StEtudiantsTables::class)->name('etudiantindex');
    Route::get('/matieres', StMatieresTables::class)->name('matiereindex');
    // Route::get('/emploi-temps', SeEmploisTables::class)->name('emploiindex');

});

Route::prefix('imp')->middleware('imp')->name('imp.')->group(function(){
    Route::get('/etudiants', ImpEtudiantsTables::class)->name('etudiantindex');
    Route::get('/matieres', ImpMatieresTables::class )->name('matiereindex');
    // Route::get('/emploi-temps', SeEmploisTables::class)->name('emploiindex');

});

Route::prefix('teb')->middleware('teb')->name('teb.')->group(function(){
    Route::get('/etudiants', TebEtudiantsTables::class)->name('etudiantindex');
    Route::get('/matieres', TebMatieresTables::class)->name('matiereindex');
    // Route::get('/emploi-temps', SeEmploisTables::class)->name('emploiindex');

});

Route::prefix('techniquelaboratoire')->middleware('t_laboratoire')->name('techniquelaboratoire.')->group(function(){
    Route::get('/etudiants', TlEtudiantsTables::class)->name('etudiantindex');
    Route::get('/matieres', TlMatieresTables::class)->name('matiereindex');
    // Route::get('/emploi-temps', SeEmploisTables::class)->name('emploiindex');

});
/* Fin des routes des interfaces des departements */

/* Routes de l'administrateur */
Route::name('admin.')->group(function () {
    Route::get('homeHome', [HomeController::class, 'homeHome'])->name('homeHome');
    Route::get('dashboard-admin', [HomeController::class, 'dashboardAdmin'])->name('dashboard');
    Route::resource('galerie', GalerieController::class)->except('show');
    Route::resource('article', ArticleController::class)->except('show');
    Route::resource('partenaire', PartenaireController::class)->except('show');
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function() {
    Route::resource('promotion', PromotionController::class)->except('show');
    Route::resource('niveau', NiveauController::class)->except('show');
    Route::resource('semestre', SemestreController::class)->except('show');
    Route::resource('annee_universitaire', AnneeUniversitaireController::class)->except('show');
    Route::resource('matiere', MatiereController::class)->except('show');
    Route::resource('enseignant', EnseignantController::class)->except('show');
    Route::resource('departement', DepartementController::class)->except('show');
    Route::resource('etudiant', EtudiantController::class)->except('show');
    Route::resource('inscription', InscriptionController::class)->except('show');
    Route::resource('programme', ProgrammeController::class)->except('show');

    // import
    Route::post('etudiant/importer',[EtudiantController::class,'importer'])->name('etudiant.importer');
});
/* Fin des routes de l'administrateur */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'deconnection']);
Route::get('/create-account', [HomeController::class, 'formVerification']);
Route::post('/create-account', [HomeController::class, 'verification'])->name('verify-matricule');


// Route::get('/admin', function () {
//     return view('backoffice.dashboard');
// })->name('dashboard')->middleware('admin');


