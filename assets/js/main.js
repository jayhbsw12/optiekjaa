const canvas = document.getElementById('gl');
const heroEl = document.getElementById('s-hero');
const featEl = document.getElementById('s-feature');
const featCpy = document.getElementById('feat-copy');
const collectionScroll = document.getElementById('collection-scroll');
const collectionModel = document.querySelector('.collection-model');
const collectionCards = [...document.querySelectorAll('.collection-card')];
const navShell = document.querySelector('.nav-shell');
const navLogo = document.querySelector('.nav-logo');
const navDivider = document.querySelector('.nav-divider');
const navSubtitle = document.querySelector('.nav-subtitle');
const navLinks = [...document.querySelectorAll('.nav-links li')];
const navCta = document.querySelector('.nav-cta');
const loaderEl = document.getElementById('loader');
const ldTrack = document.querySelector('.ld-track');
const ldFill = document.getElementById('ld-fill');
const ldPct = document.getElementById('ld-pct');
const ldWordmark = document.querySelector('.ld-wordmark');
const heroEyebrow = document.querySelector('.hero-eyebrow');
const heroLines = [...document.querySelectorAll('.hero-line')];
const clippedHeadingBlocks = [...document.querySelectorAll('.heading-clip')];
const heroDesc = document.querySelector('.hero-desc');
const heroActions = document.querySelector('.hero-actions');
const heroActionItems = heroActions ? [...heroActions.children] : [];
const heroScrollIndicator = document.querySelector('.hero-scroll');
const editorialBand = document.querySelector('.editorial-band');
const editorialImage = document.querySelector('.editorial-band-img');
const editorialCopy = document.querySelector('.editorial-copy');
const marqueePlaySections = [...document.querySelectorAll('[data-marquee-play]')];
const brandRibbon = document.querySelector('.brand-ribbon');
const brandRibbonTrack = brandRibbon?.querySelector('[data-brand-ribbon-track]');
const brandRibbonGroups = brandRibbonTrack ? [...brandRibbonTrack.querySelectorAll('.brand-ribbon-group')] : [];
const footerEl = document.querySelector('.site-footer');
const footerKicker = footerEl?.querySelector('.footer-kicker');
const footerCredit = footerEl?.querySelector('.footer-credit');
const footerCopy = footerEl?.querySelector('.footer-copy');
const footerNewsForm = footerEl?.querySelector('.footer-news-form');
const footerLabels = footerEl ? [...footerEl.querySelectorAll('.footer-label')] : [];
const footerGiantLinks = footerEl ? [...footerEl.querySelectorAll('.footer-giant-link')] : [];
const footerIconButtons = footerEl ? [...footerEl.querySelectorAll('.footer-icon-btn')] : [];
const footerContactLines = footerEl ? [...footerEl.querySelectorAll('.footer-contact-lines > *')] : [];
const footerBarItems = footerEl
  ? [footerEl.querySelector('.footer-bar-copy'), ...footerEl.querySelectorAll('.footer-bar-links a')].filter(Boolean)
  : [];
const modelUrl = new URL('../../glasses_06/scene.gltf', import.meta.url).href;
const body = document.body;
const root = document.documentElement;
const themeAccent = getComputedStyle(root).getPropertyValue('--brand-accent').trim() || '#f7b704';
const reduceMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
const gsapLib = window.gsap;
const scrollTriggerLib = window.ScrollTrigger;
const motionEnabled = Boolean(body?.classList.contains('page-home') && gsapLib && !reduceMotionQuery.matches);
const motionState = {
  introPlayed: false,
  loaderEnterPlayed: false,
  loaderExitPlayed: false,
  loaderChars: [],
  navSubtitleWords: [],
  footerLinkSets: [],
};
const markPageLoaded = () => root.classList.add('page-loaded');
const setModelFallback = () => root.classList.add('model-fallback');
const clearModelFallback = () => root.classList.remove('model-fallback');

const wrapLineMask = (element) => {
  if (!element) {
    return null;
  }

  if (element.parentElement?.classList.contains('gsap-line-mask')) {
    return element.parentElement;
  }

  const mask = document.createElement('span');
  mask.className = 'gsap-line-mask';
  element.parentNode?.insertBefore(mask, element);
  mask.appendChild(element);

  return mask;
};

