<?php
declare(strict_types=1);

http_response_code(404);

$page = [
    'title' => '404 | Optiekjaa',
    'description' => 'De pagina die u zoekt bestaat niet meer. Ga terug naar de homepage van Optiekjaa.',
    'path' => '404',
    'robots' => 'noindex, nofollow',
    'body_class' => 'page-404',
    'canonical' => '',
    'scripts' => [],
];

require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout/head.php';
require __DIR__ . '/includes/layout/header.php';
require __DIR__ . '/includes/views/404.php';
require __DIR__ . '/includes/layout/footer.php';
require __DIR__ . '/includes/layout/end.php';
