<?php
include "../views/view_header.php";

//Import (obligatoire)
require '../vendor/autoload.php';
echo "Hello World";

//variable
$name = "Mathieu";
//affichage d'une variable
echo $name;
//constante
const DATE = "2025-10-08";
//mise à jour d'une variable
$name = "Mithridate";
echo $name;
//dump avec le dumper de symfony
//dump(DATE);
// dump + die avec le dumper de symfony
//dd(DATE);

/*    echo DATE;
   //echo avec var_dump
   echo "<pre>";
   var_dump(DATE, $name);
   echo "</pre>";
 */
$nbr1 = 10;
$nbr2 = 20;
if ($nbr1 != $nbr2) {

} else if ($nbr1 < 0) {

} else {
}

switch ($variable) {
    case 'value':
        # code...
        break;

    default:
        # code...
        break;
}
//exemple boucle while
$cpt = 10;
while ($cpt > 0) {
    echo $cpt;
    $cpt--;
}
//exemple boucle for
for ($i = 0; $i < $cpt; $i++) {
    # code...
}
//Tableau indexé
$tab = [10, 25, 30, 44];


foreach ($tab as $key => $value) {
    echo $value;
}

//tableau associatif :
$tabAsso = ["nom" => "Mathieu", "email" => "test@test.com"];

//appel de fonction
nom(10, "texte");

//création d'une fonction (typage entrée (params) et sortie (return))
function nom(int $nb1, string $text): string
{
    return $nb1 . $text;
}