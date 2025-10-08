<?php
include "../views/view_header.php";

echo "========================\\Exo 1//================================ <br/>";

// Déclaration d'un tableau de nombres
$tab = [10,33,-5,26,52,47,896,123,1,-24,76,25];

function valeurMax($tab){
    // On initialise la variable max avec le premier élément du tableau
    $max = $tab[0];
    
    // On parcourt tous les éléments du tableau
    for ($i = 0 ; $i < count($tab); $i ++){
        // Si l'élément courant est plus grand que le max actuel
        if ($max < $tab[$i]){
            // On met à jour le max avec cette nouvelle valeur
            $max = $tab[$i];
        }
    }

    echo "la valeur la plus grande est $max";
    // On retourne la valeur maximale trouvée
    return $max;
}

// Appel de la fonction et affichage du résultat
echo valeurMax($tab) ,"<br/>";


echo "========================\\Exo 2//================================ <br/>";

function calculerMoyenne($tab) {
    
    // ===== PHASE 1 : CALCUL DE LA SOMME =====
    // Initialisation de l'accumulateur de somme à zéro
    $somme = 0;
    
    // Parcours séquentiel de tous les éléments du tableau
    // L'index $i part de 0 et va jusqu'à count($tab)-1
    for ($i = 0; $i < count($tab); $i++) {
        // Ajout de l'élément courant à la somme cumulative
        // L'opérateur += équivaut à : $somme = $somme + $tab[$i]
        $somme += $tab[$i];
    }
    // À ce stade, $somme contient la totalité des valeurs additionnées
    
    // ===== PHASE 2 : CALCUL DE LA MOYENNE =====
    // Division de la somme totale par le nombre d'éléments
    // Formule mathématique : moyenne = somme / nombre_d'éléments
    $moyenne = $somme / count($tab);

    // Retour du résultat final
    return $moyenne;
}

// Appel de la fonction avec le tableau $tab et affichage du résultat
echo calculerMoyenne($tab), "<br/>";


echo "========================\\Exo 3//================================ <br/>";

function valeurMin($tab){
    // NOTE: Le nom de variable 'max' est trompeur, on devrait utiliser 'min'
    $max = $tab[0]; // Cette variable devrait s'appeler $min pour plus de clarté
    
    // On parcourt tous les éléments du tableau
    for ($i = 0 ; $i < count($tab); $i ++){
        // Si l'élément courant est plus petit que le min actuel
        if ($max > $tab[$i]){
            // On met à jour le min avec cette nouvelle valeur
            $max = $tab[$i];
        }
    }
    // On retourne la valeur minimale trouvée
    return $max;
}

// Appel de la fonction et affichage du résultat
echo valeurMin($tab);

?>