<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours Sécurité - Injections SQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .code-example {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: #ecf0f1;
            border-left: 6px solid #e74c3c;
            padding: 20px;
            margin: 20px 0;
            font-family: 'Courier New', monospace;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        .danger-section {
            background: linear-gradient(135deg, #c0392b 0%, #e74c3c 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin: 20px 0;
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.3);
        }
        .protection-section {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin: 20px 0;
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.3);
        }
        .warning-note {
            background: linear-gradient(135deg, #f39c12 0%, #f1c40f 100%);
            color: #2c3e50;
            border-left: 6px solid #f39c12;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .example-card {
            background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin: 15px 0;
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
        .impact-badge {
            background: #e74c3c;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
            margin: 0 5px;
        }
        .severity-high { background: #e74c3c; }
        .severity-critical { background: #c0392b; }
        .severity-medium { background: #f39c12; }
        body {
            background-color: #ecf0f1;
            color: #2c3e50;
        }
        .sql-keyword {
            color: #f39c12;
            font-weight: bold;
        }
        .sql-string {
            color: #2ecc71;
        }
        .sql-comment {
            color: #95a5a6;
        }
        .technique-card {
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .technique-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- En-tête -->
        <div class="header-section text-center">
            <h1 class="display-4 mb-3">🚨 Cours Sécurité : Les Injections SQL</h1>
            <p class="lead mb-0">Comprendre les attaques par injection SQL et comment s'en protéger</p>
        </div>

        <!-- Introduction -->
        <div class="row mb-4">
            <div class="col">
                <div class="warning-note">
                    <h3>⚠️ Attention : À des fins éducatives uniquement</h3>
                    <p class="mb-0">
                        Ce cours présente des techniques d'injection SQL dans un but pédagogique. 
                        N'utilisez ces connaissances que pour sécuriser vos propres applications.
                    </p>
                </div>
            </div>
        </div>

        <!-- Qu'est-ce qu'une injection SQL -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">🔍 Qu'est-ce qu'une injection SQL ?</h2>
                <p>
                    Une injection SQL est une technique d'attaque qui permet à un attaquant d'exécuter 
                    des commandes SQL non autorisées en exploitant des failles dans la validation des entrées utilisateur.
                </p>
                
                <div class="example-card">
                    <h4>Exemple de code vulnérable :</h4>
                    <div class="code-example">
                        <pre><code>
// ❌ CODE VULNÉRABLE
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = " . $id;

// Si l'utilisateur envoie: 1; DROP DATABASE products
// La requête devient: SELECT * FROM products WHERE id = 1; DROP DATABASE products
                        </code></pre>
                    </div>
                </div>
            </div>
        </div>

        <!-- Techniques d'injection présentées -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">💥 Techniques d'Injection SQL</h2>
                
                <!-- Technique 1 -->
                <div class="technique-card danger-section">
                    <h4>1. Suppression de base de données <span class="impact-badge severity-critical">CRITIQUE</span></h4>
                    <p>Permet de supprimer entièrement une base de données.</p>
                    <div class="code-example">
                        <pre><code>
<span class="sql-keyword">'</span> ; <span class="sql-keyword">DROP DATABASE</span> nom_bdd;
                        </code></pre>
                    </div>
                    <p><strong>Impact :</strong> Perte totale des données</p>
                </div>

                <!-- Technique 2 -->
                <div class="technique-card danger-section">
                    <h4>2. Insertion de données <span class="impact-badge severity-high">ÉLEVÉ</span></h4>
                    <p>Ajout d'enregistrements non autorisés dans une table.</p>
                    <div class="code-example">
                        <pre><code>
<span class="sql-keyword">'</span> ; <span class="sql-keyword">INSERT INTO</span> category(name) <span class="sql-keyword">VALUE</span> (<span class="sql-string">"hack"</span>);
                        </code></pre>
                    </div>
                    <p><strong>Impact :</strong> Corruption des données, injection de contenu malveillant</p>
                </div>

                <!-- Technique 3 -->
                <div class="technique-card danger-section">
                    <h4>3. Création de table <span class="impact-badge severity-high">ÉLEVÉ</span></h4>
                    <p>Création de tables malveillantes dans la base de données.</p>
                    <div class="code-example">
                        <pre><code>
<span class="sql-keyword">'</span> ; <span class="sql-keyword">create table</span> hack(
    id_hack <span class="sql-keyword">int primary key auto_increment not null</span>, 
    name <span class="sql-keyword">varchar</span>(50)
);
                        </code></pre>
                    </div>
                    <p><strong>Impact :</strong> Modification de la structure de la BDD</p>
                </div>

                <!-- Technique 4 -->
                <div class="technique-card danger-section">
                    <h4>4. Exfiltration de données par UNION <span class="impact-badge severity-critical">CRITIQUE</span></h4>
                    <p>Récupération de données sensibles d'autres tables.</p>
                    <div class="code-example">
                        <pre><code>
<span class="sql-keyword">'</span> <span class="sql-keyword">UNION SELECT</span> email, password <span class="sql-keyword">FROM</span> users <span class="sql-comment">-- '</span>
                        </code></pre>
                    </div>
                    <p><strong>Conditions :</strong> Même nombre de colonnes que la requête originale</p>
                    <p><strong>Impact :</strong> Vol de données sensibles (emails, mots de passe)</p>
                </div>

                <!-- Technique 5 -->
                <div class="technique-card danger-section">
                    <h4>5. Reconnaissance - Version de MySQL <span class="impact-badge severity-medium">MOYEN</span></h4>
                    <p>Récupération d'informations sur le système.</p>
                    <div class="code-example">
                        <pre><code>
<span class="sql-keyword">'</span> <span class="sql-keyword">UNION SELECT</span> version(), 2 <span class="sql-comment">-- '</span>
                        </code></pre>
                    </div>
                    <p><strong>Impact :</strong> Collecte d'informations pour des attaques plus avancées</p>
                </div>
            </div>
        </div>

        <!-- Exemple complet d'exploitation -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">🎯 Scénario d'Attaque Complet</h2>
                
                <div class="example-card">
                    <h4>Étape par étape :</h4>
                    <ol>
                        <li class="mb-3">
                            <strong>Reconnaissance :</strong> Tester la vulnérabilité
                            <div class="code-example mt-2">
                                <pre><code>
http://site.com/product.php?id=1'
                                </code></pre>
                            </div>
                        </li>
                        <li class="mb-3">
                            <strong>Collecte d'infos :</strong> Connaître la version MySQL
                            <div class="code-example mt-2">
                                <pre><code>
http://site.com/product.php?id=1' UNION SELECT version(), 2 -- '
                                </code></pre>
                            </div>
                        </li>
                        <li class="mb-3">
                            <strong>Exfiltration :</strong> Voler les données utilisateurs
                            <div class="code-example mt-2">
                                <pre><code>
http://site.com/product.php?id=1' UNION SELECT email, password FROM users -- '
                                </code></pre>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Protection -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">🛡️ Comment se Protéger ?</h2>
                
                <div class="protection-section">
                    <h4>1. Requêtes Préparées (Prepared Statements)</h4>
                    <p>La méthode la plus efficace pour prévenir les injections SQL.</p>
                    <div class="code-example">
                        <pre><code>
// ✅ CODE SÉCURISÉ - PDO
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute(['id' => $id]);
$results = $stmt->fetchAll();

// ✅ CODE SÉCURISÉ - MySQLi
$stmt = $mysqli->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
                        </code></pre>
                    </div>
                </div>

                <div class="protection-section">
                    <h4>2. Validation des Entrées</h4>
                    <p>Toujours valider et filtrer les données utilisateur.</p>
                    <div class="code-example">
                        <pre><code>
// Validation pour un ID numérique
if (!is_numeric($id)) {
    die("ID invalide");
}

// Filtrage des entrées
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if ($email === false) {
    die("Email invalide");
}
                        </code></pre>
                    </div>
                </div>

                <div class="protection-section">
                    <h4>3. Principe du Moindre Privilège</h4>
                    <p>Utiliser un compte de base de données avec des permissions limitées.</p>
                    <div class="code-example">
                        <pre><code>
-- ❌ COMPTE DANGEREUX
GRANT ALL PRIVILEGES ON *.* TO 'app_user'@'localhost';

-- ✅ COMPTE SÉCURISÉ
GRANT SELECT, INSERT, UPDATE ON ma_base.* TO 'app_user'@'localhost';
-- Pas de DROP, CREATE, ALTER, etc.
                        </code></pre>
                    </div>
                </div>

                <div class="protection-section">
                    <h4>4. Échappement des Caractères</h4>
                    <p>Utiliser les fonctions d'échappement appropriées.</p>
                    <div class="code-example">
                        <pre><code>
// MySQLi
$safe_string = $mysqli->real_escape_string($unsafe_string);

// PDO - Utiliser les paramètres nommés plutôt que l'échappement manuel
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
                        </code></pre>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checklist de sécurité -->
        <div class="row mb-5">
            <div class="col">
                <h2 class="mb-4">✅ Checklist de Sécurité</h2>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="warning-note">
                            <h5>❌ À Éviter</h5>
                            <ul>
                                <li>Concaténation directe de variables dans les requêtes SQL</li>
                                <li>Utilisation de mysql_* functions (dépréciées)</li>
                                <li>Comptes de base de données avec privilèges étendus</li>
                                <li>Messages d'erreur SQL exposés aux utilisateurs</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="protection-section">
                            <h5>✅ Bonnes Pratiques</h5>
                            <ul>
                                <li>Toujours utiliser les requêtes préparées</li>
                                <li>Valider et filtrer toutes les entrées utilisateur</li>
                                <li>Utiliser PDO ou MySQLi</li>
                                <li>Limiter les privilèges des comptes de base de données</li>
                                <li>Journaliser les tentatives d'injection</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Résumé -->
        <div class="row">
            <div class="col">
                <div class="header-section text-center">
                    <h3>🎓 Points Clés à Retenir</h3>
                    <div class="row mt-4">
                        <div class="col-md-4 mb-3">
                            <div class="danger-section text-center">
                                <h5>🚨 Danger</h5>
                                <p>Les injections SQL peuvent détruire vos données</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="warning-note text-center">
                                <h5>💡 Solution</h5>
                                <p>Toujours utiliser les requêtes préparées</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="protection-section text-center">
                                <h5>🛡️ Protection</h5>
                                <p>Valider les entrées + privilèges limités</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 mb-0">
                        <strong>En résumé : Jamais de confiance dans les entrées utilisateur, toujours des requêtes préparées !</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>