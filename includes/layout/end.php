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
<?php if (str_contains($body, 'page-home') || str_contains($body, 'page-over') || str_contains($body, 'page-brillen') || str_contains($body, 'page-glazen')): ?>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
<?php endif; ?>
<?php if (str_contains($body, 'page-brillen')): ?>
<script>
window.addEventListener('load', function () {
  if (typeof gsap === 'undefined') return;
  gsap.registerPlugin(ScrollTrigger);
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* Hero parallax */
  if (!reduceMotion) {
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
  }

  /* Scroll-driven horizontal gallery */
  var bfSection = document.querySelector('.bf');
  var bfScroll = document.querySelector('.bf-scroll');
  var bfGallery = document.querySelector('.bf-gallery');
  var bfTrack = document.querySelector('.bf-track');

  if (!bfSection || !bfScroll || !bfGallery || !bfTrack) return;

  if (reduceMotion) {
    bfSection.classList.remove('is-scroll-enhanced');
    return;
  }

  var bfImages = gsap.utils.toArray('.bf-slide-image');
  var getTrackDistance = function () {
    return Math.max(0, bfTrack.scrollWidth - bfGallery.clientWidth);
  };
  var syncGalleryMode = function () {
    bfSection.classList.toggle('is-scroll-enhanced', getTrackDistance() > 24);
  };

  syncGalleryMode();

  if (getTrackDistance() <= 24) {
    return;
  }

  gsap.to(bfTrack, {
    x: function () {
      return -getTrackDistance();
    },
    ease: 'none',
    scrollTrigger: {
      trigger: bfScroll,
      start: 'top top',
      end: function () {
        return '+=' + getTrackDistance();
      },
      pin: bfGallery,
      scrub: 1,
      anticipatePin: 1,
      invalidateOnRefresh: true,
      onRefreshInit: syncGalleryMode,
      onRefresh: syncGalleryMode,
    },
  });

  bfImages.forEach(function (image, index) {
    gsap.fromTo(image, {
      xPercent: index % 2 === 0 ? -4 : 4,
      scale: 1.08,
    }, {
      xPercent: index % 2 === 0 ? 4 : -4,
      scale: 1.02,
      ease: 'none',
      scrollTrigger: {
        trigger: bfScroll,
        start: 'top bottom',
        end: 'bottom top',
        scrub: 1,
      },
    });
  });
});
</script>
<?php endif; ?>
<?php if (str_contains($body, 'page-glazen')): ?>
<script>
window.addEventListener('load', function () {
  if (typeof gsap === 'undefined') return;
  gsap.registerPlugin(ScrollTrigger);
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!reduceMotion) {
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
  }

  if (reduceMotion) {
    return;
  }

  var featureVisual = document.querySelector('.brx-feature-visuals');
  if (featureVisual) {
    gsap.fromTo(featureVisual, {
      y: 56,
      autoAlpha: 0,
    }, {
      y: 0,
      autoAlpha: 1,
      duration: 0.9,
      ease: 'power2.out',
      scrollTrigger: {
        trigger: featureVisual,
        start: 'top 78%',
        once: true,
      },
    });
  }

  gsap.utils.toArray('.brx-feature-item').forEach(function (item, index) {
    gsap.fromTo(item, {
      y: 28,
      autoAlpha: 0,
    }, {
      y: 0,
      autoAlpha: 1,
      duration: 0.7,
      ease: 'power2.out',
      delay: index * 0.06,
      scrollTrigger: {
        trigger: item,
        start: 'top 86%',
        once: true,
      },
    });
  });

  gsap.utils.toArray('.brx-story').forEach(function (story) {
    var media = story.querySelector('.brx-story-media img');
    var copy = story.querySelector('.brx-story-copy');

    if (!media || !copy) return;

    gsap.fromTo(copy, {
      y: 64,
      autoAlpha: 0,
    }, {
      y: 0,
      autoAlpha: 1,
      duration: 0.86,
      ease: 'power2.out',
      scrollTrigger: {
        trigger: story,
        start: 'top 72%',
        once: true,
      },
    });

    gsap.fromTo(media, {
      scale: 1.1,
      yPercent: -6,
    }, {
      scale: 1.02,
      yPercent: 6,
      ease: 'none',
      scrollTrigger: {
        trigger: story,
        start: 'top bottom',
        end: 'bottom top',
        scrub: 1,
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


  /* Over banner scroll-to-dark effect */
  if (document.querySelector('.over-banner-overlay')) {
    gsap.to('.over-banner-overlay', {
      opacity: 1,
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

  /* Sticky banner — image stays locked while overlay darkens on scroll */
  ScrollTrigger.create({
    trigger: '.over-banner',
    start: 'top top',
    end: 'bottom top',
    pin: true,
    pinSpacing: true,
    anticipatePin: 1,
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
