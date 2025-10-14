<?php
include '../vendor/autoload.php';
include "../views/view_header.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__,"../.env");
$dotenv->safeLoad();

function connectBDD(): PDO
{
    return
        new PDO('mysql:host=' . $_ENV["DB_HOST"] . ';dbname=' . $_ENV["DB_NAME"] . '', 
        $_ENV["DB_USERNAME"] , 
        $_ENV["DB_PASSWORD"] , 
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

// dd(connectBDD());

// ================================================================================================

function save_user(array $user){
    // requete sql
    $sql = "INSERT INTO users(firstname,lastname,email,`password`) VALUES (?,?,?,?)";
    try{
        // préparation de la requete sql
    $bdd = connectBDD()->prepare($sql);
    // assigner les parametres
    $bdd->bindParam(1,$user["firstname"],PDO::PARAM_STR);
    $bdd->bindParam(2,$user["lastname"],PDO::PARAM_STR);
    $bdd->bindParam(3,$user["email"],PDO::PARAM_STR);
    $bdd->bindParam(4,$user["password"],PDO::PARAM_STR);

    // exectution
    $bdd->execute();

    }catch(Exception $e){
        echo $e->getMessage();
    }
    

}

?>