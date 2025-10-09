<?php
include "../views/view_header.php";
?> 

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aide-mémoire min() max() PHP</title>
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
        body{
            background-color: #683a96ca;
        }
    </style>
</head>
<body class="bg-gradient">
    <div class="container py-4">
        <!-- En-tête -->
        <div class="text-center text-white mb-5">
            <h1 class="display-4 fw-bold mb-3">📊 Aide-mémoire min() & max() PHP</h1>
            <p class="lead">Guide complet pour trouver les valeurs extrêmes dans vos tableaux</p>
        </div>

        <!-- Grille de cartes -->
        <div class="row g-4 mb-4">
            <!-- Carte 1 : Bases -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">🎯 Fonctions de Base</h2>
                        <div class="code-block">
                            <span class="keyword">$nombres</span> = [<span class="number">5</span>, <span class="number">12</span>, <span class="number">3</span>, <span class="number">8</span>, <span class="number">25</span>, <span class="number">1</span>];<br><br>
                            <span class="comment">// Trouver les extrêmes</span><br>
                            <span class="keyword">$min</span> = <span class="function">min</span>(<span class="keyword">$nombres</span>); <span class="comment">// 📉 Retourne 1</span><br>
                            <span class="keyword">$max</span> = <span class="function">max</span>(<span class="keyword">$nombres</span>); <span class="comment">// 📈 Retourne 25</span>
                        </div>
                        
                        <div class="visual">
                            <pre>
Tableau: [5, 12, 3, 8, 25, 1]
         min() ─────┐    ┌─── max()
                    ▼    ▼
