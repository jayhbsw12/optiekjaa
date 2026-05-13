<?php
$resolveImageSrc = static function (string $src): string {
  return preg_match('~^https?://~i', $src) ? $src : asset_url($src);
};

$featureMainImage = 'https://unsplash.com/photos/EJx5aVKmmwQ/download?force=true&w=1400&q=80';
$featureInsetImage = 'https://unsplash.com/photos/BngJVba_5GA/download?force=true&w=900&q=80';

$featureItems = [
  [
    'number' => '01',
    'title' => 'Kraswerende glazen',
    'label' => 'Standaard op alle glazen',
    'description' => 'Een harde beschermlaag helpt dagelijkse gebruikssporen te beperken, zodat uw glazen langer mooi blijven en comfortabel blijven kijken.',
  ],
  [
    'number' => '02',
    'title' => 'Vuilafstotende laag',
    'label' => 'Helderder door de dag',
    'description' => 'Deze hydrofobe coating laat water, vet en vingerafdrukken minder snel hechten. Dat maakt uw glazen makkelijker schoon en langer fris in gebruik.',
  ],
  [
    'number' => '03',
    'title' => 'Dunnere glazen',
    'label' => 'Lichter en verfijnder',
    'description' => 'Bij hogere sterktes kiezen wij voor een slanker profiel dat rustiger oogt in het montuur en lichter aanvoelt bij langdurig dragen.',
  ],
  [
    'number' => '04',
    'title' => 'Superontspiegeling UV',
    'label' => 'Minder reflectie, meer comfort',
    'description' => 'Een geavanceerde coating vermindert hinderlijke schittering en ondersteunt een helderder zicht, aangevuld met een doeltreffende UV-bescherming.',
  ],
];

$storySections = [
  [
    'id' => 'shamir',
    'eyebrow' => '01 / Premium multifocaal',
    'title' => 'Shamir glazen',
    'intro' => 'Wij werken voor multifocale glazen met Shamir, een naam die bekendstaat om innovatie, nauwkeurigheid en betrouwbaar kijkcomfort.',
    'body' => [
      'Het glas wordt volledig afgestemd op uw kijkgedrag, montuurkeuze en dagelijkse afstanden. Zo ontstaat een oplossing die natuurlijker aanvoelt vanaf de eerste dagen.',
      'Draagt u al multifocale glazen? Dan zorgen wij voor een gelijkwaardige of betere upgrade, met dezelfde vertrouwde service en een zorgvuldige persoonlijke meting.',
    ],
    'highlights' => [
      'Persoonlijk afgestemde multifocale zones',
      'Comfort voor veraf, tussenafstand en dichtbij',
      'Premium keuze via zelfstandig optiekadvies',
    ],
    'image' => 'https://unsplash.com/photos/90uVYog2FKE/download?force=true&w=1600&q=80',
    'alt' => 'Vrouw met stijlvolle bril als premium brillenglazen referentie',
    'reverse' => false,
    'tone' => 'warm',
  ],
  [
    'id' => 'zonnebrillen',
    'eyebrow' => '02 / Bescherming in de zon',
    'title' => 'Zonnebrillen',
    'intro' => 'Bijna al onze glazen zijn ook verkrijgbaar als zonneglas, zodat u stijl, bescherming en veilig zicht buiten moeiteloos combineert.',
    'body' => [
      'Zonneglazen filteren hinderlijk licht van de zon en helpen uw ogen ontspannen te blijven tijdens autorijden, wandelen of dagelijks gebruik in fel daglicht.',
      'U kiest uit verschillende tinten en sterktes, zodat uw zonnebril net zo persoonlijk aanvoelt als uw gewone bril en naadloos past bij uw levensstijl.',
    ],
    'highlights' => [
      'Verkrijgbaar in meerdere tinten',
      'Ook mogelijk op sterkte',
      'Ideaal voor dagelijks buitengebruik',
    ],
    'image' => 'https://unsplash.com/photos/kc2ZkUOHXJ0/download?force=true&w=1600&q=80',
    'alt' => 'Model met zonnebril als tijdelijke stockafbeelding',
    'reverse' => true,
    'tone' => 'slate',
  ],
  [
    'id' => 'meekleurende-glazen',
    'eyebrow' => '03 / Flexibel daglichtcomfort',
    'title' => 'Meekleurende glazen',
    'intro' => 'Meekleurende glazen reageren op UV-licht en passen zich automatisch aan wanneer u van binnen naar buiten beweegt.',
    'body' => [
      'Buiten kleuren de glazen donkerder voor extra comfort; binnen klaren ze weer op voor een heldere, natuurlijke kijkervaring zonder telkens van bril te wisselen.',
      'Voor wie veel onderweg is of graag actief buiten is, vormt dit een elegante alles-in-een oplossing met minder gedoe en meer draagcomfort.',
    ],
    'highlights' => [
      'Automatisch donkerder in UV-licht',
      'Snel terug helder binnenshuis',
      'Optioneel op bijna alle glazen',
    ],
    'image' => 'https://unsplash.com/photos/cFjIrVe1O9Y/download?force=true&w=1600&q=80',
    'alt' => 'Vrouw met bril als tijdelijke stockafbeelding voor meekleurende glazen',
    'reverse' => false,
    'tone' => 'mist',
  ],
];
?>

