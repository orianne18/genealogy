<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des personnes</title>
</head>
<body>

    <h1>Liste des personnes</h1>

    <table>

        <thead>
          <tr>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Créé(e) par</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($people as $person )
            <tr>
                <td>{{$person->first_name}}</td>
                <td>{{$person->last_name}}</td>
                <td>{{$person->creator->first_name}} {{$person->creator->last_name}}</td>
              </tr>
            @endforeach

        </tbody>
      </table>

</body>
</html>
