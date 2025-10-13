<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP - Les inclusions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .code-example {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-left: 6px solid #4e54c8;
            padding: 20px;
            margin: 20px 0;
            font-family: 'Courier New', monospace;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .note {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            border-left: 6px solid #ff9a8b;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .warning {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            border-left: 6px solid #ff6b6b;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .success {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            border-left: 6px solid #5ee7df;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .header-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .comparison-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-radius: 15px;
            padding: 25px;
            margin: 15px 0;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .function-card {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin: 15px 0;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .best-practice {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin: 15px 0;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        body {
            background-color: #f8f9fa;
        }
        h2, h3, h4 {
            color: #4a4a4a;
        }
        .table-custom {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .table-custom th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- En-tête coloré -->
        <div class="header-section text-center">
            <h1 class="display-4 mb-3">🚀 Cours PHP : Les fonctions d'inclusion</h1>
            <p class="lead mb-0">Apprenez à organiser votre code avec include, require et leurs variantes</p>
        </div>
        
        <!-- Introduction -->
        <div class="row mb-4">
            <div class="col">
                <div class="success">
                    <h3>🎯 Pourquoi utiliser les inclusions ?</h3>
                    <p class="mb-0">
                        Les fonctions d'inclusion permettent de diviser votre code PHP en plusieurs fichiers pour une meilleure organisation, réutilisabilité et maintenance.
                    </p>
                </div>
            </div>
        </div>

        <!-- Les 4 fonctions principales -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">🌈 Les 4 fonctions d'inclusion</h2>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="function-card">
                            <h4>📄 include</h4>
                            <p><strong>Inclut et exécute un fichier</strong></p>
                            <ul>
                                <li>Génère un warning si le fichier n'est pas trouvé</li>
                                <li>Le script continue son exécution</li>
                                <li>Idéal pour les éléments non critiques</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="function-card">
                            <h4>🔒 require</h4>
                            <p><strong>Inclut et exécute un fichier</strong></p>
                            <ul>
                                <li>Génère une erreur fatale si le fichier n'est pas trouvé</li>
                                <li>Arrête le script en cas d'erreur</li>
                                <li>Idéal pour les éléments critiques</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="function-card">
                            <h4>📄✌️ include_once</h4>
                            <p><strong>Inclut un fichier une seule fois</strong></p>
                            <ul>
                                <li>Vérifie si le fichier a déjà été inclus</li>
                                <li>Évite les déclarations multiples</li>
                                <li>Génère un warning si erreur</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="function-card">
                            <h4>🔒✌️ require_once</h4>
                            <p><strong>Requiert un fichier une seule fois</strong></p>
                            <ul>
                                <li>Vérifie si le fichier a déjà été inclus</li>
                                <li>Évite les déclarations multiples</li>
                                <li>Génère une erreur fatale si erreur</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Syntaxe et exemples -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">💻 Syntaxe et exemples pratiques</h2>
                
                <h4>Structure de base :</h4>
                <div class="code-example">
                    <pre><code>
// Inclure un fichier de configuration
include 'config.php';

// Requérir un fichier essentiel
require 'database.php';

// Inclure une seule fois (évite les doublons)
include_once 'functions.php';

// Requérir une seule fois (fichier critique)
require_once 'constants.php';
                    </code></pre>
                </div>

                <h4 class="mt-4">Exemple d'organisation de projet :</h4>
                <div class="code-example">
                    <pre><code>
// index.php
&lt;?php
// Fichiers essentiels
require_once 'config/database.php';
require_once 'includes/functions.php';

// En-tête du site
include 'templates/header.php';

// Contenu principal
include 'pages/home.php';

// Pied de page
include 'templates/footer.php';
?&gt;
                    </code></pre>
                </div>
            </div>
        </div>

        <!-- Comparaison détaillée -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">📊 Tableau comparatif détaillé</h2>
                
                <div class="table-responsive table-custom">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fonction</th>
                                <th>Comportement si fichier manquant</th>
                                <th>Continue l'exécution</th>
                                <th>Vérifie les doublons</th>
                                <th>Cas d'utilisation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>include</strong></td>
                                <td>⚠️ Warning (E_WARNING)</td>
                                <td>✅ Oui</td>
                                <td>❌ Non</td>
                                <td>Éléments non critiques (footer, sidebar)</td>
                            </tr>
                            <tr>
                                <td><strong>require</strong></td>
                                <td>🚨 Erreur fatale (E_COMPILE_ERROR)</td>
                                <td>❌ Non</td>
                                <td>❌ Non</td>
                                <td>Fichiers essentiels (config, classes)</td>
                            </tr>
                            <tr>
                                <td><strong>include_once</strong></td>
                                <td>⚠️ Warning (E_WARNING)</td>
                                <td>✅ Oui</td>
                                <td>✅ Oui</td>
                                <td>Fonctions, configuration non critique</td>
                            </tr>
                            <tr>
                                <td><strong>require_once</strong></td>
                                <td>🚨 Erreur fatale (E_COMPILE_ERROR)</td>
                                <td>❌ Non</td>
                                <td>✅ Oui</td>
                                <td>Classes, configuration essentielle</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Exemples concrets -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">🎭 Exemples concrets</h2>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="note">
                            <h5>📝 Exemple avec include :</h5>
                            <div class="code-example">
                                <pre><code>
// Inclure un menu dynamique
include 'menu.php';

// Inclure des publicités
include 'ads/sidebar_ad.php';

// Le script continue même si les fichiers sont manquants
echo "Contenu principal";
                                </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="warning">
                            <h5>⚡ Exemple avec require :</h5>
                            <div class="code-example">
                                <pre><code>
// Connexion à la base de données
require 'config/database.php';

// Classes essentielles
require 'classes/User.php';
require 'classes/Article.php';

// Sans ces fichiers, l'application ne peut pas fonctionner
$user = new User();
                                </code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="success">
                            <h5>🔄 Exemple avec _once :</h5>
                            <div class="code-example">
                                <pre><code>
// Fichier de fonctions
require_once 'utils/functions.php';

// Même si ce fichier est appelé plusieurs fois,
// il ne sera inclus qu'une seule fois
require_once 'utils/functions.php';
require_once 'utils/functions.php';

// Évite les erreurs de redéclaration de fonctions
                                </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="best-practice">
                            <h5>🏗️ Structure recommandée :</h5>
                            <div class="code-example">
                                <pre><code>
// 1. Configuration essentielle
require_once 'config.php';

// 2. Fonctions et classes
require_once 'functions.php';
require_once 'classes/Database.php';

// 3. Éléments de template
include 'header.php';

// 4. Contenu
include 'content.php';

// 5. Pied de page
include 'footer.php';
                                </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bonnes pratiques -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">⭐ Bonnes pratiques</h2>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="note text-center">
                            <h4>📁 Chemins relatifs</h4>
                            <p>Utilisez __DIR__ pour les chemins absolus</p>
                            <div class="code-example">
                                <pre><code>
require_once __DIR__ . '/config.php';
                                </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="warning text-center">
                            <h4>🔐 Sécurité</h4>
                            <p>Ne jamais inclure des fichiers basés sur des entrées utilisateur</p>
                            <div class="code-example">
                                <pre><code>
// ❌ DANGEREUX !
include $_GET['page'] . '.php';

// ✅ SÉCURISÉ
$allowed = ['home', 'about'];
$page = in_array($_GET['page'], $allowed) ? $_GET['page'] : 'home';
include "pages/$page.php";
                                </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="success text-center">
                            <h4>🎯 Organisation</h4>
                            <p>Structurez vos fichiers par type et fonction</p>
                            <div class="code-example">
                                <pre><code>
project/
├── config/
├── includes/
├── templates/
└── pages/
                                </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gestion des erreurs -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">🚨 Gestion des erreurs</h2>
                
                <div class="comparison-card">
                    <h4>🛡️ Vérification avant inclusion</h4>
                    <div class="code-example">
                        <pre><code>
// Vérifier si le fichier existe avant de l'inclure
$config_file = 'config.php';

if (file_exists($config_file)) {
    require_once $config_file;
} else {
    die("Fichier de configuration manquant !");
}

// Alternative avec is_readable
if (is_readable($config_file)) {
    include $config_file;
} else {
    error_log("Fichier non accessible: " . $config_file);
}
                        </code></pre>
                    </div>
                </div>
            </div>
        </div>

        <!-- Résumé final -->
        <div class="row">
            <div class="col">
                <div class="best-practice text-center">
                    <h3>🎓 Résumé des points clés</h3>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="function-card">
                                <h5>📄 include</h5>
                                <p>Pour contenu non critique</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="function-card">
                                <h5>🔒 require</h5>
                                <p>Pour fichiers essentiels</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="function-card">
                                <h5>🔄 _once</h5>
                                <p>Évite les doublons</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="function-card">
                                <h5>📁 __DIR__</h5>
                                <p>Chemins absolus</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 mb-0"><strong>En résumé : Utilisez require_once pour les fichiers critiques et include pour les éléments modulaires !</strong></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>