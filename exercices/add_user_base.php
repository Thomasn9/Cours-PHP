<?php
include "../views/view_header.php";
include "database_exo.php";
include "tools.php";

if (isset($_POST["submit"])) {

    $result = add_user2();
}

function add_user2()
{
    if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        return "veuillez remplire les 4 champs";
    }

    foreach ($_POST as $key => $value) {
        $_POST[$key] = sanitize($value);
    }

    $ispwd = verify_password($_POST['password']);
    if ($ispwd !== true) {
        return $ispwd;
    }

    if ($_POST["password"] !== $_POST["password2"]) {
        return "les mots de passe ne sont pas pareil !";
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        return "email au mauvais format";
    }

    if (is_user_exists($_POST["email"])) {
        // il ne faut pas etre uassi precis sur les message d'erreur pour des raison de sécuriter et ne pas indiquer que l'adresse mail est utiliser
        return "cet email est deja utiliser";
    }

    dump($_POST["password"]);
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
    dump($_POST["password"]);


    save_user($_POST);
    return "le compt " . $_POST["email"] . "a bien été créer";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter un utilisateur</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="firstname" placeholder="saisir le prenom"><br>
        <input type="text" name="lastname" placeholder="saisir le nom"><br>
        <input type="email" name="email" placeholder="saisir l'email"><br>
        <input type="password" name="password" placeholder="saisir le mot de passe"><br>
        <input type="password" name="password2" placeholder="Confirmer le mot de passe"><br>
        <input type="submit" name="submit" value="envoyer">
    </form>
    <p><?= $result ?? "" ?></p>
</body>

</html>