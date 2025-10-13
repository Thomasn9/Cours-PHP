<?php

echo "===========================================\\EXO 1//===========================================";


if(isset($_POST["submit"])){
    if(!empty($_POST["prix_ht"]) && !empty($_POST["nombre_article"]) && !empty($_POST["tva"])){
        $prix_ht = $_POST["prix_ht"];
        $nbr_art = $_POST["nombre_article"];
        $tva = $_POST["tva"];
        $resultat = $prix_ht * $tva * $nbr_art;
    }else{
        $message1 = "veuillez remplire tout les champs";;
    }
}else{
    $message2 = "il faut saisir des valeur numérique";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="prix_ht">Prix hors taxes</label>
        <input type="number" method="post" name="prix_ht" placeholder="Prix Hors taxe"><br/>
        <label for="nombre_article">Nombre article</label>
        <input type="number" method="post" name="nombre_article" placeholder="nombre article"><br/>
        <label for="tva">TVA</label>
        <input type="number" method="post" name="tva" placeholder="TVA"><br/>
        <input type="submit" value="Total" name="submit"> <br>
        <p>le prix TTC est égale à : <?= $resultat??""?> en €</p>
        <p><?= $message1??""?></p>
        <p><?= $message2??""?></p>
        
    </form>
</body>
</html>