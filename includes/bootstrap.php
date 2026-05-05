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

        return $url . $separator . 'v=' . rawurlencode((string) $version);
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
