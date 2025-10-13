<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP - empty() et isset()</title>
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
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Cours PHP : Les fonctions empty() et isset()</h1>
        
        <!-- Introduction -->
        <div class="row mb-4">
            <div class="col">
                <p class="lead">
                    Les fonctions <code>empty()</code> et <code>isset()</code> sont deux fonctions essentielles en PHP pour vérifier l'état des variables.
                </p>
            </div>
        </div>
        
        <!-- Section empty() -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">La fonction empty()</h2>
                <p>
                    La fonction <code>empty()</code> vérifie si une variable est considérée comme vide. Elle retourne <code>true</code> si la variable est vide, et <code>false</code> sinon.
                </p>
                
                <h4 class="mt-4">Quand une variable est-elle considérée comme vide ?</h4>
                <ul>
                    <li>"" (une chaîne vide)</li>
                    <li>0 (0 en tant qu'entier)</li>
                    <li>0.0 (0 en tant que nombre à virgule flottante)</li>
                    <li>"0" (0 en tant que chaîne de caractères)</li>
                    <li>NULL</li>
                    <li>FALSE</li>
                    <li>array() (un tableau vide)</li>
                </ul>
                
                <h4 class="mt-4">Exemples d'utilisation :</h4>
                <div class="code-example">
                    <pre><code>
// Exemple 1
$var = "";
if (empty($var)) {
    echo "La variable est vide";
} else {
    echo "La variable n'est pas vide";
}
// Résultat: La variable est vide

// Exemple 2
$var = 0;
if (empty($var)) {
    echo "La variable est vide";
}
// Résultat: La variable est vide

// Exemple 3
$var = "Bonjour";
if (empty($var)) {
    echo "La variable est vide";
} else {
    echo "La variable n'est pas vide";
}
// Résultat: La variable n'est pas vide
                    </code></pre>
                </div>
            </div>
        </div>
        
        <!-- Section isset() -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">La fonction isset()</h2>
                <p>
                    La fonction <code>isset()</code> vérifie si une variable est définie et n'est pas <code>NULL</code>. Elle retourne <code>true</code> si la variable existe et a une valeur autre que <code>NULL</code>.
                </p>
                
                <h4 class="mt-4">Points importants :</h4>
                <ul>
                    <li>Retourne <code>false</code> si la variable n'existe pas</li>
                    <li>Retourne <code>false</code> si la variable existe mais a la valeur <code>NULL</code></li>
                    <li>Retourne <code>true</code> pour les variables avec une valeur vide (chaîne vide, 0, etc.)</li>
                </ul>
                
                <h4 class="mt-4">Exemples d'utilisation :</h4>
                <div class="code-example">
                    <pre><code>
// Exemple 1
$var = "Bonjour";
if (isset($var)) {
    echo "La variable est définie";
} else {
    echo "La variable n'est pas définie";
}
// Résultat: La variable est définie

// Exemple 2
$var = null;
if (isset($var)) {
    echo "La variable est définie";
} else {
    echo "La variable n'est pas définie";
}
// Résultat: La variable n'est pas définie

// Exemple 3
if (isset($var_non_existante)) {
    echo "La variable est définie";
} else {
    echo "La variable n'est pas définie";
}
// Résultat: La variable n'est pas définie
                    </code></pre>
                </div>
            </div>
        </div>
        
        <!-- Comparaison -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Comparaison entre empty() et isset()</h2>
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Valeur</th>
                                <th>empty()</th>
                                <th>isset()</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$var = ""</td>
                                <td>true</td>
                                <td>true</td>
                            </tr>
                            <tr>
                                <td>$var = null</td>
                                <td>true</td>
                                <td>false</td>
                            </tr>
                            <tr>
                                <td>$var = "0"</td>
                                <td>true</td>
                                <td>true</td>
                            </tr>
                            <tr>
                                <td>$var = 0</td>
                                <td>true</td>
                                <td>true</td>
                            </tr>
                            <tr>
                                <td>$var = false</td>
                                <td>true</td>
                                <td>true</td>
                            </tr>
                            <tr>
                                <td>$var = "Bonjour"</td>
                                <td>false</td>
                                <td>true</td>
                            </tr>
                            <tr>
                                <td>Variable non définie</td>
                                <td>true</td>
                                <td>false</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Bonnes pratiques -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-3">Bonnes pratiques</h2>
                
                <div class="note">
                    <h5>Quand utiliser empty() ?</h5>
                    <p>Utilisez <code>empty()</code> lorsque vous voulez vérifier si une variable contient une valeur "significative" (non vide).</p>
                </div>
                
                <div class="note">
                    <h5>Quand utiliser isset() ?</h5>
                    <p>Utilisez <code>isset()</code> lorsque vous voulez vérifier si une variable existe avant de l'utiliser, pour éviter des erreurs.</p>
                </div>
                
                <h4 class="mt-4">Exemple pratique :</h4>
                <div class="code-example">
                    <pre><code>
// Vérification sécurisée d'un formulaire
if (isset($_POST['email']) && !empty($_POST['email'])) {
    // L'email existe et n'est pas vide
    $email = $_POST['email'];
    // Traitement de l'email
} else {
    // Gérer l'erreur
    echo "Veuillez fournir une adresse email valide";
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
                            <li><code>empty()</code> vérifie si une variable est "vide" (selon la définition de PHP)</li>
                            <li><code>isset()</code> vérifie si une variable existe et n'est pas <code>NULL</code></li>
                            <li>Utilisez <code>isset()</code> avant d'accéder à des variables qui pourraient ne pas exister</li>
                            <li>Utilisez <code>empty()</code> pour vérifier si une variable contient une valeur significative</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>