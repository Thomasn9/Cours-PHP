<?php
function sanitize(string $value): string
    {
        return htmlspecialchars(strip_tags(trim($value)), ENT_NOQUOTES);
    }

    function verify_password(string $password){
        
    if (!preg_match("/[a-z]/", $password)) {
        return "Le mot de passe doit comporter au moins une minuscule";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return "Le mot de passe doit comporter au moins une majuscule";
    }
    if (!preg_match("/\d/", $password)) {
        return "Le mot de passe doit comporter au moins un chiffre";
    }
    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{12,}$/";
    if (preg_match($pattern, $password) !== 1) {
        return "Le mot de passe ne correspond pas au pattern demandé";
    }
    return true;
}
?>