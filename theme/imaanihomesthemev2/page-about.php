<?php
defined('ABSPATH') || exit;
get_header();
the_post();

// AboutPage schema (org), no em dashes in content
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

$about_img = has_post_thumbnail() ? get_the_post_thumbnail(null, 'imaani-hero', ['loading' => 'eager']) : '';
if (!$about_img) {
    foreach (imaani_projects() as $k => $proj) {
        $about_img = imaani_project_image($k, $proj, 'imaani-hero');
        if ($about_img) break;
    }
}
?>

<!-- HERO -->
<section class="page-head">
  <div class="container">
    <p class="eyebrow"><?php echo esc_html(imaani_field('imaani_about_eyebrow', 'About Imaani Homes')); ?></p>
    <h1 class="page-head__title"><?php echo esc_html(imaani_field('imaani_about_title', 'Precision. Intention. Value.')); ?></h1>
    <p class="page-head__lead"><?php echo esc_html(imaani_field('imaani_about_lead', 'Imaani Homes is an Accra-based luxury developer with a single, focused mandate: to build investment-grade, design-forward homes in Ghana\'s most prestigious locations, and to deliver every one of them on time, exactly as promised.')); ?></p>
  </div>
</section>

<?php if ($about_img) : ?>
<section class="about-visual">
  <div class="container">
    <figure class="about-visual__frame"><?php echo $about_img; // phpcs:ignore ?></figure>
  </div>
</section>
<?php endif; ?>

<!-- WHY IMAANI: TRACK RECORD, NOT A PROMISE -->
<section class="about-why">
  <div class="container about-why__inner">
    <p class="eyebrow eyebrow--light">Why Imaani</p>
    <h2 class="about-why__title">A track record. Not a promise.</h2>
    <p>In Ghana's property market, the single greatest fear a buyer carries is simple: will it actually be built, and built well? Stalled projects, missed handovers, and unfinished developments have cost too many people too much.</p>
    <p>We exist as the answer to that fear. Every Imaani development has been delivered on time, to specification, with the keys handed over on the date committed at reservation. Two of our developments are completely sold out. We do not ask you to trust a promise. We ask you to look at what we have already delivered.</p>
  </div>
</section>

<!-- STATS -->
<section class="about-stats" aria-label="Track record">
  <div class="about-stats__grid">
    <div class="about-stat"><span class="about-stat__n">4</span><span class="about-stat__l">Developments in Accra's prime belt</span></div>
    <div class="about-stat"><span class="about-stat__n">2</span><span class="about-stat__l">Fully sold out before completion</span></div>
    <div class="about-stat"><span class="about-stat__n">100<sup>%</sup></span><span class="about-stat__l">On-time delivery record</span></div>
    <div class="about-stat"><span class="about-stat__n">12<sup>+</sup></span><span class="about-stat__l">Countries our buyers call home</span></div>
  </div>
</section>

<!-- OUR STORY -->
<section class="section">
  <div class="container">
    <p class="eyebrow">Our Story</p>
    <h2 class="section__title">Built for the moment Ghana is having.</h2>
    <?php $story = imaani_field('imaani_about_body', ''); if (trim($story)) : ?>
      <div class="about-story entry-content"><?php echo wp_kses_post(wpautop($story)); ?></div>
    <?php else : ?>
    <div class="about-story">
      <div class="flow">
        <p>Something is happening in Ghana. What began with the Year of Return in 2019, marking 400 years since the first enslaved Africans were taken from the continent, has become a movement. Hundreds of thousands of people of African descent came home. Many, for the first time. The government followed it with <strong>Beyond the Return</strong>, a decade-long programme shifting the focus from visiting to belonging, from tourism to ownership.</p>
        <p>Imaani Homes was built for exactly this moment. To own property in Accra is to convert an emotional connection into something permanent: a place that is yours, that appreciates in value, that generates income while you are abroad, and that can be passed to your children as their inheritance and their anchor to where they come from.</p>
      </div>
      <div class="flow">
        <p>That is the intersection where Imaani Homes exists. <strong>Not as a transaction, but as the bridge between the feeling so many carry and the concrete act of claiming a place in the country that feeling points to.</strong></p>
        <p>We craft timeless properties for discerning individuals who appreciate the art of fine living. With a proven record of on-time delivery and meticulous attention to detail, our developments offer exceptional asset growth, impressive rental yields, and an unmatched living experience, in Accra's most coveted addresses, from the Airport Residential Area to Tesano and beyond.</p>
        <p>We are a Ghanaian company, building world-class homes, by Africans, for Ghana, and for everyone in the world who calls it home.</p>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- MISSION / VISION / PROMISE -->
