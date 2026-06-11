<?php
defined('ABSPATH') || exit;
get_header();
$projects = imaani_projects();
?>

<section class="hero">
  <div class="container hero__grid">
    <div class="hero__copy">
      <p class="eyebrow">Imaani Homes · Accra</p>
      <h1 class="hero__title">Top Apartments for sale in Ghana</h1>
      <p class="hero__subhead">Four luxury developments. Two sold out. Every one delivered on time.</p>
      <div class="hero__actions">
        <a class="btn btn--primary" href="<?php echo esc_url(home_url('/projects/')); ?>">View Projects</a>
        <a class="btn btn--outline" href="<?php echo esc_url(home_url('/contact/')); ?>">Book a Consultation</a>
      </div>
    </div>

    <div class="hero__rotator" data-rotator aria-label="Featured developments">
      <?php $i = 0; foreach ($projects as $slug => $p) : ?>
        <a class="hero-card<?php echo $i === 0 ? ' is-active' : ''; ?>" data-rotator-item
           href="<?php echo esc_url($p['external'] ? $p['url'] : home_url($p['url'])); ?>"
           <?php echo $p['external'] ? 'target="_blank" rel="noopener"' : ''; ?>>
          <div class="hero-card__media" aria-hidden="true">
            <?php echo imaani_project_image($slug, $p); // phpcs:ignore ?>
          </div>
          <div class="hero-card__body">
            <?php echo imaani_badge($p['status'], $p['badge']); // phpcs:ignore ?>
            <p class="hero-card__name"><?php echo esc_html($p['name']); ?></p>
            <p class="hero-card__meta"><?php echo esc_html($p['location']); ?> — <?php echo esc_html($p['tag']); ?></p>
          </div>
        </a>
      <?php $i++; endforeach; ?>
      <div class="hero__rotator-dots" data-rotator-dots aria-hidden="true"></div>
    </div>
  </div>
</section>

<section class="stats-bar" aria-label="Track record">
  <div class="container stats-bar__row">
    <?php foreach (imaani_trust_items() as $item) :
        $parts = explode(' ', $item, 2); ?>
      <div class="stats-bar__item">
        <span class="stats-bar__num"><?php echo esc_html($parts[0]); ?></span>
        <span class="stats-bar__label"><?php echo esc_html($parts[1] ?? ''); ?></span>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="section">
  <div class="container">
    <p class="eyebrow">Why Imaani</p>
    <h2 class="section__title">A track record, not a promise</h2>
    <div class="pillars">
      <div class="pillar">
        <h3 class="pillar__title">We Deliver</h3>
        <p>JAK Royale and The Ivy Townhomes — both sold out, both delivered on time and to the standard buyers were promised. The record is the reason buyers reserve off-plan with confidence.</p>
      </div>
      <div class="pillar">
        <h3 class="pillar__title">Locations That Appreciate</h3>
        <p>Airport Residential Area and Tesano — established, secure, well-connected neighbourhoods where addresses hold their value and demand stays deep.</p>
      </div>
      <div class="pillar">
        <h3 class="pillar__title">Finishes That Speak</h3>
        <p>One finish specification per building, no tiered quality. From studio to penthouse, the same materials and the same standard throughout.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--tint">
  <div class="container">
    <p class="eyebrow">Our Projects</p>
    <h2 class="section__title">Four Addresses, One Standard</h2>
    <div class="project-grid">
      <?php foreach ($projects as $slug => $p) : ?>
        <?php get_template_part('parts/project-card', null, ['project' => $p, 'key' => $slug]); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container investor-block">
    <div class="investor-block__copy">
      <p class="eyebrow">For Investors</p>
      <h2 class="section__title">Built for returns as much as living</h2>
      <div class="investor-cols">
        <div class="investor-col">
          <h3>Rental Yields</h3>
          <p>Studios and one-bedroom units suit short-let operators and corporate tenants; established neighbourhoods keep occupancy strong year-round.</p>
        </div>
        <div class="investor-col">
          <h3>Capital Appreciation</h3>
          <p>Airport Residential Area and Tesano are among Accra's most established addresses — locations with a history of holding and growing value.</p>
        </div>
        <div class="investor-col">
          <h3>Diaspora-Ready</h3>
          <p>Buy from abroad with a sales team experienced in working with diaspora buyers end-to-end, from reservation to handover.</p>
        </div>
      </div>
      <a class="btn btn--outline" href="<?php echo esc_url(home_url('/investors/')); ?>">Read the Investor Guide</a>
    </div>
  </div>
</section>

<?php $testimonials = imaani_testimonials(); if ($testimonials) : ?>
<section class="section section--tint">
  <div class="container">
    <p class="eyebrow">What Owners Say</p>
    <h2 class="section__title">In their words</h2>
    <div class="testimonials">
      <?php foreach ($testimonials as $t) : ?>
        <figure class="testimonial">
          <blockquote><?php echo esc_html($t['quote']); ?></blockquote>
          <figcaption>
            <span class="testimonial__name"><?php echo esc_html($t['name']); ?></span>
            <?php if ($t['context']) : ?><span class="testimonial__context"><?php echo esc_html($t['context']); ?></span><?php endif; ?>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="section founder">
  <div class="container founder__inner">
    <span class="founder__rule" aria-hidden="true"></span>
    <p class="founder__note">&ldquo;<?php echo esc_html(get_theme_mod('imaani_founder_note', 'Imaani Homes was founded on a simple promise: build addresses worth keeping, and deliver them on time. Two sold-out developments later, the promise stands.')); ?>&rdquo;</p>
    <?php $founder = get_theme_mod('imaani_founder_name', ''); if ($founder) : ?>
      <p class="founder__name">— <?php echo esc_html($founder); ?>, Founder</p>
    <?php else : ?>
      <p class="founder__name">— The Founder, Imaani Homes</p>
    <?php endif; ?>
  </div>
</section>

<?php get_template_part('parts/cta-final'); ?>

<?php get_footer(); ?>
