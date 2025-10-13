<?php
include "../views/view_header.php";

//Tester si le formulaire est submit
if (isset($_POST["submit"])) {
    //Tester si les 3 champs sont remplis
    if (!empty($_POST["prix_ht"]) && !empty($_POST["quantite"]) && !empty($_POST["tva"])) {
        //Tester si les 3 champs sont des nombres
        if (is_numeric($_POST["prix_ht"]) && is_numeric($_POST["quantite"]) && is_numeric($_POST["tva"])) {
            $result = $_POST["prix_ht"] * $_POST["quantite"] * ($_POST["tva"] / 100 + 1) . "€";
        } else {
            $result = "Veuillez saisir des nombres dans les 3 champs";
        }
    } else {
        $result = "Veuillez remplir les 3 champs";
    }
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire POST exercice 1</title>
</head>
<body>
    <h1>Calculer le prix TTC</h1>
    <form action="" method="post">
        <input type="text" name="prix_ht" placeholder="Saisir le prix HT">
        <input type="text" name="quantite" placeholder="Saisir la quantite de produit">
        <input type="text" name="tva" placeholder="Saisir le taux de TVA : 20 pour 20%">
        <input type="submit" value="calculer" name="submit">
    </form>
    <p><?= $result ?? ""?></p>
</body>
</html>