<main id="content" class="site-main">

  <section class="bh" aria-label="Glazen en glasopties">

    <div class="bh-bg" aria-hidden="true">
      <img class="bh-img"
           src="<?= esc(asset_url('assets/img/Brillen-banner.webp')); ?>"
           alt=""
           loading="eager">
    </div>
    <div class="bh-overlay" aria-hidden="true"></div>

    <div class="bh-foot">
      <h1 class="bh-headline">Glazen &amp;<br><em>glasopties.</em></h1>
      <p class="bh-tagline">Slim opgebouwd voor helder zicht, meer draagcomfort en een afwerking die elke dag rustiger aanvoelt.</p>
    </div>

  </section>

  <section class="brx-overview" id="glasopties" aria-labelledby="brx-overview-title">
    <div class="brx-shell">
      <div class="brx-overview-head">
        <div class="brx-overview-copy">
          <p class="brx-kicker">Glasopties &amp; behandelingen</p>
          <h2 id="brx-overview-title" class="brx-title">Onze glasopties</h2>
        </div>
        <p class="brx-lead">
          Al onze brillenglazen worden zorgvuldig opgebouwd voor een helder, comfortabel en duurzaam resultaat. Deze vier behandelingen vormen de sterke basis van elk paar glazen dat wij adviseren.
        </p>
      </div>

      <div class="brx-feature-stage">
        <div class="brx-feature-visuals" aria-hidden="true">
          <figure class="brx-feature-main">
            <img
              src="<?= esc($featureMainImage); ?>"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </figure>
          <figure class="brx-feature-inset">
            <img
              src="<?= esc($featureInsetImage); ?>"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </figure>
          <div class="brx-feature-note">
            <span>Elke dag beter zicht</span>
            <strong>Vier slimme voordelen, subtiel verwerkt in een rustiger en sterker glas.</strong>
          </div>
        </div>

        <div class="brx-feature-list">
          <?php foreach ($featureItems as $item): ?>
            <article class="brx-feature-item">
              <div class="brx-feature-heading">
                <div class="brx-feature-number"><?= esc($item['number']); ?></div>
                <div>
                  <p class="brx-feature-label"><?= esc($item['label']); ?></p>
                  <h3 class="brx-feature-title"><?= esc($item['title']); ?></h3>
                </div>
              </div>
              <p class="brx-feature-text"><?= esc($item['description']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <?php foreach ($storySections as $section): ?>
    <section
      class="brx-story brx-story--<?= esc($section['tone']); ?><?= $section['reverse'] ? ' is-reverse' : ''; ?>"
      id="<?= esc($section['id']); ?>"
      aria-labelledby="story-title-<?= esc($section['id']); ?>"
    >
      <div class="brx-shell">
        <div class="brx-story-grid">
          <figure class="brx-story-media">
            <img
              src="<?= esc($resolveImageSrc($section['image'])); ?>"
              alt="<?= esc($section['alt']); ?>"
              loading="lazy"
              decoding="async"
            >
          </figure>

          <div class="brx-story-copy">
            <p class="brx-kicker"><?= esc($section['eyebrow']); ?></p>
            <h2 id="story-title-<?= esc($section['id']); ?>" class="brx-story-title"><?= esc($section['title']); ?></h2>
            <p class="brx-story-intro"><?= esc($section['intro']); ?></p>

            <?php foreach ($section['body'] as $paragraph): ?>
              <p class="brx-story-text"><?= esc($paragraph); ?></p>
            <?php endforeach; ?>

            <ul class="brx-story-points" aria-label="<?= esc($section['title']); ?> voordelen">
              <?php foreach ($section['highlights'] as $highlight): ?>
                <li><?= esc($highlight); ?></li>
              <?php endforeach; ?>
            </ul>

            <a href="<?= esc(url('contact')); ?>" class="brx-story-link">Persoonlijk advies aanvragen</a>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>

</main>
