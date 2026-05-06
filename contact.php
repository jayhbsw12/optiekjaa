<?php
declare(strict_types=1);

$page = [
    'title' => 'Contact | Optiekjaa',
    'description' => 'Neem contact op met Optiekjaa.',
    'path' => 'contact',
    'robots' => 'noindex, nofollow',
    'body_class' => 'page-contact',
    'scripts' => [],
];

require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout/head.php';
require __DIR__ . '/includes/layout/header.php';
require __DIR__ . '/includes/views/contact.php';
require __DIR__ . '/includes/layout/footer.php';
require __DIR__ . '/includes/layout/end.php';
