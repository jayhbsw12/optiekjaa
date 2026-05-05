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

<div id="loader">
  <div class="ld-wordmark"><?= esc($site['name']); ?></div>
  <div class="ld-track"><div class="ld-fill" id="ld-fill"></div></div>
  <div class="ld-label" id="ld-pct">Laden...</div>
</div>

<canvas id="gl" aria-hidden="true"></canvas>
