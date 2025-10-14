<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP : Validation de Mot de Passe avec Regex</title>
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

        .code-regex {
            color: #d7ba7d;
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

        input[type="password"] {
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

        .result-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 1rem;
            border-radius: 4px;
            margin-top: 1rem;
            font-weight: bold;
        }

        .result-error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 1rem;
            border-radius: 4px;
            margin-top: 1rem;
            font-weight: bold;
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

        .requirement-list {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            padding: 0.5rem;
        }

        .requirement-icon {
            color: var(--success);
            margin-right: 1rem;
            font-weight: bold;
        }

        .regex-breakdown {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            font-family: 'Consolas', 'Courier New', monospace;
        }

        .regex-part {
            margin-bottom: 0.5rem;
            padding-left: 1rem;
        }
    </style>
</head>

<body>
    <header class="course-header">
        <div class="container">
            <h1>Validation de Mot de Passe avec Regex en PHP</h1>
            <p class="subtitle">Fonction de vérification de mot de passe avec expressions régulières</p>
            <div class="mt-4">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content-grid">
            <main class="main-content">
                <section id="introduction">
                    <h2>Introduction</h2>
                    <p>Cette fonction PHP <code>verify_password()</code> permet de valider la complexité d'un mot de passe selon des critères de sécurité précis. Elle utilise des expressions régulières (regex) pour vérifier différents aspects du mot de passe.</p>

                    <div class="requirement-list">
                        <h3>Critères de validation du mot de passe :</h3>
                        <div class="requirement-item">
                            <span class="requirement-icon">✓</span>
                            Au moins une lettre minuscule
                        </div>
                        <div class="requirement-item">
                            <span class="requirement-icon">✓</span>
                            Au moins une lettre majuscule
                        </div>
                        <div class="requirement-item">
                            <span class="requirement-icon">✓</span>
                            Au moins un chiffre
                        </div>
                        <div class="requirement-item">
                            <span class="requirement-icon">✓</span>
                            Minimum 12 caractères
                        </div>
                    </div>
                </section>

                <section id="code-original">
                    <h2>Code Original</h2>
                    <p>Voici la fonction de validation de mot de passe :</p>

                    <div class="code-block">
                        <span class="code-keyword">function</span> <span class="code-function">verify_password</span>(<span class="code-keyword">string</span> <span class="code-variable">$password</span>){<br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (!<span class="code-function">preg_match</span>(<span class="code-string">"/[a-z]/"</span>, <span class="code-variable">$password</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-string">"Le mot de passe doit comporter au moins une minuscule"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (!<span class="code-function">preg_match</span>(<span class="code-string">"/[A-Z]/"</span>, <span class="code-variable">$password</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-string">"Le mot de passe doit comporter au moins une majuscule"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (!<span class="code-function">preg_match</span>(<span class="code-string">"/\d/"</span>, <span class="code-variable">$password</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-string">"Le mot de passe doit comporter au moins un chiffre"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$pattern</span> = <span class="code-string">"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{12,}$/"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (<span class="code-function">preg_match</span>(<span class="code-variable">$pattern</span>, <span class="code-variable">$password</span>) !== <span class="code-number">1</span>) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-string">"Le mot de passe ne correspond pas au pattern demandé"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-keyword">true</span>;<br>
                        }
                    </div>
                </section>

                <section id="explication-detaille">
                    <h2>Explication Détaillée</h2>

                    <div class="concept-explanation">
                        <div class="concept-icon">1</div>
                        <div class="concept-text">
                            <h3>Vérification des minuscules</h3>
                            <p>La première vérification utilise la regex <code>/[a-z]/</code> pour s'assurer qu'il y a au moins une lettre minuscule.</p>
                            <div class="code-block">
                                <span class="code-keyword">if</span> (!<span class="code-function">preg_match</span>(<span class="code-string">"/[a-z]/"</span>, <span class="code-variable">$password</span>)) {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-string">"Le mot de passe doit comporter au moins une minuscule"</span>;<br>
                                }
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">2</div>
                        <div class="concept-text">
                            <h3>Vérification des majuscules</h3>
                            <p>La deuxième vérification utilise <code>/[A-Z]/</code> pour s'assurer qu'il y a au moins une lettre majuscule.</p>
                            <div class="code-block">
                                <span class="code-keyword">if</span> (!<span class="code-function">preg_match</span>(<span class="code-string">"/[A-Z]/"</span>, <span class="code-variable">$password</span>)) {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-string">"Le mot de passe doit comporter au moins une majuscule"</span>;<br>
                                }
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">3</div>
                        <div class="concept-text">
                            <h3>Vérification des chiffres</h3>
                            <p>La troisième vérification utilise <code>/\d/</code> (équivalent à <code>/[0-9]/</code>) pour s'assurer qu'il y a au moins un chiffre.</p>
                            <div class="code-block">
                                <span class="code-keyword">if</span> (!<span class="code-function">preg_match</span>(<span class="code-string">"/\d/"</span>, <span class="code-variable">$password</span>)) {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-string">"Le mot de passe doit comporter au moins un chiffre"</span>;<br>
                                }
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">4</div>
                        <div class="concept-text">
                            <h3>Regex complète avec lookaheads</h3>
                            <p>La regex finale combine toutes les conditions avec des lookaheads et vérifie la longueur minimale :</p>
                            <div class="regex-breakdown">
                                <div class="regex-part"><span class="code-regex">/^</span> - Début de la chaîne</div>
                                <div class="regex-part"><span class="code-regex">(?=.*[a-z])</span> - Lookahead: doit contenir au moins une minuscule</div>
                                <div class="regex-part"><span class="code-regex">(?=.*[A-Z])</span> - Lookahead: doit contenir au moins une majuscule</div>
                                <div class="regex-part"><span class="code-regex">(?=.*\d)</span> - Lookahead: doit contenir au moins un chiffre</div>
                                <div class="regex-part"><span class="code-regex">.{12,}</span> - Au moins 12 caractères (tout type)</div>
                                <div class="regex-part"><span class="code-regex">$/</span> - Fin de la chaîne</div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="exemple-pratique">
                    <h2>Exemple Pratique</h2>
                    <p>Testez la fonction avec différents mots de passe :</p>

                    <div class="example-form">
                        <h3>Validateur de Mot de Passe</h3>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="password">Mot de passe :</label>
                                <input type="password" id="password" name="password" placeholder="Saisir un mot de passe" required>
                            </div>
                            <input type="submit" value="Vérifier" name="submit">
                        </form>

                        <?php
                        function verify_password(string $password){
                            if (!preg_match("/[a-z]/", $password)) {
                                return "Le mot de passe doit comporter au moins une minuscule";
                            }
                            if (!preg_match("/[A-Z]/", $password)) {
                                return "Le mot de passe doit comporter au moins une majuscule";
                            }
                            if (!preg_match("/\d/", $password)) {
                                return "Le mot de passe doit comporter au moins un chiffre";
                            }
                            $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{12,}$/";
                            if (preg_match($pattern, $password) !== 1) {
                                return "Le mot de passe ne correspond pas au pattern demandé";
                            }
                            return true;
                        }

                        if (isset($_POST["submit"])) {
                            $password = $_POST["password"] ?? '';
                            $result = verify_password($password);

                            if ($result === true) {
                                echo "<div class='result-success'>✅ Mot de passe valide !</div>";
                            } else {
                                echo "<div class='result-error'>❌ $result</div>";
                            }
                        }
                        ?>
                    </div>

                    <div class="note">
                        <h3>Exemples de mots de passe valides :</h3>
                        <ul>
                            <li><code>MonMotDePasse123</code> (15 caractères)</li>
                            <li><code>SecurePass2024!</code> (14 caractères)</li>
                            <li><code>abcDEF123456</code> (12 caractères exactement)</li>
                        </ul>
                    </div>

                    <div class="warning">
                        <h3>Exemples de mots de passe invalides :</h3>
                        <ul>
                            <li><code>monmotdepasse</code> (manque majuscule et chiffre)</li>
                            <li><code>MOTDEPASSE</code> (manque minuscule et chiffre)</li>
                            <li><code>1234567890</code> (manque lettres)</li>
                            <li><code>Ab1</code> (trop court)</li>
                        </ul>
                    </div>
                </section>

                <section id="bonnes-pratiques">
                    <h2>Bonnes Pratiques et Améliorations</h2>

                    <div class="tip">
                        <h3>Améliorations possibles</h3>
                        <ul>
                            <li><strong>Caractères spéciaux :</strong> Ajouter <code>(?=.*[@$!%*?&])</code> pour exiger un caractère spécial</li>
                            <li><strong>Longueur maximale :</strong> Ajouter <code>.{12,128}</code> pour limiter à 128 caractères</li>
                            <li><strong>Espaces :</strong> Ajouter <code>(?!.*\s)</code> pour interdire les espaces</li>
                            <li><strong>Messages plus précis :</strong> Indiquer exactement ce qui manque</li>
                        </ul>
                    </div>

                    <div class="code-block">
                        <span class="code-comment">// Version améliorée avec caractères spéciaux</span><br>
                        <span class="code-variable">$pattern</span> = <span class="code-string">"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{12,128}$/"</span>;<br>
                        <br>
                        <span class="code-comment">// Version sans espaces</span><br>
                        <span class="code-variable">$pattern</span> = <span class="code-string">"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?!.*\s).{12,}$/"</span>;
                    </div>

                    <div class="note">
                        <h3>Performance</h3>
                        <p>L'approche actuelle effectue 4 vérifications regex séparées. Pour de meilleures performances, on pourrait utiliser une seule regex :</p>
                        <div class="code-block">
                            <span class="code-variable">$pattern</span> = <span class="code-string">"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{12,}$/"</span>;<br>
                            <span class="code-keyword">if</span> (<span class="code-function">preg_match</span>(<span class="code-variable">$pattern</span>, <span class="code-variable">$password</span>)) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-keyword">true</span>;<br>
                            } <span class="code-keyword">else</span> {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// Message d'erreur générique ou analyse détaillée</span><br>
                            }
                        </div>
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
                        <li>Utilisation de <code>preg_match()</code> pour les regex</li>
                        <li>Lookaheads <code>(?=...)</code> pour les conditions multiples</li>
                        <li>Validation progressive avec messages d'erreur spécifiques</li>
                        <li>Type hinting <code>string</code> pour le paramètre</li>
                        <li>Retour mixte : <code>string</code> pour erreur, <code>true</code> pour succès</li>
                    </ul>
                </div>

                <div class="resources">
                    <h3>Ressources Regex</h3>
                    <ul>
                        <li><code>[a-z]</code> - Lettres minuscules</li>
                        <li><code>[A-Z]</code> - Lettres majuscules</li>
                        <li><code>\d</code> - Chiffres (0-9)</li>
                        <li><code>.{12,}</code> - Au moins 12 caractères</li>
                        <li><code>^...$</code> - Début et fin de chaîne</li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>Cours sur la validation de mot de passe avec regex - Projet Recueil de Cours</p>
        </div>
    </footer>
</body>

</html>