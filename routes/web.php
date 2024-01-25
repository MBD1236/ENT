<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalerieController;
use App\Http\Controllers\GenieInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleEtudiant\DepartementController;
use App\Http\Controllers\ModuleEtudiant\EnseignantController;
use App\Http\Controllers\ModuleEtudiant\EtudiantController;
use App\Http\Controllers\ModuleEtudiant\InscriptionController;
use App\Http\Controllers\moduleEtudiant\MatiereController;
use App\Http\Controllers\ModuleEtudiant\NiveauController;
use App\Http\Controllers\ModuleEtudiant\ProgrammeController;
use App\Http\Controllers\ModuleEtudiant\PromotionController;
use App\Http\Controllers\moduleEtudiant\SemestreController;
use App\Http\Controllers\ModuleEtudiant\SessionController;
use App\Http\Controllers\PartenaireController;
use App\Livewire\Departements\GiEmploisTables;
use App\Livewire\Departements\GiEtudiantsTables;
use App\Livewire\Departements\GiMatieresTables;
use App\Livewire\Departements\SeEmploisTables;
use App\Livewire\Departements\SeEtudiantsTables;
use App\Livewire\Departements\SeMatieresTables;
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

/* Routes de l'interface de la scolarité */
Route::prefix('scolarite')->name('scolarite.')->group(function () {
    Route::get('/etudiants', EtudiantTables::class)->name('etudiant.index');
    Route::get('/etudiants/create', CreateEtudiant::class)->name('etudiant.create');
    Route::get('/etudiant/edit/{etudiant}', EditEtudiant::class)->name('etudiant.edit');

    Route::get('/inscriptions', InscriptionTables::class)->name('inscription.index');
    Route::get('/inscription/create', CreateInscription::class)->name('inscription.create');
    Route::get('/inscritption/edit/{inscription}', EditInscription::class)->name('inscription.edit');
});

/* Routes des interfaces des departements */
Route::prefix('genieinfo')->name("genieinfo.")->group(function(){
    Route::get("/etudiants", GiEtudiantsTables::class)->name('etudiantindex');
    Route::get("/matieres", GiMatieresTables::class)->name('matiereindex');
    Route::get('/list', [DepartementController::class, 'pdf'])->name('pdf');


    Route::get('/emploi-temps', GiEmploisTables::class)->name('emploiindex');
});

Route::prefix('scienceenergie')->name('scienceenergie.')->group(function(){
    Route::get('/etudiants', SeEtudiantsTables::class)->name('etudiantindex');
    Route::get('/matieres', SeMatieresTables::class)->name('matiereindex');
    Route::get('/emploi-temps', SeEmploisTables::class)->name('emploiindex');

});
/* Fin des routes des interfaces des departements */


Route::get('/', function () {
    return view('frontoffice.home');
});

Route::get('/admin', function () {
    return view('backoffice.home');
});


Route::name('admin.')->group(function () {
    Route::resource('home', HomeController::class)->except('create','store','edit','update','destroy','show');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('galerie', GalerieController::class)->except('show');
    Route::resource('article', ArticleController::class)->except('show');
    Route::resource('partenaire', PartenaireController::class)->except('show');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('promotion', PromotionController::class)->except('show');
    Route::resource('niveau', NiveauController::class)->except('show');
    Route::resource('semestre', SemestreController::class)->except('show');
    Route::resource('session', SessionController::class)->except('show');
    Route::resource('matiere', MatiereController::class)->except('show');
    Route::resource('enseignant', EnseignantController::class)->except('show');
    Route::resource('departement', DepartementController::class)->except('show');
    Route::resource('etudiant', EtudiantController::class)->except('show');
    Route::resource('inscription', InscriptionController::class)->except('show');
    Route::resource('programme', ProgrammeController::class)->except('show');

    // import
    Route::post('etudiant/importer',[EtudiantController::class,'importer'])->name('etudiant.importer');
});