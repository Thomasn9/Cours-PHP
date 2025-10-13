<?php
include "../views/view_header.php";

    //Test si le formulaire est submit
    if (isset($_POST["submit"])) {
        $result = calculatrice();
    }


    function calculatrice() {
        //test si les 3 champs sont remplis
        if ($_POST["nbr1"] == "" || $_POST["nbr2"] == "" || empty($_POST["operateur"])) {
            return "Veuillez remplir tous les champs";
        } 

        if (!is_numeric($_POST["nbr1"]) || !is_numeric($_POST["nbr2"])) {
            return "veuillez saisir des nombres";
        }

        //switch pour les opérations
        switch ($_POST["operateur"]) {
            case 'add':
                return $_POST["nbr1"] . " + "  . $_POST["nbr2"] . " = " . ($_POST["nbr1"] + $_POST["nbr2"]);
            case 'sous':
                return $_POST["nbr1"] . " - "  . $_POST["nbr2"] . " = " . ($_POST["nbr1"] - $_POST["nbr2"]);
            case 'div':
                if ($_POST["nbr2"] == 0) {
                    return "Division par zéro impossible";
                }
                return $_POST["nbr1"] . " / "  . $_POST["nbr2"] . " = " . ($_POST["nbr1"] / $_POST["nbr2"]);
            case 'multi':
                return $_POST["nbr1"] . " x "  . $_POST["nbr2"] . " = " . ($_POST["nbr1"] * $_POST["nbr2"]);
            default:
                return "autre opérateur";
        }
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
</head>

<body>
    <h2>Calculer</h2>
    <form action="" method="post">
        <input type="text" name="nbr1" placeholder="Saisir un nombre">
        <input type="text" name="nbr2" placeholder="Saisir un nombre">
        <input type="text" name="operateur" placeholder="Saisir un operateur (add, sous, multi, div)">
        <input type="submit" value="calculer" name="submit">
    </form>
    <p><?= $result ?? ""?></p>
</body>

</html>