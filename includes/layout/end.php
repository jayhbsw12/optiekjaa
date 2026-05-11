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
<?php $body = (string)($page['body_class'] ?? ''); ?>
<?php if (str_contains($body, 'page-home') || str_contains($body, 'page-over') || str_contains($body, 'page-brillen')): ?>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
<?php endif; ?>
<?php if (str_contains($body, 'page-brillen')): ?>
<script>
window.addEventListener('load', function () {
  if (typeof gsap === 'undefined') return;
  gsap.registerPlugin(ScrollTrigger);

  /* Hero parallax */
  gsap.to('.bh-bg', {
    yPercent: 28,
    ease: 'none',
    scrollTrigger: {
      trigger: '.bh',
      start: 'top top',
      end: 'bottom top',
      scrub: true,
    },
  });

  /* Cards reveal as they scroll into the sticky grey box area */
  var bfCards = gsap.utils.toArray('.bf-card');
  gsap.set(bfCards, { y: 60, opacity: 0 });
  bfCards.forEach(function (card) {
    gsap.to(card, {
      y: 0,
      opacity: 1,
      ease: 'power2.out',
      scrollTrigger: {
        trigger: card,
        start: 'top bottom-=60',
        end: 'top center+=60',
        scrub: 0.8,
      },
    });
  });

});
</script>
<?php endif; ?>
<?php if (str_contains($body, 'page-over')): ?>
<script>
window.addEventListener('load', function () {
  if (typeof gsap === 'undefined') return;
  gsap.registerPlugin(ScrollTrigger);
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* Hero parallax */
  if (!reduceMotion) {
    gsap.to('.over-banner-bg', {
      yPercent: 32,
      ease: 'none',
      scrollTrigger: {
        trigger: '.over-banner',
        start: 'top top',
        end: 'bottom top',
        scrub: 1,
      },
    });
  }

  if (reduceMotion) return;

  const steps = gsap.utils.toArray('.journey-step');

  steps.forEach(function (step, index) {
    const media = step.querySelector('.journey-step-media img');
    const content = step.querySelector('.journey-step-copy-wrap');
    const wash = step.querySelector('.journey-step-wash');

    if (!media || !content || !wash) return;

    gsap.set([media, content, wash], {
      force3D: true,
    });

    const timeline = gsap.timeline({
      defaults: {
        ease: 'none',
      },
      scrollTrigger: {
        trigger: step,
        start: 'top bottom',
        end: 'bottom top',
        scrub: 1.15,
        invalidateOnRefresh: true,
      },
    });

    timeline
      .fromTo(media, {
        yPercent: -14,
        scale: 1.16,
      }, {
        yPercent: 12,
        scale: 1.02,
      }, 0)
      .fromTo(wash, {
        opacity: 0.94,
      }, {
        opacity: index === steps.length - 1 ? 0.74 : 0.6,
      }, 0)
      .fromTo(content, {
        y: 72,
        autoAlpha: 0,
      }, {
        y: 0,
        autoAlpha: 1,
        duration: 0.24,
      }, 0.14)
      .to(content, {
        y: 0,
        autoAlpha: 1,
        duration: 0.34,
      }, 0.38)
      .to(content, {
        y: -56,
        autoAlpha: index === steps.length - 1 ? 0.72 : 0.12,
        duration: 0.22,
      }, 0.78);
  });
});
</script>
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
