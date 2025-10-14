<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP : Bind de Paramètres PDO</title>
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

        .method-comparison {
            background: var(--light);
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .method-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
        }

        .param-types {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .param-type-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
        }

        .param-type-name {
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <header class="course-header">
        <div class="container">
            <h1>Bind de Paramètres PDO</h1>
            <p class="subtitle">Sécuriser les requêtes SQL avec les paramètres liés</p>
            <div class="mt-4">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content-grid">
            <main class="main-content">
                <section id="introduction">
                    <h2>Introduction aux Bind de Paramètres</h2>
                    <p>Le binding de paramètres (liaison de paramètres) est une technique essentielle en PHP pour sécuriser les requêtes SQL contre les injections. Au lieu de concaténer directement les variables dans la requête, on utilise des placeholders et on "lie" les valeurs séparément.</p>

                    <div class="note">
                        <h3>Pourquoi utiliser le binding ?</h3>
                        <ul>
                            <li><strong>Sécurité :</strong> Protection contre les injections SQL</li>
                            <li><strong>Performance :</strong> Meilleure réutilisation des requêtes préparées</li>
                            <li><strong>Maintenabilité :</strong> Code plus clair et structuré</li>
                            <li><strong>Type safety :</strong> Validation des types de données</li>
                        </ul>
                    </div>
                </section>

                <section id="methodes-binding">
                    <h2>Les Différentes Méthodes de Binding</h2>

                    <div class="method-comparison">
                        <h3>1. bindParam() - Liaison par référence</h3>
                        <p>Lie un paramètre à une variable. La valeur est lue au moment de l'exécution.</p>
                        <div class="code-block">
                            <span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-string">"INSERT INTO users (name, email) VALUES (?, ?)"</span>);<br>
                            <span class="code-variable">$name</span> = <span class="code-string">"John"</span>;<br>
                            <span class="code-variable">$email</span> = <span class="code-string">"john@example.com"</span>;<br>
                            <br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">1</span>, <span class="code-variable">$name</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">2</span>, <span class="code-variable">$email</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            <br>
                            <span class="code-comment">// Si $name change avant execute(), la nouvelle valeur sera utilisée</span><br>
                            <span class="code-variable">$name</span> = <span class="code-string">"Jane"</span>;<br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>(); <span class="code-comment">// Insère "Jane" et non "John"</span>
                        </div>
                    </div>

                    <div class="method-comparison">
                        <h3>2. bindValue() - Liaison par valeur</h3>
                        <p>Lie un paramètre à une valeur spécifique. La valeur est fixée au moment du binding.</p>
                        <div class="code-block">
                            <span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-string">"INSERT INTO users (name, email) VALUES (?, ?)"</span>);<br>
                            <span class="code-variable">$name</span> = <span class="code-string">"John"</span>;<br>
                            <br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindValue</span>(<span class="code-number">1</span>, <span class="code-variable">$name</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindValue</span>(<span class="code-number">2</span>, <span class="code-string">"john@example.com"</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            <br>
                            <span class="code-variable">$name</span> = <span class="code-string">"Jane"</span>; <span class="code-comment">// N'affecte pas la requête</span><br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>(); <span class="code-comment">// Insère toujours "John"</span>
                        </div>
                    </div>

                    <div class="method-comparison">
                        <h3>3. execute(array) - Binding direct</h3>
                        <p>Passe directement un tableau de valeurs à la méthode execute().</p>
                        <div class="code-block">
                            <span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-string">"INSERT INTO users (name, email, age) VALUES (?, ?, ?)"</span>);<br>
                            <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>([<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-string">"John"</span>,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-string">"john@example.com"</span>,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-number">25</span><br>
                            ]);
                        </div>
                    </div>
                </section>

                <section id="types-parametres">
                    <h2>Types de Paramètres PDO</h2>

                    <div class="param-types">
                        <div class="param-type-card">
                            <div class="param-type-name">PDO::PARAM_STR</div>
                            <div>Chaîne de caractères</div>
                            <small>Valeur par défaut</small>
                        </div>
                        <div class="param-type-card">
                            <div class="param-type-name">PDO::PARAM_INT</div>
                            <div>Nombre entier</div>
                        </div>
                        <div class="param-type-card">
                            <div class="param-type-name">PDO::PARAM_BOOL</div>
                            <div>Booléen</div>
                        </div>
                        <div class="param-type-card">
                            <div class="param-type-name">PDO::PARAM_NULL</div>
                            <div>Valeur NULL</div>
                        </div>
                        <div class="param-type-card">
                            <div class="param-type-name">PDO::PARAM_LOB</div>
                            <div>Données binaires</div>
                        </div>
                    </div>

                    <div class="code-block">
                        <span class="code-comment">// Exemple avec différents types</span><br>
                        <span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-string">"INSERT INTO products (name, price, active, image) VALUES (?, ?, ?, ?)"</span>);<br>
                        <br>
                        <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">1</span>, <span class="code-variable">$name</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                        <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">2</span>, <span class="code-variable">$price</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_INT</span>);<br>
                        <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">3</span>, <span class="code-variable">$active</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_BOOL</span>);<br>
                        <span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">4</span>, <span class="code-variable">$image</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_LOB</span>);
                    </div>
                </section>

                <section id="placeholders">
                    <h2>Types de Placeholders</h2>

                    <div class="concept-explanation">
                        <div class="concept-icon">?</div>
                        <div class="concept-text">
                            <h3>Placeholders Positionnels (?)</h3>
                            <p>Les paramètres sont identifiés par leur position dans la requête.</p>
                            <div class="code-block">
                                <span class="code-variable">$sql</span> = <span class="code-string">"SELECT * FROM users WHERE age > ? AND city = ?"</span>;<br>
                                <span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                                <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>([<span class="code-number">18</span>, <span class="code-string">"Paris"</span>]);
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">:</div>
                        <div class="concept-text">
                            <h3>Placeholders Nommés (:nom)</h3>
                            <p>Les paramètres sont identifiés par un nom, plus explicite.</p>
                            <div class="code-block">
                                <span class="code-variable">$sql</span> = <span class="code-string">"SELECT * FROM users WHERE age > :age AND city = :city"</span>;<br>
                                <span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                                <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>([<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-string">':age'</span> =&gt; <span class="code-number">18</span>,<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-string">':city'</span> =&gt; <span class="code-string">"Paris"</span><br>
                                ]);
                            </div>
                        </div>
                    </div>
                </section>

                <section id="exemples-complets">
                    <h2>Exemples Complets</h2>

                    <div class="method-card">
                        <h3>INSERT avec bindParam</h3>
                        <div class="code-block">
                            <span class="code-keyword">function</span> <span class="code-function">createUser</span>(<span class="code-class">PDO</span> <span class="code-variable">$pdo</span>, <span class="code-keyword">string</span> <span class="code-variable">$name</span>, <span class="code-keyword">string</span> <span class="code-variable">$email</span>, <span class="code-keyword">int</span> <span class="code-variable">$age</span>): <span class="code-keyword">bool</span><br>
                            {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$sql</span> = <span class="code-string">"INSERT INTO users (name, email, age) VALUES (?, ?, ?)"</span>;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">1</span>, <span class="code-variable">$name</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">2</span>, <span class="code-variable">$email</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindParam</span>(<span class="code-number">3</span>, <span class="code-variable">$age</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_INT</span>);<br>
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>();<br>
                            }
                        </div>
                    </div>

                    <div class="method-card">
                        <h3>SELECT avec placeholders nommés</h3>
                        <div class="code-block">
                            <span class="code-keyword">function</span> <span class="code-function">findUsersByCityAndAge</span>(<span class="code-class">PDO</span> <span class="code-variable">$pdo</span>, <span class="code-keyword">string</span> <span class="code-variable">$city</span>, <span class="code-keyword">int</span> <span class="code-variable">$minAge</span>): <span class="code-keyword">array</span><br>
                            {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$sql</span> = <span class="code-string">"SELECT * FROM users WHERE city = :city AND age >= :min_age"</span>;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindValue</span>(<span class="code-string">':city'</span>, <span class="code-variable">$city</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_STR</span>);<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">bindValue</span>(<span class="code-string">':min_age'</span>, <span class="code-variable">$minAge</span>, <span class="code-class">PDO</span>::<span class="code-variable">PARAM_INT</span>);<br>
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>();<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-variable">$bdd</span>-&gt;<span class="code-function">fetchAll</span>(<span class="code-class">PDO</span>::<span class="code-variable">FETCH_ASSOC</span>);<br>
                            }
                        </div>
                    </div>
                </section>

                <section id="bonnes-pratiques">
                    <h2>Bonnes Pratiques et Pièges à Éviter</h2>

                    <div class="tip">
                        <h3>✅ Bonnes Pratiques</h3>
                        <ul>
                            <li><strong>Toujours utiliser des requêtes préparées</strong> pour les données utilisateur</li>
                            <li><strong>Spécifier le type de paramètre</strong> pour plus de sécurité</li>
                            <li><strong>Utiliser bindValue()</strong> pour les valeurs fixes</li>
                            <li><strong>Préférer les placeholders nommés</strong> pour la clarté</li>
                            <li><strong>Valider les données</strong> avant le binding</li>
                        </ul>
                    </div>

                    <div class="warning">
                        <h3>❌ Pièges à Éviter</h3>
                        <ul>
                            <li><strong>Ne pas mélanger</strong> les types de placeholders dans une même requête</li>
                            <li><strong>Attention à bindParam()</strong> : la valeur peut changer avant execute()</li>
                            <li><strong>Éviter les requêtes dynamiques</strong> avec concaténation</li>
                            <li><strong>Ne pas oublier</strong> de spécifier PDO::PARAM_INT pour les nombres</li>
                        </ul>
                    </div>

                    <div class="code-block">
                        <span class="code-comment">// ❌ MAUVAIS - Injection SQL possible</span><br>
                        <span class="code-variable">$sql</span> = <span class="code-string">"SELECT * FROM users WHERE name = '"</span> . <span class="code-variable">$_POST</span>[<span class="code-string">'name'</span>] . <span class="code-string">"'"</span>;<br>
                        <span class="code-variable">$pdo</span>-&gt;<span class="code-function">query</span>(<span class="code-variable">$sql</span>);<br>
                        <br>
                        <span class="code-comment">// ✅ BON - Sécurisé avec binding</span><br>
                        <span class="code-variable">$sql</span> = <span class="code-string">"SELECT * FROM users WHERE name = ?"</span>;<br>
                        <span class="code-variable">$bdd</span> = <span class="code-variable">$pdo</span>-&gt;<span class="code-function">prepare</span>(<span class="code-variable">$sql</span>);<br>
                        <span class="code-variable">$bdd</span>-&gt;<span class="code-function">execute</span>([<span class="code-variable">$_POST</span>[<span class="code-string">'name'</span>]]);
                    </div>
                </section>
            </main>

            <aside class="sidebar">
                <div class="table-of-contents">
                    <h3>Table des Matières</h3>
                    <ul>
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#methodes-binding">Méthodes de Binding</a></li>
                        <li><a href="#types-parametres">Types de Paramètres</a></li>
                        <li><a href="#placeholders">Types de Placeholders</a></li>
                        <li><a href="#exemples-complets">Exemples Complets</a></li>
                        <li><a href="#bonnes-pratiques">Bonnes Pratiques</a></li>
                    </ul>
                </div>

                <div class="key-points">
                    <h3>Différences Clés</h3>
                    <ul>
                        <li><strong>bindParam()</strong> : Lie une variable (référence)</li>
                        <li><strong>bindValue()</strong> : Lie une valeur (copie)</li>
                        <li><strong>execute(array)</strong> : Binding direct et simple</li>
                    </ul>
                </div>

                <div class="key-points">
                    <h3>Types PDO Importants</h3>
                    <ul>
                        <li>PARAM_STR - Chaînes</li>
                        <li>PARAM_INT - Entiers</li>
                        <li>PARAM_BOOL - Booléens</li>
                        <li>PARAM_NULL - Valeurs nulles</li>
                        <li>PARAM_LOB - Fichiers binaires</li>
                    </ul>
                </div>

                <div class="resources">
                    <h3>Ressources</h3>
                    <ul>
                        <li><a href="https://www.php.net/manual/fr/pdostatement.bindparam.php" target="_blank">bindParam()</a></li>
                        <li><a href="https://www.php.net/manual/fr/pdostatement.bindvalue.php" target="_blank">bindValue()</a></li>
                        <li><a href="https://www.php.net/manual/fr/pdo.constants.php" target="_blank">Constantes PDO</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>Cours sur les bind de paramètres PDO - Projet Recueil de Cours</p>
        </div>
    </footer>
</body>

</html>