##  Gestion des Importations des etudiants

-L'importation des données depuis un fichier Excel dans une table de base de données Laravel peut être réalisée de manière assez simple en utilisant des bibliothèques comme Maatwebsite Excel. Voici une approche générale pour effectuer cette tâche :
1- Installer le package:
    -Installer le package Maatwebsite via composer : "composer require maatwebsite/excel"
2- Configuration:
    -Ajouter le service provider et la façade Excel dans votre fichier 'config/app.php' :
                        'providers' => [
                            Maatwebsite\Excel\ExcelServiceProvider::class,
                        ],
                        'aliases' => [
                            'Excel' => Maatwebsite\Excel\Facades\Excel::class,
                        ]
    -Publier la configuration du package :
        php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider"
3- Modèle et Table
    -Assurer vous que vous avez un modèle Eloquent correspondant à votre table etudiant
4- Ecrire une classe d'importation :
    -Créez une classe d'importation pour définir comment les données doivent être importées dans la table etudiant. Cette classe doit implémenter l'interface 'ToModel' de Maatwebsite Excel

    // app/Imports/EtudiantImport.php
    use Illuminate\Support\Collection;
    use Maatwebsite\Excel\Concerns\ToModel;
    use App\Etudiant;

    class EtudiantImport implements ToModel
    {
        public function model(array $row)
        {
            return new Etudiant([
                'nom' => $row[0],
                'prenom' => $row[1],
                'ine' => $row[2],
                ...
            ]);
        }
    }
5- Controlleur pour l'importation :
    -Créez un contrôleur qui gérera le processus d'importation :

        use Excel;
        use App\Imports\EtudiantImport;

        class EtudiantController extends Controller
        {
            public function import() {
                Excel::import(new EtudiantImport, 'nom_de_votre_fichier_excel.xlsx');
                return redirect()->route('');
            }
        }
6- Routes :
    -Déclarez une route pour déclencher le processus d'importation dans votre fichier 'web.php':
        -Route::get('/import-etudiants','EtudiantController@import')->name('import_etudiants');
7- Lancer l'importation :
    -Visitez '/import-etudiants' dans votre navigateur pour déclencher l'importation
-Assurez-vous que les colonnes dans votre fichier Excel correspondent à l'ordre que vous avez défini dans votre classe 'EtudiantImport'


## Gestion

$etudiant_id = auth()->user()->matricule;

$etudiant = Etudiant::findOrFail($etudiant_id);
$etudiant->tuteur = $request->validated('tuteur');
$etudiant->extrait_naissance = $request->validated('extrait_naissance');
$etudiant->diplome_bac = $request->validated('diplome_bac');
$etudiant->photo = $request->validated('photo');

$etudiant-> save();

$inscription = new Inscription([
    'promotion' => $request->validated('promotion'),
    'niveau' => $request->validated('niveau'),
    'session' => $request->validated('session'),
    ...
]);

$etudiant->inscription()->save($inscription);