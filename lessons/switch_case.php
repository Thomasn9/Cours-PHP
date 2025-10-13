<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP - switch case</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .code-example {
            background-color: #f8f9fa;
            border-left: 4px solid #0d6efd;
            padding: 15px;
            margin: 15px 0;
            font-family: monospace;
        }
        .note {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 15px 0;
        }
        .warning {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 15px 0;
        }
        .comparison-table th, .comparison-table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Cours PHP : La structure switch case</h1>
        
        <!-- Introduction -->
        <div class="row mb-4">
            <div class="col">
                <p class="lead">
                    La structure <code>switch case</code> est une alternative aux structures conditionnelles <code>if...elseif...else</code> lorsqu'on doit tester plusieurs valeurs possibles pour une même variable.
                </p>
            </div>
        </div>
        
        <!-- Syntaxe de base -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Syntaxe de base</h2>
                <p>
                    La structure <code>switch</code> évalue une expression et compare sa valeur avec différents cas (<code>case</code>). Lorsqu'une correspondance est trouvée, le bloc de code correspondant est exécuté.
                </p>
                
                <div class="code-example">
                    <pre><code>
switch (expression) {
    case valeur1:
        // Code à exécuter si expression == valeur1
        break;
    case valeur2:
        // Code à exécuter si expression == valeur2
        break;
    case valeur3:
        // Code à exécuter si expression == valeur3
        break;
    default:
        // Code à exécuter si aucune correspondance
}
                    </code></pre>
                </div>
            </div>
        </div>
        
        <!-- Exemple simple -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Exemple simple</h2>
                
                <div class="code-example">
                    <pre><code>
$jour = "Lundi";

switch ($jour) {
    case "Lundi":
        echo "C'est le début de la semaine";
        break;
    case "Mardi":
        echo "Deuxième jour de travail";
        break;
    case "Mercredi":
        echo "Milieu de semaine";
        break;
    case "Jeudi":
        echo "Bientôt le week-end";
        break;
    case "Vendredi":
        echo "Dernier jour de travail";
        break;
    default:
        echo "C'est le week-end !";
}
// Résultat: "C'est le début de la semaine"
                    </code></pre>
                </div>
            </div>
        </div>
        
        <!-- Importance du break -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">L'importance du mot-clé <code>break</code></h2>
                <p>
                    Le mot-clé <code>break</code> est essentiel dans une structure <code>switch</code>. Sans <code>break</code>, l'exécution continuera dans les cas suivants (ce qu'on appelle "fall-through").
                </p>
                
                <div class="warning">
                    <h5>Attention à l'oubli du break !</h5>
                    <p>Si vous oubliez le <code>break</code>, tous les cas suivants seront exécutés jusqu'à rencontrer un <code>break</code> ou la fin du <code>switch</code>.</p>
                </div>
                
                <h4 class="mt-4">Exemple sans break :</h4>
                <div class="code-example">
                    <pre><code>
$note = "B";

switch ($note) {
    case "A":
        echo "Excellent";
    case "B":
        echo "Très bien";
    case "C":
        echo "Bien";
    case "D":
        echo "Passable";
    default:
        echo "Note non reconnue";
}
// Résultat: "Très bienBienPassableNote non reconnue"
                    </code></pre>
                </div>
                
                <h4 class="mt-4">Exemple correct avec break :</h4>
                <div class="code-example">
                    <pre><code>
$note = "B";

switch ($note) {
    case "A":
        echo "Excellent";
        break;
    case "B":
        echo "Très bien";
        break;
    case "C":
        echo "Bien";
        break;
    case "D":
        echo "Passable";
        break;
    default:
        echo "Note non reconnue";
}
// Résultat: "Très bien"
                    </code></pre>
                </div>
            </div>
        </div>
        
        <!-- Utilisation de plusieurs cas pour un même traitement -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Regroupement de plusieurs cas</h2>
                <p>
                    On peut regrouper plusieurs cas qui doivent exécuter le même code en les listant les uns après les autres sans <code>break</code> entre eux.
                </p>
                
                <div class="code-example">
                    <pre><code>
$mois = "Février";

switch ($mois) {
    case "Décembre":
    case "Janvier":
    case "Février":
        echo "C'est l'hiver";
        break;
    case "Mars":
    case "Avril":
    case "Mai":
        echo "C'est le printemps";
        break;
    case "Juin":
    case "Juillet":
    case "Août":
        echo "C'est l'été";
        break;
    case "Septembre":
    case "Octobre":
    case "Novembre":
        echo "C'est l'automne";
        break;
    default:
        echo "Mois non valide";
}
// Résultat: "C'est l'hiver"
                    </code></pre>
                </div>
            </div>
        </div>
        
        <!-- Comparaison stricte -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Comparaison stricte</h2>
                <p>
                    Le <code>switch</code> utilise une comparaison <strong>stricte</strong> (===) entre l'expression et chaque cas. Les types doivent donc correspondre.
                </p>
                
                <div class="code-example">
                    <pre><code>
$valeur = "1";

