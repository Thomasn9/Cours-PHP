<?php
include "database_exo.php";

function add_article(array $article){
    $sql = "INSERT INTO article(title,content) VALUE(?,?)";

    $bdd = connectBDD()->prepare($sql);

    $bdd->bindParam(1,$article["title"],PDO::PARAM_STR);
    $bdd->bindParam(2,$article["content"],PDO::PARAM_STR);

    $bdd->execute();

    $id_article = connectBDD()->lastInsertId('article');

    foreach($article["categories"] as $category){
        $sql_article_category = "INSERT INTO article_category(id_article, id_category) VALUE(?,?)";

        $bdd_article = connectBDD()->prepare($sql_article_category);

        $bdd_article->bindParam(1,$id_article,PDO::PARAM_INT);
        $bdd_article->bindParam(2,$id_article,PDO::PARAM_INT);

        $bdd_article->execute();
    }
}


function get_all_categories(){
    $sql = "SELECT c.id, c.name_category AS name FROM category AS c ORDER BY `name` ASC";
    $bdd = connectBDD()->prepare($sql);
    $bdd->execute();
    $categories = $bdd->fetchAll(PDO::FETCH_ASSOC)
;
return $categories;
}

?>