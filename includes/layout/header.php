<?php
$pagePath = (string)($page['path'] ?? '');
$pageLoaderTitles = [
  'over' => 'OVER',
  'brillen' => 'BRILLEN',
  'glazen' => 'GLAZEN',
  'carriere' => 'CARRIERE',
  'contact' => 'CONTACT',
];
$pageLoaderTitle = $pageLoaderTitles[$pagePath] ?? null;
?>
<?php if ($pageLoaderTitle): ?>
<div class="page-loader" id="page-loader" aria-hidden="true">
  <div class="page-loader-stage">
    <p class="page-loader-kicker">Optiek Jaa</p>
    <div class="page-loader-title" data-final-text="<?= esc($pageLoaderTitle); ?>"><?= esc($pageLoaderTitle); ?></div>
  </div>
</div>
<?php endif; ?>
<header class="site-header">
  <nav aria-label="Hoofdnavigatie">
    <div class="nav-shell">
      <div class="nav-brand">
        <a href="<?= esc(url()); ?>" class="nav-logo" aria-label="<?= esc($site['name']); ?>">
          <img
            src="<?= esc(asset_url('assets/img/OPTIEK-LOGO-main.svg')); ?>"
            alt=""
            aria-hidden="true"
            class="nav-logo-img nav-logo-img--default"
          >
          <img
            src="<?= esc(asset_url('assets/img/OPTIEK-LOGO-2-sticky.svg')); ?>"
            alt=""
            aria-hidden="true"
            class="nav-logo-img nav-logo-img--hover"
          >
        </a>
        <span class="nav-divider" aria-hidden="true"></span>
        <span class="nav-subtitle">Premium optiek, Suriname</span>
      </div>
      <ul class="nav-links">
        <li><a href="<?= esc(url('over')); ?>">Over</a></li>
        <li><a href="<?= esc(url('brillen')); ?>">Brillen</a></li>
        <li><a href="<?= esc(url('glazen')); ?>">Glazen</a></li>
        <li><a href="<?= esc(url('carriere')); ?>">Carri&egrave;re</a></li>
      </ul>
      <a href="<?= esc(url('contact')); ?>" class="btn-liquid nav-cta">
        <span class="btn-liquid-shell"></span>
        <span class="btn-liquid-label">Contact</span>
      </a>
    </div>
  </nav>
</header>
