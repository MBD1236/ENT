<!-- resources/views/pdf/view.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Liste des étudiants</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Liste des étudiants</h1>

    <table>
        <thead>
            <tr>
                <!-- Entêtes du tableau -->
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
                <!-- Lignes du tableau -->
            @endforeach
        </tbody>
    </table>
</body>
</html>