const splitTextUnits = (element, mode = 'chars') => {
  if (!element) {
    return [];
  }

  const selector = mode === 'words' ? '.gsap-word' : '.gsap-char';
  if (element.dataset.gsapSplit === mode) {
    return [...element.querySelectorAll(selector)];
  }

  const text = (element.textContent || '').replace(/\s+/g, ' ').trim();
  if (!text) {
    return [];
  }

  element.dataset.gsapSplit = mode;
  element.setAttribute('aria-label', text);
  element.textContent = '';

  const parts = mode === 'words' ? text.split(/(\s+)/) : Array.from(text);
  const fragment = document.createDocumentFragment();

  parts.forEach((part) => {
    if (!part) {
      return;
    }

    if (/\s+/.test(part)) {
      fragment.appendChild(document.createTextNode(part));
      return;
    }

    const span = document.createElement('span');
    span.className = mode === 'words' ? 'gsap-word' : 'gsap-char';
    span.textContent = part;
    span.setAttribute('aria-hidden', 'true');
    fragment.appendChild(span);
  });

  element.appendChild(fragment);
  return [...element.querySelectorAll(selector)];
};

const getClippedHeadingLines = (element) => [...(element?.children || [])]
  .filter((child) => child.classList.contains('heading-clip-line'));

const playHomepageIntro = () => {
  if (!motionEnabled || motionState.introPlayed) {
    return;
  }

  motionState.introPlayed = true;

  const navSubtitleTargets = motionState.navSubtitleWords.length ? motionState.navSubtitleWords : (navSubtitle ? [navSubtitle] : []);
  const heroTextTargets = [heroEyebrow, heroDesc].filter(Boolean);
  const introActionTargets = heroActionItems.length ? heroActionItems : (heroActions ? [heroActions] : []);
  const timeline = gsapLib.timeline({ defaults: { ease: 'power3.out' } });

  timeline
    .to(navShell, {
      y: 0,
      autoAlpha: 1,
      scale: 1,
      duration: 1.1,
      ease: 'expo.out',
    })
    .to(navLogo, {
      y: 0,
      autoAlpha: 1,
      duration: 0.72,
    }, 0.16)
    .to(navDivider, {
      scaleY: 1,
      autoAlpha: 1,
      duration: 0.62,
    }, 0.24)
    .to(navSubtitleTargets, {
      yPercent: 0,
      y: 0,
      autoAlpha: 1,
      duration: 0.72,
      stagger: 0.05,
      ease: 'expo.out',
    }, 0.24)
    .to(navLinks, {
      y: 0,
      autoAlpha: 1,
      duration: 0.68,
      stagger: 0.07,
    }, 0.34)
    .to(navCta, {
      y: 0,
      autoAlpha: 1,
      scale: 1,
      duration: 0.84,
      ease: 'back.out(1.35)',
    }, 0.4)
    .to(heroLines, {
      yPercent: 0,
      rotate: 0,
      duration: 1.2,
      stagger: 0.14,
      ease: 'expo.out',
    }, 0.34)
    .to(heroTextTargets, {
      y: 0,
      autoAlpha: 1,
      duration: 0.82,
      stagger: 0.1,
    }, 0.58)
    .to(introActionTargets, {
      y: 0,
      autoAlpha: 1,
      scale: 1,
      duration: 0.76,
      stagger: 0.08,
    }, 0.72)
    .to(heroScrollIndicator, {
      y: 0,
      autoAlpha: 1,
      duration: 0.7,
    }, 1.02);
};

