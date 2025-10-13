<?php
include "../views/view_header.php";


if (isset($_POST["submit"])) {
    $operateur = $_POST["operateur"];
        $nombre1 = $_POST["nombre_1"];
        $nombre2 = $_POST["nombre_2"];
        $result = "";
    if ($nombre1!=="" && $nombre2!==""&& $operateur!==""){
        switch ($operateur) {
            case 'add':
                $result = $_POST["nombre_1"] . "+" . $_POST["nombre_2"] . "=" . $_POST["nombre_1"] + $_POST["nombre_2"];
                break;

            case 'sous':
                $result = $_POST["nombre_1"] . "-" . $_POST["nombre_2"] . "=" . $_POST["nombre_1"] - $_POST["nombre_2"];
                break;

            case 'multi':
                $result = $_POST["nombre_1"] . "x" . $_POST["nombre_2"] . "=" . $_POST["nombre_1"] * $_POST["nombre_2"];
                break;

            case 'div':
                if($nombre2!= 0){
                    $result = $_POST["nombre_1"] . "/" . $_POST["nombre_2"] . "=" . $_POST["nombre_1"] - $_POST["nombre_2"];
                }else{
                    $result = "on ne peut pas diviser par 0 ";
                }
                break;

            default:
                echo "nop nop !";
                break;
        }
    }else{
        $result = "les champs sont vides";
    }
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
        <label for="prix_ht">Nombre 1</label>
        <input type="text" name="nombre_1" placeholder="Nombre 1"><br />

        <label for="nombre_article">Nombre 2</label>
        <input type="text" name="nombre_2" placeholder="Nombre 2"><br />

        <label for="nombre_article">Opérateur</label>
        <input type="text" name="operateur" placeholder="choisis un opérateur"><br />

        <input type="submit" value="Calcule" name="submit"> <br>
        <p><?= $result ?? "" ?></p>
    </form>
</body>

</html>