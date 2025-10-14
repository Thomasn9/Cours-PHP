<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP - Inscription Utilisateur Sécurisée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .code-example {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: #ecf0f1;
            border-left: 6px solid #3498db;
            padding: 20px;
            margin: 20px 0;
            font-family: 'Courier New', monospace;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        .security-section {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin: 20px 0;
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.3);
        }
        .analysis-section {
            background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin: 20px 0;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }
        .header-section {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .function-highlight {
            background: #e74c3c;
            color: white;
            padding: 3px 8px;
            border-radius: 5px;
            font-family: monospace;
        }
        .demo-section {
            background: linear-gradient(135deg, #f39c12 0%, #f1c40f 100%);
            color: #2c3e50;
            padding: 25px;
            border-radius: 15px;
            margin: 20px 0;
        }
        .php-keyword {
            color: #f39c12;
            font-weight: bold;
        }
        .php-function {
            color: #3498db;
        }
        .php-variable {
            color: #9b59b6;
        }
        .php-string {
            color: #2ecc71;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        
        <!-- En-tête du cours -->
        <div class="header-section text-center">
            <h1 class="display-4 mb-3">🔐 Cours PHP - Inscription Utilisateur Sécurisée</h1>
            <p class="lead mb-0">Analyse d'un formulaire d'inscription avec mesures de sécurité</p>
        </div>

        <!-- Formulaire fonctionnel -->
        <div class="demo-section">
            <h2 class="text-center mb-4">🎯 Démonstration Live</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="card-title text-center">Formulaire d'Inscription</h4>
                            
                            <?php
                            // Inclusion des fichiers nécessaires
                            include "database.php";
                            include "tools.php";

                            // Traitement du formulaire
                            if (isset($_POST["submit"])) {
                                $result = add_user2();
                            }

                            function add_user2()
                            {
                                if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"])) {
                                    return "❌ Veuillez remplir les 4 champs";
                                }

                                foreach ($_POST as $key => $value) {
                                    $_POST[$key] = sanitize($value);
                                }
                                
                                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                                    return "❌ Email au mauvais format";
                                }

                                // Debug du mot de passe (à retirer en production)
                                dump($_POST["password"]);
                                $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                                dump($_POST["password"]);

                                save_user($_POST);
                                return "✅ Le compte " . $_POST["email"] . " a bien été créé";
                            }
                            ?>

                            <form action="" method="post">
                                <div class="mb-3">
                                    <input type="text" name="firstname" class="form-control" placeholder="Saisir le prénom" value="<?= $_POST['firstname'] ?? '' ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="lastname" class="form-control" placeholder="Saisir le nom" value="<?= $_POST['lastname'] ?? '' ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Saisir l'email" value="<?= $_POST['email'] ?? '' ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Saisir le mot de passe">
                                </div>
                                <div class="d-grid">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Créer le compte">
                                </div>
                            </form>
                            
                            <?php if (isset($result)): ?>
                                <div class="alert alert-info mt-3 text-center">
                                    <?= $result ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analyse du code -->
        <div class="analysis-section">
            <h2 class="mb-4">🔍 Analyse du Code</h2>
            
            <h4>Structure générale :</h4>
            <div class="code-example">
                <pre><code>
<span class="php-keyword">&lt;?php</span>
<span class="php-keyword">include</span> <span class="php-string">"database.php"</span>;
<span class="php-keyword">include</span> <span class="php-string">"tools.php"</span>;

<span class="php-keyword">if</span> (<span class="php-function">isset</span>(<span class="php-variable">$_POST</span>[<span class="php-string">"submit"</span>])) {
    <span class="php-variable">$result</span> = <span class="php-function">add_user2</span>();
}

<span class="php-keyword">function</span> <span class="php-function">add_user2</span>() {
    <span class="php-comment">// ... logique de validation et traitement</span>
}
<span class="php-keyword">?&gt;</span>
                </code></pre>
            </div>
        </div>

        <!-- Mesures de sécurité analysées -->
        <div class="security-section">
            <h2 class="mb-4">🛡️ Mesures de Sécurité Implémentées</h2>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">✅ Validation des champs requis</h5>
                            <div class="code-example">
                                <pre><code>
if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || 
    empty($_POST["email"]) || empty($_POST["password"])) {
    return "veuillez remplir les 4 champs";
}
                                </code></pre>
                            </div>
                            <p class="card-text"><strong>Objectif :</strong> S'assurer que tous les champs obligatoires sont remplis</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">✅ Nettoyage des données</h5>
                            <div class="code-example">
                                <pre><code>
