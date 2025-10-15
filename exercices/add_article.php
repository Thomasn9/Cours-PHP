<?php

include "article_request.php";
include "tools.php";


$categories = get_all_categories();

if($_POST["submit"]){
    dd($_POST);
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
    <h2>Ajouter un article</h2>
    <form action="" method="post">
        <input type="text" name="title" placeholder="sisir le nom de l'article">
        <textarea name="content" id="texteArea" placeholder="saisir le contenue de l'article"></textarea>
        <select name="categories[]" id="" multiple>
            <?php foreach ($categories as $category): ?>
                <option value="<?=$category["id"]?>"><?=$category["name"]?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="ajouter" name="submit">


    </form>
</body>

</html>