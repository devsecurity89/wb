<?php
// router.php – Nécessaire pour le serveur PHP intégré de Railway
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Servir directement les fichiers statiques existants (css, js, images…)
if ($uri !== '/' && file_exists(__DIR__ . $uri) && !preg_match('/\.php$/', $uri)) {
    return false;
}

// ⚠️ LIGNE INDISPENSABLE : transmet le chemin demandé à index.php
$_GET['url'] = ltrim($uri, '/');

// Puis on confie tout au contrôleur frontal
require __DIR__ . '/index.php';
?>