const playLoaderEntrance = () => {
  if (!motionEnabled || motionState.loaderEnterPlayed || !loaderEl) {
    return;
  }

  motionState.loaderEnterPlayed = true;

  const loaderLabelTargets = [ldTrack, ldPct].filter(Boolean);
  gsapLib.set(motionState.loaderChars, {
    yPercent: 112,
    autoAlpha: 0,
    rotate: 6,
    transformOrigin: '50% 100%',
  });
  gsapLib.set(loaderLabelTargets, {
    y: 12,
    autoAlpha: 0,
  });
  gsapLib.set(ldTrack, {
    scaleX: 0.72,
    transformOrigin: '50% 50%',
  });

  gsapLib.timeline({ defaults: { ease: 'expo.out' } })
    .to(motionState.loaderChars, {
      yPercent: 0,
      autoAlpha: 1,
      rotate: 0,
      duration: 0.9,
      stagger: 0.03,
    })
    .to(loaderLabelTargets, {
      y: 0,
      autoAlpha: 1,
      duration: 0.7,
      stagger: 0.08,
    }, 0.18)
    .to(ldTrack, {
      scaleX: 1,
      duration: 0.8,
    }, 0.16);
};

const setupFooterTimeline = () => {
  if (!motionEnabled || !scrollTriggerLib || !footerEl) {
    return;
  }

  const giantChars = motionState.footerLinkSets.flatMap((item) => item.chars);
  const footerIntroTargets = [footerKicker, footerCredit, footerCopy, footerNewsForm, ...footerLabels, ...footerContactLines, ...footerBarItems].filter(Boolean);

  gsapLib.set(footerIntroTargets, {
    y: 34,
    autoAlpha: 0,
  });
  gsapLib.set(footerIconButtons, {
    y: 22,
    autoAlpha: 0,
    scale: 0.9,
  });
  gsapLib.set(giantChars, {
    yPercent: 112,
    autoAlpha: 0,
    rotate: 3,
    transformOrigin: '50% 100%',
  });

  const footerTimeline = gsapLib.timeline({
    defaults: { ease: 'power3.out' },
    scrollTrigger: {
      trigger: footerEl,
      start: 'top 82%',
      once: true,
    },
  });

  if (footerKicker) {
    footerTimeline.to(footerKicker, {
      y: 0,
      autoAlpha: 1,
      duration: 0.68,
    });
  }

  footerTimeline
    .to(giantChars, {
      yPercent: 0,
      autoAlpha: 1,
      rotate: 0,
      duration: 0.9,
      stagger: 0.015,
      ease: 'expo.out',
    }, 0.06)
    .to(footerCredit, {
      y: 0,
      autoAlpha: 1,
      duration: 0.74,
    }, 0.28)
    .to([footerCopy, footerNewsForm].filter(Boolean), {
      y: 0,
      autoAlpha: 1,
      duration: 0.82,
      stagger: 0.12,
    }, 0.4)
    .to(footerLabels, {
      y: 0,
      autoAlpha: 1,
      duration: 0.7,
      stagger: 0.08,
    }, 0.56)
    .to(footerIconButtons, {
      y: 0,
      autoAlpha: 1,
      scale: 1,
      duration: 0.72,
      stagger: 0.06,
      ease: 'back.out(1.5)',
    }, 0.66)
    .to(footerContactLines, {
      y: 0,
      autoAlpha: 1,
      duration: 0.72,
      stagger: 0.05,
    }, 0.8)
    .to(footerBarItems, {
      y: 0,
      autoAlpha: 1,
      duration: 0.7,
      stagger: 0.08,
    }, 0.94);
};

const setupEditorialTimeline = () => {
  if (!motionEnabled || !scrollTriggerLib || !editorialBand) {
    return;
  }

  if (editorialCopy) {
    gsapLib.fromTo(editorialCopy, {
      y: 34,
      autoAlpha: 0,
    }, {
      y: 0,
      autoAlpha: 1,
      duration: 0.95,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: editorialBand,
        start: 'top 82%',
        once: true,
      },
    });
  }

  if (editorialImage) {
    gsapLib.fromTo(editorialImage, {
      scale: 1.08,
    }, {
      scale: 1,
      duration: 1.4,
      ease: 'power2.out',
      scrollTrigger: {
        trigger: editorialBand,
        start: 'top 86%',
        once: true,
      },
    });
  }
};

