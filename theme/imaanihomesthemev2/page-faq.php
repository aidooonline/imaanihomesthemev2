<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow">Questions</p>
    <h1 class="page-head__title">Frequently asked questions</h1>
  </div>
</section>
<section class="section">
  <div class="container container--narrow">
    <div class="faq-list">
      <?php foreach (imaani_faq_items() as $i => $qa) : ?>
        <details class="faq-item" <?php echo 0 === $i ? 'open' : ''; ?>>
          <summary class="faq-item__q"><?php echo esc_html($qa['q']); ?></summary>
          <div class="faq-item__a"><p><?php echo esc_html($qa['a']); ?></p></div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php get_template_part('parts/cta-final'); get_footer(); ?>
