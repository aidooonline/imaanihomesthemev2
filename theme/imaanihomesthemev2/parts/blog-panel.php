<?php
defined('ABSPATH') || exit;
$projects = imaani_projects();
$regalia  = $projects['regalia'] ?? null;
$alexis   = $projects['alexis-residence'] ?? null;
$reg_img  = $regalia ? imaani_project_image('regalia', $regalia, 'imaani-card') : '';
$alx_img  = $alexis ? imaani_project_image('alexis-residence', $alexis, 'imaani-card') : '';
?>
<aside class="blog-panel" aria-label="Featured developments">

  <?php
  $reg_ad_imgs     = imaani_regalia_ad_image_ids();
  $reg_ad_eyebrow  = trim((string) get_theme_mod('regalia_ad_eyebrow', 'Now Selling'));
  $reg_ad_title    = trim((string) get_theme_mod('regalia_ad_title', 'Regalia'));
  $reg_ad_text     = trim((string) get_theme_mod('regalia_ad_text', "Airport Residential's new standard. Studios to penthouses, crowned by a rooftop infinity pool."));
  $reg_ad_btn      = trim((string) get_theme_mod('regalia_ad_btn', 'Explore Regalia'));
  $reg_ad_url      = trim((string) get_theme_mod('regalia_ad_url', 'https://regalia.imaanihomes.com')) ?: 'https://regalia.imaanihomes.com';
  $reg_ad_interval = max(2, (int) get_theme_mod('regalia_ad_interval', 5));
  $reg_card_class  = 'ad-card';
  if ($reg_ad_imgs) {
      $reg_card_class .= ' ad-card--slides';
  } elseif (! $reg_img) {
      $reg_card_class .= ' ad-card--plain';
  }
  ?>
  <a class="<?php echo esc_attr($reg_card_class); ?>" href="<?php echo esc_url(imaani_utm_url($reg_ad_url)); ?>" target="_blank" rel="noopener">
    <?php if ($reg_ad_imgs) : ?>
      <div class="ad-card__media ad-card__slides" data-interval="<?php echo esc_attr($reg_ad_interval * 1000); ?>" aria-hidden="true">
        <?php foreach (array_values($reg_ad_imgs) as $idx => $img_id) : ?>
          <?php echo wp_get_attachment_image($img_id, 'imaani-card', false, ['class' => 'ad-card__slide' . (0 === $idx ? ' is-active' : ''), 'loading' => 'lazy', 'alt' => '']); ?>
        <?php endforeach; ?>
      </div>
      <div class="ad-card__scrim" aria-hidden="true"></div>
    <?php elseif ($reg_img) : ?>
      <div class="ad-card__media" aria-hidden="true"><?php echo $reg_img; // phpcs:ignore ?></div>
      <div class="ad-card__scrim" aria-hidden="true"></div>
    <?php endif; ?>
    <div class="ad-card__body">
      <?php if ('' !== $reg_ad_eyebrow) : ?><span class="ad-card__eyebrow"><?php echo esc_html($reg_ad_eyebrow); ?></span><?php endif; ?>
      <?php if ('' !== $reg_ad_title) : ?><span class="ad-card__title"><?php echo esc_html($reg_ad_title); ?></span><?php endif; ?>
      <?php if ('' !== $reg_ad_text) : ?><span class="ad-card__text"><?php echo esc_html($reg_ad_text); ?></span><?php endif; ?>
      <?php if ('' !== $reg_ad_btn) : ?><span class="ad-card__cta"><?php echo esc_html($reg_ad_btn); ?> <span aria-hidden="true">&rarr;</span></span><?php endif; ?>
    </div>
  </a>

  <a class="ad-card<?php echo $alx_img ? '' : ' ad-card--plain'; ?>" href="<?php echo esc_url(imaani_utm_url(home_url('/alexis-residence/'))); ?>">
    <div class="ad-card__media" aria-hidden="true"><?php echo $alx_img; // phpcs:ignore ?></div>
    <div class="ad-card__scrim" aria-hidden="true"></div>
    <div class="ad-card__body">
      <span class="ad-card__eyebrow">Over 90% Sold</span>
      <span class="ad-card__title">Alexis Residence</span>
      <span class="ad-card__text">Boutique apartments in Tesano. Only three two-bedroom residences remaining.</span>
      <span class="ad-card__cta">View Alexis <span aria-hidden="true">→</span></span>
    </div>
  </a>

  <a class="ad-card ad-card--consult" href="<?php echo esc_url(imaani_utm_url(home_url('/contact/'))); ?>">
    <div class="ad-card__body">
      <span class="ad-card__eyebrow">Private Consultation</span>
      <span class="ad-card__title">Talk to our team</span>
      <span class="ad-card__text">Tell us what you're looking for. We respond within 24 hours.</span>
      <span class="ad-card__cta">Book a Consultation <span aria-hidden="true">→</span></span>
    </div>
  </a>

</aside>
