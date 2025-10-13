<?php
include "../views/view_header.php";

//Tester si le formulaire est submit
if (isset($_POST["submit"])) {
    $result = traitement();
}

//Function pour réaliser le traitement du formulaire
function traitement() {
    //Test si un des champs est vide
    if (empty($_POST["prix_ht"]) || empty($_POST["quantite"]) || empty($_POST["tva"])) {
        return "Veuillez remplir tous les champs du formulaire";
    }
    //Test si un des champs n'est pas nombre
    if (!is_numeric($_POST["prix_ht"]) || !is_numeric($_POST["quantite"]) || !is_numeric($_POST["tva"])) {
        return "Veuillez saisir des nombres";
    }
    //Retourner le résultat du calcul
    return $_POST["prix_ht"] * $_POST["quantite"] * ($_POST["tva"] /100 + 1) . "€";
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