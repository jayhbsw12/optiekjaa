<?php
$bfSlides = [
  [
    'eyebrow' => '01 / Dagelijks zicht',
    'title' => 'Enkelvoudige brillen',
    'image' => 'assets/img/Brillen-banner.webp',
    'alt' => 'Tijdelijke collectieafbeelding voor enkelvoudige brillen',
  ],
  [
    'eyebrow' => '02 / Twee focuszones',
    'title' => 'Bifocale brillen',
    'image' => 'assets/img/Choose-your-frames-or-lenses-with-the-guidance-of-our-team.webp',
    'alt' => 'Tijdelijke collectieafbeelding voor bifocale brillen',
  ],
  [
    'eyebrow' => '03 / Veraf en dichtbij',
    'title' => 'Multifocale brillen',
    'image' => 'assets/img/Get-your-glasses-or-lenses-and-enjoy-better-vision.webp',
    'alt' => 'Tijdelijke collectieafbeelding voor multifocale brillen',
  ],
  [
    'eyebrow' => '04 / Jong en comfortabel',
    'title' => 'Kinderbrillen',
    'image' => 'assets/img/over-ons-option.webp',
    'alt' => 'Tijdelijke collectieafbeelding voor kinderbrillen',
  ],
  [
    'eyebrow' => '05 / Werk en scherm',
    'title' => 'Computerbrillen',
    'image' => 'assets/img/Have-your-eyes-measured-by-our-experts.webp',
    'alt' => 'Tijdelijke collectieafbeelding voor computerbrillen',
  ],
  [
    'eyebrow' => '06 / Bescherming',
    'title' => 'Veiligheidsbrillen',
    'image' => 'assets/img/Model-homepage-Quote-option.webp',
    'alt' => 'Tijdelijke collectieafbeelding voor veiligheidsbrillen',
  ],
];
?>

<main id="content" class="site-main">

  <section class="bh" aria-label="Brillen collectie">

    <div class="bh-bg" aria-hidden="true">
      <img class="bh-img"
           src="<?= esc(asset_url('assets/img/Brillen-banner.webp')); ?>"
           alt=""
           loading="eager">
    </div>
    <div class="bh-overlay" aria-hidden="true"></div>

    <div class="bh-foot">
      <h1 class="bh-headline">Brillen<br><em>collectie.</em></h1>
      <p class="bh-tagline">Stijlvol zicht voor elke gelegenheid.</p>
    </div>

  </section>

  <section class="bf" aria-labelledby="bf-title">
    <div class="bf-shell">
      <div class="bf-head">
        <div class="bf-head-copy">
          <p class="bf-kicker">Brillen collectie</p>
          <h2 id="bf-title" class="bf-title">Scroll horizontaal door onze collectie.</h2>
        </div>
        <p class="bf-lead">
          Deze showcase beweegt mee met de viewport terwijl u scrolt. De beelden zijn tijdelijk en kunnen later eenvoudig worden vervangen door definitieve collectiebeelden.
        </p>
      </div>
    </div>

    <div class="bf-scroll">
      <div class="bf-gallery">
        <div class="bf-track">
          <?php foreach ($bfSlides as $slide): ?>
            <article class="bf-slide">
              <img
                class="bf-slide-image"
                src="<?= esc(asset_url($slide['image'])); ?>"
                alt="<?= esc($slide['alt']); ?>"
                loading="lazy"
                decoding="async"
              >
              <div class="bf-slide-meta">
                <p class="bf-slide-eyebrow"><?= esc($slide['eyebrow']); ?></p>
                <h3 class="bf-slide-title"><?= esc($slide['title']); ?></h3>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

</main>
