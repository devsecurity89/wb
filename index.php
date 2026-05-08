<?php
// index.php – Front controller avec page leurre + accès secret
require __DIR__ . '/protect.php';

$url = $_GET['url'] ?? '';
$url = str_replace(['..', "\0"], '', $url);

// ⚠️ CONFIG – Modifiez ces deux valeurs pour chaque campagne
$codeSecret = 'x8';              // le code court (2 caractères suffisent)
$paramName  = 'c';               // le nom du paramètre dans l'URL (ex: ?c=x8)
$pageReelle = 'home.php';        // votre vraie page protégée
$pageLeurre = 'legitime.php';    // page neutre affichée par défaut

// Si l'URL est vide, on décide quelle page afficher
if ($url === '') {
    // Afficher la vraie page UNIQUEMENT si le paramètre secret est présent et correct
    if (isset($_GET[$paramName]) && $_GET[$paramName] === $codeSecret) {
        $url = $pageReelle;
    } else {
        $url = $pageLeurre;
    }
}

$file = __DIR__ . '/' . $url;

if (file_exists($file) && is_file($file)) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    $mimeTypes = [
        'css'   => 'text/css',
        'js'    => 'application/javascript',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'ico'   => 'image/x-icon',
        'svg'   => 'image/svg+xml',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf'   => 'font/ttf',
        'eot'   => 'application/vnd.ms-fontobject',
        'webp'  => 'image/webp',
        'pdf'   => 'application/pdf',
        'html'  => 'text/html',
        'htm'   => 'text/html',
        'txt'   => 'text/plain',
        'php'   => 'text/html',
    ];

    if ($ext === 'php') {
        include $file;
        exit;
    }

    if (isset($mimeTypes[$ext])) {
        header('Content-Type: ' . $mimeTypes[$ext]);
    } else {
        header('Content-Type: application/octet-stream');
    }

    $cacheDuration = 3600;
    header('Cache-Control: public, max-age=' . $cacheDuration);
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $cacheDuration) . ' GMT');

    readfile($file);
    exit;
}

http_response_code(404);
echo '<h1>404 - Page introuvable</h1>';
?>