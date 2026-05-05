<footer id="carriere" class="site-footer">
  <div class="foot-stage">
    <div class="foot-left">
      <p class="foot-kicker">Brand identity met karakter</p>
      <h2 class="foot-headline">
        ONTDEK HET MERK<br>
        <em>OPTIEKJAA</em>
      </h2>
      <a href="<?= esc(url('/#contact')); ?>" class="foot-cta">NEEM CONTACT OP</a>

      <div class="foot-signature"><?= esc($site['name']); ?></div>
      <p class="foot-intro">
        Optiekjaa is een merk met een eigen uitstraling: helder, verfijnd en herkenbaar in elk detail.
      </p>
    </div>

    <div class="foot-nav-col">
      <ul class="foot-nav-list">
        <li><a href="<?= esc(url()); ?>" class="is-home">Home</a></li>
        <li><a href="<?= esc(url('brillen')); ?>">Brillen</a></li>
        <li><a href="<?= esc(url('glazen')); ?>">Glazen</a></li>
        <li><a href="<?= esc(url('over')); ?>">Over ons</a></li>
        <li><a href="<?= esc(url('carriere')); ?>">Carri&egrave;re</a></li>
        <li><a href="<?= esc(url('/#contact')); ?>">Neem contact op</a></li>
      </ul>
    </div>

    <div class="foot-aside">
      <div class="foot-block">
        <div class="foot-col-label">Contact</div>
        <div class="foot-contact-list">
          <a href="mailto:info@optiekjaa.com">info@optiekjaa.com</a>
          <a href="tel:+597521166">+597 521 166</a>
        </div>
      </div>

      <div class="foot-block">
        <div class="foot-col-label">WhatsApp</div>
        <div class="foot-icon-row">
          <a href="https://wa.me/597521166" class="foot-icon-btn" target="_blank" rel="noopener" aria-label="WhatsApp">WA</a>
        </div>
      </div>

      <div class="foot-block">
        <div class="foot-col-label">Adres</div>
        <p class="foot-address">
          Paramaribo, Suriname<br>
          Bezoek op afspraak
        </p>
      </div>

      <div class="foot-block">
        <div class="foot-col-label">Volg ons</div>
        <div class="foot-icon-row">
          <a href="#" class="foot-icon-btn" target="_blank" rel="noopener" aria-label="Instagram">IG</a>
          <a href="#" class="foot-icon-btn" target="_blank" rel="noopener" aria-label="Facebook">FB</a>
        </div>
      </div>
    </div>
  </div>

  <p class="foot-register">Optiekjaa staat voor een consistente merkbeleving met stijl, vertrouwen en een eigen visuele signatuur.</p>

  <div class="foot-bottom">
    <p class="foot-copy"><?= strtoupper(esc($site['name'])); ?>&reg;</p>
    <div class="foot-legal">
      <a href="<?= esc(url('/#contact')); ?>">Privacy instellingen</a>
      <a href="<?= esc(url('/#contact')); ?>">Privacybeleid</a>
      <a href="<?= esc(url('/#contact')); ?>">Algemene voorwaarden</a>
    </div>
  </div>
</footer>
