<?php
declare(strict_types=1);

$page = [
    'title' => 'Carriere | Optiekjaa',
    'description' => 'Carriere bij Optiekjaa.',
    'path' => 'carriere',
    'robots' => 'noindex, nofollow',
    'body_class' => 'page-blank page-carriere',
    'scripts' => [],
];

require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout/head.php';
require __DIR__ . '/includes/layout/header.php';
require __DIR__ . '/includes/views/blank-page.php';
require __DIR__ . '/includes/layout/footer.php';
require __DIR__ . '/includes/layout/end.php';