<section class="section section--tint">
  <div class="container">
    <p class="eyebrow">What Drives Us</p>
    <h2 class="section__title">Our mission, vision and promise.</h2>
    <div class="pillars">
      <div class="pillar">
        <h3 class="pillar__title">Our Mission</h3>
        <p>To develop luxury living spaces through detailed and innovative world-class designs, top-notch quality, and unmatched customer experience, positioning Imaani Homes as the preferred choice for homeowners and investors.</p>
      </div>
      <div class="pillar">
        <h3 class="pillar__title">Our Vision</h3>
        <p>To be the benchmark for luxury homes in Ghana, the developer that homeowners and investors measure every other by, and the name they turn to first.</p>
      </div>
      <div class="pillar">
        <h3 class="pillar__title">Our Promise</h3>
        <p>What we commit at reservation is what we deliver at handover: the same date, the same specification, the same standard. No revisions. No quiet delays. No excuses. Our promise is not a brochure line. It is a record you can verify, development by development.</p>
      </div>
    </div>
  </div>
</section>

<!-- WHAT SETS US APART -->
<section class="section">
  <div class="container">
    <p class="eyebrow">What Sets Us Apart</p>
    <h2 class="section__title">The Imaani difference is the difference.</h2>
    <p class="lead">Many developers promise luxury. Few can prove delivery, fewer still serve the diaspora buyer properly, and almost none price in the currency that protects your investment. Here is where Imaani stands apart.</p>
    <div class="about-diff">
      <div class="about-diff__card">
        <h3>Delivered, Not Promised</h3>
        <p>Two sold-out developments and a 100% on-time completion record. In a market where stalled projects are the norm, our delivery history is the single strongest assurance a buyer can have. It is the reason buyers choose us, and the reason they refer us.</p>
      </div>
      <div class="about-diff__card">
        <h3>Built for the Diaspora</h3>
        <p>The full purchase journey, reservation to handover, can be completed remotely, with buyers across more than twelve countries. Many of our owners collected their keys having never visited the property before. Distance has never been a barrier.</p>
      </div>
      <div class="about-diff__card">
        <h3>Prime Addresses Only</h3>
        <p>We build only where the fundamentals are strongest: established tenant demand, constrained supply, documented appreciation. Today that means Airport Residential and Tesano. Our judgment about location is part of what you buy.</p>
      </div>
      <div class="about-diff__card">
        <h3>Design That Endures</h3>
        <p>Timeless, investment-grade architecture with meticulous attention to detail. Interiors and finishes that command premium tenants and hold their value, designed to feel as relevant in twenty years as on handover day.</p>
      </div>
      <div class="about-diff__card">
        <h3>End-to-End Partnership</h3>
        <p>From your first enquiry to post-handover rental management, we stay with you. We connect every buyer with vetted management partners at handover, so your asset can earn from day one without you managing a thing.</p>
      </div>
    </div>

    <div class="about-trust">
      <h3>Backed by proven construction pedigree</h3>
      <p>Our developments are built and backed by partners with a verified, decades-long construction track record, including Iridak Roofing Systems' proven 25-year history and over 25,000 completed projects. This is how we remove the primary anxiety of off-plan investing in an emerging market: <strong>completion risk.</strong> When you buy from Imaani, the engineering credibility behind the concrete is as strong as the design in front of it.</p>
    </div>
  </div>
</section>

<!-- VALUES -->
<section class="section section--tint">
  <div class="container">
    <p class="eyebrow">Our Values</p>
    <h2 class="section__title">The principles we build on.</h2>
    <div class="about-values">
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
        <div class="about-value">
          <span class="about-value__num"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
          <div>
            <h3><?php echo esc_html($v[0]); ?></h3>
            <p><?php echo esc_html($v[1]); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- PORTFOLIO PROOF -->
<section class="section">
  <div class="container">
    <p class="eyebrow">The Proof</p>
    <h2 class="section__title">Our developments tell the story.</h2>
    <p class="lead">We do not ask you to take our word for it. Our portfolio is the evidence: two delivered and sold out, two selling now. Every one a demonstration of the same standard.</p>
    <div class="project-grid">
      <?php foreach (imaani_projects() as $slug => $p) : ?>
        <?php get_template_part('parts/project-card', null, ['project' => $p, 'key' => $slug]); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_template_part('parts/cta-final'); ?>

<?php get_footer(); ?>
