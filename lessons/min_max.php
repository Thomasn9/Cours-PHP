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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            color: white;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.2em;
            opacity: 0.9;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .card h2 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 1.4em;
            border-bottom: 2px solid #667eea;
            padding-bottom: 8px;
        }

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

        .example {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }

        .example h4 {
            color: #667eea;
            margin-bottom: 10px;
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

        .tip {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }

        .warning {
            background: #ffebee;
            border-left: 4px solid #f44336;
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }

        .icon {
            font-size: 1.5em;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Aide-mémoire min() & max() PHP</h1>
            <p>Guide complet pour trouver les valeurs extrêmes dans vos tableaux</p>
        </div>

        <div class="card-grid">
            <!-- Carte 1 : Bases -->
            <div class="card">
                <h2>🎯 Fonctions de Base</h2>
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

            <!-- Carte 2 : Tableaux Associatifs -->
            <div class="card">
                <h2>🔑 Tableaux Associatifs</h2>
                <div class="code-block">
                    <span class="keyword">$produits</span> = [<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"pc"</span> => <span class="number">800</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"phone"</span> => <span class="number">500</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="string">"tablette"</span> => <span class="number">300</span><br>
                    ];<br><br>
                    <span class="keyword">$prix_min</span> = <span class="function">min</span>(<span class="keyword">$produits</span>); <span class="comment">// 💰 300</span><br>
                    <span class="keyword">$prix_max</span> = <span class="function">max</span>(<span class="keyword">$produits</span>); <span class="comment">// 💰 800</span>
                </div>

                <div class="example">
                    <h4>💡 Utilisation pratique</h4>
                    <p>Parfait pour trouver les prix extrêmes dans un catalogue produits</p>
                </div>
            </div>

            <!-- Carte 3 : Trouver les Clés -->
            <div class="card">
                <h2>🎓 Trouver la Clé Associée</h2>
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

                <div class="tip">
                    <h4>🚀 Astuce</h4>
                    <p>Combine <code>max()</code> avec <code>array_search()</code> pour identifier l'élément correspondant</p>
                </div>
            </div>

            <!-- Carte 4 : Tableaux Multidimensionnels -->
            <div class="card">
                <h2>📊 Tableaux Multidimensionnels</h2>
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

            <!-- Carte 5 : Gestion d'Erreurs -->
            <div class="card">
                <h2>⚠️ Gestion des Erreurs</h2>
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

                <div class="warning">
                    <h4>🚫 Attention</h4>
                    <p><code>min()</code> et <code>max()</code> sur un tableau vide retournent <code>NULL</code> et génèrent un warning</p>
                </div>
            </div>

            <!-- Carte 6 : Exemple Complet -->
            <div class="card">
                <h2>💼 Exemple Complet</h2>
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

        <!-- Résumé des Points Clés -->
        <div class="card">
            <h2>📝 Points Clés à Retenir</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; margin-top: 15px;">
                <div class="tip">
                    <h4>🎯 Utilisation</h4>
                    <p><code>min()</code> pour la plus petite valeur</p>
                    <p><code>max()</code> pour la plus grande valeur</p>
                </div>
                <div class="tip">
                    <h4>⚡ Performance</h4>
                    <p>Fonctions natives optimisées</p>
                    <p>Rapides même sur grands tableaux</p>
                </div>
                <div class="tip">
                    <h4>🛡️ Sécurité</h4>
                    <p>Vérifier les tableaux vides</p>
                    <p>Gérer les types de données</p>
                </div>
                <div class="tip">
                    <h4>🔧 Combinaisons</h4>
                    <p>Avec <code>array_search()</code></p>
                    <p>Avec <code>array_column()</code></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation simple pour les cartes
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