foreach ($_POST as $key => $value) {
    $_POST[$key] = sanitize($value);
}
                                </code></pre>
                            </div>
                            <p class="card-text"><strong>Objectif :</strong> Échapper les caractères dangereux et prévenir les injections</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">✅ Validation de l'email</h5>
                            <div class="code-example">
                                <pre><code>
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    return "email au mauvais format";
}
                                </code></pre>
                            </div>
                            <p class="card-text"><strong>Objectif :</strong> Vérifier le format correct de l'adresse email</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">✅ Hashage du mot de passe</h5>
                            <div class="code-example">
                                <pre><code>
$_POST["password"] = password_hash(
    $_POST["password"], 
    PASSWORD_DEFAULT
);
                                </code></pre>
                            </div>
                            <p class="card-text"><strong>Objectif :</strong> Stocker le mot de passe de manière sécurisée</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fonctions utilisées -->
        <div class="analysis-section">
            <h2 class="mb-4">🔧 Fonctions Clés Expliquées</h2>
            
            <div class="mb-4">
                <h5><span class="function-highlight">sanitize()</span> - Nettoyage des données</h5>
                <p>Cette fonction (définie dans tools.php) devrait normalement :</p>
                <div class="code-example">
                    <pre><code>
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
                    </code></pre>
                </div>
            </div>
            
            <div class="mb-4">
                <h5><span class="function-highlight">password_hash()</span> - Sécurisation des mots de passe</h5>
                <p>Utilise l'algorithme bcrypt par défaut pour créer un hash sécurisé :</p>
                <div class="code-example">
                    <pre><code>
// Avant hashage: "monMotDePasse123"
// Après hashage: "$2y$10$8sA2b5c7d9e1f3g5h7j9k1l3m5n7o9p1..."

$hash = password_hash($password, PASSWORD_DEFAULT);
                    </code></pre>
                </div>
            </div>
            
            <div class="mb-4">
                <h5><span class="function-highlight">save_user()</span> - Sauvegarde en base</h5>
                <p>Cette fonction (définie dans database.php) devrait utiliser des requêtes préparées :</p>
                <div class="code-example">
                    <pre><code>
function save_user($userData) {
    $stmt = $pdo->prepare(
        "INSERT INTO users (firstname, lastname, email, password) 
         VALUES (?, ?, ?, ?)"
    );
    return $stmt->execute([
        $userData['firstname'],
        $userData['lastname'], 
        $userData['email'],
        $userData['password']
    ]);
}
                    </code></pre>
                </div>
            </div>
        </div>

        <!-- Bonnes pratiques supplémentaires -->
        <div class="security-section">
            <h2 class="mb-4">💡 Améliorations Possibles</h2>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title">🔒 Validation côté serveur</h5>
                            <p>Ajouter des règles de validation spécifiques :</p>
                            <div class="code-example">
                                <pre><code>
// Longueur minimale du mot de passe
if (strlen($_POST["password"]) < 8) {
    return "Le mot de passe doit faire au moins 8 caractères";
}
                                </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title">📧 Vérification email unique</h5>
                            <p>Vérifier que l'email n'existe pas déjà :</p>
                            <div class="code-example">
                                <pre><code>
if (email_exists($_POST["email"])) {
    return "Cet email est déjà utilisé";
}
                                </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title">🛡️ Protection CSRF</h5>
                            <p>Ajouter un token de sécurité :</p>
                            <div class="code-example">
                                <pre><code>
&lt;input type="hidden" name="csrf_token" 
       value="&lt;?= $_SESSION['csrf_token'] ?&gt;"&gt;
                                </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Résumé pédagogique -->
        <div class="header-section">
            <h3 class="text-center mb-4">🎓 Points Clés à Retenir</h3>
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5>✅ Validation</h5>
                            <p class="mb-0">Toujours valider les données côté serveur</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5>✅ Nettoyage</h5>
                            <p class="mb-0">Échapper les données avant traitement</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5>✅ Hashage</h5>
                            <p class="mb-0">Jamais de mots de passe en clair</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5>✅ Préparation</h5>
                            <p class="mb-0">Requêtes préparées pour la BDD</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>