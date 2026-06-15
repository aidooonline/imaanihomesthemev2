<?php
defined('ABSPATH') || exit;
$projects = imaani_projects();
$regalia  = $projects['regalia'] ?? null;
$alexis   = $projects['alexis-residence'] ?? null;
$reg_img  = $regalia ? imaani_project_image('regalia', $regalia, 'imaani-card') : '';
$alx_img  = $alexis ? imaani_project_image('alexis-residence', $alexis, 'imaani-card') : '';
?>
<aside class="blog-panel" aria-label="Featured developments">

  <a class="ad-card<?php echo $reg_img ? '' : ' ad-card--plain'; ?>" href="<?php echo esc_url(imaani_utm_url('https://regalia.imaanihomes.com')); ?>" target="_blank" rel="noopener">
    <div class="ad-card__media" aria-hidden="true"><?php echo $reg_img; // phpcs:ignore ?></div>
    <div class="ad-card__scrim" aria-hidden="true"></div>
    <div class="ad-card__body">
      <span class="ad-card__eyebrow">Now Selling</span>
      <span class="ad-card__title">Regalia</span>
      <span class="ad-card__text">Airport Residential's new standard. Studios to penthouses, crowned by a rooftop infinity pool.</span>
      <span class="ad-card__cta">Explore Regalia <span aria-hidden="true">→</span></span>
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