switch ($valeur) {
    case 1:
        echo "Cas 1 (entier)";
        break;
    case "1":
        echo "Cas '1' (chaîne)";
        break;
    default:
        echo "Aucune correspondance";
}
// Résultat: "Cas '1' (chaîne)"
                    </code></pre>
                </div>
                
                <div class="note">
                    <h5>Important : Comparaison stricte</h5>
                    <p>Contrairement à certaines structures conditionnelles, le <code>switch</code> utilise l'opérateur <code>===</code> et non <code>==</code>. Les types doivent donc être identiques.</p>
                </div>
            </div>
        </div>
        
        <!-- Utilisation avancée -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Utilisations avancées</h2>
                
                <h4 class="mt-4">Avec des expressions dans les cas :</h4>
                <div class="code-example">
                    <pre><code>
$age = 25;

switch (true) {
    case $age < 18:
        echo "Mineur";
        break;
    case $age >= 18 && $age < 65:
        echo "Adulte";
        break;
    case $age >= 65:
        echo "Senior";
        break;
    default:
        echo "Âge non valide";
}
// Résultat: "Adulte"
                    </code></pre>
                </div>
                
                <h4 class="mt-4">Avec des fonctions :</h4>
                <div class="code-example">
                    <pre><code>
$typeFichier = "jpg";

switch (strtolower($typeFichier)) {
    case "jpg":
    case "jpeg":
        echo "Image JPEG";
        break;
    case "png":
        echo "Image PNG";
        break;
    case "gif":
        echo "Image GIF";
        break;
    case "pdf":
        echo "Document PDF";
        break;
    default:
        echo "Type de fichier non supporté";
}
// Résultat: "Image JPEG"
                    </code></pre>
                </div>
            </div>
        </div>
        
        <!-- Comparaison switch vs if -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Comparaison : <code>switch</code> vs <code>if...elseif</code></h2>
                
                <div class="table-responsive">
                    <table class="table table-striped comparison-table">
                        <thead>
                            <tr>
                                <th>Aspect</th>
                                <th>switch case</th>
                                <th>if...elseif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Comparaison</td>
                                <td>Stricte (===)</td>
                                <td>Peut être souple (==) ou stricte (===)</td>
                            </tr>
                            <tr>
                                <td>Lisibilité</td>
                                <td>Meilleure pour multiples valeurs</td>
                                <td>Meilleure pour conditions complexes</td>
                            </tr>
                            <tr>
                                <td>Performance</td>
                                <td>Optimisé pour multiples cas</td>
                                <td>Optimisé pour peu de conditions</td>
                            </tr>
                            <tr>
                                <td>Flexibilité</td>
                                <td>Limitée aux comparaisons d'égalité</td>
                                <td>Conditions complexes possibles</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <h4 class="mt-4">Quand utiliser switch ?</h4>
                <ul>
                    <li>Lorsque vous testez une variable contre plusieurs valeurs spécifiques</li>
                    <li>Lorsque les conditions sont simples (égalités)</li>
                    <li>Pour améliorer la lisibilité du code</li>
                </ul>
                
                <h4 class="mt-4">Quand utiliser if...elseif ?</h4>
                <ul>
                    <li>Lorsque vous avez des conditions complexes</li>
                    <li>Lorsque vous testez différentes variables</li>
                    <li>Lorsque vous avez besoin d'opérateurs de comparaison variés</li>
                </ul>
            </div>
        </div>
        
        <!-- Bonnes pratiques -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Bonnes pratiques</h2>
                
                <div class="note">
                    <h5>Toujours utiliser break</h5>
                    <p>Sauf si vous voulez explicitement un comportement de "fall-through".</p>
                </div>
                
                <div class="note">
                    <h5>Inclure un cas default</h5>
                    <p>Pour gérer les valeurs non prévues, même si vous pensez avoir couvert tous les cas.</p>
                </div>
                
                <div class="note">
                    <h5>Commenter les fall-through intentionnels</h5>
                    <p>Si vous omettez volontairement un <code>break</code>, commentez-le pour indiquer que c'est intentionnel.</p>
                </div>
                
                <h4 class="mt-4">Exemple de bonne pratique :</h4>
                <div class="code-example">
                    <pre><code>
$status = 404;

switch ($status) {
    case 200:
        echo "OK - Requête réussie";
        break;
    case 301:
        echo "Redirection permanente";
        break;
    case 302:
        echo "Redirection temporaire";
        break;
    case 404:
        echo "Page non trouvée";
        break;
    case 500:
        echo "Erreur serveur";
        break;
    default:
        // Journaliser les codes non gérés
        error_log("Code HTTP non géré: " . $status);
        echo "Erreur inconnue";
        break;
}
                    </code></pre>
                </div>
            </div>
        </div>
        
        <!-- Résumé -->
        <div class="row">
            <div class="col">
                <div class="card bg-light">
                    <div class="card-body">
                        <h3 class="card-title">Résumé</h3>
                        <ul>
                            <li>Le <code>switch</code> est idéal pour tester une variable contre plusieurs valeurs spécifiques</li>
                            <li>Utilisez <code>break</code> pour éviter l'exécution des cas suivants</li>
                            <li>Le <code>switch</code> utilise une comparaison stricte (===)</li>
                            <li>Regroupez les cas pour un même traitement</li>
                            <li>Toujours inclure un cas <code>default</code> pour gérer les valeurs inattendues</li>
                            <li>Préférez <code>switch</code> pour la lisibilité avec de multiples valeurs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>