const setupClippedHeadingTimelines = () => {
  if (!motionEnabled || !scrollTriggerLib || !clippedHeadingBlocks.length) {
    return;
  }

  clippedHeadingBlocks.forEach((heading) => {
    const lines = getClippedHeadingLines(heading);
    if (!lines.length) {
      return;
    }

    lines.forEach((line) => wrapLineMask(line));

    if (heading.classList.contains('hero-headline')) {
      return;
    }

    gsapLib.set(lines, {
      yPercent: 112,
      rotate: 1.5,
      transformOrigin: '50% 100%',
    });

    gsapLib.timeline({
      defaults: { ease: 'expo.out' },
      scrollTrigger: {
        trigger: heading,
        start: 'top 86%',
        once: true,
      },
    }).to(lines, {
      yPercent: 0,
      rotate: 0,
      duration: 1.05,
      stagger: 0.12,
    });
  });
};

const setupGsapRevealAnimations = () => {
  const revealElements = [...document.querySelectorAll('.reveal')];
  if (!motionEnabled || !scrollTriggerLib || !revealElements.length) {
    return false;
  }

  revealElements.forEach((element) => {
    gsapLib.fromTo(element, {
      y: 38,
      autoAlpha: 0,
    }, {
      y: 0,
      autoAlpha: 1,
      duration: 0.9,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: element,
        start: 'top 88%',
        once: true,
      },
      onStart: () => element.classList.add('in'),
    });
  });

  return true;
};

const initGsapMotion = () => {
  if (!motionEnabled) {
    return;
  }

  root.classList.add('gsap-enhanced');
  scrollTriggerLib && gsapLib.registerPlugin(scrollTriggerLib);

  heroLines.forEach((line) => wrapLineMask(line));
  setupClippedHeadingTimelines();

  motionState.loaderChars = splitTextUnits(ldWordmark, 'chars');
  motionState.navSubtitleWords = splitTextUnits(navSubtitle, 'words');
  motionState.footerLinkSets = footerGiantLinks.map((link) => ({
    link,
    chars: splitTextUnits(link, 'chars'),
  }));

  const navSubtitleTargets = motionState.navSubtitleWords.length ? motionState.navSubtitleWords : (navSubtitle ? [navSubtitle] : []);
  const heroTextTargets = [heroEyebrow, heroDesc].filter(Boolean);
  const introActionTargets = heroActionItems.length ? heroActionItems : (heroActions ? [heroActions] : []);

  gsapLib.set(navShell, {
    y: -26,
    autoAlpha: 0,
    scale: 0.985,
    transformOrigin: '50% 0%',
  });
  gsapLib.set(navLogo, {
    y: 18,
    autoAlpha: 0,
  });
  gsapLib.set(navDivider, {
    scaleY: 0,
    autoAlpha: 0,
    transformOrigin: '50% 50%',
  });
  gsapLib.set(navSubtitleTargets, {
    yPercent: 118,
    autoAlpha: 0,
  });
  gsapLib.set(navLinks, {
    y: 16,
    autoAlpha: 0,
  });
  gsapLib.set(navCta, {
    y: 16,
    autoAlpha: 0,
    scale: 0.96,
  });
  gsapLib.set(heroLines, {
    yPercent: 112,
    rotate: 1.5,
    transformOrigin: '50% 100%',
  });
  gsapLib.set(heroTextTargets, {
    y: 24,
    autoAlpha: 0,
  });
  gsapLib.set(introActionTargets, {
    y: 18,
    autoAlpha: 0,
    scale: 0.96,
  });
  gsapLib.set(heroScrollIndicator, {
    y: 18,
    autoAlpha: 0,
  });

  playLoaderEntrance();
  setupFooterTimeline();
  setupEditorialTimeline();
  scrollTriggerLib && window.requestAnimationFrame(() => scrollTriggerLib.refresh());
};