Résultat:          1    25
                            </pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 2 : Tableaux Associatifs -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">🔑 Tableaux Associatifs</h2>
                        <div class="code-block">
                            <span class="keyword">$produits</span> = [<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"pc"</span> => <span class="number">800</span>,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"phone"</span> => <span class="number">500</span>,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"tablette"</span> => <span class="number">300</span><br>
                            ];<br><br>
                            <span class="keyword">$prix_min</span> = <span class="function">min</span>(<span class="keyword">$produits</span>); <span class="comment">// 💰 300</span><br>
                            <span class="keyword">$prix_max</span> = <span class="function">max</span>(<span class="keyword">$produits</span>); <span class="comment">// 💰 800</span>
                        </div>

                        <div class="alert alert-info mt-3">
                            <h4 class="alert-heading">💡 Utilisation pratique</h4>
                            <p class="mb-0">Parfait pour trouver les prix extrêmes dans un catalogue produits</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 3 : Trouver les Clés -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">🎓 Trouver la Clé Associée</h2>
                        <div class="code-block">
                            <span class="keyword">$etudiants</span> = [<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"Alice"</span> => <span class="number">15</span>,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"Bob"</span> => <span class="number">12</span>,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"Charlie"</span> => <span class="number">18</span><br>
                            ];<br><br>
                            <span class="comment">// Trouver le meilleur étudiant</span><br>
                            <span class="keyword">$meilleure_note</span> = <span class="function">max</span>(<span class="keyword">$etudiants</span>); <span class="comment">// 🏆 18</span><br>
                            <span class="keyword">$meilleur</span> = <span class="function">array_search</span>(<span class="keyword">$meilleure_note</span>, <span class="keyword">$etudiants</span>);<br>
                            <span class="comment">// $meilleur = "Charlie"</span>
                        </div>

                        <div class="alert alert-warning mt-3">
                            <h4 class="alert-heading">🚀 Astuce</h4>
                            <p class="mb-0">Combine <code>max()</code> avec <code>array_search()</code> pour identifier l'élément correspondant</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 4 : Tableaux Multidimensionnels -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">📊 Tableaux Multidimensionnels</h2>
                        <div class="code-block">
                            <span class="keyword">$commandes</span> = [<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;[<span class="string">"id"</span> => <span class="number">1</span>, <span class="string">"montant"</span> => <span class="number">150</span>],<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;[<span class="string">"id"</span> => <span class="number">2</span>, <span class="string">"montant"</span> => <span class="number">75</span>],<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;[<span class="string">"id"</span> => <span class="number">3</span>, <span class="string">"montant"</span> => <span class="number">300</span>]<br>
                            ];<br><br>
                            <span class="comment">// Extraire les montants</span><br>
                            <span class="keyword">$montants</span> = <span class="function">array_column</span>(<span class="keyword">$commandes</span>, <span class="string">'montant'</span>);<br>
                            <span class="keyword">$min</span> = <span class="function">min</span>(<span class="keyword">$montants</span>); <span class="comment">// 75</span><br>
                            <span class="keyword">$max</span> = <span class="function">max</span>(<span class="keyword">$montants</span>); <span class="comment">// 300</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 5 : Gestion d'Erreurs -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">⚠️ Gestion des Erreurs</h2>
                        <div class="code-block">
                            <span class="keyword">$tableau_vide</span> = [];<br><br>
                            <span class="comment">// Toujours vérifier si le tableau n'est pas vide</span><br>
                            <span class="keyword">if</span> (!<span class="function">empty</span>(<span class="keyword">$tableau_vide</span>)) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">$min</span> = <span class="function">min</span>(<span class="keyword">$tableau_vide</span>);<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">$max</span> = <span class="function">max</span>(<span class="keyword">$tableau_vide</span>);<br>
                            } <span class="keyword">else</span> {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">echo</span> <span class="string">"Le tableau est vide !"</span>;<br>
                            }
                        </div>

                        <div class="alert alert-danger mt-3">
                            <h4 class="alert-heading">🚫 Attention</h4>
                            <p class="mb-0"><code>min()</code> et <code>max()</code> sur un tableau vide retournent <code>NULL</code> et génèrent un warning</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte 6 : Exemple Complet -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">💼 Exemple Complet</h2>
                        <div class="code-block">
                            <span class="keyword">function</span> <span class="function">analyserVentes</span>(<span class="keyword">$ventes</span>) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">if</span> (<span class="function">empty</span>(<span class="keyword">$ventes</span>)) <span class="keyword">return</span> <span class="string">"Aucune donnée"</span>;<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> [<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="string">'min'</span> => <span class="function">min</span>(<span class="keyword">$ventes</span>),<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="string">'max'</span> => <span class="function">max</span>(<span class="keyword">$ventes</span>),<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="string">'moyenne'</span> => <span class="function">array_sum</span>(<span class="keyword">$ventes</span>) / <span class="function">count</span>(<span class="keyword">$ventes</span>)<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;];<br>
                            }<br><br>
                            <span class="comment">// Utilisation</span><br>
                            <span class="keyword">$stats</span> = <span class="function">analyserVentes</span>([<span class="number">1200</span>, <span class="number">850</span>, <span class="number">2100</span>, <span class="number">1500</span>]);<br>
                            <span class="function">print_r</span>(<span class="keyword">$stats</span>);
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Résumé des Points Clés -->
        <div class="card shadow border-0">
            <div class="card-body">
                <h2 class="card-title h4 text-primary">📝 Points Clés à Retenir</h2>
                <div class="row mt-3">
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="alert alert-info h-100">
                            <h4 class="alert-heading">🎯 Utilisation</h4>
                            <p class="mb-0"><code>min()</code> pour la plus petite valeur</p>
                            <p class="mb-0"><code>max()</code> pour la plus grande valeur</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="alert alert-info h-100">
                            <h4 class="alert-heading">⚡ Performance</h4>
                            <p class="mb-0">Fonctions natives optimisées</p>
                            <p class="mb-0">Rapides même sur grands tableaux</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="alert alert-info h-100">
                            <h4 class="alert-heading">🛡️ Sécurité</h4>
                            <p class="mb-0">Vérifier les tableaux vides</p>
                            <p class="mb-0">Gérer les types de données</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="alert alert-info h-100">
                            <h4 class="alert-heading">🔧 Combinaisons</h4>
                            <p class="mb-0">Avec <code>array_search()</code></p>
                            <p class="mb-0">Avec <code>array_column()</code></p>
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