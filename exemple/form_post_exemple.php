<?php
    //test si le formulaire
    if (isset($_POST["submit"])) {
        //test si les 2 champs sont remplis
        if (!empty($_POST["firstname"]) && !empty($_POST["lastname"])) {
            //Dump de la super gobale POST
            var_dump($_POST);
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire GET</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="firstname" placeholder="saisir le prénom">
        <input type="text" name="lastname" placeholder="saisir le nom">
        <input type="submit" value="envoyer" name="submit">
    </form>
</body>
</html>


<!-- ================================================================================================== -->

<?php
include 'vendor/autoload.php';
//$resultat = "";
    //test si le formulaire
    if (isset($_POST["submit"])) {
        //test si les 2 champs sont remplis
        if (!empty($_POST["lastname"])) {
            //Dump de la super gobale POST
            $resultat = $_POST["firstname"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire GET</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="firstname" placeholder="saisir le prénom">
        <input type="text" name="lastname" placeholder="saisir le nom">
        <input type="submit" value="envoyer" name="submit">
        <p><?= $resultat??""?></p>
    </form>
</body>
</html>