(() => {
  const footer = document.querySelector('.site-footer');
  const canvas = footer?.querySelector('.footer-coin-canvas');
  const coinImageSrc = canvas?.dataset.coinImage || '';

  if (!footer || !canvas) {
    return;
  }

  const context = canvas.getContext('2d');
  if (!context) {
    return;
  }

  const coinImage = new Image();
  let coinImageReady = false;

  if (coinImageSrc) {
    coinImage.decoding = 'async';
    coinImage.onload = () => {
      coinImageReady = true;
      render();
    };
    coinImage.src = coinImageSrc;
  }

  const reduceMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
  const coinStyle = {
    fill: '#f7b704',
    edge: '#ffdc6a',
    shadow: '#d59d02',
    highlight: 'rgba(255,255,255,0.2)',
    symbol: '#40474e',
  };
  const state = {
    active: false,
    coinRadius: 66,
    coins: [],
    dpr: Math.min(window.devicePixelRatio || 1, 2),
    height: 0,
    lastTime: 0,
    rafId: 0,
    spawned: 0,
    spawnTimer: 0,
    started: false,
    targetCoins: 0,
    width: 0,
  };

  const clamp = (value, min, max) => Math.min(max, Math.max(min, value));
  const randomBetween = (min, max) => min + Math.random() * (max - min);
  const floorY = () => state.height - 8;
  const wallPadding = () => Math.max(12, Math.min(22, state.width * 0.02));
  const hasMotion = () => state.coins.some((coin) => (
    Math.abs(coin.vx) > 8 ||
    Math.abs(coin.vy) > 8 ||
    Math.abs(coin.spin) > 0.15
  ));
  const clampSpin = (spin) => clamp(spin, -1.2, 1.2);

  const setCanvasSize = () => {
    const rect = footer.getBoundingClientRect();

    state.width = Math.max(1, Math.round(rect.width));
    state.height = Math.max(1, Math.round(rect.height));
    state.dpr = Math.min(window.devicePixelRatio || 1, 2);
    state.coinRadius = clamp(state.width * 0.0495, 54, 72);
    state.targetCoins = 13;

    canvas.width = Math.round(state.width * state.dpr);
    canvas.height = Math.round(state.height * state.dpr);
    canvas.style.width = `${state.width}px`;
    canvas.style.height = `${state.height}px`;

    context.setTransform(state.dpr, 0, 0, state.dpr, 0, 0);
  };

  const createCoin = (overrides = {}) => {
    const radius = overrides.radius ?? state.coinRadius;
    const spawnBaseY = Math.max(state.height * 0.36, state.coinRadius * 2.6);

    return {
      mass: radius * radius,
      radius,
      rotation: overrides.rotation ?? randomBetween(-Math.PI, Math.PI),
      spin: overrides.spin ?? randomBetween(-0.65, 0.65),
      symbol: '$',
      vx: overrides.vx ?? randomBetween(-72, 72),
      vy: overrides.vy ?? randomBetween(24, 92),
      x: overrides.x ?? randomBetween(radius + wallPadding(), state.width - radius - wallPadding()),
      y: overrides.y ?? (spawnBaseY - randomBetween(radius * 3.2, radius * 6.1)),
    };
  };

  const buildStaticStack = () => {
    state.coins = [];

    let cursorX = 22;
    let row = 0;

    for (let index = 0; index < state.targetCoins; index += 1) {
      const radius = state.coinRadius;
      const spacing = radius * 2 + 12;

      if (cursorX + spacing > state.width - 22) {
        row += 1;
        cursorX = 22 + (row % 2 ? radius * 0.6 : 0);
      }

      const y = floorY() - radius - row * (radius * 1.42);
      if (y - radius < 12) {
        break;
      }

      state.coins.push(createCoin({
        radius,
        rotation: randomBetween(-0.5, 0.5),
        spin: 0,
        vx: 0,
        vy: 0,
        x: cursorX + radius,
        y,
      }));

      cursorX += spacing;
    }
  };

  const resetSimulation = () => {
    state.coins = [];
    state.lastTime = 0;
    state.spawned = 0;
    state.spawnTimer = 0;

    if (reduceMotionQuery.matches) {
      buildStaticStack();
      render();
    }
  };

  const spawnCoin = () => {
    state.coins.push(createCoin());
    state.spawned += 1;
  };

  const resolveBoundaryCollision = (coin) => {
    const left = wallPadding();
    const right = state.width - wallPadding();
    const floor = floorY();

    if (coin.x - coin.radius < left) {
      coin.x = left + coin.radius;
      coin.vx *= -0.62;
      coin.spin *= 0.58;
    } else if (coin.x + coin.radius > right) {
      coin.x = right - coin.radius;
      coin.vx *= -0.62;
      coin.spin *= 0.58;
    }

    if (coin.y + coin.radius > floor) {
      coin.y = floor - coin.radius;

      if (coin.vy > 0) {
        coin.vy *= -0.24;
      }

      coin.vx *= 0.9;
      coin.spin *= 0.78;

      if (Math.abs(coin.vy) < 24) {
        coin.vy = 0;
      }

      if (Math.abs(coin.vx) < 10) {
        coin.vx = 0;
      }

      if (Math.abs(coin.spin) < 0.045) {
        coin.spin = 0;
      }

      if (coin.vy === 0 && Math.abs(coin.vx) < 16) {
        coin.spin *= 0.4;
      }
    }

    coin.spin = clampSpin(coin.spin);
  };

  const resolveCoinCollision = (first, second) => {
    const dx = second.x - first.x;
    const dy = second.y - first.y;
    const distance = Math.hypot(dx, dy) || 0.0001;
    const minimumDistance = first.radius + second.radius;

    if (distance >= minimumDistance) {
      return;
    }

    const normalX = dx / distance;
    const normalY = dy / distance;
    const overlap = minimumDistance - distance;
    const inverseMassTotal = (1 / first.mass) + (1 / second.mass);
    const separationX = normalX * overlap;
    const separationY = normalY * overlap;

    first.x -= separationX * ((1 / first.mass) / inverseMassTotal);
    first.y -= separationY * ((1 / first.mass) / inverseMassTotal);
    second.x += separationX * ((1 / second.mass) / inverseMassTotal);
    second.y += separationY * ((1 / second.mass) / inverseMassTotal);

    const relativeVelocityX = second.vx - first.vx;
    const relativeVelocityY = second.vy - first.vy;
    const velocityAlongNormal = relativeVelocityX * normalX + relativeVelocityY * normalY;

    if (velocityAlongNormal > 0) {
      return;
    }

    const restitution = 0.34;
    const impulse = (-(1 + restitution) * velocityAlongNormal) / inverseMassTotal;
    const impulseX = impulse * normalX;
    const impulseY = impulse * normalY;

    first.vx -= impulseX / first.mass;
    first.vy -= impulseY / first.mass;
    second.vx += impulseX / second.mass;
    second.vy += impulseY / second.mass;

    const tangentX = -normalY;
    const tangentY = normalX;
    const tangentVelocity = relativeVelocityX * tangentX + relativeVelocityY * tangentY;
    const tangentImpulse = clamp(-tangentVelocity * 0.06, -8, 8);

    first.vx -= tangentImpulse * tangentX / first.mass;
    first.vy -= tangentImpulse * tangentY / first.mass;
    second.vx += tangentImpulse * tangentX / second.mass;
    second.vy += tangentImpulse * tangentY / second.mass;

    first.spin = clampSpin(first.spin - tangentImpulse * 0.004);
    second.spin = clampSpin(second.spin + tangentImpulse * 0.004);
  };

  const simulateStep = (deltaTime) => {
    if (state.spawned < state.targetCoins) {
      state.spawnTimer += deltaTime;

      while (state.spawned < state.targetCoins && state.spawnTimer >= 0.14) {
        spawnCoin();
        state.spawnTimer -= 0.14;
      }
    }

    const substeps = 2;
    const stepTime = deltaTime / substeps;
    const gravity = Math.max(1800, state.height * 6.25);

    for (let step = 0; step < substeps; step += 1) {
      state.coins.forEach((coin) => {
        coin.vy += gravity * stepTime;
        coin.x += coin.vx * stepTime;
        coin.y += coin.vy * stepTime;
        coin.rotation += coin.spin * stepTime;
        coin.vx *= 0.996;
        coin.spin *= 0.96;

        resolveBoundaryCollision(coin);

        if (coin.vy === 0 && Math.abs(coin.vx) < 8) {
          coin.spin *= 0.55;
        }

        if (Math.abs(coin.spin) < 0.03) {
          coin.spin = 0;
        }
      });

      for (let index = 0; index < state.coins.length; index += 1) {
        for (let peer = index + 1; peer < state.coins.length; peer += 1) {
          resolveCoinCollision(state.coins[index], state.coins[peer]);
        }
      }
    }
  };

  const drawCoin = (coin) => {
    const edgeWidth = coin.radius * 0.08;
    const innerRadius = coin.radius - edgeWidth * 1.9;

    context.save();
    context.translate(coin.x, coin.y);
    context.rotate(coin.rotation);

    context.beginPath();
    context.fillStyle = coinStyle.fill;
    context.arc(0, 0, coin.radius, 0, Math.PI * 2);
    context.fill();

    context.beginPath();
    context.strokeStyle = coinStyle.edge;
    context.lineWidth = edgeWidth;
    context.arc(0, 0, coin.radius - edgeWidth * 0.5, 0, Math.PI * 2);
    context.stroke();

    context.beginPath();
    context.strokeStyle = coinStyle.shadow;
    context.lineWidth = edgeWidth * 0.7;
    context.arc(0, 0, coin.radius - edgeWidth * 1.7, 0, Math.PI * 2);
    context.stroke();

    const highlight = context.createRadialGradient(
      -coin.radius * 0.32,
      -coin.radius * 0.36,
      coin.radius * 0.12,
      0,
      0,
      coin.radius
    );

    highlight.addColorStop(0, coinStyle.highlight);
    highlight.addColorStop(1, 'rgba(255,255,255,0)');

    context.beginPath();
    context.fillStyle = highlight;
    context.arc(0, 0, coin.radius, 0, Math.PI * 2);
    context.fill();

    if (coinImageReady) {
      const imageSize = innerRadius * 1.82;

      context.save();
      context.beginPath();
      context.arc(0, 0, innerRadius, 0, Math.PI * 2);
      context.clip();
      context.drawImage(
        coinImage,
        -imageSize / 2,
        -imageSize / 2,
        imageSize,
        imageSize
      );
      context.restore();
    } else {
      context.fillStyle = coinStyle.symbol;
      context.font = `600 ${coin.radius * 1.02}px "Google Sans", "DM Sans", sans-serif`;
      context.textAlign = 'center';
      context.textBaseline = 'middle';
      context.fillText(coin.symbol, 0, coin.radius * 0.08);
    }

    context.restore();
  };

  function render() {
    context.clearRect(0, 0, state.width, state.height);

    const orderedCoins = [...state.coins].sort((first, second) => first.y - second.y);
    orderedCoins.forEach(drawCoin);
  }

  const stopLoop = () => {
    if (state.rafId) {
      window.cancelAnimationFrame(state.rafId);
      state.rafId = 0;
    }
  };

  const tick = (timestamp) => {
    if (!state.active || reduceMotionQuery.matches) {
      stopLoop();
      return;
    }

    if (!state.lastTime) {
      state.lastTime = timestamp;
    }

    const deltaTime = Math.min((timestamp - state.lastTime) / 1000, 0.035);
    state.lastTime = timestamp;

    simulateStep(deltaTime);
    render();

    if (state.spawned < state.targetCoins || hasMotion()) {
      state.rafId = window.requestAnimationFrame(tick);
      return;
    }

    stopLoop();
  };

  const startLoop = () => {
    if (reduceMotionQuery.matches || state.rafId) {
      return;
    }

    state.lastTime = 0;
    state.rafId = window.requestAnimationFrame(tick);
  };

  const handleResize = () => {
    setCanvasSize();

    if (!state.started || reduceMotionQuery.matches) {
      resetSimulation();
      return;
    }

    resetSimulation();

    if (state.active) {
      startLoop();
    } else {
      render();
    }
  };

  const intersectionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.target !== footer) {
        return;
      }

      state.active = entry.isIntersecting;

      if (!entry.isIntersecting) {
        stopLoop();
        return;
      }

      if (!state.started) {
        state.started = true;
        resetSimulation();
      }

      if (reduceMotionQuery.matches) {
        render();
        return;
      }

      if (!state.coins.length || (!hasMotion() && state.spawned >= state.targetCoins)) {
        resetSimulation();
      }

      startLoop();
    });
  }, {
    threshold: 0.28,
  });

  setCanvasSize();
  resetSimulation();
  intersectionObserver.observe(footer);

  window.addEventListener('resize', handleResize, { passive: true });
  if (typeof reduceMotionQuery.addEventListener === 'function') {
    reduceMotionQuery.addEventListener('change', handleResize);
  } else if (typeof reduceMotionQuery.addListener === 'function') {
    reduceMotionQuery.addListener(handleResize);
  }
})();
