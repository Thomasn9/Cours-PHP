<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bases de la syntaxe PHP</title>
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
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            line-height: 1.4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .code-comment {
            color: #75715e;
        }
        
        .code-keyword {
            color: #f92672;
        }
        
        .code-string {
            color: #e6db74;
        }
        
        .code-variable {
            color: #a6e22e;
        }
        
        .example-form {
            background: var(--light);
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            border-left: 4px solid var(--accent);
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        input[type="submit"] {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }
        
        input[type="submit"]:hover {
            background: var(--secondary);
        }
        
        .output {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 4px;
            padding: 1rem;
            margin-top: 1rem;
            font-family: 'Courier New', monospace;
            white-space: pre-wrap;
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
    </style>
</head>
<body>
     <header class="course-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Formulaire POST en PHP</h1>
            <p class="subtitle">Traitement des données de formulaire avec la méthode POST</p>
            <div class="mt-4">
            </div>
        </div>
    </header> 
    <div class="container">
        <div class="content-grid">
            <main class="main-content">
                <section id="introduction">
                    <h2>Introduction</h2>
                    <p>Les formulaires sont un élément essentiel de toute application web interactive. Ils permettent aux utilisateurs de soumettre des données qui peuvent être traitées par le serveur. En PHP, nous pouvons récupérer ces données via les superglobales <code>$_GET</code> et <code>$_POST</code>.</p>
                    
                    <p>Dans ce cours, nous allons nous concentrer sur la méthode POST, qui est généralement utilisée pour envoyer des données sensibles ou volumineuses, car contrairement à GET, les données ne sont pas visibles dans l'URL.</p>
                </section>
                
                <section id="code-original">
                    <h2>Code Original</h2>
                    <p>Voici le code PHP/HTML que vous avez fourni :</p>
                    
                    <div class="code-block">
                        <span class="code-comment">&lt;?php</span><br>
                        <span class="code-comment">    //test si le formulaire</span><br>
                        <span class="code-keyword">if</span> (<span class="code-variable">isset</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"submit"</span>])) {<br>
                        <span class="code-comment">    //test si les 2 champs sont remplis</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (!<span class="code-variable">empty</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"firstname"</span>]) && !<span class="code-variable">empty</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"lastname"</span>])) {<br>
                        <span class="code-comment">        //Dump de la super gobale POST</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">var_dump</span>(<span class="code-variable">$_POST</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        <br>
                        }<br>
                        <span class="code-comment">?&gt;</span><br>
                        <span class="code-comment">&lt;!DOCTYPE html&gt;</span><br>
                        <span class="code-comment">&lt;html lang="en"&gt;</span><br>
                        <span class="code-comment">&lt;head&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">&lt;meta charset="UTF-8"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">&lt;title&gt;Formulaire GET&lt;/title&gt;</span><br>
                        <span class="code-comment">&lt;/head&gt;</span><br>
                        <span class="code-comment">&lt;body&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">&lt;form action="" method="post"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">&lt;input type="text" name="firstname" placeholder="saisir le prénom"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">&lt;input type="text" name="lastname" placeholder="saisir le nom"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">&lt;input type="submit" value="envoyer" name="submit"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">&lt;/form&gt;</span><br>
                        <span class="code-comment">&lt;/body&gt;</span><br>
                        <span class="code-comment">&lt;/html&gt;</span>
                    </div>
                </section>
                
                <section id="explication-detaille">
                    <h2>Explication Détaillée</h2>
                    
                    <div class="concept-explanation">
                        <div class="concept-icon">1</div>
                        <div class="concept-text">
                            <h3>Structure du Formulaire</h3>
                            <p>Le formulaire HTML est défini avec la méthode POST et une action vide, ce qui signifie que les données seront envoyées à la même page.</p>
                            <div class="code-block">
                                <span class="code-comment">&lt;form action="" method="post"&gt;</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="concept-explanation">
                        <div class="concept-icon">2</div>
                        <div class="concept-text">
                            <h3>Vérification de la Soumission</h3>
                            <p>Le code PHP vérifie d'abord si le formulaire a été soumis en testant la présence du bouton "submit" dans <code>$_POST</code>.</p>
                            <div class="code-block">
                                <span class="code-keyword">if</span> (<span class="code-variable">isset</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"submit"</span>])) {
                            </div>
                        </div>
                    </div>
                    
                    <div class="concept-explanation">
                        <div class="concept-icon">3</div>
                        <div class="concept-text">
                            <h3>Validation des Données</h3>
                            <p>Ensuite, il vérifie que les deux champs "firstname" et "lastname" ne sont pas vides.</p>
                            <div class="code-block">
                                <span class="code-keyword">if</span> (!<span class="code-variable">empty</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"firstname"</span>]) && !<span class="code-variable">empty</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"lastname"</span>])) {
                            </div>
                        </div>
                    </div>
                    
                    <div class="concept-explanation">
                        <div class="concept-icon">4</div>
                        <div class="concept-text">
                            <h3>Affichage des Données</h3>
                            <p>Si toutes les conditions sont remplies, le code affiche le contenu de la superglobale <code>$_POST</code> avec <code>var_dump()</code>.</p>
                            <div class="code-block">
                                <span class="code-variable">var_dump</span>(<span class="code-variable">$_POST</span>);
                            </div>
                        </div>
                    </div>
                </section>
                
                <section id="exemple-pratique">
                    <h2>Exemple Pratique</h2>
                    <p>Voici une implémentation fonctionnelle du code :</p>
                    
                    <div class="example-form">
                        <h3>Formulaire de Test</h3>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="firstname">Prénom :</label>
                                <input type="text" id="firstname" name="firstname" placeholder="Saisir le prénom">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Nom :</label>
                                <input type="text" id="lastname" name="lastname" placeholder="Saisir le nom">
                            </div>
                            <input type="submit" value="Envoyer" name="submit">
                        </form>
                        
                        <?php
                            //test si le formulaire
                            if (isset($_POST["submit"])) {
                                //test si les 2 champs sont remplis
                                if (!empty($_POST["firstname"]) && !empty($_POST["lastname"])) {
                                    echo "<div class='output'>";
                                    echo "<strong>Données reçues :</strong><br>";
                                    echo "Prénom: " . htmlspecialchars($_POST["firstname"]) . "<br>";
                                    echo "Nom: " . htmlspecialchars($_POST["lastname"]) . "<br><br>";
                                    echo "<strong>Dump de \$_POST :</strong><br>";
                                    echo "<pre>";
                                    var_dump($_POST);
                                    echo "</pre>";
                                    echo "</div>";
                                } else {
                                    echo "<div class='output' style='color: var(--danger);'>Veuillez remplir tous les champs.</div>";
                                }
                            }
                        ?>
                    </div>
                </section>
                
                <section id="bonnes-pratiques">
                    <h2>Bonnes Pratiques et Sécurité</h2>
                    
                    <div class="note">
                        <h3>Validation des Données</h3>
                        <p>Il est essentiel de valider toutes les données entrantes. Votre code vérifie déjà que les champs ne sont pas vides, mais vous pourriez ajouter d'autres validations :</p>
                        <ul>
                            <li>Vérifier le format des données (email, numéro de téléphone, etc.)</li>
                            <li>Limiter la longueur des chaînes de caractères</li>
                            <li>Vérifier les types de données attendus</li>
                        </ul>
                    </div>
                    
                    <div class="warning">
                        <h3>Sécurité : Échappement des Sorties</h3>
                        <p>Lorsque vous affichez des données utilisateur, utilisez toujours <code>htmlspecialchars()</code> pour éviter les attaques XSS (Cross-Site Scripting).</p>
                        <div class="code-block">
                            <span class="code-comment">// Mauvaise pratique (vulnérable aux XSS)</span><br>
                            <span class="code-keyword">echo</span> <span class="code-variable">$_POST</span>[<span class="code-string">'firstname'</span>];<br><br>
                            <span class="code-comment">// Bonne pratique (sécurisée)</span><br>
                            <span class="code-keyword">echo</span> <span class="code-variable">htmlspecialchars</span>(<span class="code-variable">$_POST</span>[<span class="code-string">'firstname'</span>]);
                        </div>
                    </div>
                    
                    <div class="tip">
                        <h3>Améliorations Possibles</h3>
                        <ul>
                            <li>Ajouter des messages d'erreur plus explicites</li>
                            <li>Réafficher les valeurs dans les champs en cas d'erreur</li>
                            <li>Utiliser des expressions régulières pour valider des formats spécifiques</li>
                            <li>Stocker les données dans une base de données après validation</li>
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
                        <li><a href="#exemple-pratique">Exemple Pratique</a></li>
                        <li><a href="#bonnes-pratiques">Bonnes Pratiques</a></li>
                    </ul>
                </div>
                
                <div class="key-points">
                    <h3>Points Clés</h3>
                    <ul>
                        <li>La méthode POST envoie les données dans le corps de la requête HTTP</li>
                        <li>Les données POST sont accessibles via la superglobale <code>$_POST</code></li>
                        <li>Utilisez <code>isset()</code> pour vérifier l'existence d'une variable</li>
                        <li>Utilisez <code>empty()</code> pour vérifier si un champ est vide</li>
                        <li>Toujours valider et sécuriser les données utilisateur</li>
                    </ul>
                </div>
                
                <div class="resources">
                    <h3>Ressources</h3>
                    <ul>
                        <li><a href="https://www.php.net/manual/fr/reserved.variables.post.php" target="_blank">Documentation PHP: $_POST</a></li>
                        <li><a href="https://www.php.net/manual/fr/function.isset.php" target="_blank">Documentation PHP: isset()</a></li>
                        <li><a href="https://www.php.net/manual/fr/function.empty.php" target="_blank">Documentation PHP: empty()</a></li>
                        <li><a href="https://www.php.net/manual/fr/function.htmlspecialchars.php" target="_blank">Documentation PHP: htmlspecialchars()</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <p>Cours sur les formulaires POST en PHP - Projet Recueil de Cours</p>
        </div>
    </footer>
</body>
</html>