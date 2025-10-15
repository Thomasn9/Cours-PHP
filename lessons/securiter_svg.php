<?php
include "../views/view_header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP - Sécurisation de l'upload de fichiers</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #34495e;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            padding: 2rem 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        h2 {
            color: var(--primary-color);
            margin: 2rem 0 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--secondary-color);
        }
        
        h3 {
            color: var(--dark-color);
            margin: 1.5rem 0 0.5rem;
        }
        
        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .content {
            display: flex;
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .main-content {
            flex: 3;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .sidebar {
            flex: 1;
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .code-block {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 1.5rem;
            border-radius: 8px;
            overflow-x: auto;
            margin: 1.5rem 0;
            font-family: 'Consolas', 'Monaco', monospace;
            position: relative;
        }
        
        .code-block::before {
            content: "Code PHP";
            position: absolute;
            top: 0;
            right: 0;
            background: var(--secondary-color);
            color: white;
            padding: 0.3rem 0.8rem;
            font-size: 0.8rem;
            border-radius: 0 8px 0 8px;
        }
        
        .code-comment {
            color: #75715e;
        }
        
        .code-keyword {
            color: #f92672;
        }
        
        .code-function {
            color: #66d9ef;
        }
        
        .code-string {
            color: #e6db74;
        }
        
        .code-variable {
            color: #fd971f;
        }
        
        .info-box {
            background: #e1f5fe;
            border-left: 4px solid var(--secondary-color);
            padding: 1rem;
            margin: 1.5rem 0;
            border-radius: 0 4px 4px 0;
        }
        
        .warning-box {
            background: #fff3e0;
            border-left: 4px solid var(--warning-color);
            padding: 1rem;
            margin: 1.5rem 0;
            border-radius: 0 4px 4px 0;
        }
        
        .danger-box {
            background: #ffebee;
            border-left: 4px solid var(--accent-color);
            padding: 1rem;
            margin: 1.5rem 0;
            border-radius: 0 4px 4px 0;
        }
        
        .success-box {
            background: #e8f5e9;
            border-left: 4px solid var(--success-color);
            padding: 1rem;
            margin: 1.5rem 0;
            border-radius: 0 4px 4px 0;
        }
        
        ul, ol {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }
        
        li {
            margin-bottom: 0.5rem;
        }
        
        .example-form {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
        }
        
        .nav-links {
            list-style: none;
            margin: 1rem 0;
        }
        
        .nav-links li {
            margin-bottom: 0.8rem;
        }
        
        .nav-links a {
            color: var(--dark-color);
            text-decoration: none;
            display: block;
            padding: 0.5rem;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .nav-links a:hover {
            background: var(--light-color);
            color: var(--secondary-color);
        }
        
        footer {
            text-align: center;
            padding: 2rem 0;
            margin-top: 2rem;
            background: var(--dark-color);
            color: white;
        }
        
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Cours PHP - Upload de fichiers sécurisé</h1>
            <p class="subtitle">Comprendre et sécuriser l'envoi de fichiers en PHP</p>
        </div>
    </header>
    
    <div class="container">
        <div class="content">
            <main class="main-content">
                <section id="introduction">
                    <h2>Introduction</h2>
                    <p>L'upload de fichiers est une fonctionnalité courante dans les applications web, mais elle présente des risques de sécurité importants si elle n'est pas correctement implémentée. Cette page de cours analyse votre code actuel et propose des améliorations pour le sécuriser.</p>
                    
                    <div class="info-box">
                        <p><strong>Objectif :</strong> Comprendre les vulnérabilités potentielles et apprendre à sécuriser l'upload de fichiers en PHP.</p>
                    </div>
                </section>
                
                <section id="analyse-code">
                    <h2>Analyse de votre code actuel</h2>
                    <p>Votre code actuel permet d'uploader des fichiers avec quelques vérifications basiques. Analysons-le en détail :</p>
                    
                    <div class="code-block">
                        <span class="code-comment">// Fonction pour récupérer l'extension d'un fichier</span><br>
                        <span class="code-keyword">function</span> <span class="code-function">getFileExtension</span>(<span class="code-variable">$file</span>) {<br>
                        &nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-function">substr</span>(<span class="code-function">strrchr</span>(<span class="code-variable">$file</span>, <span class="code-string">'.'</span>), <span class="code-number">1</span>);<br>
                        }<br><br>
                        
                        <span class="code-keyword">if</span> (<span class="code-function">isset</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"submit"</span>])){<br>
                        &nbsp;&nbsp;<span class="code-variable">$old_name</span> = <span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"name"</span>];<br>
                        &nbsp;&nbsp;<span class="code-variable">$ext</span> = <span class="code-function">getFileExtension</span>(<span class="code-variable">$old_name</span>);<br>
                        &nbsp;&nbsp;<span class="code-variable">$new_name</span> = <span class="code-function">uniqid</span>(<span class="code-string">"img"</span>).<span class="code-string">"."</span>.<span class="code-variable">$ext</span>;<br><br>
                        
                        &nbsp;&nbsp;<span class="code-keyword">if</span>(<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"size"</span>] > (<span class="code-number">100</span> * <span class="code-number">1024</span> * <span class="code-number">1024</span>)){<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-string">"l'image est trop grosse !!"</span>;<br>
                        &nbsp;&nbsp;}<span class="code-keyword">else if</span>(<span class="code-variable">$ext</span> != <span class="code-string">"png"</span> && <span class="code-variable">$ext</span> != <span class="code-string">"PNG"</span> && <span class="code-variable">$ext</span> != <span class="code-string">"jpg"</span> && <span class="code-variable">$ext</span> != <span class="code-string">"jpeg"</span>){<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">echo</span> <span class="code-string">"Le format n'est pas pris en compte"</span>;<br>
                        &nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;<span class="code-comment">// dd($old_name,$ext,$new_name);</span><br><br>
                        
                        &nbsp;&nbsp;<span class="code-function">move_uploaded_file</span>(<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"tmp_name"</span>],<span class="code-string">"../public/asset/"</span>.<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"name"</span>]);<br>
                        }
                    </div>
                    
                    <h3>Points positifs :</h3>
                    <ul>
                        <li>Vérification de la taille du fichier (100 Mo maximum)</li>
                        <li>Vérification de l'extension du fichier</li>
                        <li>Renommage du fichier avec un identifiant unique</li>
                    </ul>
                    
                    <h3>Problèmes de sécurité identifiés :</h3>
                    <ul>
                        <li>Utilisation du nom original pour l'enregistrement final</li>
                        <li>Vérification d'extension insuffisante</li>
                        <li>Absence de vérification du type MIME réel</li>
                        <li>Gestion d'erreurs incomplète</li>
                        <li>Absence de validation du contenu du fichier</li>
                    </ul>
                </section>
                
                <section id="vulnerabilities">
                    <h2>Vulnérabilités courantes de l'upload de fichiers</h2>
                    
                    <div class="danger-box">
                        <h3>1. Exécution de code malveillant</h3>
                        <p>Un attaquant peut uploader un fichier PHP malveillant qui sera exécuté sur le serveur si celui-ci a les permissions d'exécution.</p>
                    </div>
                    
                    <div class="danger-box">
                        <h3>2. Déni de service (DoS)</h3>
                        <p>En uploadant des fichiers très volumineux ou en nombre important, un attaquant peut saturer l'espace disque ou les ressources du serveur.</p>
                    </div>
                    
                    <div class="danger-box">
                        <h3>3. Contournement des restrictions d'extension</h3>
                        <p>Les extensions peuvent être falsifiées (ex: "malicious.php.jpg") ou utilisées avec des caractères spéciaux.</p>
                    </div>
                    
                    <div class="danger-box">
                        <h3>4. Injection de scripts côté client</h3>
                        <p>Si des fichiers HTML/JS sont uploadés et accessibles publiquement, ils peuvent être utilisés pour des attaques XSS.</p>
                    </div>
                </section>
                
                <section id="solutions">
                    <h2>Solutions de sécurité pour l'upload de fichiers</h2>
                    
                    <h3>1. Vérification du type MIME réel</h3>
                    <p>Ne vous fiez pas seulement à l'extension du fichier. Utilisez la fonction <code>finfo_file()</code> pour détecter le véritable type de fichier.</p>
                    
                    <div class="code-block">
                        <span class="code-comment">// Vérification du type MIME réel</span><br>
                        <span class="code-variable">$finfo</span> = <span class="code-function">finfo_open</span>(FILEINFO_MIME_TYPE);<br>
                        <span class="code-variable">$mime_type</span> = <span class="code-function">finfo_file</span>(<span class="code-variable">$finfo</span>, <span class="code-variable">$_FILES</span>[<span class="code-string">'image'</span>][<span class="code-string">'tmp_name'</span>]);<br>
                        <span class="code-function">finfo_close</span>(<span class="code-variable">$finfo</span>);<br><br>
                        
                        <span class="code-variable">$allowed_mime_types</span> = [<span class="code-string">'image/jpeg'</span>, <span class="code-string">'image/png'</span>, <span class="code-string">'image/gif'</span>];<br>
                        <span class="code-keyword">if</span> (!<span class="code-function">in_array</span>(<span class="code-variable">$mime_type</span>, <span class="code-variable">$allowed_mime_types</span>)) {<br>
                        &nbsp;&nbsp;<span class="code-keyword">die</span>(<span class="code-string">"Type de fichier non autorisé"</span>);<br>
                        }
                    </div>
                    
                    <h3>2. Renommage systématique des fichiers</h3>
                    <p>Ne conservez jamais le nom original du fichier. Utilisez un nom généré aléatoirement avec une extension contrôlée.</p>
                    
                    <div class="code-block">
                        <span class="code-comment">// Génération d'un nom sécurisé</span><br>
                        <span class="code-variable">$extension</span> = <span class="code-function">pathinfo</span>(<span class="code-variable">$_FILES</span>[<span class="code-string">'image'</span>][<span class="code-string">'name'</span>], PATHINFO_EXTENSION);<br>
                        <span class="code-variable">$safe_extension</span> = <span class="code-function">strtolower</span>(<span class="code-variable">$extension</span>);<br>
                        <span class="code-variable">$new_filename</span> = <span class="code-function">uniqid</span>(<span class="code-string">'img_'</span>, <span class="code-keyword">true</span>) . <span class="code-string">'.'</span> . <span class="code-variable">$safe_extension</span>;
                    </div>
                    
                    <h3>3. Validation du contenu des images</h3>
                    <p>Pour les images, vérifiez qu'elles sont valides en utilisant les fonctions de traitement d'image.</p>
                    
                    <div class="code-block">
                        <span class="code-comment">// Validation du contenu pour les images</span><br>
                        <span class="code-keyword">function</span> <span class="code-function">isValidImage</span>(<span class="code-variable">$tmp_path</span>) {<br>
                        &nbsp;&nbsp;<span class="code-keyword">if</span> (!<span class="code-function">getimagesize</span>(<span class="code-variable">$tmp_path</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-keyword">false</span>;<br>
                        &nbsp;&nbsp;}<br>
                        &nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-keyword">true</span>;<br>
                        }
                    </div>
                    
                    <h3>4. Configuration serveur sécurisée</h3>
                    <p>Configurez votre serveur pour limiter les risques :</p>
                    <ul>
                        <li>Désactivez l'exécution de PHP dans le répertoire d'upload</li>
                        <li>Limitez la taille maximale des uploads dans php.ini</li>
                        <li>Stockez les fichiers uploadés hors de la racine web si possible</li>
                    </ul>
                    
                    <div class="code-block">
                        <span class="code-comment">// Exemple de configuration .htaccess pour bloquer l'exécution</span><br>
                        &lt;FilesMatch "\.(php|php5|phtml)$"&gt;<br>
                        &nbsp;&nbsp;Deny from all<br>
                        &lt;/FilesMatch&gt;
                    </div>
                </section>
                
                <section id="code-ameliore">
                    <h2>Version améliorée et sécurisée du code</h2>
                    
                    <div class="code-block">
                        <span class="code-comment">// Fonction pour récupérer l'extension d'un fichier</span><br>
                        <span class="code-keyword">function</span> <span class="code-function">getFileExtension</span>(<span class="code-variable">$file</span>) {<br>
                        &nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-function">pathinfo</span>(<span class="code-variable">$file</span>, PATHINFO_EXTENSION);<br>
                        }<br><br>
                        
                        <span class="code-keyword">if</span> (<span class="code-function">isset</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"submit"</span>]) && <span class="code-function">isset</span>(<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>])) {<br>
                        &nbsp;&nbsp;<span class="code-comment">// Vérification des erreurs d'upload</span><br>
                        &nbsp;&nbsp;<span class="code-keyword">if</span> (<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"error"</span>] !== UPLOAD_ERR_OK) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">die</span>(<span class="code-string">"Erreur lors de l'upload : "</span> . <span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"error"</span>]);<br>
                        &nbsp;&nbsp;}<br><br>
                        
                        &nbsp;&nbsp;<span class="code-variable">$old_name</span> = <span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"name"</span>];<br>
                        &nbsp;&nbsp;<span class="code-variable">$ext</span> = <span class="code-function">strtolower</span>(<span class="code-function">getFileExtension</span>(<span class="code-variable">$old_name</span>));<br>
                        &nbsp;&nbsp;<span class="code-variable">$allowed_extensions</span> = [<span class="code-string">'png'</span>, <span class="code-string">'jpg'</span>, <span class="code-string">'jpeg'</span>, <span class="code-string">'gif'</span>];<br><br>
                        
                        &nbsp;&nbsp;<span class="code-comment">// Vérification de l'extension</span><br>
                        &nbsp;&nbsp;<span class="code-keyword">if</span>(!<span class="code-function">in_array</span>(<span class="code-variable">$ext</span>, <span class="code-variable">$allowed_extensions</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">die</span>(<span class="code-string">"Le format n'est pas pris en compte"</span>);<br>
                        &nbsp;&nbsp;}<br><br>
                        
                        &nbsp;&nbsp;<span class="code-comment">// Vérification de la taille</span><br>
                        &nbsp;&nbsp;<span class="code-keyword">if</span>(<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"size"</span>] > (<span class="code-number">5</span> * <span class="code-number">1024</span> * <span class="code-number">1024</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">die</span>(<span class="code-string">"L'image est trop volumineuse (max 5Mo)"</span>);<br>
                        &nbsp;&nbsp;}<br><br>
                        
                        &nbsp;&nbsp;<span class="code-comment">// Vérification du type MIME réel</span><br>
                        &nbsp;&nbsp;<span class="code-variable">$finfo</span> = <span class="code-function">finfo_open</span>(FILEINFO_MIME_TYPE);<br>
                        &nbsp;&nbsp;<span class="code-variable">$mime_type</span> = <span class="code-function">finfo_file</span>(<span class="code-variable">$finfo</span>, <span class="code-variable">$_FILES</span>[<span class="code-string">'image'</span>][<span class="code-string">'tmp_name'</span>]);<br>
                        &nbsp;&nbsp;<span class="code-function">finfo_close</span>(<span class="code-variable">$finfo</span>);<br><br>
                        
                        &nbsp;&nbsp;<span class="code-variable">$allowed_mime_types</span> = [<span class="code-string">'image/jpeg'</span>, <span class="code-string">'image/png'</span>, <span class="code-string">'image/gif'</span>];<br>
                        &nbsp;&nbsp;<span class="code-keyword">if</span> (!<span class="code-function">in_array</span>(<span class="code-variable">$mime_type</span>, <span class="code-variable">$allowed_mime_types</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">die</span>(<span class="code-string">"Type de fichier non autorisé"</span>);<br>
                        &nbsp;&nbsp;}<br><br>
                        
                        &nbsp;&nbsp;<span class="code-comment">// Validation du contenu de l'image</span><br>
                        &nbsp;&nbsp;<span class="code-keyword">if</span> (!<span class="code-function">getimagesize</span>(<span class="code-variable">$_FILES</span>[<span class="code-string">'image'</span>][<span class="code-string">'tmp_name'</span>])) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">die</span>(<span class="code-string">"Le fichier n'est pas une image valide"</span>);<br>
                        &nbsp;&nbsp;}<br><br>
                        
                        &nbsp;&nbsp;<span class="code-comment">// Génération d'un nom sécurisé</span><br>
                        &nbsp;&nbsp;<span class="code-variable">$new_name</span> = <span class="code-function">uniqid</span>(<span class="code-string">"img_"</span>, <span class="code-keyword">true</span>).<span class="code-string">"."</span>.<span class="code-variable">$ext</span>;<br>
                        &nbsp;&nbsp;<span class="code-variable">$upload_path</span> = <span class="code-string">"../public/asset/"</span> . <span class="code-variable">$new_name</span>;<br><br>
                        
                        &nbsp;&nbsp;<span class="code-comment">// Déplacement du fichier</span><br>
                        &nbsp;&nbsp;<span class="code-keyword">if</span> (<span class="code-function">move_uploaded_file</span>(<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"tmp_name"</span>], <span class="code-variable">$upload_path</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">echo</span> <span class="code-string">"Fichier uploadé avec succès : "</span> . <span class="code-variable">$new_name</span>;<br>
                        &nbsp;&nbsp;} <span class="code-keyword">else</span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">die</span>(<span class="code-string">"Erreur lors de l'enregistrement du fichier"</span>);<br>
                        &nbsp;&nbsp;}<br>
                        }
                    </div>
                    
                    <div class="success-box">
                        <p><strong>Améliorations apportées :</strong></p>
                        <ul>
                            <li>Vérification des erreurs d'upload</li>
                            <li>Utilisation de <code>pathinfo()</code> pour l'extension</li>
                            <li>Vérification du type MIME réel avec <code>finfo_file()</code></li>
                            <li>Validation du contenu avec <code>getimagesize()</code></li>
                            <li>Nom de fichier sécurisé avec <code>uniqid()</code> amélioré</li>
                            <li>Messages d'erreur plus explicites</li>
                        </ul>
                    </div>
                </section>
                
                <section id="bonnes-pratiques">
                    <h2>Bonnes pratiques supplémentaires</h2>
                    
                    <h3>1. Configuration PHP</h3>
                    <p>Dans votre fichier php.ini, configurez ces directives :</p>
                    <ul>
                        <li><code>file_uploads = On</code> (active l'upload)</li>
                        <li><code>upload_max_filesize = 5M</code> (taille max par fichier)</li>
                        <li><code>max_file_uploads = 5</code> (nombre max de fichiers)</li>
                        <li><code>post_max_size = 10M</code> (taille max des données POST)</li>
                    </ul>
                    
                    <h3>2. Stockage sécurisé</h3>
                    <p>Si possible, stockez les fichiers uploadés :</p>
                    <ul>
                        <li>En dehors de la racine web</li>
                        <li>Avec des permissions restrictives (644)</li>
                        <li>Dans une base de données (pour les petits fichiers)</li>
                    </ul>
                    
                    <h3>3. Journalisation</h3>
                    <p>Loggez les tentatives d'upload pour détecter les activités suspectes :</p>
                    
                    <div class="code-block">
                        <span class="code-comment">// Journalisation des uploads</span><br>
                        <span class="code-variable">$log_message</span> = <span class="code-string">"Upload: "</span> . <span class="code-variable">$new_name</span> . <span class="code-string">" - IP: "</span> . <span class="code-variable">$_SERVER</span>[<span class="code-string">'REMOTE_ADDR'</span>] . <span class="code-string">" - Date: "</span> . <span class="code-function">date</span>(<span class="code-string">'Y-m-d H:i:s'</span>);<br>
                        <span class="code-function">file_put_contents</span>(<span class="code-string">'upload_log.txt'</span>, <span class="code-variable">$log_message</span> . PHP_EOL, FILE_APPEND);
                    </div>
                </section>
                
                <section id="exemple-complet">
                    <h2>Exemple complet sécurisé</h2>
                    
                    <div class="example-form">
                        <h3>Formulaire d'upload sécurisé</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p><strong>Sélectionnez une image (PNG, JPG, GIF - max 5Mo) :</strong></p>
                            <input type="file" name="image" accept="image/png, image/jpeg, image/gif">
                            <br><br>
                            <input type="submit" value="Importer" name="submit">
                        </form>
                    </div>
                    
                    <p>Ce formulaire utilise l'attribut <code>accept</code> pour limiter les sélections dans le navigateur, mais cela ne remplace pas les vérifications côté serveur.</p>
                </section>
            </main>
            
            <aside class="sidebar">
                <h3>Navigation</h3>
                <ul class="nav-links">
                    <li><a href="#introduction">Introduction</a></li>
                    <li><a href="#analyse-code">Analyse du code</a></li>
                    <li><a href="#vulnerabilities">Vulnérabilités</a></li>
                    <li><a href="#solutions">Solutions de sécurité</a></li>
                    <li><a href="#code-ameliore">Code amélioré</a></li>
                    <li><a href="#bonnes-pratiques">Bonnes pratiques</a></li>
                    <li><a href="#exemple-complet">Exemple complet</a></li>
                </ul>
                
                <div class="info-box">
                    <h3>Ressources</h3>
                    <ul>
                        <li><a href="https://www.php.net/manual/fr/features.file-upload.php" target="_blank">Documentation PHP - Upload</a></li>
                        <li><a href="https://cheatsheetseries.owasp.org/cheatsheets/File_Upload_Cheat_Sheet.html" target="_blank">OWASP File Upload Cheat Sheet</a></li>
                        <li><a href="https://www.php.net/manual/fr/function.finfo-file.php" target="_blank">PHP finfo_file()</a></li>
                    </ul>
                </div>
                
                <div class="warning-box">
                    <h3>Points clés à retenir</h3>
                    <ul>
                        <li>Ne faites jamais confiance aux données utilisateur</li>
                        <li>Vérifiez toujours le type MIME réel</li>
                        <li>Renommez systématiquement les fichiers</li>
                        <li>Stockez les fichiers hors de la racine web si possible</li>
                        <li>Limitez les types, tailles et quantités de fichiers</li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <p>Cours PHP - Sécurisation de l'upload de fichiers</p>
            <p>Ce cours fait partie de votre projet de recueil de cours PHP</p>
        </div>
    </footer>
</body>
</html>