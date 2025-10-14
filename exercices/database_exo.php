<?php
include '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, "../.env");
$dotenv->safeLoad();

function connectBDD(): PDO
{
    return
        new PDO(
            'mysql:host=' . $_ENV["DB_HOST"] . ';dbname=' . $_ENV["DB_NAME"] . '',
            $_ENV["DB_USERNAME"],
            $_ENV["DB_PASSWORD"],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
}

// ================================================================================================

function save_user(array $user)
{
    // requete sql
    $sql = "INSERT INTO users(firstname,lastname,email,`password`) VALUES (?,?,?,?)";
    try {
        // préparation de la requete sql
        $bdd = connectBDD()->prepare($sql);
        // assigner les parametres
        $bdd->bindParam(1, $user["firstname"], PDO::PARAM_STR);
        $bdd->bindParam(2, $user["lastname"], PDO::PARAM_STR);
        $bdd->bindParam(3, $user["email"], PDO::PARAM_STR);
        $bdd->bindParam(4, $user["password"], PDO::PARAM_STR);

        // exectution
        $bdd->execute();

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

function is_user_exists(string $email): bool {
    $sql = "SELECT u.id FROM users AS u WHERE u.email= ?";
    $bdd = connectBDD()->prepare($sql);
    //assigner les parametres
    $bdd->bindParam(1, $email, PDO::PARAM_STR);
    //executer
    $bdd->execute();
    //test si le tableau est vide ou non
    $data = $bdd->fetch(PDO::FETCH_ASSOC);
    if (!empty($data)) {
        return true;
    }
    return false;
}

?>