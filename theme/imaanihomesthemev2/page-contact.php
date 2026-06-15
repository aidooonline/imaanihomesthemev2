<?php
defined('ABSPATH') || exit;
get_header();
$email = get_theme_mod('imaani_email', 'info@imaanihomes.com');
$phone = get_theme_mod('imaani_phone', '+233 595 959595');
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow"><?php echo esc_html(imaani_field('imaani_contact_eyebrow', 'Contact')); ?></p>
    <h1 class="page-head__title"><?php echo esc_html(imaani_field('imaani_contact_title', 'Reserve your private consultation')); ?></h1>
    <p class="page-head__lead"><?php echo esc_html(imaani_field('imaani_contact_lead', 'Tell us what you\'re looking for, a home, an investment, or both. Our team responds within 24 hours.')); ?></p>
  </div>
</section>
<section class="section section--tint">
  <div class="container contact-layout">
    <div class="contact-form-wrap">
      <p class="eyebrow">Send a message</p>
      <?php
      $shortcode = get_post_meta(get_the_ID(), 'imaani_form_shortcode', true);
      if ($shortcode) {
          echo do_shortcode($shortcode);
      } else {
          imaani_native_form(['context' => 'Consultation']);
      } ?>
    </div>
    <aside class="contact-aside">
      <div class="project-aside__card">
        <p class="eyebrow">Visit us</p>
        <p><?php echo esc_html(get_theme_mod('imaani_address', '1st Floor, Williams Heights, Kwabena Duffour Road, Airport Residential Area, Accra')); ?></p>
        <p><a href="tel:<?php echo esc_attr(preg_replace('/\s+/','',$phone)); ?>"><?php echo esc_html($phone); ?></a><br>
        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
      </div>
    </aside>
  </div>
</section>
<?php get_footer(); ?>
