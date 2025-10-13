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
            --primary-color: #9b59b6;
            --secondary-color: #8e44ad;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background-color: var(--secondary-color);
        }
        
        .course-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
        }
        
        .code-container {
            background-color: #2d3748;
            color: #e2e8f0;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1rem 0;
            position: relative;
            overflow-x: auto;
        }
        
        .code-comment {
            color: #718096;
            font-style: italic;
        }
        
        .code-keyword {
            color: #63b3ed;
        }
        
        .code-string {
            color: #68d391;
        }
        
        .code-variable {
            color: #fbb6ce;
        }
        
        .code-function {
            color: #f6ad55;
        }
        
        .example-card {
            border-left: 4px solid var(--primary-color);
            transition: transform 0.3s;
        }
        
        .example-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .output-card {
            background-color: #edf2f7;
            border-left: 4px solid var(--accent-color);
        }
        
        .output-pre {
            background-color: #2d3748;
            color: #e2e8f0;
            padding: 1rem;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
        }
        
        .concept-card {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
        }
        
        .concept-card:hover {
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .concept-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #8e44ad;
            border-color: #8e44ad;
        }
        
        .comparison-table th {
            background-color: var(--primary-color);
            color: white;
        }
        
        .tool-card {
            border-top: 4px solid var(--primary-color);
        }
        
        .use-case-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: none;
        }
    </style>
</head>
<body>
    <!-- En-tête du cours -->
    <header class="course-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">var_dump() et print_r() en PHP</h1>
            <p class="lead">Débogage et affichage des structures de données</p>
            <div class="mt-4">
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container">
        <div class="row">
            <!-- Colonne de contenu -->
            <div class="col-lg-8">
                <!-- Introduction -->
                <section class="mb-5" id="intro">
                    <h2 class="mb-4">Introduction au débogage en PHP</h2>
                    <p>En PHP, <code>var_dump()</code> et <code>print_r()</code> sont deux fonctions essentielles pour le débogage. Elles permettent d'afficher le contenu des variables et de comprendre la structure des données.</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <div class="card tool-card h-100">
                                <div class="card-body text-center">
                                    <div class="concept-icon">
                                        <i class="fas fa-bug"></i>
                                    </div>
                                    <h5 class="card-title">var_dump()</h5>
                                    <p class="card-text">Affiche des informations structurées sur une variable, y compris le type et la valeur.</p>
                                    <span class="badge bg-primary">Détaillé</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card tool-card h-100">
                                <div class="card-body text-center">
                                    <div class="concept-icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <h5 class="card-title">print_r()</h5>
                                    <p class="card-text">Affiche une variable dans un format lisible, particulièrement utile pour les tableaux.</p>
                                    <span class="badge bg-success">Lisible</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- var_dump() -->
                <section class="mb-5" id="vardump">
                    <h2 class="mb-4">La fonction var_dump()</h2>
                    <p><code>var_dump()</code> est la fonction de débogage la plus complète en PHP. Elle affiche le type, la taille et la valeur des variables.</p>
                    
                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Utilisation de base de var_dump()</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">// Exemple avec différents types de variables</span>
<span class="code-variable">$string</span> = <span class="code-string">"Hello World"</span>;
<span class="code-variable">$number</span> = <span class="code-variable">42</span>;
<span class="code-variable">$array</span> = [<span class="code-string">"pomme"</span>, <span class="code-string">"banane"</span>, <span class="code-string">"orange"</span>];
<span class="code-variable">$bool</span> = <span class="code-keyword">true</span>;

<span class="code-comment">// Affichage avec var_dump</span>
<span class="code-function">var_dump</span>(<span class="code-variable">$string</span>);
<span class="code-function">var_dump</span>(<span class="code-variable">$number</span>);
<span class="code-function">var_dump</span>(<span class="code-variable">$array</span>);
<span class="code-function">var_dump</span>(<span class="code-variable">$bool</span>);</code></pre>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card output-card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-play-circle me-2"></i>Résultat de l'exécution</h5>
                        </div>
                        <div class="card-body">
                            <div class="output-pre">
string(11) "Hello World"
int(42)
array(3) {
  [0]=>
  string(5) "pomme"
  [1]=>
  string(6) "banane"
  [2]=>
  string(6) "orange"
}
bool(true)
                            </div>
                        </div>
                    </div>
                    
                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>var_dump() avec un tableau associatif</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">// Tableau associatif</span>
