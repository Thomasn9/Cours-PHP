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
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
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
            background-color: #1e1e1e;
            color: #d4d4d4;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1rem 0;
            position: relative;
            overflow-x: auto;
            font-family: 'Consolas', 'Courier New', monospace;
            line-height: 1.5;
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

        .code-operator {
            color: #d4d4d4;
        }

        .example-card {
            border-left: 4px solid var(--primary-color);
            transition: transform 0.3s;
        }

        .example-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .output-card {
            background-color: #edf2f7;
            border-left: 4px solid var(--accent-color);
        }

        .concept-card {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
        }

        .concept-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
            background-color: #2980b9;
            border-color: #2980b9;
        }
    </style>
</head>

<body>
    <!-- En-tête du cours -->
    <header class="course-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Les Tableaux en PHP</h1>
            <p class="lead">Apprenez à créer, manipuler et parcourir des tableaux en PHP</p>
            <div class="mt-4">
                <span class="badge bg-light text-dark me-2"><i class="fas fa-clock me-1"></i> Durée: 30 min</span>
                <span class="badge bg-light text-dark me-2"><i class="fas fa-star me-1"></i> Niveau: Débutant</span>
                <span class="badge bg-light text-dark"><i class="fas fa-tags me-1"></i> PHP, Tableaux</span>
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container">
        <div class="row">
            <!-- Colonne de contenu -->
            <div class="col-lg-8">
                <!-- Introduction -->
                <section class="mb-5">
                    <h2 class="mb-4">Introduction aux tableaux PHP</h2>
                    <p>En PHP, un tableau est une structure de données qui permet de stocker plusieurs valeurs dans une
                        seule variable. Il existe deux types de tableaux : les tableaux indexés et les tableaux
                        associatifs.</p>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <div class="card concept-card h-100">
                                <div class="card-body text-center">
                                    <div class="concept-icon">
                                        <i class="fas fa-list-ol"></i>
                                    </div>
                                    <h5 class="card-title">Tableaux Indexés</h5>
                                    <p class="card-text">Utilisent des indices numériques pour accéder aux éléments.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card concept-card h-100">
                                <div class="card-body text-center">
                                    <div class="concept-icon">
                                        <i class="fas fa-key"></i>
                                    </div>
                                    <h5 class="card-title">Tableaux Associatifs</h5>
                                    <p class="card-text">Utilisent des clés nommées pour accéder aux éléments.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Tableaux Associatifs -->
                <section class="mb-5">
                    <h2 class="mb-4">Tableaux Associatifs</h2>
                    <p>Les tableaux associatifs utilisent des clés nommées pour stocker et accéder aux valeurs. Chaque
                        élément du tableau est une paire clé-valeur.</p>

                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Création d'un tableau associatif</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">//Création d'un tableau vide</span>
<span class="code-keyword">$tab</span> = [];
<span class="code-comment">//ajout de colonnes (tableau associatif)</span>
<span class="code-keyword">$tab</span>[<span class="code-string">"prenom"</span>] = <span class="code-string">"Mathieu"</span>;
<span class="code-keyword">$tab</span>[<span class="code-string">"nom"</span>] = <span class="code-string">"Adrar"</span>;
<span class="code-keyword">$tab</span>[<span class="code-string">"email"</span>] = <span class="code-string">"mathieu@test.com"</span>;</code></pre>
                            </div>
                        </div>
                    </div>

                    <div class="card output-card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-play-circle me-2"></i>Résultat de l'exécution</h5>
                        </div>
                        <div class="card-body">
                            <p>Le tableau créé contient :</p>
                            <ul>
                                <li>prenom: Mathieu</li>
                                <li>nom: Adrar</li>
                                <li>email: mathieu@test.com</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Tableaux Indexés -->
                <section class="mb-5">
                    <h2 class="mb-4">Tableaux Indexés</h2>
                    <p>Les tableaux indexés utilisent des indices numériques pour accéder aux éléments. Par défaut, les
                        indices commencent à 0.</p>

                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Création d'un tableau indexé</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">//Tableau indexé (avec des valeurs)</span>
