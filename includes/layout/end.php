<script>
(() => {
  const isHomePage = document.body.classList.contains('page-home');
  const hasPageLoader = !!document.getElementById('page-loader');

  const markPageLoaded = () => {
    document.documentElement.classList.add('page-loaded');

    const loader = document.getElementById('loader');
    if (loader) {
      loader.classList.add('out');
    }
  };

  if (hasPageLoader) {
    window.setTimeout(markPageLoaded, 1000);
    return;
  }

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
<script>
(() => {
  var pageLoader = document.getElementById('page-loader');
  var pageLoaderTitle = document.querySelector('.page-loader-title');

  if (!pageLoader || !pageLoaderTitle) return;

  var finalText = (pageLoaderTitle.getAttribute('data-final-text') || pageLoaderTitle.textContent || '').trim();
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  window.requestAnimationFrame(function () {
    pageLoader.classList.add('is-ready');
  });

  if (reduceMotion) {
    pageLoaderTitle.textContent = finalText;
    return;
  }

  var scrambleGlyphs = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  var scrambleDuration = 720;
  var startTime = null;

  var renderFrame = function (timestamp) {
    if (startTime === null) {
      startTime = timestamp;
    }

    var progress = Math.min((timestamp - startTime) / scrambleDuration, 1);
    var output = '';
    var finalLength = Math.max(finalText.length - 1, 1);

    for (var index = 0; index < finalText.length; index++) {
      var finalChar = finalText.charAt(index);

      if (finalChar === ' ') {
        output += ' ';
        continue;
      }

      var revealPoint = index / finalLength;
      var lockProgress = (progress - revealPoint) / Math.max(1 - revealPoint, 0.0001);

      if (progress >= 1 || lockProgress > 0.72) {
        output += finalChar;
      } else {
        output += scrambleGlyphs.charAt(Math.floor(Math.random() * scrambleGlyphs.length));
      }
    }

    pageLoaderTitle.textContent = progress >= 1 ? finalText : output;

    if (progress < 1) {
      window.requestAnimationFrame(renderFrame);
    }
  };

  window.requestAnimationFrame(renderFrame);
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

  /* Hero: pin section so image stays, animate text boxes upward */
  (function () {
    var heroFlow    = document.querySelector('.brl-hero-flow');
    var bannerLeft  = document.querySelector('.brl-banner-left');
    var bannerRight = document.querySelector('.brl-banner-right');

    if (!heroFlow || !bannerLeft || !bannerRight || reduceMotion) return;

    var tl = gsap.timeline();
    tl.to(bannerLeft,  { y: -200, autoAlpha: 0, ease: 'power2.in', duration: 0.75 }, 0);
    tl.to(bannerRight, { y: -200, autoAlpha: 0, ease: 'power2.in', duration: 0.75 }, 0.12);

    ScrollTrigger.create({
      trigger           : heroFlow,
      start             : 'top top',
      end               : '+=80%',
      pin               : true,
      scrub             : 1.4,
      animation         : tl,
      invalidateOnRefresh: true,
    });
  }());

  /* Bridge: mosaic image morphs into showcase first slide */
  (function () {
    var srcEl  = document.querySelector('.brl-mi--bridge');   /* brl-mi--8 */
    var dstEl  = document.querySelector('.brl-sc-fig--dest'); /* first slide figure */
    var mosaic = document.querySelector('.brl-mosaic');

    if (!srcEl || !dstEl || !mosaic || reduceMotion) return;

    /* Destination image starts invisible — bridge animation reveals it */
    gsap.set(dstEl, { autoAlpha: 0 });

    /* Fixed overlay clone that travels from mosaic → showcase */
    var overlay = document.createElement('figure');
    var oImg    = document.createElement('img');
    oImg.src    = srcEl.querySelector('img').src;
    oImg.alt    = '';
    Object.assign(oImg.style, { width:'100%', height:'100%', objectFit:'cover', display:'block' });
    overlay.appendChild(oImg);
    Object.assign(overlay.style, {
      position     : 'fixed',
      zIndex       : '400',
      margin       : '0',
      padding      : '0',
      pointerEvents: 'none',
      overflow     : 'hidden',
      opacity      : '0',
      top          : '0',
      left         : '0',
      borderRadius : 'clamp(16px,1.6vw,26px)',
      willChange   : 'left,top,width,height,opacity',
    });
    document.body.appendChild(overlay);

    function lerp(a, b, t) { return a + (b - a) * t; }
    function clamp01(v) { return v < 0 ? 0 : v > 1 ? 1 : v; }

    ScrollTrigger.create({
      trigger: mosaic,
      start  : 'bottom 85%',
      end    : 'bottom top',
      scrub  : 1.2,
      onUpdate: function (self) {
        var p    = self.progress;
        var from = srcEl.getBoundingClientRect();
        var to   = dstEl.getBoundingClientRect();

        overlay.style.left   = lerp(from.left,   to.left,   p) + 'px';
        overlay.style.top    = lerp(from.top,    to.top,    p) + 'px';
        overlay.style.width  = lerp(from.width,  to.width,  p) + 'px';
        overlay.style.height = lerp(from.height, to.height, p) + 'px';

        /* Overlay: fade in quickly, hold, fade out into destination */
        var overlayAlpha = p < 0.1 ? p / 0.1 : (p > 0.85 ? (1 - p) / 0.15 : 1);
        overlay.style.opacity = String(clamp01(overlayAlpha));

        /* Destination image fades in as overlay fades out */
        gsap.set(dstEl, { autoAlpha: clamp01((p - 0.80) / 0.20) });

        /* Hide the original mosaic image once clone takes over */
        srcEl.style.opacity = String(clamp01(1 - p * 7));
      },
      onLeaveBack: function () {
        overlay.style.opacity = '0';
        srcEl.style.opacity   = '1';
        gsap.set(dstEl, { autoAlpha: 0 });
      },
      onLeave: function () {
        overlay.style.opacity = '0';
        gsap.set(dstEl, { autoAlpha: 1 }); /* ensure visible after transition */
      },
    });
  }());

  /* Scroll showcase — image-left / text-right slide deck */
  (function () {
    var sc = document.querySelector('.brl-sc');
    var scInner = document.querySelector('.brl-sc-inner');
    var slides = gsap.utils.toArray('.brl-sc-slide');

    if (!sc || !scInner || slides.length < 2 || reduceMotion) return;

    var n = slides.length;
    var holdTime = 1;
    var transTime = 1;
    var dummy = { v: 0 };

    /* Hide all slides except the first */
    gsap.set(slides.slice(1), { autoAlpha: 0, y: 80 });

    var tl = gsap.timeline();

    slides.forEach(function (slide, i) {
      if (i === n - 1) return;

      var transStart = i * (holdTime + transTime) + holdTime;

      tl.to(slide, {
        autoAlpha: 0,
        y: -80,
        ease: 'none',
        duration: transTime,
      }, transStart);

      tl.to(slides[i + 1], {
        autoAlpha: 1,
        y: 0,
        ease: 'none',
        duration: transTime,
      }, transStart);
    });

    /* Hold the last slide so the pin doesn't release instantly */
    tl.to(dummy, { v: 1, duration: holdTime }, (n - 1) * (holdTime + transTime));

    ScrollTrigger.create({
      trigger: sc,
      start: 'top top',
      end: 'bottom bottom',
      pin: scInner,
      scrub: 1.5,
      animation: tl,
      invalidateOnRefresh: true,
    });
  }());

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
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var overHeroBg = document.querySelector('.over-hero-bg');
  var overStory = document.querySelector('.op-story');

  if (!overHeroBg || !overStory || reduceMotion) return;

  gsap.fromTo(overHeroBg, {
    opacity: 1,
  }, {
    opacity: 0,
    ease: 'none',
    scrollTrigger: {
      trigger: overStory,
      start: 'top 92%',
      end: 'top 28%',
      scrub: 1,
    },
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
