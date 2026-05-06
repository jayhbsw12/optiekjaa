<?php
declare(strict_types=1);

$page = [
    'title' => 'Glazen | Optiekjaa',
    'description' => 'Glazen van Optiekjaa.',
    'path' => 'glazen',
    'robots' => 'noindex, nofollow',
    'body_class' => 'page-glazen',
    'scripts' => [],
];

require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout/head.php';
require __DIR__ . '/includes/layout/header.php';
require __DIR__ . '/includes/views/glazen.php';
require __DIR__ . '/includes/layout/footer.php';
require __DIR__ . '/includes/layout/end.php';
