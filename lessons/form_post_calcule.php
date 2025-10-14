<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP : Calcul de Prix TTC avec Formulaire POST</title>
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

        .code-html {
            color: #808080;
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
            background: #1e1e1e;
            color: #d4d4d4;
            border: 1px solid #444;
            border-radius: 4px;
            padding: 1rem;
            margin-top: 1rem;
            font-family: 'Consolas', 'Courier New', monospace;
            white-space: pre-wrap;
            line-height: 1.5;
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

        .formula {
            background: #f0f8ff;
            border: 1px solid #cce7ff;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .flow-chart {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .flow-step {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border-radius: 4px;
            background: #f8f9fa;
        }

        .flow-number {
            background: var(--primary);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
            font-weight: bold;
        }

        .flow-arrow {
            text-align: center;
            margin: 0.5rem 0;
            color: var(--primary);
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <header class="course-header">
        <div class="container">
            <h1>Calcul de Prix TTC avec Formulaire POST</h1>
            <p class="subtitle">Traitement des données de formulaire et calculs en PHP</p>
            <div class="mt-4">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content-grid">
            <main class="main-content">
                <section id="introduction">
                    <h2>Introduction</h2>
                    <p>Ce cours présente un exemple pratique de formulaire PHP qui calcule le prix TTC (Toutes Taxes
                        Comprises) à partir du prix HT (Hors Taxes), de la quantité et du taux de TVA.</p>

                    <p>Ce code illustre plusieurs concepts importants en PHP :</p>
                    <ul>
                        <li>Récupération des données de formulaire avec <code>$_POST</code></li>
                        <li>Validation des données utilisateur</li>
                        <li>Création et utilisation de fonctions</li>
                        <li>Calculs mathématiques en PHP</li>
                        <li>Gestion des erreurs et messages utilisateur</li>
                    </ul>
                </section>

                <section id="code-original">
                    <h2>Code Original</h2>
                    <p>Voici le code PHP/HTML que vous avez fourni :</p>

                    <div class="code-block">
                        <span class="code-comment">&lt;?php</span><br>
                        <span class="code-variable">include</span> <span
                            class="code-string">"../views/view_header.php"</span>;<br>
                        <br>
                        <span class="code-comment">//Tester si le formulaire est submit</span><br>
                        <span class="code-keyword">if</span> (<span class="code-function">isset</span>(<span
                            class="code-variable">$_POST</span>[<span class="code-string">"submit"</span>])) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$result</span> = <span
                            class="code-function">traitement</span>();<br>
                        }<br>
                        <br>
                        <span class="code-comment">//Function pour réaliser le traitement du formulaire</span><br>
                        <span class="code-keyword">function</span> <span class="code-function">traitement</span>() {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">//Test si un des champs est vide</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (<span
                            class="code-function">empty</span>(<span class="code-variable">$_POST</span>[<span
                            class="code-string">"prix_ht"</span>]) || <span class="code-function">empty</span>(<span
                            class="code-variable">$_POST</span>[<span class="code-string">"quantite"</span>]) || <span
                            class="code-function">empty</span>(<span class="code-variable">$_POST</span>[<span
                            class="code-string">"tva"</span>])) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span
                            class="code-string">"Veuillez remplir tous les champs du formulaire"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">//Test si un des champs n'est pas
                            nombre</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (!<span
                            class="code-function">is_numeric</span>(<span class="code-variable">$_POST</span>[<span
                            class="code-string">"prix_ht"</span>]) || !<span
                            class="code-function">is_numeric</span>(<span class="code-variable">$_POST</span>[<span
                            class="code-string">"quantite"</span>]) || !<span
                            class="code-function">is_numeric</span>(<span class="code-variable">$_POST</span>[<span
                            class="code-string">"tva"</span>])) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span
                            class="code-string">"Veuillez saisir des nombres"</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">//Retourner le résultat du calcul</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span
                            class="code-variable">$_POST</span>[<span class="code-string">"prix_ht"</span>] * <span
                            class="code-variable">$_POST</span>[<span class="code-string">"quantite"</span>] * (<span
                            class="code-variable">$_POST</span>[<span class="code-string">"tva"</span>] /<span
                            class="code-number">100</span> + <span class="code-number">1</span>) . <span
                            class="code-string">"€"</span>;<br>
                        }<br>
                        <br>
                        <span class="code-comment">?&gt;</span><br>
                        <span class="code-html">&lt;html lang="en"&gt;</span><br>
                        <span class="code-html">&lt;head&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;meta charset="UTF-8"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;meta name="viewport"
                            content="width=device-width, initial-scale=1.0"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;title&gt;Formulaire POST exercice
                            1&lt;/title&gt;</span><br>
                        <span class="code-html">&lt;/head&gt;</span><br>
                        <span class="code-html">&lt;body&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;h1&gt;Calculer le prix
                            TTC&lt;/h1&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;form action=""
                            method="post"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;input type="text"
                            name="prix_ht" placeholder="Saisir le prix HT"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;input type="text"
                            name="quantite" placeholder="Saisir la quantite de produit"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;input type="text"
                            name="tva" placeholder="Saisir le taux de TVA : 20 pour 20%"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;input
                            type="submit" value="calculer" name="submit"&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;/form&gt;</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-html">&lt;p&gt;&lt;?= $result ??
                            ""?&gt;&lt;/p&gt;</span><br>
                        <span class="code-html">&lt;/body&gt;</span><br>
                        <span class="code-html">&lt;/html&gt;</span>
                    </div>
                </section>

                <section id="explication-detaille">
                    <h2>Explication Détaillée</h2>

                    <div class="concept-explanation">
                        <div class="concept-icon">1</div>
                        <div class="concept-text">
                            <h3>Inclusion du Header</h3>
                            <p>Le code commence par inclure un fichier d'en-tête qui contient probablement des éléments
                                communs à plusieurs pages (navigation, styles, etc.).</p>
                            <div class="code-block">
                                <span class="code-variable">include</span> <span
                                    class="code-string">"../views/view_header.php"</span>;
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">2</div>
                        <div class="concept-text">
                            <h3>Détection de la Soumission</h3>
                            <p>Le code vérifie si le formulaire a été soumis en testant la présence du bouton "submit"
                                dans <code>$_POST</code>.</p>
                            <div class="code-block">
                                <span class="code-keyword">if</span> (<span class="code-function">isset</span>(<span
                                    class="code-variable">$_POST</span>[<span class="code-string">"submit"</span>]))
                                {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$result</span> = <span
                                    class="code-function">traitement</span>();<br>
                                }
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">3</div>
                        <div class="concept-text">
                            <h3>Fonction de Traitement</h3>
                            <p>La fonction <code>traitement()</code> est définie pour centraliser la logique de
                                validation et de calcul.</p>
                            <div class="code-block">
                                <span class="code-keyword">function</span> <span
                                    class="code-function">traitement</span>() {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// ... logique de traitement
                                    ...</span><br>
                                }
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">4</div>
                        <div class="concept-text">
                            <h3>Validation des Données</h3>
                            <p>La fonction vérifie d'abord que tous les champs sont remplis, puis que tous contiennent
                                des valeurs numériques.</p>
                            <div class="code-block">
                                <span class="code-keyword">if</span> (<span class="code-function">empty</span>(<span
                                    class="code-variable">$_POST</span>[<span class="code-string">"prix_ht"</span>]) ||
                                <span class="code-function">empty</span>(<span class="code-variable">$_POST</span>[<span
                                    class="code-string">"quantite"</span>]) || <span
                                    class="code-function">empty</span>(<span class="code-variable">$_POST</span>[<span
                                    class="code-string">"tva"</span>])) {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span
                                    class="code-string">"Veuillez remplir tous les champs du formulaire"</span>;<br>
                                }<br>
                                <span class="code-keyword">if</span> (!<span
                                    class="code-function">is_numeric</span>(<span
                                    class="code-variable">$_POST</span>[<span class="code-string">"prix_ht"</span>]) ||
                                !<span class="code-function">is_numeric</span>(<span
                                    class="code-variable">$_POST</span>[<span class="code-string">"quantite"</span>]) ||
                                !<span class="code-function">is_numeric</span>(<span
                                    class="code-variable">$_POST</span>[<span class="code-string">"tva"</span>])) {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span
                                    class="code-string">"Veuillez saisir des nombres"</span>;<br>
                                }
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">5</div>
                        <div class="concept-text">
                            <h3>Calcul du Prix TTC</h3>
                            <p>La formule utilisée pour calculer le prix TTC est :</p>
                            <div class="formula">
                                Prix TTC = Prix HT × Quantité × (1 + Taux TVA / 100)
                            </div>
                            <p>En PHP, cela se traduit par :</p>
                            <div class="code-block">
                                <span class="code-keyword">return</span> <span class="code-variable">$_POST</span>[<span
                                    class="code-string">"prix_ht"</span>] * <span
                                    class="code-variable">$_POST</span>[<span class="code-string">"quantite"</span>] *
                                (<span class="code-variable">$_POST</span>[<span class="code-string">"tva"</span>]
                                /<span class="code-number">100</span> + <span class="code-number">1</span>) . <span
                                    class="code-string">"€"</span>;
                            </div>
                        </div>
                    </div>

                    <div class="concept-explanation">
                        <div class="concept-icon">6</div>
                        <div class="concept-text">
                            <h3>Affichage du Résultat</h3>
                            <p>Le résultat est affiché en utilisant l'opérateur de coalescence nulle (<code>??</code>)
                                pour éviter une erreur si la variable <code>$result</code> n'est pas définie.</p>
                            <div class="code-block">
                                <span class="code-html">&lt;p&gt;&lt;?= $result ?? ""?&gt;&lt;/p&gt;</span>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="flux-execution">
                    <h2>Flux d'Exécution</h2>
                    <div class="flow-chart">
                        <div class="flow-step">
                            <div class="flow-number">1</div>
                            <div>Chargement de la page - Affichage du formulaire vide</div>
                        </div>
                        <div class="flow-arrow">↓</div>
                        <div class="flow-step">
                            <div class="flow-number">2</div>
                            <div>L'utilisateur remplit le formulaire et clique sur "calculer"</div>
                        </div>
                        <div class="flow-arrow">↓</div>
                        <div class="flow-step">
                            <div class="flow-number">3</div>
                            <div>La page est rechargée avec les données POST</div>
                        </div>
                        <div class="flow-arrow">↓</div>
                        <div class="flow-step">
                            <div class="flow-number">4</div>
                            <div>La fonction <code>traitement()</code> est appelée</div>
                        </div>
                        <div class="flow-arrow">↓</div>
                        <div class="flow-step">
                            <div class="flow-number">5</div>
                            <div>Validation des données : vérification des champs vides</div>
                        </div>
                        <div class="flow-arrow">↓</div>
                        <div class="flow-step">
                            <div class="flow-number">6</div>
                            <div>Validation des données : vérification des types numériques</div>
                        </div>
                        <div class="flow-arrow">↓</div>
                        <div class="flow-step">
                            <div class="flow-number">7</div>
                            <div>Calcul du prix TTC si toutes les validations passent</div>
                        </div>
                        <div class="flow-arrow">↓</div>
                        <div class="flow-step">
                            <div class="flow-number">8</div>
                            <div>Affichage du résultat ou du message d'erreur</div>
                        </div>
                    </div>
                </section>

                <section id="exemple-pratique">
                    <h2>Exemple Pratique</h2>
                    <p>Voici une implémentation fonctionnelle du code :</p>

                    <div class="example-form">
                        <h3>Calculateur de Prix TTC</h3>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="prix_ht">Prix HT (€) :</label>
                                <input type="text" id="prix_ht" name="prix_ht" placeholder="Saisir le prix HT"
                                    value="<?= isset($_POST['prix_ht']) ? htmlspecialchars($_POST['prix_ht']) : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="quantite">Quantité :</label>
                                <input type="text" id="quantite" name="quantite"
                                    placeholder="Saisir la quantité de produit"
                                    value="<?= isset($_POST['quantite']) ? htmlspecialchars($_POST['quantite']) : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="tva">Taux de TVA (%) :</label>
                                <input type="text" id="tva" name="tva" placeholder="Saisir le taux de TVA : 20 pour 20%"
                                    value="<?= isset($_POST['tva']) ? htmlspecialchars($_POST['tva']) : '' ?>">
                            </div>
                            <input type="submit" value="Calculer" name="submit">
                        </form>

                        <?php
                        // Tester si le formulaire est submit
                        if (isset($_POST["submit"])) {
                            $result = traitement();

                            // Afficher le résultat avec un style approprié
                            if (strpos($result, "Veuillez") === 0) {
                                // C'est un message d'erreur
                                echo "<div class='result-error'>$result</div>";
                            } else {
                                // C'est un résultat de calcul
                                echo "<div class='result-success'>Prix TTC : $result</div>";
                            }
                        }

                        // Function pour réaliser le traitement du formulaire
                        function traitement()
                        {
                            // Test si un des champs est vide
                            if (empty($_POST["prix_ht"]) || empty($_POST["quantite"]) || empty($_POST["tva"])) {
                                return "Veuillez remplir tous les champs du formulaire";
                            }
                            // Test si un des champs n'est pas nombre
                            if (!is_numeric($_POST["prix_ht"]) || !is_numeric($_POST["quantite"]) || !is_numeric($_POST["tva"])) {
                                return "Veuillez saisir des nombres";
                            }
                            // Retourner le résultat du calcul
                            return $_POST["prix_ht"] * $_POST["quantite"] * ($_POST["tva"] / 100 + 1) . "€";
                        }
                        ?>
                    </div>
                </section>

                <section id="bonnes-pratiques">
                    <h2>Bonnes Pratiques et Améliorations</h2>

                    <div class="note">
                        <h3>Validation des Données</h3>
                        <p>Votre code valide déjà les données de base, mais voici quelques améliorations possibles :</p>
                        <ul>
                            <li>Vérifier que les nombres sont positifs</li>
                            <li>Limiter la TVA à une plage raisonnable (ex: 0-100%)</li>
                            <li>Utiliser <code>filter_var()</code> avec des filtres appropriés</li>
                        </ul>
                    </div>

                    <div class="warning">
                        <h3>Sécurité : Échappement des Sorties</h3>
                        <p>Dans l'exemple pratique ci-dessus, nous utilisons <code>htmlspecialchars()</code> pour
                            réafficher les valeurs des champs. Cela empêche les attaques XSS.</p>
                        <div class="code-block">
                            <span class="code-comment">// Sécurisé contre les XSS</span><br>
                            <span class="code-keyword">value</span>=<span class="code-string">"&lt;?=
                                isset($_POST['prix_ht']) ? htmlspecialchars($_POST['prix_ht']) : '' ?&gt;"</span>
                        </div>
                    </div>

                    <div class="tip">
                        <h3>Améliorations de l'Expérience Utilisateur</h3>
                        <ul>
                            <li>Réafficher les valeurs saisies en cas d'erreur</li>
                            <li>Utiliser des types HTML5 appropriés (<code>type="number"</code>)</li>
                            <li>Ajouter des étapes de calcul intermédiaires (montant HT, montant TVA)</li>
                            <li>Formater les nombres avec <code>number_format()</code></li>
                        </ul>
                    </div>

                    <div class="code-block">
                        <span class="code-comment">// Exemple d'amélioration avec number_format()</span><br>
                        <span class="code-variable">$prix_ttc</span> = <span class="code-variable">$_POST</span>[<span
                            class="code-string">"prix_ht"</span>] * <span class="code-variable">$_POST</span>[<span
                            class="code-string">"quantite"</span>] * (<span class="code-variable">$_POST</span>[<span
                            class="code-string">"tva"</span>] /<span class="code-number">100</span> + <span
                            class="code-number">1</span>);<br>
                        <span class="code-keyword">return</span> <span class="code-function">number_format</span>(<span
                            class="code-variable">$prix_ttc</span>, <span class="code-number">2</span>, <span
                            class="code-string">','</span>, <span class="code-string">' '</span>) . <span
                            class="code-string">" €"</span>;
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
                        <li><a href="#flux-execution">Flux d'Exécution</a></li>
                        <li><a href="#exemple-pratique">Exemple Pratique</a></li>
                        <li><a href="#bonnes-pratiques">Bonnes Pratiques</a></li>
                    </ul>
                </div>

                <div class="key-points">
                    <h3>Points Clés</h3>
                    <ul>
                        <li>Utilisation de <code>isset()</code> pour détecter la soumission</li>
                        <li>Validation avec <code>empty()</code> et <code>is_numeric()</code></li>
                        <li>Organisation du code avec des fonctions</li>
                        <li>Formule de calcul : Prix TTC = HT × Quantité × (1 + TVA/100)</li>
                        <li>Utilisation de l'opérateur de coalescence nulle (<code>??</code>)</li>
                    </ul>
                </div>

                <div class="resources">
                    <h3>Ressources</h3>
                    <ul>
                        <li><a href="https://www.php.net/manual/fr/reserved.variables.post.php"
                                target="_blank">Documentation PHP: $_POST</a></li>
                        <li><a href="https://www.php.net/manual/fr/function.isset.php" target="_blank">Documentation
                                PHP: isset()</a></li>
                        <li><a href="https://www.php.net/manual/fr/function.empty.php" target="_blank">Documentation
                                PHP: empty()</a></li>
                        <li><a href="https://www.php.net/manual/fr/function.is-numeric.php"
                                target="_blank">Documentation PHP: is_numeric()</a></li>
                        <li><a href="https://www.php.net/manual/fr/function.number-format.php"
                                target="_blank">Documentation PHP: number_format()</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>Cours sur le calcul de prix TTC avec formulaire POST - Projet Recueil de Cours</p>
        </div>
    </footer>
</body>

</html>