const hideLoader = (message) => {
  if (ldFill) {
    ldFill.style.width = '100%';
  }

  if (ldPct) {
    ldPct.textContent = message || '100%';
  }

  if (!loaderEl) {
    markPageLoaded();
    return;
  }

  if (motionEnabled && !motionState.loaderExitPlayed) {
    motionState.loaderExitPlayed = true;

    const loaderLabelTargets = [ldTrack, ldPct].filter(Boolean);
    const timeline = gsapLib.timeline({
      defaults: { ease: 'power3.out' },
      onStart: playHomepageIntro,
      onComplete: () => {
        loaderEl.style.display = 'none';
        markPageLoaded();
        scrollTriggerLib && scrollTriggerLib.refresh();
      },
    });

    timeline
      .to(loaderLabelTargets, {
        y: -14,
        autoAlpha: 0,
        duration: 0.32,
        stagger: 0.06,
      }, 0)
      .to(motionState.loaderChars, {
        yPercent: -118,
        autoAlpha: 0,
        rotate: -5,
        duration: 0.5,
        stagger: 0.018,
        ease: 'power4.in',
      }, 0)
      .to(loaderEl, {
        autoAlpha: 0,
        duration: 0.58,
        ease: 'power2.out',
      }, 0.22);

    return;
  }

  markPageLoaded();
  loaderEl.classList.add('out');
  window.setTimeout(() => {
    loaderEl.style.display = 'none';
  }, 750);
};

window.addEventListener('load', () => {
  if (!loaderEl) {
    window.setTimeout(markPageLoaded, 240);
    return;
  }

  window.setTimeout(() => {
    if (!root.classList.contains('page-loaded')) {
      hideLoader('Welkom');
    }
  }, motionEnabled ? 7000 : 5200);
}, { once: true });

window.setTimeout(() => {
  if (!root.classList.contains('page-loaded')) {
    if (loaderEl) {
      hideLoader('Welkom');
      return;
    }

    markPageLoaded();
  }
}, motionEnabled ? 7600 : 5600);

initGsapMotion();

const revealElements = document.querySelectorAll('.reveal');
if (!setupGsapRevealAnimations()) {
  if (revealElements.length && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -36px 0px' });

    revealElements.forEach((element) => io.observe(element));
  } else {
    revealElements.forEach((element) => element.classList.add('in'));
  }
}
if (marqueePlaySections.length && 'IntersectionObserver' in window) {
  const marqueeObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      entry.target.classList.toggle('is-inview', entry.isIntersecting);
    });
  }, { threshold: 0.15 });

  marqueePlaySections.forEach((section) => marqueeObserver.observe(section));
} else {
  marqueePlaySections.forEach((section) => section.classList.add('is-inview'));
}

if (brandRibbon && brandRibbonTrack && brandRibbonGroups.length) {
  let ribbonOffset = 0;
  let ribbonLoopDistance = 0;
  let ribbonDirection = -1;
  let ribbonLastTick = 0;
  let ribbonLastScrollY = window.scrollY;

  const syncBrandRibbon = () => {
    if (!ribbonLoopDistance) {
      return;
    }

    const wrappedOffset = ((ribbonOffset % ribbonLoopDistance) + ribbonLoopDistance) % ribbonLoopDistance;
    ribbonOffset = wrappedOffset;
    brandRibbonTrack.style.transform = `translate3d(${-wrappedOffset}px, 0, 0)`;
  };

  const measureBrandRibbon = () => {
    const firstGroup = brandRibbonGroups[0];
    const trackStyles = window.getComputedStyle(brandRibbonTrack);
    const trackGap = parseFloat(trackStyles.columnGap || trackStyles.gap || '0') || 0;

    ribbonLoopDistance = firstGroup.getBoundingClientRect().width + trackGap;
    syncBrandRibbon();
  };

  const updateBrandRibbonDirection = () => {
    const currentScrollY = window.scrollY;
    const scrollDelta = currentScrollY - ribbonLastScrollY;

    if (Math.abs(scrollDelta) > 1) {
      ribbonDirection = scrollDelta > 0 ? -1 : 1;
    }

    ribbonLastScrollY = currentScrollY;
  };

  const tickBrandRibbon = (time) => {
    if (!ribbonLastTick) {
      ribbonLastTick = time;
    }

    const delta = Math.min(64, time - ribbonLastTick);
    ribbonLastTick = time;

    if (brandRibbon.classList.contains('is-inview') && ribbonLoopDistance > 0) {
      const speed = window.innerWidth <= 720 ? 0.04 : 0.055;
      ribbonOffset += ribbonDirection * speed * delta;
      syncBrandRibbon();
    }

    window.requestAnimationFrame(tickBrandRibbon);
  };

  measureBrandRibbon();
  updateBrandRibbonDirection();
  window.addEventListener('load', measureBrandRibbon, { once: true });
  window.addEventListener('resize', measureBrandRibbon);
  window.addEventListener('scroll', updateBrandRibbonDirection, { passive: true });
  window.requestAnimationFrame(tickBrandRibbon);
}

