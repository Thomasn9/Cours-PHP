<?php

//version avec 1 seule boucle
function add_notes()
{
    $notes = [];
    $nbr_notes = readline("Combien voulez-vous ajouter de notes ?\n");
    $index_min = 0;
    $index_max = 0;
    $note_min = 100000;
    $note_max = 0;
    for ($i = 0; $i < $nbr_notes; $i++) {
        $notes[$i]["prenom"] = readline("Saisir le prénom de l'éléve \n");
        $notes[$i]["note"] = readline("Saisir la note de l'éléve \n");
        //test de la note_max
        if ($notes[$i]["note"] > $note_max) {
            $index_max = $i;
            $note_max = $notes[$i]["note"];
        }
        //test de la note_min
        if ($notes[$i]["note"] < $note_min) {
            $index_min = $i;
            $note_min = $notes[$i]["note"];
        }
    }
    echo "l'éléve : " . $notes[$index_max]["prenom"] . " a la meilleure note : " . $notes[$index_max]["note"] . "\n";
    echo "l'éléve : " . $notes[$index_min]["prenom"] . " a la moins bonne note : " . $notes[$index_min]["note"] . "\n";
}

//version avec 2 boucles
function add_notes_v2() {
    $notes = [];
    $nbr_notes = readline("Combien voulez-vous ajouter de notes ?\n");
    //création des notes
    for ($i = 0; $i < $nbr_notes; $i++) { 
        $notes[$i]["prenom"] = readline("Saisir le prénom de l'éléve \n");
        $notes[$i]["note"] = readline("Saisir la note de l'éléve \n");
    }
    $index_min = 0;
    $index_max = 0;
    //traitement min et max
    for ($i = 0; $i < count($notes) ; $i++) {
        //calcul du max
        if ($notes[$i]['note'] > $notes[$index_max]['note']) {
            $index_max = $i;

        }
        if ($notes[$i]['note'] < $notes[$index_min]['note']) {
            $index_min = $i;
        }
    }
    echo "l'éléve : " . $notes[$index_max]["prenom"] . " a la meilleure note : " . $notes[$index_max]["note"] . "\n";
    echo "l'éléve : " . $notes[$index_min]["prenom"] . " a la moins bonne note : " . $notes[$index_min]["note"] . "\n";
}
add_notes_v2();
add_notes();