<svg class="hidden-svg" aria-hidden="true">
  <defs>
    <filter id="lg-filter" x="0%" y="0%" width="100%" height="100%" color-interpolation-filters="sRGB">
      <feTurbulence type="fractalNoise" baseFrequency="0.06 0.06" numOctaves="1" seed="3" result="noise"/>
      <feGaussianBlur in="noise" stdDeviation="1.5" result="blurNoise"/>
      <feDisplacementMap in="SourceGraphic" in2="blurNoise" scale="55" xChannelSelector="R" yChannelSelector="B" result="displaced"/>
      <feGaussianBlur in="displaced" stdDeviation="2.5" result="final"/>
      <feComposite in="final" in2="final" operator="over"/>
    </filter>
  </defs>
</svg>

<?php
$loaderFrameImages = [];
$disablePreloader = true;
$modelAssetVersions = [
    'scene.bin' => asset_url('glasses_06/scene.bin'),
    'textures/waku03_normal.png' => asset_url('glasses_06/textures/waku03_normal.png'),
];
for ($index = 1; $index <= 13; $index++) {
    $loaderFrameImages[] = asset_url(sprintf('assets/img/Optiekjaa footer frames/optiekjaa-footer-frame-%02d.png', $index));
}
?>

<div
  id="loader"
  <?php if ($disablePreloader): ?>
    data-disabled="true"
    hidden
    aria-hidden="true"
  <?php endif; ?>
>
  <div class="ld-stage">
    <div
      class="ld-frame-strip"
      id="ld-frame-strip"
      data-frame-images="<?= esc(implode('|', $loaderFrameImages)); ?>"
      aria-hidden="true"
    >
      <div class="ld-frame-slot ld-frame-slot--buffer-left">
        <img class="ld-frame-image" id="ld-frame-left" src="<?= esc($loaderFrameImages[0]); ?>" alt="">
      </div>
      <div class="ld-frame-slot ld-frame-slot--left">
        <img class="ld-frame-image" id="ld-frame-center" src="<?= esc($loaderFrameImages[1]); ?>" alt="">
      </div>
      <div class="ld-frame-slot ld-frame-slot--center">
        <img class="ld-frame-image" id="ld-frame-right" src="<?= esc($loaderFrameImages[2]); ?>" alt="">
      </div>
      <div class="ld-frame-slot ld-frame-slot--right">
        <img class="ld-frame-image" src="<?= esc($loaderFrameImages[3]); ?>" alt="">
      </div>
      <div class="ld-frame-slot ld-frame-slot--buffer-right">
        <img class="ld-frame-image" src="<?= esc($loaderFrameImages[4]); ?>" alt="">
      </div>
    </div>

    <div class="ld-brand">
      <img
        class="ld-logo"
        src="<?= esc(asset_url('assets/img/OPTIEK-LOGO-main.svg')); ?>"
        alt="<?= esc($site['name']); ?>"
      >
    </div>
  </div>

  <div class="ld-progress">
    <div class="ld-progress-copy">
      <span class="ld-status" id="ld-status">LOADING</span>
    </div>
    <div class="ld-track">
      <div class="ld-fill" id="ld-fill"></div>
    </div>
  </div>
</div>

<canvas
  id="gl"
  aria-hidden="true"
  data-model-url="<?= esc(asset_url('glasses_06/scene.gltf')); ?>"
  data-model-assets="<?= esc(json_encode($modelAssetVersions, JSON_UNESCAPED_SLASHES)); ?>"
></canvas>
