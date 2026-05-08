<?php
// index.php – Contrôleur frontal universel (protège TOUS les fichiers)
require __DIR__ . '/protect.php';

$url = $_GET['url'] ?? '';
$url = str_replace(['..', "\0"], '', $url);

if ($url === '') {
    $url = 'home.php';  // page d'accueil par défaut
}

$file = __DIR__ . '/' . $url;

if (file_exists($file) && is_file($file)) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    // Types MIME courants
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

    // Si c'est un fichier PHP, on l'inclut
    if ($ext === 'php') {
        include $file;
        exit;
    }

    // Pour les autres fichiers, on définit le bon Content-Type
    if (isset($mimeTypes[$ext])) {
        header('Content-Type: ' . $mimeTypes[$ext]);
    } else {
        header('Content-Type: application/octet-stream');
    }

    // Gestion du cache (facultatif) : vous pouvez ajuster la durée
    $cacheDuration = 3600; // 1 heure
    header('Cache-Control: public, max-age=' . $cacheDuration);
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $cacheDuration) . ' GMT');

    // On envoie le fichier
    readfile($file);
    exit;
}

// 404
http_response_code(404);
echo '<h1>404 - Page introuvable</h1>';