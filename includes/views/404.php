<main id="content" class="site-main error-main">
  <section class="section error-page">
    <div class="error-shell">
      <p class="sec-tag">404 &mdash; Pagina niet gevonden</p>
      <h1 class="error-title">Deze pagina bestaat niet of is verplaatst.</h1>
      <p class="error-text">
        De link die u heeft geopend werkt niet meer. U kunt teruggaan naar de homepage of direct contact met ons opnemen voor hulp.
      </p>
      <div class="hero-actions error-actions">
        <a href="<?= esc(url()); ?>" class="btn-liquid">
          <span class="btn-liquid-shell"></span>
          <span class="btn-liquid-label">Terug naar home</span>
        </a>
        <a href="<?= esc(url('contact')); ?>" class="btn-line">Neem contact op</a>
      </div>
    </div>
  </section>
</main>
