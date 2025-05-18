<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genealogy</title>
</head>
<body>

    <h1>{{$person->first_name}} {{$person->last_name}}</h1>
    <h2>Parents</h2>
    <table>
        <tbody>
            @foreach ($person->parents as $parent)
                <tr>
                    <td>{{ $parent->first_name }} {{ $parent->last_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Enfants</h2>
    <table>
        <tbody>
            @foreach ($person->children as $child)
                <tr>
                    <td>{{ $child->first_name }} {{ $child->last_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
