<main id="content" class="site-main">
  <section id="s-hero">
    <div class="hero-frame">
      <div class="hero-grid">
        <div class="hero-copy h-anim h-anim-1">
          <div class="hero-eyebrow">Premium optiek, Suriname</div>
          <h1 class="hero-headline">
            <span class="hero-line">Helder <em>Zicht.</em></span>
            <span class="hero-line"><span class="light">Stijlvol</span> <em>Leven.</em></span>
          </h1>

          <p class="hero-desc">
            Bij Optiekjaa combineren wij vakmanschap met de nieuwste optische technologie&euml;n &mdash; voor de perfecte bril die past bij uw leven en stijl.
          </p>
          <div class="hero-actions">
            <a href="<?= esc(url('#brillen')); ?>" class="btn-liquid">
              <span class="btn-liquid-shell"></span>
              <span class="btn-liquid-label">Ontdek collectie</span>
            </a>
            <a href="<?= esc(url('contact')); ?>" class="btn-line">Afspraak maken</a>
          </div>
        </div>
      </div>

      <div class="hero-scroll">
        <div class="scroll-bar"></div>
        <span>Scroll</span>
      </div>
    </div>
  </section>

  <section id="s-feature">
    <div class="feat-copy" id="feat-copy">
      <div class="tag">Onze expertise</div>
      <h2 class="feat-h2 heading-clip">
        <span class="heading-clip-line">Uw perfecte bril,</span>
        <span class="heading-clip-line"><em>vakkundig gemaakt</em></span>
      </h2>
      <p class="feat-p">
        Met jarenlange ervaring in de optiekbranche bieden wij een persoonlijke benadering die verder gaat dan een standaard oogmeting. Van montuuradvies tot op maat geslepen glazen &mdash; wij begeleiden u bij elke stap.
      </p>
      <a href="<?= esc(url('#brillen')); ?>" class="btn-liquid">
        <span class="btn-liquid-shell"></span>
        <span class="btn-liquid-label">Bekijk de collectie</span>
      </a>
    </div>
  </section>

  <section class="section-collection" id="brillen">
    <div class="collection-scroll" id="collection-scroll">
      <div class="collection-sticky">
        <div class="collection-copy">
          <h2 class="collection-title heading-clip">
            <span class="heading-clip-line">Onze <em>collectie</em></span>
          </h2>
          <p class="collection-text">
            Scroll door drie zorgvuldig geselecteerde briloplossingen en ontdek welke stijl, sterkte en draagervaring het beste bij uw dagelijks leven past.
          </p>
          <div class="collection-actions">
            <a href="<?= esc(url('contact')); ?>" class="btn-liquid">
              <span class="btn-liquid-shell"></span>
              <span class="btn-liquid-label">Plan afspraak</span>
            </a>
          </div>
        </div>

        <div class="collection-cards">
          <div class="collection-model" aria-hidden="true">
            <img
              class="collection-model-img"
              loading="lazy"
              src="<?= esc(asset_url('assets/img/Model-homepage.png')); ?>"
              alt="Model met zonnebrillen uit de collectie"
            >
          </div>

          <article class="collection-card card-one" data-step="1">
            <div class="collection-card-media">
              <img
                class="collection-card-img"
                loading="lazy"
                src="https://images.unsplash.com/photo-1516714819001-8ee7a13b71d7?w=900&amp;auto=format&amp;q=80"
                alt="Enkelvoudige bril aanpassing"
              >
            </div>
            <div class="collection-card-body">
              <div class="collection-card-step">01</div>
              <div class="collection-card-tag">Enkelvoudige sterkte</div>
              <h3 class="collection-card-title">Enkelvoudige Bril</h3>
              <p class="collection-card-desc">Geschikt voor mensen die een bril voor alleen veraf of alleen voor lezen nodig hebben. Alle glasopties beschikbaar voor maximaal comfort en heldere visie.</p>
              <ul class="collection-card-list">
                <li>Enkele sterkte</li>
                <li>Geschikt voor mensen die een bril voor alleen veraf of alleen voor lezen nodig hebben</li>
                <li>Alle glasopties beschikbaar</li>
              </ul>
              <div class="collection-card-meta">
                <div class="collection-card-badge">Alle glasopties beschikbaar</div>
                <a href="<?= esc(url('contact')); ?>" class="collection-card-link">Meer informatie</a>
              </div>
            </div>
          </article>

          <article class="collection-card card-two" data-step="2">
            <div class="collection-card-media">
              <img
                class="collection-card-img"
                loading="lazy"
                src="https://images.pexels.com/photos/17930561/pexels-photo-17930561.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=900"
                alt="Bifocale bril"
              >
            </div>
            <div class="collection-card-body">
              <div class="collection-card-step">02</div>
              <div class="collection-card-tag">Nieuwste generatie</div>
              <h3 class="collection-card-title">Bifocale Bril</h3>
              <p class="collection-card-desc">De nieuwste generatie bifocale glazen. Gepersonaliseerd glas met perfect zicht en ingebouwde boostzone &mdash; voor comfortabel zien op iedere afstand.</p>
              <ul class="collection-card-list">
                <li>De nieuwste generatie bifocale glazen</li>
                <li>Gepersonaliseerd glas met perfect zicht en boostzone</li>
                <li>Alle glasopties beschikbaar</li>
              </ul>
              <div class="collection-card-meta">
                <div class="collection-card-badge">Alle glasopties beschikbaar</div>
                <a href="<?= esc(url('contact')); ?>" class="collection-card-link">Meer informatie</a>
              </div>
            </div>
          </article>

          <article class="collection-card card-three" data-step="3">
            <div class="collection-card-media">
              <img
                class="collection-card-img"
                loading="lazy"
                src="https://images.pexels.com/photos/28041894/pexels-photo-28041894.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=900"
                alt="Multifocale bril premium"
              >
            </div>
            <div class="collection-card-body">
              <div class="collection-card-step">03</div>
              <div class="collection-card-tag">Meerdere sterkten</div>
              <h3 class="collection-card-title">Multifocale Bril</h3>
              <p class="collection-card-desc">Glazen met meerdere sterkten. Geschikt voor mensen die een bril voor zowel veraf als dichtbij nodig hebben &mdash; zonder zichtbare overgang.</p>
              <ul class="collection-card-list">
                <li>Glazen met meerdere sterkten</li>
                <li>Geschikt voor mensen die een bril voor zowel veraf als dichtbij nodig hebben</li>
                <li>Alle glasopties beschikbaar</li>
              </ul>
              <div class="collection-card-meta">
                <div class="collection-card-badge">Alle glasopties beschikbaar</div>
                <a href="<?= esc(url('contact')); ?>" class="collection-card-link">Meer informatie</a>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="lens-upgrade-strip" aria-label="Premium glasopties">
    <div class="lens-upgrade-grid">
      <article class="lens-upgrade-card">
        <img
          class="lens-upgrade-card-img"
          loading="lazy"
          src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=1200&amp;auto=format&amp;q=80"
          alt="Dummy preview voor kraswerende glazen"
        >
        <div class="lens-upgrade-card-copy reveal">
          <div class="lens-upgrade-card-num">01</div>
          <h2 class="lens-upgrade-card-title">Kraswerende glazen</h2>
        </div>
      </article>

      <article class="lens-upgrade-card">
        <img
          class="lens-upgrade-card-img"
          loading="lazy"
          src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=1200&amp;auto=format&amp;q=80"
          alt="Dummy preview voor superontspiegeling UV"
        >
        <div class="lens-upgrade-card-copy reveal d1">
          <div class="lens-upgrade-card-num">02</div>
          <h2 class="lens-upgrade-card-title">Superontspiegeling UV</h2>
        </div>
      </article>

      <article class="lens-upgrade-card">
        <img
          class="lens-upgrade-card-img"
          loading="lazy"
          src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?w=1200&amp;auto=format&amp;q=80"
          alt="Dummy preview voor dunnere glazen"
        >
        <div class="lens-upgrade-card-copy reveal d2">
          <div class="lens-upgrade-card-num">03</div>
          <h2 class="lens-upgrade-card-title">Dunnere glazen</h2>
        </div>
      </article>

      <article class="lens-upgrade-card">
        <img
          class="lens-upgrade-card-img"
          loading="lazy"
          src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=1200&amp;auto=format&amp;q=80"
          alt="Dummy preview voor vuilafstotende laag"
        >
        <div class="lens-upgrade-card-copy reveal d3">
          <div class="lens-upgrade-card-num">04</div>
          <h2 class="lens-upgrade-card-title">Vuilafstotende laag</h2>
        </div>
      </article>
    </div>
  </section>

  <div class="marquee-wrap" aria-hidden="true">
    <div class="marquee-track">
      <div class="marquee-item">Dunnere Glazen<span class="m-dot"></span></div>
      <div class="marquee-item">Vuilafstotende Laag<span class="m-dot"></span></div>
      <div class="marquee-item">Superontspiegeling UV<span class="m-dot"></span></div>
      <div class="marquee-item">Kraswerende Glazen<span class="m-dot"></span></div>
      <div class="marquee-item">6 Maanden Garantie<span class="m-dot"></span></div>
      <div class="marquee-item">Tropisch Bestendig<span class="m-dot"></span></div>
      <div class="marquee-item">Caricom Partner<span class="m-dot"></span></div>
      <div class="marquee-item">UV400 Bescherming<span class="m-dot"></span></div>
      <div class="marquee-item">Dunnere Glazen<span class="m-dot"></span></div>
      <div class="marquee-item">Vuilafstotende Laag<span class="m-dot"></span></div>
      <div class="marquee-item">Superontspiegeling UV<span class="m-dot"></span></div>
      <div class="marquee-item">Kraswerende Glazen<span class="m-dot"></span></div>
      <div class="marquee-item">6 Maanden Garantie<span class="m-dot"></span></div>
      <div class="marquee-item">Tropisch Bestendig<span class="m-dot"></span></div>
      <div class="marquee-item">Caricom Partner<span class="m-dot"></span></div>
      <div class="marquee-item">UV400 Bescherming<span class="m-dot"></span></div>
    </div>
  </div>

  <div class="editorial-band">
    <img
      class="editorial-band-img"
      src="<?= esc(asset_url('assets/img/Model-homepage-Quote.png')); ?>"
      alt="Modellen met brillen uit de collectie van Optiekjaa"
      loading="lazy"
    >
    <div class="editorial-inner">
      <div class="editorial-copy">
        <div class="editorial-eyebrow">Vakmanschap &amp; stijl</div>
        <p class="editorial-quote heading-clip">
          <span class="heading-clip-line">&quot;De bril die u draagt vertelt het</span>
          <span class="heading-clip-line">verhaal van wie u bent.&quot;</span>
        </p>
      </div>
    </div>
  </div>



  <div class="stats-dark">
    <div class="stats-row">
      <div class="stat-cell reveal">
        <div class="stat-val">6 <span class="stat-val-sub">mnd</span></div>
        <div class="stat-sub">Fabrieks - garantie</div>
        <p class="stat-note">Op alle monturen en glazen, standaard inbegrepen bij elke aankoop.</p>
      </div>
      <div class="stat-cell reveal d1">
        <div class="stat-val">100<span class="stat-val-percent">%</span></div>
        <div class="stat-sub">Tropisch bestendig</div>
        <p class="stat-note">Speciaal geselecteerde materialen voor het Surinaamse klimaat.</p>
      </div>
      <div class="stat-cell reveal d2">
        <div class="stat-val stat-val-word">Caricom</div>
        <div class="stat-sub">Exclusief partner</div>
        <p class="stat-note">Gecertificeerde veiligheidsbrillen van de hoogste industriestandaard.</p>
      </div>
      <div class="stat-cell reveal d3">
        <div class="stat-val">3&times;</div>
        <div class="stat-sub">Lenzen - keuze</div>
        <p class="stat-note">Dagelijks, maandelijks of jaarlijks &mdash; top merk contactlenzen.</p>
      </div>
    </div>
  </div>

  <section class="brand-ribbon" data-marquee-play aria-label="Optiekjaa merkband">
    <div class="brand-ribbon-row">
      <div class="brand-ribbon-track" data-brand-ribbon-track>
        <div class="brand-ribbon-group">
          <span class="brand-ribbon-word">OPTIEKJAA</span>
          <span class="brand-ribbon-word">OPTIEKJAA</span>
          <span class="brand-ribbon-word">OPTIEKJAA</span>
          <span class="brand-ribbon-word">OPTIEKJAA</span>
        </div>
        <div class="brand-ribbon-group" aria-hidden="true">
          <span class="brand-ribbon-word">OPTIEKJAA</span>
          <span class="brand-ribbon-word">OPTIEKJAA</span>
          <span class="brand-ribbon-word">OPTIEKJAA</span>
          <span class="brand-ribbon-word">OPTIEKJAA</span>
        </div>
      </div>
    </div>
  </section>

</main>
