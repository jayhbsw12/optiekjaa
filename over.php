<?php
declare(strict_types=1);

$page = [
    'title' => 'Over | Optiekjaa',
    'description' => 'Over Optiekjaa.',
    'path' => 'over',
    'robots' => 'noindex, nofollow',
    'body_class' => 'page-over',
    'scripts' => [],
];

require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout/head.php';
require __DIR__ . '/includes/layout/header.php';
require __DIR__ . '/includes/views/over.php';
require __DIR__ . '/includes/layout/footer.php';
require __DIR__ . '/includes/layout/end.php';