const updateHeaderState = () => {
  if (!heroEl || !navShell) {
    root.classList.remove('header-condensed');
    return;
  }

  const heroBottom = heroEl.getBoundingClientRect().bottom;
  const headerThreshold = navShell.offsetHeight + 28;
  root.classList.toggle('header-condensed', heroBottom <= headerThreshold);
};

const updateFeatureCopy = () => {
  if (!heroEl || !featCpy) {
    return;
  }

  if (root.classList.contains('model-fallback')) {
    featCpy.classList.add('show');
    return;
  }

  const threshold = window.innerWidth <= 720 ? 0.18 : 0.52;
  const progress = window.scrollY / Math.max(heroEl.offsetHeight, 1);
  featCpy.classList.toggle('show', progress > threshold);
};

const updateCollectionShowcase = () => {
  if (!collectionScroll || (!collectionModel && !collectionCards.length)) {
    return;
  }

  if (window.innerWidth <= 1100) {
    collectionModel?.classList.add('is-active');
    collectionCards.forEach((card) => card.classList.add('is-active'));
    return;
  }

  const availableScroll = collectionScroll.offsetHeight - window.innerHeight;
  if (availableScroll <= 0) {
    collectionModel?.classList.add('is-active');
    collectionCards.forEach((card) => card.classList.add('is-active'));
    return;
  }

  const progress = Math.min(1, Math.max(0, -collectionScroll.getBoundingClientRect().top / availableScroll));
  const modelThreshold = 0.14;
  const thresholds = [0.34, 0.56, 0.78];

  collectionModel?.classList.toggle('is-active', progress >= modelThreshold);

  collectionCards.forEach((card, index) => {
    card.classList.toggle('is-active', progress >= thresholds[index]);
  });
};

window.addEventListener('scroll', updateFeatureCopy, { passive: true });
window.addEventListener('resize', updateFeatureCopy);
window.addEventListener('scroll', updateHeaderState, { passive: true });
window.addEventListener('resize', updateHeaderState);
window.addEventListener('scroll', updateCollectionShowcase, { passive: true });
window.addEventListener('resize', updateCollectionShowcase);
updateFeatureCopy();
updateHeaderState();
updateCollectionShowcase();