<span class="code-variable">$user</span> = [
    <span class="code-string">"prenom"</span> => <span class="code-string">"Mathieu"</span>,
    <span class="code-string">"nom"</span> => <span class="code-string">"Adrar"</span>,
    <span class="code-string">"email"</span> => <span class="code-string">"mathieu@test.com"</span>,
    <span class="code-string">"age"</span> => <span class="code-variable">30</span>
];

<span class="code-function">var_dump</span>(<span class="code-variable">$user</span>);</code></pre>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card output-card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-play-circle me-2"></i>Résultat de l'exécution</h5>
                        </div>
                        <div class="card-body">
                            <div class="output-pre">
array(4) {
  ["prenom"]=>
  string(7) "Mathieu"
  ["nom"]=>
  string(5) "Adrar"
  ["email"]=>
  string(16) "mathieu@test.com"
  ["age"]=>
  int(30)
}
                            </div>
                        </div>
                    </div>
                </section>

                <!-- print_r() -->
                <section class="mb-5" id="printr">
                    <h2 class="mb-4">La fonction print_r()</h2>
                    <p><code>print_r()</code> affiche les variables dans un format plus lisible et compact, particulièrement adapté pour les tableaux et objets.</p>
                    
                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Utilisation de base de print_r()</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">// Exemple avec print_r</span>
<span class="code-variable">$string</span> = <span class="code-string">"Hello World"</span>;
<span class="code-variable">$number</span> = <span class="code-variable">42</span>;
<span class="code-variable">$array</span> = [<span class="code-string">"pomme"</span>, <span class="code-string">"banane"</span>, <span class="code-string">"orange"</span>];

<span class="code-comment">// Affichage avec print_r</span>
<span class="code-function">print_r</span>(<span class="code-variable">$string</span>);
<span class="code-keyword">echo</span> <span class="code-string">"&lt;br&gt;"</span>;
<span class="code-function">print_r</span>(<span class="code-variable">$number</span>);
<span class="code-keyword">echo</span> <span class="code-string">"&lt;br&gt;"</span>;
<span class="code-function">print_r</span>(<span class="code-variable">$array</span>);</code></pre>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card output-card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-play-circle me-2"></i>Résultat de l'exécution</h5>
                        </div>
                        <div class="card-body">
                            <div class="output-pre">
Hello World
42
Array
(
    [0] => pomme
    [1] => banane
    [2] => orange
)
                            </div>
                        </div>
                    </div>
                    
                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>print_r() avec le paramètre return</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">// Tableau complexe</span>
<span class="code-variable">$data</span> = [
    <span class="code-string">"users"</span> => [
        [<span class="code-string">"name"</span> => <span class="code-string">"Alice"</span>, <span class="code-string">"age"</span> => <span class="code-variable">25</span>],
        [<span class="code-string">"name"</span> => <span class="code-string">"Bob"</span>, <span class="code-string">"age"</span> => <span class="code-variable">30</span>]
    ],
    <span class="code-string">"settings"</span> => [<span class="code-string">"theme"</span> => <span class="code-string">"dark"</span>, <span class="code-string">"language"</span> => <span class="code-string">"fr"</span>]
];

<span class="code-comment">// Récupération du résultat dans une variable</span>
<span class="code-variable">$output</span> = <span class="code-function">print_r</span>(<span class="code-variable">$data</span>, <span class="code-keyword">true</span>);
<span class="code-keyword">echo</span> <span class="code-string">"&lt;pre&gt;"</span> . <span class="code-variable">$output</span> . <span class="code-string">"&lt;/pre&gt;"</span>;</code></pre>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Comparaison -->
                <section class="mb-5" id="comparaison">
                    <h2 class="mb-4">Comparaison entre var_dump() et print_r()</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered comparison-table">
                            <thead>
                                <tr>
                                    <th>Caractéristique</th>
                                    <th>var_dump()</th>
                                    <th>print_r()</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Affichage du type</strong></td>
                                    <td><i class="fas fa-check text-success"></i> Oui</td>
                                    <td><i class="fas fa-times text-danger"></i> Non</td>
                                </tr>
                                <tr>
                                    <td><strong>Affichage de la taille</strong></td>
                                    <td><i class="fas fa-check text-success"></i> Oui</td>
                                    <td><i class="fas fa-times text-danger"></i> Non</td>
                                </tr>
                                <tr>
                                    <td><strong>Format de sortie</strong></td>
                                    <td>Technique et détaillé</td>
                                    <td>Lisible et compact</td>
                                </tr>
                                <tr>
                                    <td><strong>Retour de valeur</strong></td>
                                    <td><i class="fas fa-times text-danger"></i> Null</td>
                                    <td><i class="fas fa-check text-success"></i> Optionnel</td>
                                </tr>
                                <tr>
                                    <td><strong>Utilisation recommandée</strong></td>
                                    <td>Débogage technique</td>
                                    <td>Affichage utilisateur</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="card example-card mt-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Exemple de comparaison directe</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-variable">$variable</span> = <span class="code-string">"Test"</span>;

