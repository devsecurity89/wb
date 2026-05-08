<?php
// router.php – Nécessaire pour le serveur PHP intégré de Railway
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Servir directement les fichiers statiques existants
if ($uri !== '/' && file_exists(__DIR__ . $uri) && !preg_match('/\.php$/', $uri)) {
    return false;
}

// Tout le reste est confié au contrôleur frontal
require __DIR__ . '/index.php';
?>