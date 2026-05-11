<?php
declare(strict_types=1);

$page = [
    'title' => 'Brillen | Optiekjaa',
    'description' => 'Ontdek de brillen collectie van Optiek Jaa – zonnebrillen, monturen, veiligheidsbrillen en contactlenzen.',
    'path' => 'brillen',
    'robots' => 'index, follow',
    'body_class' => 'page-brillen',
    'scripts' => [],
];

require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout/head.php';
require __DIR__ . '/includes/layout/header.php';
require __DIR__ . '/includes/views/brillen.php';
require __DIR__ . '/includes/layout/footer.php';
require __DIR__ . '/includes/layout/end.php';
