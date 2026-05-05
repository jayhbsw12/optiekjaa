<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc($page['title']); ?></title>
<meta name="description" content="<?= esc($page['description']); ?>">
<meta name="robots" content="<?= esc($page['robots']); ?>">
<meta name="theme-color" content="#4e565a">
<meta property="og:type" content="website">
<meta property="og:locale" content="nl_NL">
<meta property="og:site_name" content="<?= esc($site['name']); ?>">
<meta property="og:title" content="<?= esc($page['title']); ?>">
<meta property="og:description" content="<?= esc($page['description']); ?>">
<?php if (!empty($page['canonical'])): ?>
<link rel="canonical" href="<?= esc($page['canonical']); ?>">
<meta property="og:url" content="<?= esc($page['canonical']); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?= esc(asset_url('assets/css/main.css')); ?>">
</head>
<body class="<?= esc(trim((string) $page['body_class'])); ?>">
<a class="skip-link" href="#content">Ga naar inhoud</a>
