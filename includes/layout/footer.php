<footer class="site-footer">
  <div class="footer-shell">
    <div class="footer-brand">
      <p class="footer-kicker">Premium optiek, Suriname</p>
      <div class="footer-giants">
        <a href="<?= esc(url('over')); ?>" class="footer-giant-link">OVER</a>
        <a href="<?= esc(url('brillen')); ?>" class="footer-giant-link">BRILLEN</a>
        <a href="<?= esc(url('glazen')); ?>" class="footer-giant-link">GLAZEN</a>
        <a href="<?= esc(url('carriere')); ?>" class="footer-giant-link">CARRI&Egrave;RE</a>
      </div>
      <p class="footer-credit">Optiekjaa met stijlvolle monturen, premium glazen en persoonlijke service.</p>
    </div>

    <div class="footer-side">
      <p class="footer-copy">
        Ontvang updates over nieuwe collecties, lensopties en handige optiektips. Alles in de stijl van Optiekjaa, direct in uw inbox.
      </p>

      <form class="footer-news-form" action="<?= esc(url('contact')); ?>" method="get">
        <label class="footer-sr-only" for="footer-news-email">E-mailadres</label>
        <input
          id="footer-news-email"
          class="footer-news-input"
          type="email"
          name="email"
          placeholder="E-mailadres"
          inputmode="email"
          autocomplete="email"
        >
        <button class="btn-liquid footer-news-btn" type="submit">
          <span class="btn-liquid-shell"></span>
          <span class="btn-liquid-label">Aanmelden</span>
        </button>
      </form>

      <div class="footer-contact-block">
        <p class="footer-label">Direct contact</p>
        <div class="footer-action-grid">
          <a href="mailto:bril@optiekjaa.com" class="btn-liquid footer-icon-btn" aria-label="Mail">
            <span class="btn-liquid-shell"></span>
            <span class="btn-liquid-label">
              <span
                class="footer-action-icon"
                aria-hidden="true"
                style="--footer-icon:url('<?= esc(asset_url('assets/icons/envelope.svg')); ?>')"
              ></span>
            </span>
          </a>
          <a href="tel:+597521166" class="btn-liquid footer-icon-btn" aria-label="Phone">
            <span class="btn-liquid-shell"></span>
            <span class="btn-liquid-label">
              <span
                class="footer-action-icon"
                aria-hidden="true"
                style="--footer-icon:url('<?= esc(asset_url('assets/icons/phone-call.svg')); ?>')"
              ></span>
            </span>
          </a>
        </div>
        <div class="footer-contact-lines">
          <a href="mailto:bril@optiekjaa.com">bril@optiekjaa.com</a>
          <a href="tel:+597521166">+597 521 166</a>
          <span>Paramaribo, Suriname</span>
        </div>
      </div>

      <div class="footer-social-block">
        <p class="footer-label">Volg ons</p>
        <div class="footer-action-grid">
          <a href="https://m.me/brillenkoning" class="btn-liquid footer-icon-btn" target="_blank" rel="noopener" aria-label="Messenger">
            <span class="btn-liquid-shell"></span>
            <span class="btn-liquid-label">
              <span
                class="footer-action-icon"
                aria-hidden="true"
                style="--footer-icon:url('<?= esc(asset_url('assets/icons/facebook-messenger-circle.svg')); ?>')"
              ></span>
            </span>
          </a>
          <a href="https://www.facebook.com/brillenkoning" class="btn-liquid footer-icon-btn" target="_blank" rel="noopener" aria-label="Facebook">
            <span class="btn-liquid-shell"></span>
            <span class="btn-liquid-label">
              <span
                class="footer-action-icon"
                aria-hidden="true"
                style="--footer-icon:url('<?= esc(asset_url('assets/icons/facebook.svg')); ?>')"
              ></span>
            </span>
          </a>
          <a href="https://www.instagram.com/optiekjaa/" class="btn-liquid footer-icon-btn" target="_blank" rel="noopener" aria-label="Instagram">
            <span class="btn-liquid-shell"></span>
            <span class="btn-liquid-label">
              <span
                class="footer-action-icon"
                aria-hidden="true"
                style="--footer-icon:url('<?= esc(asset_url('assets/icons/instagram.svg')); ?>')"
              ></span>
            </span>
          </a>
          <a href="https://www.linkedin.com/company/optiekjaa" class="btn-liquid footer-icon-btn" target="_blank" rel="noopener" aria-label="LinkedIn">
            <span class="btn-liquid-shell"></span>
            <span class="btn-liquid-label">
              <span
                class="footer-action-icon"
                aria-hidden="true"
                style="--footer-icon:url('<?= esc(asset_url('assets/icons/linkedin.svg')); ?>')"
              ></span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bar">
    <p class="footer-bar-copy"><?= strtoupper(esc($site['name'])); ?>&reg;</p>
    <div class="footer-bar-links">
      <a href="<?= esc(url('contact')); ?>">Privacybeleid</a>
      <a href="<?= esc(url('contact')); ?>">Algemene voorwaarden</a>
      <a href="<?= esc(url('contact')); ?>">Afspraak maken</a>
    </div>
  </div>
</footer>
