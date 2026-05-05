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
            <a href="<?= esc(url('#contact')); ?>" class="btn-line">Afspraak maken</a>
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
      <h2 class="feat-h2">
        Uw perfecte bril,<br>
        <em>vakkundig gemaakt</em>
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
          <div class="sec-tag collection-tag">01 &mdash; Brillen</div>
          <h2 class="collection-title">Onze <em>collectie</em></h2>
          <p class="collection-text">
            Scroll door drie zorgvuldig geselecteerde briloplossingen en ontdek welke stijl, sterkte en draagervaring het beste bij uw dagelijks leven past.
          </p>
          <div class="collection-actions">
            <a href="<?= esc(url('#contact')); ?>" class="btn-liquid">
              <span class="btn-liquid-shell"></span>
              <span class="btn-liquid-label">Plan afspraak</span>
            </a>
          </div>
        </div>

        <div class="collection-cards">
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
              <div class="collection-card-meta">
                <div class="collection-card-badge">Alle glasopties beschikbaar</div>
                <a href="<?= esc(url('#contact')); ?>" class="collection-card-link">Meer informatie</a>
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
              <div class="collection-card-meta">
                <div class="collection-card-badge">Alle glasopties beschikbaar</div>
                <a href="<?= esc(url('#contact')); ?>" class="collection-card-link">Meer informatie</a>
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
              <div class="collection-card-meta">
                <div class="collection-card-badge">Alle glasopties beschikbaar</div>
                <a href="<?= esc(url('#contact')); ?>" class="collection-card-link">Meer informatie</a>
              </div>
            </div>
          </article>
        </div>
      </div>
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
      src="https://images.pexels.com/photos/5201901/pexels-photo-5201901.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1800"
      alt="Optiekjaa brillencollectie"
      loading="lazy"
    >
    <div class="editorial-inner">
      <div class="editorial-eyebrow">Vakmanschap &amp; stijl</div>
      <p class="editorial-quote">
        &quot;De bril die u draagt<br>vertelt het verhaal van wie u bent.&quot;
      </p>
    </div>
  </div>



  <section class="section section-off" id="glazen">
    <div class="sec-header reveal">
      <div>
        <div class="sec-tag">02 &mdash; Glazen</div>
        <h2 class="sec-title">Glasopties &amp;<br><em>behandelingen</em></h2>
      </div>
      <div class="sec-num">02</div>
    </div>

    <div class="lens-grid">
      <div class="lens-card reveal">
        <div class="lens-img-wrap">
          <img
            class="lens-img"
            loading="lazy"
            src="https://images.pexels.com/photos/5201940/pexels-photo-5201940.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=700"
            alt="Dunnere brillenglazen"
          >
        </div>
        <div class="lens-body">
          <div class="lens-n">01</div>
          <div>
            <h3 class="lens-name">Dunnere Glazen</h3>
            <p class="lens-desc">Dezelfde optische kwaliteit in een slanker profiel. Ideaal voor sterkere prescripties en lichte monturen &mdash; nauwelijks zichtbaar, maximaal comfort.</p>
          </div>
        </div>
      </div>
      <div class="lens-card reveal d1">
        <div class="lens-img-wrap">
          <img
            class="lens-img"
            loading="lazy"
            src="https://images.pexels.com/photos/5201994/pexels-photo-5201994.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=700"
            alt="Vuilafstotende coating op brillenglazen"
          >
        </div>
        <div class="lens-body">
          <div class="lens-n">02</div>
          <div>
            <h3 class="lens-name">Vuilafstotende Laag</h3>
            <p class="lens-desc">Een speciale nanocoating houdt uw glazen langer helder. Vuil, water en vet glijden eraf voor een altijd frisse blik &mdash; dag na dag.</p>
          </div>
        </div>
      </div>
      <div class="lens-card reveal d2">
        <div class="lens-img-wrap">
          <img
            class="lens-img"
            loading="lazy"
            src="https://images.pexels.com/photos/5201991/pexels-photo-5201991.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=700"
            alt="UV bescherming brillenglazen"
          >
        </div>
        <div class="lens-body">
          <div class="lens-n">03</div>
          <div>
            <h3 class="lens-name">Superontspiegeling UV</h3>
            <p class="lens-desc">Geavanceerde coating vermindert verblinding en reflecties terwijl uw ogen worden beschermd tegen schadelijk UV-licht in het tropische klimaat.</p>
          </div>
        </div>
      </div>
      <div class="lens-card reveal d3">
        <div class="lens-img-wrap">
          <img
            class="lens-img"
            loading="lazy"
            src="https://images.pexels.com/photos/15063360/pexels-photo-15063360.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=700"
            alt="Kraswerende brillenglazen opticiens"
          >
        </div>
        <div class="lens-body">
          <div class="lens-n">04</div>
          <div>
            <h3 class="lens-name">Kraswerende Glazen</h3>
            <p class="lens-desc">Een harde beschermlaag houdt uw glazen langer krasvrij. Gecombineerd met andere behandelingen voor de meest duurzame optische oplossing.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="over">
    <div class="qual-split">
      <div class="qual-left reveal">
        <div class="qual-photo-wrap">
          <img
            class="qual-photo"
            loading="lazy"
            src="https://images.pexels.com/photos/18588732/pexels-photo-18588732.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=900"
            alt="Optiekjaa vakkundige service"
          >
        </div>
        <div class="sec-tag qual-tag">03 &mdash; Over ons</div>
        <h2 class="qual-heading">
          Kwaliteit &amp;<br>
          <em>Service</em>
          voorop.
        </h2>
        <p class="qual-sub">
          Wij staan voor kwaliteit en service. Ons team volgt continu de laatste ontwikkelingen in de optiekbranche &mdash; zodat u altijd de beste oplossing krijgt, afgestemd op uw situatie.
        </p>
      </div>
      <div class="qual-right">
        <div class="qual-item reveal">
          <div class="qual-n">01</div>
          <div>
            <h4>Onge&euml;venaarde Kwaliteit</h4>
            <p>Onze brillen zijn speciaal uitgekozen om te voldoen aan de hoogste kwaliteit- en duurzaamheidsnormen &mdash; ook in het tropische klimaat van Suriname.</p>
          </div>
        </div>
        <div class="qual-item reveal d1">
          <div class="qual-n">02</div>
          <div>
            <h4>Fabrieksgarantie</h4>
            <p>Tot 6 maanden fabrieksgarantie op alle monturen en glazen, standaard inbegrepen. Uw investering in goed zicht is bij ons beschermd.</p>
          </div>
        </div>
        <div class="qual-item reveal d2">
          <div class="qual-n">03</div>
          <div>
            <h4>Gecertificeerde Veiligheidsbrillen</h4>
            <p>Als exclusieve Caricom-partner leveren wij gecertificeerde veiligheidsbrillen die voldoen aan de strengste industrienormen.</p>
          </div>
        </div>
        <div class="qual-item reveal d3">
          <div class="qual-n">04</div>
          <div>
            <h4>Top Merk Contactlenzen</h4>
            <p>Dagelijkse, maandelijkse en jaarlijkse contactlenzen van de toonaangevende merken ter wereld &mdash; altijd op voorraad.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="stats-dark">
    <img
      class="stats-dark-bg"
      loading="lazy"
      src="https://images.pexels.com/photos/5201991/pexels-photo-5201991.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1800"
      alt=""
    >
    <div class="stats-row">
      <div class="stat-cell reveal">
        <div class="stat-val">6 <span class="stat-val-sub">mnd</span></div>
        <div class="stat-sub">Fabrieks-<br>garantie</div>
        <p class="stat-note">Op alle monturen en glazen, standaard inbegrepen bij elke aankoop.</p>
      </div>
      <div class="stat-cell reveal d1">
        <div class="stat-val">100<span class="stat-val-percent">%</span></div>
        <div class="stat-sub">Tropisch<br>bestendig</div>
        <p class="stat-note">Speciaal geselecteerde materialen voor het Surinaamse klimaat.</p>
      </div>
      <div class="stat-cell reveal d2">
        <div class="stat-val stat-val-word">Caricom</div>
        <div class="stat-sub">Exclusief<br>partner</div>
        <p class="stat-note">Gecertificeerde veiligheidsbrillen van de hoogste industriestandaard.</p>
      </div>
      <div class="stat-cell reveal d3">
        <div class="stat-val">3&times;</div>
        <div class="stat-sub">Lenzen-<br>keuze</div>
        <p class="stat-note">Dagelijks, maandelijks of jaarlijks &mdash; top merk contactlenzen.</p>
      </div>
    </div>
  </div>

  <section class="section" id="contact">
    <div class="sec-header reveal">
      <div>
        <div class="sec-tag">04 &mdash; Contact</div>
        <h2 class="sec-title">Neem contact<br><em>met ons op</em></h2>
      </div>
      <div class="sec-num">04</div>
    </div>

    <div class="contact-split">
      <div class="reveal">
        <img
          class="contact-store"
          loading="lazy"
          src="https://images.pexels.com/photos/15063360/pexels-photo-15063360.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=900"
          alt="Optiekjaa winkel Suriname"
        >
        <a href="tel:+597521166" class="contact-phone">+597<br>521 166</a>
        <p class="contact-sub">
          Wij staan voor u klaar. Bel, app of mail ons voor een afspraak of een vrijblijvend gesprek over de beste optische oplossing voor u.
        </p>
      </div>
      <div class="contact-methods reveal d1">
        <a href="tel:+597521166" class="c-method">
          <div>
            <div class="c-label">Telefoon</div>
            <div class="c-val">+597 521 166</div>
          </div>
        </a>
        <a href="https://wa.me/597521166" class="c-method" target="_blank" rel="noopener">
          <div>
            <div class="c-label">WhatsApp</div>
            <div class="c-val">Stuur een bericht</div>
          </div>
        </a>
        <a href="https://m.me/brillenkoning" class="c-method" target="_blank" rel="noopener">
          <div>
            <div class="c-label">Facebook Messenger</div>
            <div class="c-val">m.me/brillenkoning</div>
          </div>
        </a>
        <a href="mailto:info@optiekjaa.com" class="c-method">
          <div>
            <div class="c-label">E-mail</div>
            <div class="c-val">info@optiekjaa.com</div>
          </div>
        </a>
      </div>
    </div>
  </section>
</main>
