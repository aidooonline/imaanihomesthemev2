<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow"><?php echo esc_html(imaani_field('imaani_inv_eyebrow', 'For Investors')); ?></p>
    <h1 class="page-head__title"><?php echo esc_html(imaani_field('imaani_inv_title', 'Invest where Accra already lives well')); ?></h1>
    <p class="page-head__lead"><?php echo esc_html(imaani_field('imaani_inv_lead', 'Imaani Homes builds in established neighbourhoods with a delivery record to match — two developments sold out and handed over on time.')); ?></p>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="pillars">
      <div class="pillar">
        <h2 class="pillar__title">Rental Yields</h2>
        <p>Studios and one-bedroom apartments at Regalia are sized and specified for the short-let and corporate-tenant market — premium product, premium location, accessible entry point. Executives on rotation from multinationals and international organisations based in Accra sustain year-round demand for one-bedroom units.</p>
      </div>
      <div class="pillar">
        <h2 class="pillar__title">Capital Appreciation</h2>
        <p>Airport Residential Area and Tesano are among Accra's most established and secure neighbourhoods. Two-bedroom apartments in these areas are consistently favoured by diaspora returnees and small families — depth of demand that protects value.</p>
      </div>
      <div class="pillar">
        <h2 class="pillar__title">Diaspora-Ready</h2>
        <p>Foreign direct investment in Ghanaian real estate has been rising, and diaspora interest in Accra property is growing visibly. Imaani's sales team handles the full journey remotely — reservation, documentation, progress updates, handover.</p>
      </div>
    </div>

    <?php $inv_body = imaani_field('imaani_inv_body', ''); if (trim($inv_body)) : ?>
      <div class="container--narrow entry-content flow" style="margin-top:var(--space-10)"><?php echo wp_kses_post(wpautop($inv_body)); ?></div>
    <?php endif; ?>

    <div class="investor-reading">
      <p class="eyebrow">From our research desk</p>
      <h2 class="section__title">Read before you invest</h2>
      <ul class="reading-list">
        <li><a href="<?php echo esc_url(home_url('/real-estate-investment-in-ghana/short-let-vs-long-let-accra-apartment-investment-2026/')); ?>">Short-let vs long-let: the Accra apartment investment question</a></li>
        <li><a href="<?php echo esc_url(home_url('/blog/airport-residential-area-property-prices-and-analysis-2026/')); ?>">Airport Residential Area property prices and analysis</a></li>
        <li><a href="<?php echo esc_url(home_url('/blog/foreign-direct-investment-in-ghana-real-estate-surged-18-in-2024-what-the-numbers-mean-for-diaspora-investors/')); ?>">What rising FDI means for diaspora investors</a></li>
        <li><a href="<?php echo esc_url(home_url('/blog/the-ghana-cedi-in-2025-africas-best-performing-currency-and-what-it-means-for-diaspora-investors/')); ?>">The cedi's performance and your purchasing power</a></li>
      </ul>
    </div>
  </div>
</section>
<?php get_template_part('parts/cta-final'); get_footer(); ?>
