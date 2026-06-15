<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-head page-head--center section--tall">
  <div class="container container--narrow">
    <p class="eyebrow">Message received</p>
    <h1 class="page-head__title">Thank you</h1>
    <?php if ('fail' === sanitize_text_field(wp_unslash($_GET['mail'] ?? ''))) : ?>
      <p class="form-error">Your message couldn't be delivered automatically. Please email <a href="mailto:<?php echo esc_attr(get_theme_mod('imaani_email', 'info@imaanihomes.com')); ?>"><?php echo esc_html(get_theme_mod('imaani_email', 'info@imaanihomes.com')); ?></a> directly.</p>
    <?php else : ?>
      <p class="page-head__lead">Our team responds within 24 hours. In the meantime, explore what's selling now.</p>
    <?php endif; ?>
    <div class="hero__actions hero__actions--center">
      <a class="btn btn--primary" href="https://regalia.imaanihomes.com" target="_blank" rel="noopener">Explore Regalia</a>
      <a class="btn btn--outline" href="<?php echo esc_url(home_url('/blog/')); ?>">Read the Blog</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
