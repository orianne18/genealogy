<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer une personne</title>
</head>
<body>

    <form action="{{ url('createPerson') }}" method="POST">
        @csrf
        <label for="first_name">Prénom : </label>
        <input type="text" name="first_name" id="first_name" required="required">
        <br>
        <br>
        <label for="last_name">Nom : </label>
        <input type="text" name="last_name" id="last_name" required="required">
        <br>
        <br>
        <label for="birth_name">Nom de naissance : </label>
        <input type="text" name="birth_name" id="birth_name" required="required">
        <br>
        <br>
        <label for="middle_names">Autres prénoms: </label>
        <input type="text" name="middle_names" id="middle_names">
        <br>
        <br>
        <label for="date_of_birth">Date de naissance : </label>
        <input type="date" name="date_of_birth" id="date_of_birth" required="required">
        <br>
        <br>
        <input type="submit" value="Envoyer">
    </form>

</body>
</html>
