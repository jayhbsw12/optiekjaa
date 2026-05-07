<script>
(() => {
  const isHomePage = document.body.classList.contains('page-home');

  const markPageLoaded = () => {
    document.documentElement.classList.add('page-loaded');

    const loader = document.getElementById('loader');
    if (loader) {
      loader.classList.add('out');
    }
  };

  if (!isHomePage) {
    window.addEventListener('load', () => {
      window.setTimeout(markPageLoaded, 240);
    }, { once: true });

    window.setTimeout(markPageLoaded, 2400);
    return;
  }

  window.setTimeout(markPageLoaded, 9000);
})();
</script>
<?php if (strpos((string) ($page['body_class'] ?? ''), 'page-home') !== false): ?>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
<?php endif; ?>
<script type="importmap">
{
  "imports": {
    "three": "https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js",
    "three/addons/": "https://cdn.jsdelivr.net/npm/three@0.160.0/examples/jsm/"
  }
}
</script>
<?php foreach ($page['scripts'] as $script): ?>
<script type="module" src="<?= esc(asset_url($script)); ?>"></script>
<?php endforeach; ?>
<script type="module" src="<?= esc(asset_url('assets/js/whatsapp-float.js')); ?>"></script>
<script type="module">
(() => {
  const footer = document.querySelector('.site-footer');
  if (!footer) {
    return;
  }

  const moduleUrl = '<?= esc(asset_url('assets/js/footer-coins.js')); ?>';
  let loaded = false;
  let observer = null;

  const loadFooterCoins = () => {
    if (loaded) {
      return;
    }

    loaded = true;
    observer?.disconnect();
    import(moduleUrl);
  };

  if ('IntersectionObserver' in window) {
    observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.target === footer && entry.isIntersecting) {
          loadFooterCoins();
        }
      });
    }, { rootMargin: '320px 0px' });

    observer.observe(footer);
  } else {
    window.addEventListener('load', loadFooterCoins, { once: true });
    return;
  }

  const scheduleFallbackLoad = () => {
    if ('requestIdleCallback' in window) {
      window.requestIdleCallback(loadFooterCoins, { timeout: 4000 });
      return;
    }

    window.setTimeout(loadFooterCoins, 2600);
  };

  window.addEventListener('load', scheduleFallbackLoad, { once: true });
})();
</script>
</body>
</html>
