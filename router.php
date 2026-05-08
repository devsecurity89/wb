<?php
// router.php – Routeur pour serveur PHP intégré (Railway, Docker)
// Fonctionne comme votre ancien .htaccess

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Si la requête correspond à un fichier statique existant (CSS, JS, images, polices…),
// on laisse le serveur PHP le servir directement (return false).
if ($uri !== '/' && file_exists(__DIR__ . $uri) && !preg_match('/\.php$/', $uri)) {
    return false;
}

// Sinon, on passe tout au contrôleur frontal (votre index.php qui appelle protect.php)
require __DIR__ . '/index.php';
?>