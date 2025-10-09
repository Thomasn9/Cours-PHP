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
        /* Styles personnalisés complémentaires */
        .code-block {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 20px;
            border-radius: 8px;
            margin: 15px 0;
            font-family: 'Consolas', 'Monaco', monospace;
            font-size: 0.9em;
            overflow-x: auto;
        }

        .keyword {
            color: #569cd6;
        }

        .function {
            color: #dcdcaa;
        }

        .string {
            color: #ce9178;
        }

        .number {
            color: #b5cea8;
        }

        .comment {
            color: #6a9955;
        }

        .variable {
            color: #9cdcfe;
        }

        .operator {
            color: #d4d4d4;
        }

        .visual {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 15px 0;
            text-align: center;
        }

        .visual pre {
            font-family: 'Consolas', 'Monaco', monospace;
            font-size: 1.1em;
        }

        .bg-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="bg-gradient">
    <div class="container py-4">
        <!-- En-tête -->
        <div class="text-center text-white mb-5">
            <h1 class="display-4 fw-bold mb-3">🚀 Bases de la syntaxe PHP</h1>
            <p class="lead">Guide complet pour débuter avec la syntaxe fondamentale de PHP</p>
        </div>

        <!-- Grille de cartes -->
        <div class="row g-4 mb-4">
            <!-- Carte 1 : Hello World -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">👋 Hello World</h2>
                        <div class="code-block">
                            <span class="comment">// Import (obligatoire)</span><br>
                            <span class="keyword">require</span> <span class="string">'../vendor/autoload.php'</span>;<br>
                            <span class="function">echo</span> <span class="string">"Hello World"</span>;
                        </div>
                        
                        <div class="visual">
                            <pre>
Sortie dans le navigateur :
→ Hello World
                            </pre>
                        </div>

                        <div class="alert alert-info mt-3">
                            <h4 class="alert-heading">💡 Premier pas</h4>
                            <p class="mb-0">La commande <code>echo</code> affiche du texte directement dans la page web</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 2 : Variables -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">📦 Variables</h2>
                        <div class="code-block">
                            <span class="comment">// Déclaration d'une variable</span><br>
                            <span class="variable">$name</span> = <span class="string">"Mathieu"</span>;<br><br>
                            <span class="comment">// Affichage d'une variable</span><br>
                            <span class="function">echo</span> <span class="variable">$name</span>; <span class="comment">// Affiche "Mathieu"</span><br><br>
                            <span class="comment">// Mise à jour d'une variable</span><br>
                            <span class="variable">$name</span> = <span class="string">"Mithridate"</span>;<br>
                            <span class="function">echo</span> <span class="variable">$name</span>; <span class="comment">// Affiche "Mithridate"</span>
                        </div>

                        <div class="alert alert-warning mt-3">
                            <h4 class="alert-heading">🚀 Caractéristiques</h4>
                            <p class="mb-0">Les variables en PHP commencent toujours par <code>$</code> et sont sensibles à la casse</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 3 : Constantes -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">🔒 Constantes</h2>
                        <div class="code-block">
                            <span class="comment">// Déclaration d'une constante</span><br>
                            <span class="keyword">const</span> DATE = <span class="string">"2025-10-08"</span>;<br><br>
                            <span class="comment">// Utilisation de dump (Symfony)</span><br>
                            <span class="comment">// dump(DATE);</span><br><br>
                            <span class="comment">// Utilisation de dd (dump + die)</span><br>
                            <span class="comment">// dd(DATE);</span>
                        </div>

                        <div class="alert alert-danger mt-3">
                            <h4 class="alert-heading">⚠️ Attention</h4>
                            <p class="mb-0">Les constantes ne peuvent pas être modifiées après leur déclaration</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 4 : Structures conditionnelles -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">🎯 Conditions</h2>
                        <div class="code-block">
                            <span class="variable">$nbr1</span> = <span class="number">10</span>;<br>
                            <span class="variable">$nbr2</span> = <span class="number">20</span>;<br><br>
                            <span class="keyword">if</span> (<span class="variable">$nbr1</span> <span class="operator">!=</span> <span class="variable">$nbr2</span>) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">// Code si condition vraie</span><br>
                            } <span class="keyword">else if</span> (<span class="variable">$nbr1</span> <span class="operator"><</span> <span class="number">0</span>) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">// Code si deuxième condition vraie</span><br>
                            } <span class="keyword">else</span> {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">// Code par défaut</span><br>
                            }
                        </div>

                        <div class="code-block mt-3">
                            <span class="keyword">switch</span> (<span class="variable">$variable</span>) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">case</span> <span class="string">'value'</span>:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment"># code...</span><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">break</span>;<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">default</span>:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment"># code...</span><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">break</span>;<br>
                            }
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 5 : Boucles -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">🔄 Boucles</h2>
                        <div class="code-block">
                            <span class="comment">// Boucle while</span><br>
                            <span class="variable">$cpt</span> = <span class="number">10</span>;<br>
                            <span class="keyword">while</span> (<span class="variable">$cpt</span> <span class="operator">></span> <span class="number">0</span>) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">echo</span> <span class="variable">$cpt</span>;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="variable">$cpt</span><span class="operator">--</span>;<br>
                            }<br><br>
                            <span class="comment">// Boucle for</span><br>
                            <span class="keyword">for</span> (<span class="variable">$i</span> = <span class="number">0</span>; <span class="variable">$i</span> <span class="operator"><</span> <span class="variable">$cpt</span>; <span class="variable">$i</span><span class="operator">++</span>) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="comment"># code...</span><br>
                            }
                        </div>

                        <div class="visual mt-3">
                            <pre>
