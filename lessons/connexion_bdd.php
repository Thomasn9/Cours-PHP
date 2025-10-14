<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP : Connexion BDD avec Dotenv et PDO</title>
    <style>
        :root {
            --primary: #4a6fa5;
            --secondary: #166088;
            --accent: #4fc3a1;
            --light: #f8f9fa;
            --dark: #343a40;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .course-header {
            background: var(--accent);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        .main-content {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .sidebar {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            height: fit-content;
        }

        h2 {
            color: var(--primary);
            margin: 1.5rem 0 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--accent);
        }

        h3 {
            color: var(--secondary);
            margin: 1.2rem 0 0.8rem;
        }

        p {
            margin-bottom: 1rem;
        }

        .code-block {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            overflow-x: auto;
            font-family: 'Consolas', 'Courier New', monospace;
            line-height: 1.4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .code-comment {
            color: #6a9955;
            font-style: italic;
        }

        .code-keyword {
            color: #569cd6;
            font-weight: bold;
        }

        .code-string {
            color: #ce9178;
        }

        .code-variable {
            color: #9cdcfe;
        }

        .code-function {
            color: #dcdcaa;
        }

        .code-number {
            color: #b5cea8;
        }

        .code-class {
            color: #4ec9b0;
        }

        .note {
            background: #fff9e6;
            border-left: 4px solid var(--warning);
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0 4px 4px 0;
        }

        .tip {
            background: #e8f4fd;
            border-left: 4px solid var(--primary);
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0 4px 4px 0;
        }

        .warning {
            background: #ffeaea;
            border-left: 4px solid var(--danger);
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0 4px 4px 0;
        }

        .table-of-contents {
            list-style-type: none;
        }

        .table-of-contents li {
            margin-bottom: 0.5rem;
        }

        .table-of-contents a {
            color: var(--dark);
            text-decoration: none;
            display: block;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .table-of-contents a:hover {
            background: var(--light);
            color: var(--primary);
        }

        .key-points ul {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .key-points li {
            margin-bottom: 0.5rem;
        }

        footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1.5rem;
            color: #6c757d;
            border-top: 1px solid #dee2e6;
        }

        .concept-explanation {
            display: flex;
            align-items: flex-start;
            margin: 1.5rem 0;
        }

        .concept-icon {
            background: var(--accent);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .concept-text {
            flex: 1;
        }

        .env-example {
            background: #2d3748;
            color: #e2e8f0;
            padding: 1rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            font-family: 'Consolas', 'Courier New', monospace;
        }

        .function-card {
            background: var(--light);
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            border-left: 4px solid var(--primary);
        }

        .security-badge {
            display: inline-block;
            background: var(--success);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <header class="course-header">
        <div class="container">
            <h1>Connexion BDD avec Dotenv et PDO</h1>
            <p class="subtitle">Gestion sécurisée des connexions base de données en PHP</p>
            <div class="mt-4">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content-grid">
            <main class="main-content">
                <section id="introduction">
                    <h2>Introduction</h2>
                    <p>Ce code présente une implémentation sécurisée de connexion à une base de données MySQL en utilisant PDO (PHP Data Objects) et la gestion des variables d'environnement avec la bibliothèque Dotenv.</p>

                    <div class="note">
                        <h3>Architecture du code :</h3>
                        <ul>
                            <li><strong>Configuration sécurisée</strong> avec Dotenv pour les informations sensibles</li>
                            <li><strong>Connexion PDO</strong> avec gestion des erreurs</li>
                            <li><strong>Requêtes préparées</strong> pour prévenir les injections SQL</li>
                            <li><strong>Fonctions réutilisables</strong> pour l'interaction avec la BDD</li>
                        </ul>
                    </div>
                </section>

                <section id="code-original">
                    <h2>Code Original</h2>
                    <p>Voici le code complet de gestion de la base de données :</p>

                    <div class="code-block">
                        <span class="code-comment">&lt;?php</span><br>
                        <span class="code-variable">include</span> <span class="code-string">'../vendor/autoload.php'</span>;<br>
                        <br>
                        <span class="code-variable">$dotenv</span> = <span class="code-class">Dotenv\Dotenv</span>::<span class="code-function">createImmutable</span>(<span class="code-variable">__DIR__</span>, <span class="code-string">"../.env"</span>);<br>
                        <span class="code-variable">$dotenv</span>-&gt;<span class="code-function">safeLoad</span>();<br>
                        <br>
                        <span class="code-keyword">function</span> <span class="code-function">connectBDD</span>(): <span class="code-class">PDO</span><br>
                        {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">new</span> <span class="code-class">PDO</span>(<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-string">'mysql:host='</span> . <span class="code-variable">$_ENV</span>[<span class="code-string">"DB_HOST"</span>] . <span class="code-string">';dbname='</span> . <span class="code-variable">$_ENV</span>[<span class="code-string">"DB_NAME"</span>] . <span class="code-string">''</span>,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$_ENV</span>[<span class="code-string">"DB_USERNAME"</span>],<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$_ENV</span>[<span class="code-string">"DB_PASSWORD"</span>],<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<span class="code-class">PDO</span>::<span class="code-variable">ATTR_ERRMODE</span> =&gt; <span class="code-class">PDO</span>::<span class="code-variable">ERRMODE_EXCEPTION</span>]<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;);<br>
                        }<br>
                        <br>
                        <span class="code-comment">// ================================================================================================</span><br>
                        <br>
                        <span class="code-keyword">function</span> <span class="code-function">save_user</span>(<span class="code-keyword">array</span> <span class="code-variable">$user</span>)<br>
                        {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// requete sql</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$sql</span> = <span class="code-string">"INSERT INTO users(firstname,lastname,email,`password`) VALUES (?,?,?,?)"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">try</span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// préparation de la requete sql</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span> = <span class="code-function">connectBDD</span>()-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// assigner les parametres</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">1</span>, <span class="code-variable">$user</span>[<span class="code-string">"firstname"</span>], <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">2</span>, <span class="code-variable">$user</span>[<span class="code-string">"lastname"</span>], <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">3</span>, <span class="code-variable">$user</span>[<span class="code-string">"email"</span>], <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">4</span>, <span class="code-variable">$user</span>[<span class="code-string">"password"</span>], <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// exectution</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>();<br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;} <span class="code-keyword">catch</span> (<span class="code-class">Exception</span> <span class="code-variable">$e</span>) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">echo</span> <span class="code-variable">$e</span>-&gt;<span class="code-function">getMessage</span>();<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        <br>
                        }<br>
                        <br>
                        <span class="code-keyword">function</span> <span class="code-function">is_user_exists</span>(<span class="code-keyword">string</span> <span class="code-variable">$email</span>): <span class="code-keyword">bool</span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$sql</span> = <span class="code-string">"SELECT u.id FROM users AS u WHERE u.email= ?"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span> = <span class="code-function">connectBDD</span>()-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">//assigner les parametres</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">1</span>, <span class="code-variable">$email</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">//executer</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>();<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">//test si le tableau est vide ou non</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$data</span> = <span class="code-variable">$bdd</span>-&gt;<span class="code-function">fetch</span>(<span class="code-class">PDO</span>::<span class="code-variable">FETCH_ASSOC</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (!<span class="code-function">empty</span>(<span class="code-variable">$data</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-keyword">true</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-keyword">false</span>;<br>
                        }<br>
                        <br>
                        <span class="code-comment">?&gt;</span>
                    </div>
                </section>

                <section id="explication-detaille">
                    <h2>Explication Détaillée</h2>

                    <div class="concept-explanation">
                        <div class="concept-icon">1</div>
                        <div class="concept-text">
                            <h3>Configuration Dotenv</h3>
                            <p>Utilisation de la bibliothèque Dotenv pour charger les variables d'environnement depuis un fichier <code>.env</code>.</p>
                            <div class="code-block">
                                <span class="code-variable">$dotenv</span> = <span class="code-class">Dotenv\Dotenv</span>::<span class="code-function">createImmutable</span>(<span class="code-variable">__DIR__</span>, <span class="code-string">"../.env"</span>);<br>
                                <span class="code-variable">$dotenv</span>-&gt;<span class="code-function">safeLoad</span>();
                            </div>
                            <div class="env-example">
                                <span class="code-comment"># Fichier .env</span><br>
                                DB_HOST=localhost<br>
                                DB_NAME=ma_base_de_donnees<br>
                                DB_USERNAME=mon_utilisateur<br>
                                DB_PASSWORD=mon_mot_de_passe_secret
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">2</div>
                        <div class="concept-text">
                            <h3>Connexion PDO Sécurisée</h3>
                            <p>La fonction <code>connectBDD()</code> établit une connexion sécurisée avec gestion des erreurs.</p>
                            <div class="code-block">
                                <span class="code-keyword">new</span> <span class="code-class">PDO</span>(<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-string">'mysql:host='</span> . <span class="code-variable">$_ENV</span>[<span class="code-string">"DB_HOST"</span>] . <span class="code-string">';dbname='</span> . <span class="code-variable">$_ENV</span>[<span class="code-string">"DB_NAME"</span>],<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$_ENV</span>[<span class="code-string">"DB_USERNAME"</span>],<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$_ENV</span>[<span class="code-string">"DB_PASSWORD"</span>],<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;[<span class="code-class">PDO</span>::<span class="code-variable">ATTR_ERRMODE</span> =&gt; <span class="code-class">PDO</span>::<span class="code-variable">ERRMODE_EXCEPTION</span>]<br>
                                );
                            </div>
                            <p><span class="security-badge">SÉCURITÉ</span> Les informations sensibles sont stockées dans des variables d'environnement</p>
                        </div>
                    </div>

                    <div class="function-card">
                        <h3>Fonction save_user()</h3>
                        <p>Sauvegarde un nouvel utilisateur dans la base de données avec des requêtes préparées.</p>
                        <div class="code-block">
                            <span class="code-variable">$sql</span> = <span class="code-string">"INSERT INTO users(firstname,lastname,email,`password`) VALUES (?,?,?,?)"</span>;<br>
                            <span class="code-variable">$bdd</span> = <span class="code-function">connectBDD</span>()-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">1</span>, <span class="code-variable">$user</span>[<span class="code-string">"firstname"</span>], <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            <span class="code-comment">// ... autres bindParam</span><br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>();
                        </div>
                        <p><span class="security-badge">SÉCURITÉ</span> Utilisation de requêtes préparées pour prévenir les injections SQL</p>
                    </div>

                    <div class="function-card">
                        <h3>Fonction is_user_exists()</h3>
                        <p>Vérifie si un utilisateur existe déjà dans la base de données par son email.</p>
                        <div class="code-block">
                            <span class="code-variable">$sql</span> = <span class="code-string">"SELECT u.id FROM users AS u WHERE u.email= ?"</span>;<br>
                            <span class="code-variable">$bdd</span> = <span class="code-function">connectBDD</span>()-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">1</span>, <span class="code-variable">$email</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>();<br>
                            <span class="code-variable">$data</span> = <span class="code-variable">$bdd</span>-&gt;<span class="code-function">fetch</span>(<span class="code-class">PDO</span>::<span class="code-variable">FETCH_ASSOC</span>);<br>
                            <span class="code-keyword">return</span> !<span class="code-function">empty</span>(<span class="code-variable">$data</span>);
                        </div>
                    </div>
                </section>

                <section id="bonnes-pratiques">
                    <h2>Bonnes Pratiques et Améliorations</h2>

                    <div class="tip">
                        <h3>Améliorations Recommandées</h3>
                        <ul>
                            <li><strong>Gestion des erreurs :</strong> Retourner <code>false</code> ou lever une exception au lieu d'afficher l'erreur</li>
                            <li><strong>Singleton :</strong> Implémenter un pattern Singleton pour éviter les multiples connexions</li>
                            <li><strong>Validation :</strong> Valider les données avant insertion</li>
                            <li><strong>Transactions :</strong> Utiliser les transactions pour les opérations multiples</li>
                        </ul>
                    </div>

                    <div class="code-block">
                        <span class="code-comment">// Version améliorée avec gestion d'erreurs</span><br>
                        <span class="code-keyword">function</span> <span class="code-function">save_user</span>(<span class="code-keyword">array</span> <span class="code-variable">$user</span>): <span class="code-keyword">bool</span><br>
                        {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">try</span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$sql</span> = <span class="code-string">"INSERT INTO users(firstname,lastname,email,password) VALUES (?,?,?,?)"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$stmt</span> = <span class="code-function">connectBDD</span>()-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-variable">$stmt</span>-&gt;<span class="code-function">execute</span>([<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$user</span>[<span class="code-string">'firstname'</span>],<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$user</span>[<span class="code-string">'lastname'</span>],<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$user</span>[<span class="code-string">'email'</span>],<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$user</span>[<span class="code-string">'password'</span>]<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;} <span class="code-keyword">catch</span> (<span class="code-class">PDOException</span> <span class="code-variable">$e</span>) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// Logger l'erreur</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-keyword">false</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        }
                    </div>

                    <div class="warning">
                        <h3>Points d'Attention</h3>
                        <ul>
                            <li>Le mot de passe doit être hashé avant d'être stocké (avec <code>password_hash()</code>)</li>
                            <li>Le fichier <code>.env</code> doit être ajouté au <code>.gitignore</code></li>
                            <li>Vérifier que les champs de la table correspondent aux noms utilisés</li>
                            <li>Gérer les emails en doublon avec des contraintes UNIQUE en base</li>
                        </ul>
                    </div>
                </section>
            </main>

            <aside class="sidebar">
                <div class="table-of-contents">
                    <h3>Table des Matières</h3>
                    <ul>
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#code-original">Code Original</a></li>
                        <li><a href="#explication-detaille">Explication Détaillée</a></li>
                        <li><a href="#bonnes-pratiques">Bonnes Pratiques</a></li>
                    </ul>
                </div>

                <div class="key-points">
                    <h3>Points Clés</h3>
                    <ul>
                        <li>Utilisation de Dotenv pour la configuration</li>
                        <li>Connexion PDO avec gestion d'erreurs</li>
                        <li>Requêtes préparées contre les injections SQL</li>
                        <li>Type hinting pour les paramètres et retours</li>
                        <li>Séparation des préoccupations</li>
                    </ul>
                </div>

                <div class="resources">
                    <h3>Ressources</h3>
                    <ul>
                        <li><a href="https://www.php.net/manual/fr/book.pdo.php" target="_blank">Documentation PDO</a></li>
                        <li><a href="https://github.com/vlucas/phpdotenv" target="_blank">Bibliothèque Dotenv</a></li>
                        <li><a href="https://www.php.net/manual/fr/pdo.prepare.php" target="_blank">PDO::prepare()</a></li>
                        <li><a href="https://www.php.net/manual/fr/pdostatement.bindparam.php" target="_blank">bindParam()</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>Cours sur la connexion BDD avec Dotenv et PDO - Projet Recueil de Cours</p>
        </div>
    </footer>
</body>

</html>