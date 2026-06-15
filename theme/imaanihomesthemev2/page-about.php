<?php
defined('ABSPATH') || exit;
get_header();
the_post();

$schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'AboutPage',
    'mainEntity' => [
        '@type' => 'Organization',
        'name'  => 'Imaani Homes',
        'url'   => home_url('/'),
        'description' => 'Imaani Homes is an Accra-based luxury real estate developer building investment-grade, design-forward homes in Ghana\'s most prestigious locations, with a 100% on-time delivery record.',
        'slogan' => get_theme_mod('imaani_tagline', 'Where Elegance Meets Exclusivity'),
        'foundingLocation' => 'Accra, Ghana',
        'areaServed' => 'Accra, Ghana',
        'telephone' => get_theme_mod('imaani_phone', '+233 595 959595'),
    ],
];
echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";

$about_img = has_post_thumbnail() ? get_the_post_thumbnail(null, 'imaani-hero', ['loading' => 'eager', 'class' => 'abx-hero__img']) : '';
if (!$about_img) {
    foreach (imaani_projects() as $k => $proj) {
        $about_img = imaani_project_image($k, $proj, 'imaani-hero');
        if ($about_img) { $about_img = str_replace('class="', 'class="abx-hero__img ', $about_img); break; }
    }
}
?>

