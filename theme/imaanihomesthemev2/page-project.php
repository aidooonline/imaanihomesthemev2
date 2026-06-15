<?php
defined('ABSPATH') || exit;
get_header();
the_post();
$slug = get_post_field('post_name');
$p = imaani_project($slug);
if (!$p) { ?>
  <div class="container section"><?php the_content(); ?></div>
<?php get_footer(); return; }
$sold = ($p['status'] === 'sold-out');
$price = !empty($p['price_key']) ? trim((string) get_theme_mod($p['price_key'], '')) : '';
$units = get_post_meta(get_the_ID(), 'imaani_units_json', true);
$units = $units ? json_decode($units, true) : ($p['units'] ?? []);

// Editor overrides for copy (fall back to verified registry content)
$f_subtitle = imaani_field('imaani_proj_subtitle', $p['subtitle'] ?? '');
$f_blurb    = imaani_field('imaani_proj_blurb', $p['blurb'] ?? '');
$f_body     = imaani_field('imaani_proj_body', '');
?>
<?php if (has_post_thumbnail()) : ?>
<section class="project-banner">
  <div class="project-banner__media"><?php the_post_thumbnail('imaani-hero', ['loading' => 'eager']); ?></div>
  <div class="project-banner__scrim" aria-hidden="true"></div>
  <div class="container project-banner__content">
    <?php echo imaani_badge($p['status'], $p['badge']); // phpcs:ignore ?>
    <h1 class="project-banner__title"><?php echo esc_html($p['name']); ?></h1>
    <p class="project-banner__meta"><?php echo esc_html($p['location']); ?> · <?php echo esc_html($p['tag']); ?></p>
    <?php if ($price) : ?><p class="project-banner__price">Starting from <strong><?php echo esc_html($price); ?></strong></p><?php endif; ?>
  </div>
</section>
<?php else : ?>
<section class="page-head page-head--project">
  <div class="container">
    <?php echo imaani_badge($p['status'], $p['badge']); // phpcs:ignore ?>
    <h1 class="page-head__title"><?php echo esc_html($p['name']); ?></h1>
    <p class="page-head__meta"><?php echo esc_html($p['location']); ?> · <?php echo esc_html($p['tag']); ?></p>
    <?php if ($price) : ?><p class="page-head__price">Starting from <strong><?php echo esc_html($price); ?></strong></p><?php endif; ?>
  </div>
</section>
<?php endif; ?>

<section class="section">
  <div class="container project-layout">
    <div class="project-main">
      <?php if (trim($f_subtitle)) : ?>
        <h2 class="project-subtitle"><?php echo esc_html($p['name']); ?> — <?php echo esc_html($f_subtitle); ?></h2>
      <?php endif; ?>

      <p class="lead"><?php echo esc_html($f_blurb); ?></p>

      <?php if (trim($f_body)) : ?>
        <?php echo wp_kses_post(wpautop($f_body)); ?>
      <?php elseif (!empty($p['body']) && is_array($p['body'])) : ?>
        <?php foreach ($p['body'] as $para) : ?>
          <p><?php echo esc_html($para); ?></p>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php
      // Optional gallery of project stills from the media library (by slug)
      if (!empty($p['gallery_slugs']) && is_array($p['gallery_slugs'])) {
          $imgs = [];
          foreach ($p['gallery_slugs'] as $gslug) {
              $found = get_posts(['post_type' => 'attachment', 'name' => $gslug, 'post_status' => 'inherit', 'posts_per_page' => 1, 'fields' => 'ids']);
              if ($found) $imgs[] = (int) $found[0];
          }
          if (count($imgs) >= 2) {
              echo '<div class="project-gallery">';
              foreach ($imgs as $iid) {
                  echo '<figure class="project-gallery__item">' . wp_get_attachment_image($iid, 'imaani-card', false, ['loading' => 'lazy']) . '</figure>';
              }
              echo '</div>';
          }
      }
      // Editor-added content (WYSIWYG). Legacy Elementor markup is intentionally skipped.
      $extra = get_the_content();
      $is_legacy = 'builder' === get_post_meta(get_the_ID(), '_elementor_edit_mode', true)
          || str_contains($extra, 'elementor-');
      if (trim($extra) && !$is_legacy) : ?>
        <div class="entry-content flow"><?php the_content(); ?></div>
      <?php endif; ?>

      <?php if (!$sold && !empty($p['amenities'])) : ?>
        <h2>Featured Amenities</h2>
        <ul class="amenity-grid">
          <?php foreach ($p['amenities'] as $a) : ?>
            <li class="amenity"><?php echo esc_html($a); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if (!$sold && $units) : ?>
        <h2>The Residences</h2>
        <div class="unit-grid">
          <?php foreach ($units as $u) : ?>
            <div class="unit-card">
              <h3><?php echo esc_html($u['type'] ?? ''); ?></h3>
              <?php if (!empty($u['size'])) : ?><p class="unit-card__size"><?php echo esc_html($u['size']); ?></p><?php endif; ?>
              <?php if (!empty($u['features'])) : ?><p><?php echo esc_html($u['features']); ?></p><?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ($sold) : ?>
        <h2>The story</h2>
        <p><?php echo esc_html($p['name']); ?> sold out. Every buyer received their keys on time, to the standard promised at reservation. It now stands as proof of how Imaani Homes builds — and why our current developments sell off-plan with confidence.</p>
        <h2>Join the waitlist</h2>
        <p>Be first to hear when a resale becomes available, or when our next development opens for reservations.</p>
      <?php endif; ?>

      <div class="project-form" id="enquire">
        <h2><?php echo $sold ? 'Waitlist signup' : 'Talk to us now'; ?></h2>
        <?php
        $form_id = get_post_meta(get_the_ID(), 'imaani_form_shortcode', true);
        if ($form_id) {
            echo do_shortcode($form_id);
        } else {
            imaani_native_form([
                'context'          => $sold ? 'Waitlist' : 'Enquiry',
                'interest_default' => $p['name'],
                'compact'          => $sold,
            ]);
        }
        ?>
      </div>
    </div>

    <aside class="project-aside">
      <div class="project-aside__card">
        <p class="eyebrow">At a glance</p>
        <ul class="fact-list">
          <li><span>Status</span><strong><?php echo esc_html($p['badge']); ?></strong></li>
          <li><span>Location</span><strong><?php echo esc_html($p['location']); ?></strong></li>
          <?php if ($price) : ?><li><span>From</span><strong><?php echo esc_html($price); ?></strong></li><?php endif; ?>
        </ul>
        <a class="btn btn--primary btn--block" href="#enquire"><?php echo $sold ? 'Join the Waitlist' : 'Enquire Now'; ?></a>
      </div>
    </aside>
  </div>
</section>
<?php get_template_part('parts/cta-final'); get_footer(); ?>