<span class="code-keyword">echo</span> <span class="code-string">"&lt;h4&gt;Avec var_dump():&lt;/h4&gt;"</span>;
<span class="code-function">var_dump</span>(<span class="code-variable">$variable</span>);

<span class="code-keyword">echo</span> <span class="code-string">"&lt;h4&gt;Avec print_r():&lt;/h4&gt;"</span>;
<span class="code-function">print_r</span>(<span class="code-variable">$variable</span>);</code></pre>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Bonnes pratiques -->
                <section class="mb-5" id="bonnes-pratiques">
                    <h2 class="mb-4">Bonnes pratiques et cas d'utilisation</h2>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card use-case-card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-check-circle text-success me-2"></i>Quand utiliser var_dump()</h5>
                                    <ul>
                                        <li>Débogage technique approfondi</li>
                                        <li>Besoin de connaître le type exact des variables</li>
                                        <li>Analyse de structures complexes</li>
                                        <li>Développement et test</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card use-case-card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-check-circle text-success me-2"></i>Quand utiliser print_r()</h5>
                                    <ul>
                                        <li>Affichage lisible pour les logs</li>
                                        <li>Visualisation rapide de tableaux</li>
                                        <li>Besoin de capturer la sortie</li>
                                        <li>Affichage utilisateur final</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info">
                        <h5><i class="fas fa-lightbulb me-2"></i>Conseil pratique</h5>
                        <p class="mb-0">Utilisez <code>echo "&lt;pre&gt;"</code> avant d'appeler <code>var_dump()</code> ou <code>print_r()</code> pour un affichage plus lisible dans le navigateur.</p>
                    </div>
                    
                    <div class="card example-card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Exemple de bonne pratique</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">// Méthode recommandée pour un affichage lisible</span>
<span class="code-keyword">echo</span> <span class="code-string">"&lt;pre&gt;"</span>;
<span class="code-function">var_dump</span>(<span class="code-variable">$ma_variable_complexe</span>);
<span class="code-keyword">echo</span> <span class="code-string">"&lt;/pre&gt;"</span>;

<span class="code-comment">// Alternative avec print_r et capture</span>
<span class="code-keyword">echo</span> <span class="code-string">"&lt;pre&gt;"</span> . <span class="code-function">print_r</span>(<span class="code-variable">$mon_tableau</span>, <span class="code-keyword">true</span>) . <span class="code-string">"&lt;/pre&gt;"</span>;</code></pre>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px;">
                    <!-- Table des matières -->
                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Table des matières</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#intro" class="list-group-item list-group-item-action">Introduction</a>
                                <a href="#vardump" class="list-group-item list-group-item-action">var_dump()</a>
                                <a href="#printr" class="list-group-item list-group-item-action">print_r()</a>
                                <a href="#comparaison" class="list-group-item list-group-item-action">Comparaison</a>
                                <a href="#bonnes-pratiques" class="list-group-item list-group-item-action">Bonnes pratiques</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Points clés -->
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Points Clés</h5>
                        </div>
                        <div class="card-body">
                            <ul class="mb-0">
                                <li>var_dump() montre type et taille</li>
                                <li>print_r() est plus lisible</li>
                                <li>Utiliser &lt;pre&gt; pour un meilleur affichage</li>
                                <li>print_r() peut retourner une string</li>
                                <li>Idéal pour le débogage</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Astuces -->
                    <div class="card mb-4">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0"><i class="fas fa-magic me-2"></i>Astuces de Débogage</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <strong>Fonction de débogage rapide:</strong>
                                <div class="code-container small mt-1">
<pre><code>function debug($var) {
    echo "&lt;pre&gt;";
    var_dump($var);
    echo "&lt;/pre&gt;";
}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>