<div class="abx">

  <!-- HERO: photographic, large light headline with italic accent -->
  <section class="abx-hero">
    <?php if ($about_img) : ?><div class="abx-hero__media"><?php echo $about_img; // phpcs:ignore ?></div><?php endif; ?>
    <div class="abx-hero__scrim" aria-hidden="true"></div>
    <div class="container abx-hero__inner">
      <span class="abx-eyebrow"><?php echo esc_html(imaani_field('imaani_about_eyebrow', 'About Imaani Homes')); ?></span>
      <h1 class="abx-hero__title"><?php echo esc_html(imaani_field('imaani_about_title', 'Precision. Intention. Value.')); ?><em>This is how luxury is built to last.</em></h1>
      <p class="abx-hero__lead"><?php echo esc_html(imaani_field('imaani_about_lead', 'Imaani Homes is an Accra-based luxury developer with a single, focused mandate: to build investment-grade, design-forward homes in Ghana\'s most prestigious locations, and to deliver every one of them on time, exactly as promised.')); ?></p>
      <span class="abx-hero__tag"><?php echo esc_html(get_theme_mod('imaani_tagline', 'Where Elegance Meets Exclusivity')); ?></span>
    </div>
  </section>

  <!-- WHY: centered statement, large light heading with italic accent -->
  <section class="abx-why">
    <div class="container abx-why__inner">
      <span class="abx-eyebrow">Why Imaani</span>
      <h2 class="abx-display">A track record.<em>Not a promise.</em></h2>
      <p>In Ghana's property market, the single greatest fear a buyer carries is simple: will it actually be built, and built well? Stalled projects, missed handovers, and unfinished developments have cost too many people too much.</p>
      <p>We exist as the answer to that fear. <strong>Every Imaani development has been delivered on time, to specification, with the keys handed over on the date committed at reservation.</strong> Two of our developments are completely sold out. We do not ask you to trust a promise. We ask you to look at what we have already delivered.</p>
    </div>
  </section>

  <!-- STATS: hairline-separated row -->
  <section class="abx-stats" aria-label="Track record">
    <div class="abx-stats__grid">
      <div class="abx-stat"><span class="abx-stat__n">4</span><span class="abx-stat__l">Developments in Accra's prime belt</span></div>
      <div class="abx-stat"><span class="abx-stat__n">2</span><span class="abx-stat__l">Fully sold out before completion</span></div>
      <div class="abx-stat"><span class="abx-stat__n">100<sup>%</sup></span><span class="abx-stat__l">On-time delivery record</span></div>
      <div class="abx-stat"><span class="abx-stat__n">12<sup>+</sup></span><span class="abx-stat__l">Countries our buyers call home</span></div>
    </div>
  </section>

  <!-- STORY: two columns -->
  <section class="abx-sec">
    <div class="container">
      <span class="abx-eyebrow">Our Story</span>
      <h2 class="abx-display abx-display--left">Built for the moment<em>Ghana is having.</em></h2>
      <?php $story = imaani_field('imaani_about_body', ''); if (trim($story)) : ?>
        <div class="abx-prose"><?php echo wp_kses_post(wpautop($story)); ?></div>
      <?php else : ?>
      <div class="abx-story">
        <div class="abx-prose">
          <p>Something is happening in Ghana. What began with the Year of Return in 2019, marking 400 years since the first enslaved Africans were taken from the continent, has become a movement. Hundreds of thousands of people of African descent came home. Many, for the first time. The government followed it with <strong>Beyond the Return</strong>, a decade-long programme shifting the focus from visiting to belonging, from tourism to ownership.</p>
          <p>Imaani Homes was built for exactly this moment. To own property in Accra is to convert an emotional connection into something permanent: a place that is yours, that appreciates in value, that generates income while you are abroad, and that can be passed to your children as their inheritance and their anchor to where they come from.</p>
        </div>
        <div class="abx-prose">
          <p>That is the intersection where Imaani Homes exists. <strong>Not as a transaction, but as the bridge between the feeling so many carry and the concrete act of claiming a place in the country that feeling points to.</strong></p>
          <p>We craft timeless properties for discerning individuals who appreciate the art of fine living. With a proven record of on-time delivery and meticulous attention to detail, our developments offer exceptional asset growth, impressive rental yields, and an unmatched living experience, in Accra's most coveted addresses, from the Airport Residential Area to Tesano and beyond.</p>
          <p>We are a Ghanaian company, building world-class homes, by Africans, for Ghana, and for everyone in the world who calls it home.</p>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- MISSION / VISION / PROMISE: hairline-separated cards -->
  <section class="abx-sec abx-sec--stone">
    <div class="container">
      <span class="abx-eyebrow">What Drives Us</span>
      <h2 class="abx-display abx-display--left">Our mission, vision<em>and promise.</em></h2>
      <div class="abx-mvv">
        <div class="abx-mvv__card">
          <span class="abx-mvv__label">Our Mission</span>
          <p>To develop luxury living spaces through detailed and innovative world-class designs, top-notch quality, and unmatched customer experience, positioning Imaani Homes as the preferred choice for homeowners and investors.</p>
        </div>
        <div class="abx-mvv__card">
          <span class="abx-mvv__label">Our Vision</span>
          <p>To be the benchmark for luxury homes in Ghana, the developer that homeowners and investors measure every other by, and the name they turn to first.</p>
        </div>
        <div class="abx-mvv__card">
          <span class="abx-mvv__label">Our Promise</span>
          <p>What we commit at reservation is what we deliver at handover: the same date, the same specification, the same standard. No revisions. No quiet delays. No excuses. Our promise is not a brochure line. It is a record you can verify, development by development.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- DIFFERENTIATORS: hairline grid -->
  <section class="abx-sec">
    <div class="container">
      <span class="abx-eyebrow">What Sets Us Apart</span>
      <h2 class="abx-display abx-display--left">The Imaani difference<em>is the difference.</em></h2>
      <p class="abx-lead">Many developers promise luxury. Few can prove delivery, fewer still serve the diaspora buyer properly, and almost none price in the currency that protects your investment. Here is where Imaani stands apart.</p>
      <div class="abx-diff">
        <div class="abx-diff__card"><h3>Delivered, Not Promised</h3><p>Two sold-out developments and a 100% on-time completion record. In a market where stalled projects are the norm, our delivery history is the single strongest assurance a buyer can have. It is the reason buyers choose us, and the reason they refer us.</p></div>
        <div class="abx-diff__card"><h3>Built for the Diaspora</h3><p>The full purchase journey, reservation to handover, can be completed remotely, with buyers across more than twelve countries. Many of our owners collected their keys having never visited the property before. Distance has never been a barrier.</p></div>
        <div class="abx-diff__card"><h3>Prime Addresses Only</h3><p>We build only where the fundamentals are strongest: established tenant demand, constrained supply, documented appreciation. Today that means Airport Residential and Tesano. Our judgment about location is part of what you buy.</p></div>
        <div class="abx-diff__card"><h3>Design That Endures</h3><p>Timeless, investment-grade architecture with meticulous attention to detail. Interiors and finishes that command premium tenants and hold their value, designed to feel as relevant in twenty years as on handover day.</p></div>
        <div class="abx-diff__card"><h3>End-to-End Partnership</h3><p>From your first enquiry to post-handover rental management, we stay with you. We connect every buyer with vetted management partners at handover, so your asset can earn from day one without you managing a thing.</p></div>
        <div class="abx-diff__card abx-diff__card--accent"><h3>Backed by Proven Pedigree</h3><p>Our developments are built and backed by partners with a verified, decades-long construction record, including Iridak Roofing Systems' 25-year history and over 25,000 completed projects. We remove the primary anxiety of off-plan investing: completion risk.</p></div>
      </div>
    </div>
  </section>

  <!-- VALUES: hairline grid, big serif numerals -->
  <section class="abx-sec abx-sec--stone">
    <div class="container">
      <span class="abx-eyebrow">Our Values</span>
      <h2 class="abx-display abx-display--left">The principles<em>we build on.</em></h2>
      <div class="abx-values">
        <?php
        $values = [
          ['Integrity', 'We operate with honesty, transparency, and accountability, ensuring every promise made is a promise kept to our investors.'],
          ['Craftsmanship', 'We are meticulous in delivering homes that embody sophistication, durability, and timeless elegance.'],
          ['Quality', 'We are committed to delivering superior quality in every phase, from architecture and materials to customer service and delivery.'],
          ['Innovation', 'We continuously explore modern design solutions and advanced building technologies to create exceptional living experiences.'],
          ['Sustainability', 'We embrace responsible building practices that promote environmental efficiency and long-term value for our investors and communities.'],
          ['Reliability', 'We deliver our projects on time, with the consistency and reliability that investors can trust.'],
        ];
        foreach ($values as $i => $v) : ?>
          <div class="abx-value">
            <span class="abx-value__num"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
            <div class="abx-value__body">
              <h3><?php echo esc_html($v[0]); ?></h3>
              <p><?php echo esc_html($v[1]); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- PROOF -->
  <section class="abx-sec">
    <div class="container--wide container">
      <span class="abx-eyebrow">The Proof</span>
      <h2 class="abx-display abx-display--left">Our developments<em>tell the story.</em></h2>
      <p class="abx-lead">We do not ask you to take our word for it. Our portfolio is the evidence: two delivered and sold out, two selling now. Every one a demonstration of the same standard.</p>
      <div class="project-grid">
        <?php foreach (imaani_projects() as $slug => $p) : ?>
          <?php get_template_part('parts/project-card', null, ['project' => $p, 'key' => $slug]); ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php get_template_part('parts/cta-final'); ?>

</div>

<?php get_footer(); ?>
