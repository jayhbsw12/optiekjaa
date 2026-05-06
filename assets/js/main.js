const canvas = document.getElementById('gl');
const heroEl = document.getElementById('s-hero');
const featEl = document.getElementById('s-feature');
const featCpy = document.getElementById('feat-copy');
const collectionScroll = document.getElementById('collection-scroll');
const collectionModel = document.querySelector('.collection-model');
const collectionCards = [...document.querySelectorAll('.collection-card')];
const navShell = document.querySelector('.nav-shell');
const loaderEl = document.getElementById('loader');
const ldFill = document.getElementById('ld-fill');
const ldPct = document.getElementById('ld-pct');
const marqueePlaySections = [...document.querySelectorAll('[data-marquee-play]')];
const brandRibbon = document.querySelector('.brand-ribbon');
const brandRibbonTrack = brandRibbon?.querySelector('[data-brand-ribbon-track]');
const brandRibbonGroups = brandRibbonTrack ? [...brandRibbonTrack.querySelectorAll('.brand-ribbon-group')] : [];
const modelUrl = new URL('../../glasses_06/scene.gltf', import.meta.url).href;
const root = document.documentElement;
const themeAccent = getComputedStyle(root).getPropertyValue('--brand-accent').trim() || '#f7b704';
const markPageLoaded = () => root.classList.add('page-loaded');
const setModelFallback = () => root.classList.add('model-fallback');
const clearModelFallback = () => root.classList.remove('model-fallback');

const hideLoader = (message) => {
  if (ldPct && message) {
    ldPct.textContent = message;
  }

  markPageLoaded();

  if (!loaderEl) {
    return;
  }

  loaderEl.classList.add('out');
  window.setTimeout(() => {
    loaderEl.style.display = 'none';
  }, 750);
};

window.addEventListener('load', () => {
  window.setTimeout(markPageLoaded, 600);
}, { once: true });

window.setTimeout(markPageLoaded, 4200);

const revealElements = document.querySelectorAll('.reveal');
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
