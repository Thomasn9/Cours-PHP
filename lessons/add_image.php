<?php
include "../views/view_header.php";
include '../vendor/autoload.php';

/**
 * Méthode qui retourne l'extension d'un fichier
 * @param string $file nom du fichier
 * @return string extension du fichier
 */
function getFileExtension($file)
{
    return substr(strrchr($file, '.'), 1);
}


if (isset($_POST["submit"])){
    $old_name = $_FILES["image"]["name"];
    $ext = getFileExtension($old_name);
    $new_name = uniqid("img").".".$ext;

    if($_FILES["image"]["size"] > (100 * 1024 * 1024)){
        return "l'image est trop grosse !!";
    }else if($ext != "png" || $ext != "PNG" || $ext != "jpg" || $ext != "jpeg"){
        echo "Le format n'est pas pris en compte";
    }
    // dd($old_name,$ext,$new_name);

    move_uploaded_file($_FILES["image"]["tmp_name"],"../public/asset/".$_FILES["image"]["name"]);
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="importer" name="submit">
    </form>

</body>

</html>