<?php
$footerCoinImages = [];
for ($index = 1; $index <= 13; $index += 1) {
    $footerCoinImages[] = asset_url(sprintf('assets/img/Optiekjaa footer frames/optiekjaa-footer-frame-%02d.png', $index));
}

$whatsAppMessage = 'Hallo Optiekjaa, ik wil graag meer informatie.';
$whatsAppChatUrl = 'https://wa.me/597521166?text=' . rawurlencode($whatsAppMessage);
$whatsAppDesktopUrl = 'https://web.whatsapp.com/send?phone=597521166&text=' . rawurlencode($whatsAppMessage);
$whatsAppQrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=220x220&margin=0&data=' . rawurlencode($whatsAppChatUrl);
?>
<footer class="site-footer">
  <canvas
    class="footer-coin-canvas"
    aria-hidden="true"
    data-coin-images="<?= esc(implode('|', $footerCoinImages)); ?>"
  ></canvas>

  <div class="footer-shell">
    <div class="footer-brand">
      <p class="footer-bar-copy footer-brand-copy"><?= strtoupper(esc($site['name'])); ?>&reg; <?= esc(date('Y')); ?></p>
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
          <span class="btn-liquid-label">Opt in</span>
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
          <a href="<?= esc(url('contact')); ?>">Privacybeleid</a>
          <a href="<?= esc(url('contact')); ?>">Algemene voorwaarden</a>
          <a href="<?= esc(url('contact')); ?>">Afspraak maken</a>
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

</footer>

<div class="wa-float" aria-live="polite">
  <button
    type="button"
    class="btn-liquid wa-float-btn"
    data-wa-open
    aria-controls="wa-modal"
    aria-expanded="false"
  >
    <span class="btn-liquid-shell"></span>
    <span class="btn-liquid-label">
      <span
        class="wa-float-icon"
        aria-hidden="true"
        style="--wa-icon:url('<?= esc(asset_url('assets/icons/whatsapp-web.svg')); ?>')"
      ></span>
      <span class="wa-float-text">WhatsApp Us</span>
    </span>
  </button>
</div>

<div class="wa-modal" id="wa-modal" hidden aria-hidden="true">
  <div class="wa-modal-backdrop" data-wa-close></div>
  <div
    class="wa-modal-card"
    role="dialog"
    aria-modal="true"
    aria-labelledby="wa-modal-title"
    aria-describedby="wa-modal-copy"
  >
    <button type="button" class="wa-modal-close" data-wa-close aria-label="Close WhatsApp popup">×</button>
    <div class="wa-modal-qr-wrap">
      <img
        class="wa-modal-qr"
        data-wa-qr
        data-src="<?= esc($whatsAppQrUrl); ?>"
        alt="QR-code om Optiekjaa via WhatsApp te openen"
        width="220"
        height="220"
        decoding="async"
      >
    </div>
    <h3 class="wa-modal-title" id="wa-modal-title">WHATSAPP US</h3>
    <p class="wa-modal-copy" id="wa-modal-copy">
      Scan the QR Code to chat with one of our specialists.
    </p>
    <a
      href="<?= esc($whatsAppDesktopUrl); ?>"
      class="btn-liquid wa-modal-action"
      target="_blank"
      rel="noopener"
    >
      <span class="btn-liquid-shell"></span>
      <span class="btn-liquid-label">
        <span class="wa-modal-action-text">OR CHAT VIA DESKTOP</span>
        <!-- <span class="wa-modal-action-arrow" aria-hidden="true">›</span> -->
      </span>
    </a>
  </div>
</div>