const bootThreeScene = async () => {
  if (!canvas || !heroEl || !featEl || !featCpy || !loaderEl || !ldFill || !ldPct || !('WebGLRenderingContext' in window)) {
    setModelFallback();
    hideLoader();
    updateFeatureCopy();
    return;
  }

  let THREE;
  let GLTFLoader;
  let RoomEnvironment;

  try {
    [
      THREE,
      { GLTFLoader },
      { RoomEnvironment },
    ] = await Promise.all([
      import('three'),
      import('three/addons/loaders/GLTFLoader.js'),
      import('three/addons/environments/RoomEnvironment.js'),
    ]);
  } catch (error) {
    console.error('Unable to load 3D libraries.', error);
    setModelFallback();
    hideLoader('3D preview unavailable');
    updateFeatureCopy();
    return;
  }

  let renderer;

  try {
    renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
  } catch (error) {
    console.error('Unable to initialize WebGL.', error);
    setModelFallback();
    hideLoader('3D preview unavailable');
    updateFeatureCopy();
    return;
  }
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  renderer.setSize(window.innerWidth, window.innerHeight);
  renderer.setClearColor(0x000000, 0);
  renderer.toneMapping = THREE.ACESFilmicToneMapping;
  renderer.toneMappingExposure = 1.55;
  renderer.outputColorSpace = THREE.SRGBColorSpace;
  renderer.shadowMap.enabled = true;
  renderer.shadowMap.type = THREE.PCFSoftShadowMap;

  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(36, window.innerWidth / window.innerHeight, 0.01, 100);
  camera.position.set(0, 0.06, 4.0);

  const pmrem = new THREE.PMREMGenerator(renderer);
  const envScene = new RoomEnvironment();
  scene.environment = pmrem.fromScene(envScene, 0.04).texture;
  scene.environmentIntensity = 1.6;
  envScene.dispose();
  pmrem.dispose();

  const key = new THREE.DirectionalLight(0xffffff, 5.5);
  key.position.set(2.5, 4, 4);
  key.castShadow = true;
  key.shadow.mapSize.set(1024, 1024);
  key.shadow.camera.near = 0.5;
  key.shadow.camera.far = 20;
  key.shadow.camera.left = key.shadow.camera.bottom = -3;
  key.shadow.camera.right = key.shadow.camera.top = 3;
  key.shadow.radius = 10;
  scene.add(key);

  const fill = new THREE.DirectionalLight(0xeaf2ff, 2.2);
  fill.position.set(-3, 1, 3);
  scene.add(fill);

  const rim = new THREE.DirectionalLight(0xfff0e0, 1.6);
  rim.position.set(0, -2, -2);
  scene.add(rim);

  const top = new THREE.DirectionalLight(0xffffff, 1.8);
  top.position.set(0, 5, 0);
  scene.add(top);

  scene.add(new THREE.AmbientLight(0xffffff, 0.9));

  const shadowPlane = new THREE.Mesh(
    new THREE.PlaneGeometry(12, 12),
    new THREE.ShadowMaterial({ opacity: 0.055 })
  );
  shadowPlane.rotation.x = -Math.PI / 2;
  shadowPlane.position.y = -0.65;
  shadowPlane.receiveShadow = true;
  scene.add(shadowPlane);

  const grp = new THREE.Group();
  scene.add(grp);
  let modelRoot = null;
  let modelBaseSize = 1;

  const getModelScaleTarget = () => {
    if (window.innerWidth <= 560) {
      return 1.18;
    }

    if (window.innerWidth <= 900) {
      return 1.48;
    }

    return 1.9;
  };

  const applyModelScale = () => {
    if (!modelRoot) {
      return;
    }

    modelRoot.scale.setScalar(getModelScaleTarget() / Math.max(modelBaseSize, 0.001));
  };

  new GLTFLoader().load(
    modelUrl,
    (gltf) => {
      const model = gltf.scene;
      const box = new THREE.Box3().setFromObject(model);
      const size = box.getSize(new THREE.Vector3());
      modelBaseSize = Math.max(size.x, size.y, size.z);
      const center = new THREE.Box3().setFromObject(model).getCenter(new THREE.Vector3());
      model.position.sub(center);
      modelRoot = model;
      applyModelScale();

      model.traverse((child) => {
        if (!child.isMesh) {
          return;
        }

        child.castShadow = true;
        child.receiveShadow = true;
        const materials = Array.isArray(child.material) ? child.material : [child.material];

        materials.forEach((material) => {
          if (!material) {
            return;
          }

          if (material.name?.toLowerCase() === 'glass') {
            material.color.set(themeAccent);
            material.opacity = Math.min(material.opacity ?? 0.65, 0.58);
          }

          if (material.transparent) {
            material.envMapIntensity = 2.8;
            material.roughness = Math.min(material.roughness ?? 0.1, 0.05);
          } else {
            material.envMapIntensity = 2.0;
          }

          material.needsUpdate = true;
        });
      });

      grp.add(model);
      grp.rotation.x = -0.1;

      clearModelFallback();
      hideLoader();
      updateFeatureCopy();
    },
    (xhr) => {
      if (xhr.total) {
        const progress = Math.round(xhr.loaded / xhr.total * 100);
        ldFill.style.width = `${progress}%`;
        ldPct.textContent = `${progress}%`;
      }
    },
    (error) => {
      console.error(error);
      setModelFallback();
      canvas.style.opacity = '0';
      hideLoader('3D preview unavailable');
      updateFeatureCopy();
    }
  );

  let targetRotateX = 0;
  let currentRotateX = 0;
  let targetRotateY = 0;
  let currentRotateY = 0;
  let targetScroll = 0;
  let currentScroll = 0;
  let frameTime = 0;

  window.addEventListener('mousemove', (event) => {
    const normalizedX = (event.clientX / window.innerWidth - 0.5) * 2;
    const normalizedY = (event.clientY / window.innerHeight - 0.5) * 2;

    targetRotateY = normalizedX * 0.44;
    targetRotateX = normalizedY * 0.24;
  });

  window.addEventListener('mouseleave', () => {
    targetRotateX = 0;
    targetRotateY = 0;
  });

  const onScroll = () => {
    const scrollY = window.scrollY;
    targetScroll = Math.max(0, Math.min(1, scrollY / heroEl.offsetHeight));

    const featBottom = heroEl.offsetHeight + featEl.offsetHeight;
    const fadeStart = featBottom - 100;
    const fadeEnd = featBottom + 80;

    if (scrollY >= fadeEnd) {
      canvas.style.opacity = '0';
      canvas.style.pointerEvents = 'none';
    } else if (scrollY <= fadeStart) {
      canvas.style.opacity = '1';
      canvas.style.pointerEvents = 'none';
    } else {
      const progress = (scrollY - fadeStart) / (fadeEnd - fadeStart);
      canvas.style.opacity = String(1 - progress);
      canvas.style.pointerEvents = 'none';
    }

    updateFeatureCopy();
  };

  const targetX = (progress) => {
    const halfWidth = Math.tan(camera.fov * Math.PI / 360) * camera.position.z * camera.aspect;
    const baseX = halfWidth * -0.46 * progress;
    const heroOffset = halfWidth * (
      window.innerWidth <= 560 ? 0.08 :
      window.innerWidth <= 900 ? 0.16 :
      0.34
    );
    const heroBlend = Math.max(0, 1 - progress / 0.28);
    return baseX + heroOffset * heroBlend * heroBlend;
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
    applyModelScale();
  });

  const tick = () => {
    if (root.classList.contains('model-fallback')) {
      return;
    }

    frameTime += 0.013;
    currentRotateX += (targetRotateX - currentRotateX) * 0.065;
    currentRotateY += (targetRotateY - currentRotateY) * 0.065;
    currentScroll += (targetScroll - currentScroll) * 0.055;

    const floatY = Math.sin(frameTime) * 0.038 * (1 - currentScroll);
    const sectionTurn = currentScroll * (Math.PI / 2);

    grp.position.x = targetX(currentScroll);
    grp.position.y = floatY - 0.04;
    grp.rotation.x = -0.10 + currentRotateX;
    grp.rotation.y = sectionTurn + currentRotateY;

    renderer.render(scene, camera);
    window.requestAnimationFrame(tick);
  };

  tick();
};

bootThreeScene();

(function initLensCardSlide() {
  const EASE = 'cubic-bezier(.22,1,.36,1)';
  const DUR  = '1.1s';

  document.querySelectorAll('.lens-upgrade-card').forEach(card => {
    const img = card.querySelector('.lens-upgrade-card-img');
    if (!img) return;

    let leaveHandler = null;

    card.addEventListener('mouseenter', () => {
      if (leaveHandler) {
        img.removeEventListener('transitionend', leaveHandler);
        leaveHandler = null;
      }
      img.style.transition = `transform ${DUR} ${EASE}`;
      img.style.transform   = 'translateY(0)';
    });

    card.addEventListener('mouseleave', () => {
      img.style.transition = `transform ${DUR} ${EASE}`;
      img.style.transform   = 'translateY(-100%)';

      leaveHandler = function onLeaveEnd() {
        img.removeEventListener('transitionend', leaveHandler);
        leaveHandler = null;
        img.style.transition = 'none';
        img.style.transform   = 'translateY(100%)';
      };
      img.addEventListener('transitionend', leaveHandler);
    });
  });
}());
