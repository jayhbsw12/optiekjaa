<?php
declare(strict_types=1);

$page = [
    'title' => 'Optiekjaa | Premium optiek in Suriname',
    'description' => 'Ontdek stijlvolle brillen, premium glazen en persoonlijke optiekservice bij Optiekjaa in Suriname.',
    'path' => '',
    'robots' => 'noindex, nofollow',
    'body_class' => 'page-home',
    'scripts' => ['assets/js/main.js'],
];

require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout/head.php';
require __DIR__ . '/includes/partials/home-scene.php';
require __DIR__ . '/includes/layout/header.php';
require __DIR__ . '/includes/views/home.php';
require __DIR__ . '/includes/layout/footer.php';
require __DIR__ . '/includes/layout/end.php';