Boucle while : 10987654321
Boucle for : exécute X fois
                            </pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 6 : Tableaux -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">📊 Tableaux</h2>
                        <div class="code-block">
                            <span class="comment">// Tableau indexé</span><br>
                            <span class="variable">$tab</span> = [<span class="number">10</span>, <span class="number">25</span>, <span class="number">30</span>, <span class="number">44</span>];<br><br>
                            <span class="keyword">foreach</span> (<span class="variable">$tab</span> <span class="keyword">as</span> <span class="variable">$key</span> <span class="operator">=></span> <span class="variable">$value</span>) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">echo</span> <span class="variable">$value</span>; <span class="comment">// Affiche 10, 25, 30, 44</span><br>
                            }<br><br>
                            <span class="comment">// Tableau associatif</span><br>
                            <span class="variable">$tabAsso</span> = [<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"nom"</span> <span class="operator">=></span> <span class="string">"Mathieu"</span>,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"email"</span> <span class="operator">=></span> <span class="string">"test@test.com"</span><br>
                            ];
                        </div>

                        <div class="alert alert-info mt-3">
                            <h4 class="alert-heading">💡 Parcours de tableaux</h4>
                            <p class="mb-0"><code>foreach</code> est idéal pour parcourir tous les éléments d'un tableau</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 7 : Fonctions -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">⚙️ Fonctions</h2>
                        <div class="code-block">
                            <span class="comment">// Appel de fonction</span><br>
                            <span class="function">nom</span>(<span class="number">10</span>, <span class="string">"texte"</span>);<br><br>
                            <span class="comment">// Création d'une fonction</span><br>
                            <span class="keyword">function</span> <span class="function">nom</span>(<span class="keyword">int</span> <span class="variable">$nb1</span>, <span class="keyword">string</span> <span class="variable">$text</span>): <span class="keyword">string</span><br>
                            {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="variable">$nb1</span> <span class="operator">.</span> <span class="variable">$text</span>;<br>
                            }
                        </div>

                        <div class="alert alert-warning mt-3">
                            <h4 class="alert-heading">🎯 Typage</h4>
                            <p class="mb-0">PHP permet de typer les paramètres d'entrée et la valeur de retour</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 8 : Debugging -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">🐛 Debugging</h2>
                        <div class="code-block">
                            <span class="comment">// echo avec var_dump</span><br>
                            <span class="function">echo</span> <span class="string">"&lt;pre&gt;"</span>;<br>
                            <span class="function">var_dump</span>(DATE, <span class="variable">$name</span>);<br>
                            <span class="function">echo</span> <span class="string">"&lt;/pre&gt;"</span>;
                        </div>

                        <div class="alert alert-danger mt-3">
                            <h4 class="alert-heading">🔧 Outils de debug</h4>
                            <p class="mb-0">
                                <code>var_dump()</code> - Affiche type et valeur<br>
                                <code>dump()</code> - Version améliorée (Symfony)<br>
                                <code>dd()</code> - Dump and die
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 9 : Bonnes pratiques -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">📝 Bonnes pratiques</h2>
                        <div class="code-block">
                            <span class="comment">// Commentaires sur une ligne</span><br>
                            <span class="comment"># Autre syntaxe de commentaire</span><br><br>
                            <span class="comment">/*<br>
                            &nbsp;* Commentaire<br>
                            &nbsp;* sur plusieurs<br>
                            &nbsp;* lignes<br>
                            &nbsp;*/</span><br><br>
                            <span class="variable">$variableBienNommee</span> = <span class="string">"valeur"</span>; <span class="comment">// camelCase</span><br>
                            <span class="variable">$CONSTANTE</span> = <span class="string">"valeur"</span>; <span class="comment">// MAJUSCULES</span>
                        </div>

                        <div class="alert alert-success mt-3">
                            <h4 class="alert-heading">✅ Convention de nommage</h4>
                            <p class="mb-0">Variables : camelCase<br>Constantes : MAJUSCULES<br>Fonctions : camelCase</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Résumé des Points Clés -->
        <div class="card shadow border-0">
            <div class="card-body">
                <h2 class="card-title h4 text-primary">🎓 Points Clés à Retenir</h2>
                <div class="row mt-3">
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="alert alert-info h-100">
                            <h4 class="alert-heading">🎯 Syntaxe de base</h4>
                            <p class="mb-0">Variables : <code>$nom</code></p>
                            <p class="mb-0">Constantes : <code>const NOM</code></p>
                            <p class="mb-0">Instructions terminées par <code>;</code></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="alert alert-info h-100">
                            <h4 class="alert-heading">🔄 Structures de contrôle</h4>
                            <p class="mb-0"><code>if/else/elseif</code></p>
                            <p class="mb-0"><code>switch/case</code></p>
                            <p class="mb-0"><code>while/for/foreach</code></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="alert alert-info h-100">
                            <h4 class="alert-heading">📊 Structures de données</h4>
                            <p class="mb-0">Tableaux indexés</p>
                            <p class="mb-0">Tableaux associatifs</p>
                            <p class="mb-0">Parcours avec <code>foreach</code></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="alert alert-info h-100">
                            <h4 class="alert-heading">⚙️ Fonctions</h4>
                            <p class="mb-0">Déclaration : <code>function nom()</code></p>
                            <p class="mb-0">Typage des paramètres</p>
                            <p class="mb-0">Valeur de retour typée</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animation simple pour les cartes -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>