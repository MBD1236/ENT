<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="{{ $_SERVER["DOCUMENT_ROOT"].'/backend/assets/bootstrap-3.3.7/dist/css/bootstrap.min.css' }}">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="row" style="border: 1px solid black;padding:5px;">
            <div class="col-xs-4">
                   <h5 class="text-uppercase" style="font-size: 16px">Institut Supérieur <br> de Technologie de Mamou</h5>

                   <p style="margin-top:20px">
                    <span>BP : 63/Email:astourep@gmail.com</span>
                    <span>Tel : 621 22 34 63</span>
                </p>
            </div>
            <div class="col-xs-2 text-center" style="padding-left:35px">
               <img style="width:100px" src="{{ $_SERVER["DOCUMENT_ROOT"].'/backend/assets/img/istmamou.jpg'  }}" alt="">
           </div>
           <div class="col-xs-4 text-right">
               <h5 class="text-uppercase" style="font-size: 16px">République de Guinée</h5>
               <span style="color:red" class="label">Travail</span> - <span style="color:yellow" class="label">Justice</span> - <span style="color:green" class="label">Solidarité</span>

               <p style="margin-top:20px">Ministère de l'Enseignement Supérieur de la
                    Recherche Scientifique et de l'Innovation
                </p>
           </div>
       </div>
    </div>
    <div class="text-center bg-primary text-uppercase" style="margin-top:10px">Liste des etudiants</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N°</th>
                <th>INE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Niveau</th>
                <th>Promotion</th>
                <th>Programme</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscriptions as $k => $inscription)
            <tr>
                <td>{{ $k+1 }}</td>
                <td>{{ $inscription->etudiant->ine}}</td>
                <td>{{ $inscription->etudiant->nom}}</td>
                <td>{{ $inscription->etudiant->prenom}}</td>
                <td>{{ $inscription->niveau->niveau}}</td>
                <td>{{ $inscription->promotion->promotion}}</td>
                <td>{{ $inscription->programme->programme}}</td>
            </tr>
            @endforeach
        </tbody>
       </table>
</body>
</html>