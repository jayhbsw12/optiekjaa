<?php
declare(strict_types=1);

if (!function_exists('base_path')) {
    function base_path(): string
    {
        static $basePath;

        if ($basePath !== null) {
            return $basePath;
        }

        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
        $directory = str_replace('\\', '/', dirname($scriptName));
        $directory = $directory === '/' ? '' : rtrim($directory, '/.');

        $basePath = $directory === '' ? '/' : $directory . '/';

        return $basePath;
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        $base = base_path();
        $path = ltrim($path, '/');

        if ($path === '') {
            return $base;
        }

        return $base . $path;
    }
}

if (!function_exists('is_local_request')) {
    function is_local_request(): bool
    {
        $host = strtolower((string) ($_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost'));
        $host = preg_replace('/:\d+$/', '', $host) ?? $host;

        return in_array($host, ['localhost', '127.0.0.1', '::1'], true);
    }
}

if (!function_exists('request_cache_buster')) {
    function request_cache_buster(): string
    {
        static $cacheBuster;

        if ($cacheBuster !== null) {
            return $cacheBuster;
        }

        $requestTime = (string) ($_SERVER['REQUEST_TIME_FLOAT'] ?? microtime(true));
        $cacheBuster = preg_replace('/[^0-9]/', '', $requestTime) ?: (string) time();

        return $cacheBuster;
    }
}

if (!function_exists('asset_url')) {
    function asset_url(string $path): string
    {
        $url = url($path);
        $assetPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($path, '/\\'));

        if (!is_file($assetPath)) {
            return $url;
        }

        $version = filemtime($assetPath);
        if ($version === false) {
            return $url;
        }

        $separator = strpos($url, '?') === false ? '?' : '&';

        $query = 'v=' . rawurlencode((string) $version);

        if (is_local_request()) {
            $query .= '&dev=' . rawurlencode(request_cache_buster());
        }

        return $url . $separator . $query;
    }
}

if (!function_exists('absolute_url')) {
    function absolute_url(string $path = ''): string
    {
        $https = $_SERVER['HTTPS'] ?? '';
        $scheme = (!empty($https) && $https !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

        return $scheme . '://' . $host . url($path);
    }
}

if (!function_exists('esc')) {
    function esc(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

$site = [
    'name' => 'Optiekjaa',
    'description' => 'Premium optiek in Suriname met stijlvolle monturen, hoogwaardige glazen en persoonlijke service.',
];

$page = array_merge([
    'title' => $site['name'] . ' | Premium optiek in Suriname',
    'description' => $site['description'],
    'path' => '',
    'robots' => 'noindex, nofollow',
    'body_class' => '',
    'canonical' => absolute_url($page['path'] ?? ''),
    'scripts' => [],
], $page ?? []);

if (is_local_request() && !headers_sent()) {
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');
}