<span class="code-keyword">$tab_indexe</span> = [<span class="code-number">0</span>,<span class="code-number">15</span>,<span class="code-number">22</span>,<span class="code-number">33</span>,<span class="code-number">47</span>];
<span class="code-comment">//Ajout d'une colonne tableau indexé</span>
<span class="code-keyword">$tab_indexe</span>[] = <span class="code-number">20</span>;</code></pre>
                            </div>
                        </div>
                    </div>

                    <div class="card output-card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-play-circle me-2"></i>Résultat de l'exécution</h5>
                        </div>
                        <div class="card-body">
                            <p>Le tableau indexé contient maintenant :</p>
                            <ul>
                                <li>Index 0: 0</li>
                                <li>Index 1: 15</li>
                                <li>Index 2: 22</li>
                                <li>Index 3: 33</li>
                                <li>Index 4: 47</li>
                                <li>Index 5: 20</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Parcours des tableaux -->
                <section class="mb-5">
                    <h2 class="mb-4">Parcours des tableaux</h2>
                    <p>Il existe plusieurs méthodes pour parcourir les tableaux en PHP. Les plus courantes sont la
                        boucle <code>foreach</code>, <code>for</code> et <code>while</code>.</p>

                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Parcours avec foreach (tableau associatif)
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">//Itération tableau associatif</span>
<span class="code-keyword">foreach</span> (<span class="code-keyword">$tab</span> <span class="code-keyword">as</span> <span class="code-variable">$key</span> => <span class="code-variable">$value</span>) {
    <span class="code-keyword">echo</span> <span class="code-variable">$key</span> . <span class="code-string">" : "</span> . <span class="code-variable">$value</span> . <span class="code-string">"&lt;br&gt;"</span>;
}</code></pre>
                            </div>
                        </div>
                    </div>

                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Parcours avec foreach (tableau indexé)</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">//Itération tableau indexé</span>
<span class="code-keyword">foreach</span> (<span class="code-keyword">$tab_indexe</span> <span class="code-keyword">as</span> <span class="code-variable">$key</span> => <span class="code-variable">$value</span>) {
    <span class="code-keyword">echo</span> <span class="code-variable">$key</span> . <span class="code-string">" : "</span> . <span class="code-variable">$value</span> . <span class="code-string">"&lt;br&gt;"</span>;
}</code></pre>
                            </div>
                        </div>
                    </div>

                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Parcours avec for</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">//Iteration tableau indexé avec la boucle for</span>
<span class="code-keyword">for</span> (<span class="code-variable">$i</span>=<span class="code-number">0</span>; <span class="code-variable">$i</span> &lt; <span class="code-function">count</span>(<span class="code-keyword">$tab_indexe</span>); <span class="code-variable">$i</span>++) { 
    <span class="code-keyword">echo</span> <span class="code-keyword">$tab_indexe</span>[<span class="code-variable">$i</span>] . <span class="code-string">"&lt;br&gt;"</span>;
}</code></pre>
                            </div>
                        </div>
                    </div>

                    <div class="card example-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Parcours avec while</h5>
                        </div>
                        <div class="card-body">
                            <div class="code-container">
                                <pre><code><span class="code-comment">//compteur (index)</span>
<span class="code-keyword">$cpt</span> = <span class="code-number">0</span>;
<span class="code-comment">//Itération tableau indexé avec la boucle while</span>
<span class="code-keyword">while</span>(<span class="code-keyword">$cpt</span> &lt;<span class="code-function">count</span>(<span class="code-keyword">$tab_indexe</span>)) {
    <span class="code-keyword">echo</span> <span class="code-keyword">$tab_indexe</span>[<span class="code-variable">$i</span>] . <span class="code-string">"&lt;br&gt;"</span>;
    <span class="code-keyword">$cpt</span>++;
}</code></pre>
                            </div>
                            <div class="alert alert-warning mt-3">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Attention :</strong> Il y a une erreur dans ce code. La variable <code>$i</code>
                                n'est pas définie. Il faudrait utiliser <code>$cpt</code> à la place.
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px;">

                    <!-- Points clés -->
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Points Clés</h5>
                        </div>
                        <div class="card-body">
                            <ul class="mb-0">
                                <li>Les tableaux stockent plusieurs valeurs</li>
                                <li>Deux types: indexés et associatifs</li>
                                <li>Foreach est idéal pour les tableaux</li>
                                <li>Les indices commencent à 0</li>
                                <li>count() donne la taille du tableau</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Pied de page -->
    <footer class="footer mt-5">
        <div class="container text-center">
            <p>&copy; 2023 Plateforme de Cours. Tous droits réservés.</p>
            <div class="mt-3">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-white"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>