<?php
include "../views/view_header.php";
include '../vendor/autoload.php';

/**
 * Méthode qui retourne l'extension d'un fichier
 * @param string $file nom du fichier
 * @return string extension du fichier
 */
function getFileExtension($file)
{
    return strtolower(substr(strrchr($file, '.'), 1));
}

/**
 * Méthode qui vérifie si une extension est autorisée
 * @param string $extension extension du fichier
 * @param array $allowedExtensions tableau des extensions autorisées
 * @return bool true si l'extension est autorisée
 */
function isExtensionAllowed($extension, $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'])
{
    return in_array($extension, $allowedExtensions);
}

/**
 * Méthode qui valide le type MIME d'un fichier
 * @param string $tmp_name chemin temporaire du fichier
 * @param string $expectedType type MIME attendu
 * @return bool true si le type MIME est valide
 */
function validateMimeType($tmp_name, $expectedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
{
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $tmp_name);
    finfo_close($finfo);
    
    return in_array($mime, $expectedTypes);
}

$uploadMessage = '';
$uploadSuccess = false;

if (isset($_POST["submit"]) && isset($_FILES["image"])) {
    $old_name = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $size = $_FILES["image"]["size"];
    $error = $_FILES["image"]["error"];
    
    // Vérifier s'il n'y a pas d'erreur d'upload
    if ($error !== UPLOAD_ERR_OK) {
        switch ($error) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $uploadMessage = "Le fichier est trop volumineux.";
                break;
            case UPLOAD_ERR_PARTIAL:
                $uploadMessage = "Le fichier n'a été que partiellement uploadé.";
                break;
            case UPLOAD_ERR_NO_FILE:
                $uploadMessage = "Aucun fichier n'a été uploadé.";
                break;
            default:
                $uploadMessage = "Erreur lors de l'upload du fichier.";
                break;
        }
    } else {
        $ext = getFileExtension($old_name);
        $new_name = uniqid("img_") . "." . $ext;

        // Définir le répertoire de destination
        $uploadDir = "../public/asset/";
        
        // Vérifier si le répertoire existe, sinon le créer
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $maxSize = 5 * 1024 * 1024; // 5MB

        // Validation de la taille
        if ($size > $maxSize) {
            $uploadMessage = "Le fichier est trop volumineux (max: 5MB).";
        } 
        // Validation de l'extension - CORRECTION : utiliser && au lieu de ||
        else if (!isExtensionAllowed($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $uploadMessage = "Le format de fichier n'est pas autorisé.";
        }
        // Validation du type MIME
        else if (!validateMimeType($tmp_name)) {
            $uploadMessage = "Le type de fichier n'est pas valide.";
        }
        // Vérifier si le fichier est une image réelle
        else if (!getimagesize($tmp_name)) {
            $uploadMessage = "Le fichier n'est pas une image valide.";
        }
        // Vérifier les caractères spéciaux dans le nom
        else if (preg_match('/[^\w\.\-]/', $old_name)) {
            $uploadMessage = "Le nom du fichier contient des caractères non autorisés.";
        }
        // Toutes les validations sont passées
        else {
            $destination = $uploadDir . $new_name;
            
            // Déplacer le fichier uploadé
            if (move_uploaded_file($tmp_name, $destination)) {
                $uploadMessage = "Fichier uploadé avec succès : " . $new_name;
                $uploadSuccess = true;
                
                // Appliquer des permissions sécurisées
                chmod($destination, 0644);
            } else {
                $uploadMessage = "Erreur lors du déplacement du fichier.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Sécurisé de Fichiers</title>
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

        .upload-form {
            background: var(--light);
            padding: 2rem;
            border-radius: 10px;
            margin: 2rem 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            border: 2px dashed #dee2e6;
            border-radius: 5px;
            background: white;
        }

        button {
            background: var(--primary);
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background: var(--secondary);
        }

        .message {
            padding: 1rem;
            border-radius: 5px;
            margin: 1rem 0;
        }

        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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

        .security-item {
            display: flex;
            align-items: flex-start;
            margin: 1rem 0;
        }

        .security-icon {
            background: var(--accent);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
            font-size: 0.8rem;
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

        footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1.5rem;
            color: #6c757d;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <header class="course-header">
        <div class="container">
            <h1>Upload Sécurisé de Fichiers</h1>
            <p class="subtitle">Gérer les uploads de fichiers en PHP de manière sécurisée</p>
        </div>
    </header>

    <div class="container">
        <div class="content-grid">
            <main class="main-content">
                <section id="introduction">
                    <h2>Introduction à l'Upload Sécurisé</h2>
                    <p>L'upload de fichiers est une fonctionnalité courante mais potentiellement dangereuse si elle n'est pas correctement sécurisée. Les attaques peuvent inclure l'upload de scripts malveillants, le dépassement de taille, ou l'exploitation de failles.</p>

                    <div class="upload-form">
                        <h3>Exemple d'Upload</h3>
                        <?php if ($uploadMessage): ?>
                            <div class="message <?php echo $uploadSuccess ? 'success' : 'error'; ?>">
                                <?php echo $uploadMessage; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Sélectionner une image :</label>
                                <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/gif,image/webp" required>
                                <small>Formats autorisés : JPG, JPEG, PNG, GIF, WEBP (max. 5MB)</small>
                            </div>
                            <button type="submit" name="submit">Uploader l'image</button>
                        </form>
                    </div>
                </section>

                <section id="validations">
                    <h2>Validations de Sécurité</h2>

                    <div class="security-item">
                        <div class="security-icon">1</div>
                        <div>
                            <h3>Validation de l'Extension</h3>
                            <p>Vérifier que l'extension du fichier est autorisée.</p>
                            <div class="code-block">
                                <span class="code-keyword">function</span> <span class="code-function">isExtensionAllowed</span>(<span class="code-variable">$extension</span>, <span class="code-variable">$allowedExtensions</span> = [<span class="code-string">'jpg'</span>, <span class="code-string">'jpeg'</span>, <span class="code-string">'png'</span>, <span class="code-string">'gif'</span>, <span class="code-string">'webp'</span>])<br>
                                {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-function">in_array</span>(<span class="code-variable">$extension</span>, <span class="code-variable">$allowedExtensions</span>);<br>
                                }
                            </div>
                        </div>
                    </div>

                    <div class="security-item">
                        <div class="security-icon">2</div>
                        <div>
                            <h3>Validation du Type MIME</h3>
                            <p>Vérifier le type MIME réel du fichier avec finfo().</p>
                            <div class="code-block">
                                <span class="code-keyword">function</span> <span class="code-function">validateMimeType</span>(<span class="code-variable">$tmp_name</span>, <span class="code-variable">$expectedTypes</span> = [<span class="code-string">'image/jpeg'</span>, <span class="code-string">'image/png'</span>, <span class="code-string">'image/gif'</span>, <span class="code-string">'image/webp'</span>])<br>
                                {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$finfo</span> = <span class="code-function">finfo_open</span>(<span class="code-class">FILEINFO_MIME_TYPE</span>);<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$mime</span> = <span class="code-function">finfo_file</span>(<span class="code-variable">$finfo</span>, <span class="code-variable">$tmp_name</span>);<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-function">finfo_close</span>(<span class="code-variable">$finfo</span>);<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return</span> <span class="code-function">in_array</span>(<span class="code-variable">$mime</span>, <span class="code-variable">$expectedTypes</span>);<br>
                                }
                            </div>
                        </div>
                    </div>

                    <div class="security-item">
                        <div class="security-icon">3</div>
                        <div>
                            <h3>Validation de la Taille</h3>
                            <p>Limiter la taille des fichiers uploadés.</p>
                            <div class="code-block">
                                <span class="code-variable">$maxSize</span> = <span class="code-number">5</span> * <span class="code-number">1024</span> * <span class="code-number">1024</span>; <span class="code-comment">// 5MB</span><br>
                                <span class="code-keyword">if</span> (<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"size"</span>] &gt; <span class="code-variable">$maxSize</span>) {<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">echo</span> <span class="code-string">"Le fichier est trop volumineux."</span>;<br>
                                }
                            </div>
                        </div>
                    </div>
                </section>

                <section id="code-complet">
                    <h2>Code Complet Sécurisé</h2>
                    <div class="code-block">
                        <span class="code-comment">// Vérification de l'upload</span><br>
                        <span class="code-keyword">if</span> (<span class="code-function">isset</span>(<span class="code-variable">$_POST</span>[<span class="code-string">"submit"</span>]) &amp;&amp; <span class="code-function">isset</span>(<span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>])) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$old_name</span> = <span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"name"</span>];<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$tmp_name</span> = <span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"tmp_name"</span>];<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$size</span> = <span class="code-variable">$_FILES</span>[<span class="code-string">"image"</span>][<span class="code-string">"size"</span>];<br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$ext</span> = <span class="code-function">getFileExtension</span>(<span class="code-variable">$old_name</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$new_name</span> = <span class="code-function">uniqid</span>(<span class="code-string">"img_"</span>) . <span class="code-string">"."</span> . <span class="code-variable">$ext</span>;<br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$maxSize</span> = <span class="code-number">5</span> * <span class="code-number">1024</span> * <span class="code-number">1024</span>; <span class="code-comment">// 5MB</span><br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// Validations multiples</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">if</span> (<span class="code-variable">$size</span> &gt; <span class="code-variable">$maxSize</span>) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$uploadMessage</span> = <span class="code-string">"Le fichier est trop volumineux."</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;} <span class="code-keyword">else if</span> (!<span class="code-function">isExtensionAllowed</span>(<span class="code-variable">$ext</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$uploadMessage</span> = <span class="code-string">"Format non autorisé."</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;} <span class="code-keyword">else if</span> (!<span class="code-function">validateMimeType</span>(<span class="code-variable">$tmp_name</span>)) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-variable">$uploadMessage</span> = <span class="code-string">"Type MIME invalide."</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;} <span class="code-keyword">else</span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment">// Upload sécurisé</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-function">move_uploaded_file</span>(<span class="code-variable">$tmp_name</span>, <span class="code-string">"../public/asset/"</span> . <span class="code-variable">$new_name</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                        }
                    </div>
                </section>

                <section id="bonnes-pratiques">
                    <h2>Bonnes Pratiques</h2>

                    <div class="tip">
                        <h3>✅ À Faire</h3>
                        <ul>
                            <li><strong>Renommer les fichiers</strong> : Utiliser un nom unique généré</li>
                            <li><strong>Valider le type MIME</strong> : Avec finfo() ou exif_imagetype()</li>
                            <li><strong>Limiter la taille</strong> : Configurer upload_max_filesize dans php.ini</li>
                            <li><strong>Stockage sécurisé</strong> : Hors de la racine web si possible</li>
                            <li><strong>Permissions</strong> : 0644 pour les fichiers uploadés</li>
                        </ul>
                    </div>

                    <div class="warning">
                        <h3>❌ À Éviter</h3>
                        <ul>
                            <li><strong>Faire confiance au nom de fichier</strong> : Toujours le renommer</li>
                            <li><strong>Valider seulement l'extension</strong> : Facile à contourner</li>
                            <li><strong>Stocker dans la racine web</strong> : Risque d'exécution</li>
                            <li><strong>Oublier les erreurs d'upload</strong> : Vérifier $_FILES['error']</li>
                        </ul>
                    </div>
                </section>
            </main>

            <aside class="sidebar">
                <div class="table-of-contents">
                    <h3>Table des Matières</h3>
                    <ul>
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#validations">Validations</a></li>
                        <li><a href="#code-complet">Code Complet</a></li>
                        <li><a href="#bonnes-pratiques">Bonnes Pratiques</a></li>
                    </ul>
                </div>

                <div class="key-points">
                    <h3>Points Clés de Sécurité</h3>
                    <ul>
                        <li>Validation du type MIME</li>
                        <li>Limitation de taille</li>
                        <li>Renommage des fichiers</li>
                        <li>Stockage sécurisé</li>
                        <li>Gestion des erreurs</li>
                    </ul>
                </div>

                <div class="resources">
                    <h3>Configurations PHP</h3>
                    <ul>
                        <li>upload_max_filesize = 5M</li>
                        <li>post_max_size = 10M</li>
                        <li>max_file_uploads = 20</li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>Cours sur l'upload sécurisé de fichiers - Projet Recueil de Cours</p>
        </div>
    </footer>
</body>

</html>