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

  <div class="brl-hero-flow">

    <div class="brl-hero-bg" aria-hidden="true">
      <img
        loading="eager"
        src="<?= esc(asset_url('assets/img/Brillen-banner.webp')); ?>"
        alt=""
      >
    </div>

    <section class="brl-banner" aria-label="Brillen collectie banner">
      <div class="brl-banner-strip">
        <div class="brl-banner-inner">

          <div class="brl-banner-left">
            <h1 class="brl-banner-h1">Brillen<br><em>collectie.</em></h1>
          </div>

          <div class="brl-banner-right">
            <p class="brl-banner-sub">
              Stijlvol zicht voor elke gelegenheid&nbsp;&mdash; van enkelvoudig tot multifocaal, voor elk gezicht en elke levensstijl.
            </p>
            <div class="brl-banner-actions">
              <a href="#collectie" class="brl-btn">Bekijk collectie</a>
              <a href="/contact.php" class="brl-btn">Contact</a>
            </div>
          </div>

        </div>
      </div>
    </section>


  </div>

  <section class="brl-mosaic" aria-label="Brillen galerij">
    <div class="brl-mosaic-wrap">

      <figure class="brl-mi brl-mi--1" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/Have-your-eyes-measured-by-our-experts.webp')); ?>" alt="" loading="lazy">
      </figure>
      <figure class="brl-mi brl-mi--2" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/Choose-your-frames-or-lenses-with-the-guidance-of-our-team.webp')); ?>" alt="" loading="lazy">
      </figure>
      <figure class="brl-mi brl-mi--3" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/over-ons-option.webp')); ?>" alt="" loading="lazy">
      </figure>
      <figure class="brl-mi brl-mi--4" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/over-ons.webp')); ?>" alt="" loading="lazy">
      </figure>

      <figure class="brl-mi brl-mi--5" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/Get-your-glasses-or-lenses-and-enjoy-better-vision.webp')); ?>" alt="" loading="lazy">
      </figure>
      <figure class="brl-mi brl-mi--6" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/Model-homepage-Quote-option.webp')); ?>" alt="" loading="lazy">
      </figure>

      <div class="brl-mosaic-focus">
        <figure class="brl-mosaic-feat" aria-hidden="true">
          <img src="<?= esc(asset_url('assets/img/Brillen-banner.webp')); ?>" alt="" loading="lazy">
        </figure>
        <p class="brl-mosaic-tagline">Jouw stijl. Ons vakmanschap.</p>
        <p class="brl-mosaic-desc">Vakkundige zorg, topmerken en gecertificeerde brillen &mdash; al jaren het vertrouwde adres voor iedereen die waarde hecht aan helder zicht en stijl.</p>
      </div>

      <figure class="brl-mi brl-mi--7" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/Over-about.png')); ?>" alt="" loading="lazy">
      </figure>
      <figure class="brl-mi brl-mi--8 brl-mi--bridge" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/Get-your-glasses-or-lenses-and-enjoy-better-vision.webp')); ?>" alt="" loading="lazy">
      </figure>
      <figure class="brl-mi brl-mi--9" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/Have-your-eyes-measured-by-our-experts.webp')); ?>" alt="" loading="lazy">
      </figure>
      <figure class="brl-mi brl-mi--10" aria-hidden="true">
        <img src="<?= esc(asset_url('assets/img/Choose-your-frames-or-lenses-with-the-guidance-of-our-team.webp')); ?>" alt="" loading="lazy">
      </figure>

    </div>
  </section>

  <section class="brl-sc" id="brl-sc" aria-label="Brillen showcase">
    <div class="brl-sc-inner">

      <div class="brl-sc-slide">
        <figure class="brl-sc-fig brl-sc-fig--dest">
          <img src="<?= esc(asset_url('assets/img/Get-your-glasses-or-lenses-and-enjoy-better-vision.webp')); ?>" alt="Geniet van beter zicht" loading="lazy">
        </figure>
        <div class="brl-sc-copy">
          <p class="brl-sc-eyebrow">01 &mdash; Geniet van beter zicht</p>
          <h2 class="brl-sc-heading">Uw bril.<br>Uw wereld.</h2>
          <p class="brl-sc-body">Onze gecertificeerde opticiens begeleiden u van meting tot montuur. Stap de winkel uit met een bril die perfect past bij uw ogen én uw stijl.</p>
        </div>
      </div>

      <div class="brl-sc-slide">
        <figure class="brl-sc-fig">
          <img src="<?= esc(asset_url('assets/img/Have-your-eyes-measured-by-our-experts.webp')); ?>" alt="Oogmeting door experts" loading="lazy">
        </figure>
        <div class="brl-sc-copy">
          <p class="brl-sc-eyebrow">02 &mdash; Ver &amp; dichtbij</p>
          <h2 class="brl-sc-heading">Multifocale<br>brillen.</h2>
          <p class="brl-sc-body">Met &eacute;&eacute;n bril scherp zicht op alle afstanden. Onze opticiens begeleiden u stap voor stap naar de meest comfortabele glazen voor uw dagelijks leven.</p>
        </div>
      </div>

      <div class="brl-sc-slide">
        <figure class="brl-sc-fig">
          <img src="<?= esc(asset_url('assets/img/Get-your-glasses-or-lenses-and-enjoy-better-vision.webp')); ?>" alt="Geniet van beter zicht" loading="lazy">
        </figure>
        <div class="brl-sc-copy">
          <p class="brl-sc-eyebrow">03 &mdash; Uw ogen in goede handen</p>
          <h2 class="brl-sc-heading">Professionele<br>oogmeting.</h2>
          <p class="brl-sc-body">Onze gecertificeerde opticiens meten uw ogen nauwkeurig en adviseren u eerlijk. Uw zicht is onze prioriteit &mdash; geen verrassingen, alleen helder resultaat.</p>
        </div>
      </div>

    </div>
  </section>

</main>
