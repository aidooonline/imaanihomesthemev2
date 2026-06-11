<?php defined('ABSPATH') || exit; ?>
</main>

<footer class="site-footer">
  <div class="container">

    <div class="trust-strip" role="list" aria-label="Track record">
      <?php foreach (imaani_trust_items() as $i => $item) : ?>
        <?php if ($i) : ?><span class="trust-strip__dot" aria-hidden="true">·</span><?php endif; ?>
        <span class="trust-strip__item" role="listitem"><?php echo esc_html($item); ?></span>
      <?php endforeach; ?>
    </div>

    <div class="site-footer__grid">
      <div class="site-footer__brand">
        <p class="site-footer__name">Imaani Homes</p>
        <p class="site-footer__tagline"><?php echo esc_html(get_theme_mod('imaani_tagline', 'Where Elegance Meets Exclusivity')); ?></p>
      </div>

      <div class="site-footer__col">
        <p class="site-footer__heading">Explore</p>
        <ul class="site-footer__links">
          <li><a href="<?php echo esc_url(home_url('/projects/')); ?>">Projects</a></li>
          <li><a href="https://regalia.imaanihomes.com">Regalia</a></li>
          <li><a href="<?php echo esc_url(home_url('/alexis-residence/')); ?>">Alexis Residence</a></li>
          <li><a href="<?php echo esc_url(home_url('/investors/')); ?>">Investors</a></li>
          <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
          <li><a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ</a></li>
        </ul>
      </div>

      <div class="site-footer__col">
        <p class="site-footer__heading">Contact</p>
        <ul class="site-footer__links">
          <li><?php echo esc_html(get_theme_mod('imaani_address', '1st Floor, Williams Heights, Kwabena Duffour Road, Airport Residential Area, Accra')); ?></li>
          <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('imaani_phone', '+233 595 959595'))); ?>"><?php echo esc_html(get_theme_mod('imaani_phone', '+233 595 959595')); ?></a></li>
          <li><a href="mailto:<?php echo esc_attr(get_theme_mod('imaani_email', 'info@imaanihomes.com')); ?>"><?php echo esc_html(get_theme_mod('imaani_email', 'info@imaanihomes.com')); ?></a></li>
        </ul>
      </div>
    </div>

    <div class="site-footer__legal">
      <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> Imaani Homes. All rights reserved.</p>
      <ul class="site-footer__legal-links">
        <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
        <li><a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>">Terms &amp; Conditions</a></li>
      </ul>
    </div>
  </div>
</footer>

<div class="cookie-banner" data-cookie-banner hidden>
  <p class="cookie-banner__text">We use cookies to improve your browsing experience and analyse site traffic. <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></p>
  <div class="cookie-banner__actions">
    <button class="btn btn--primary btn--sm" data-cookie-accept>Accept</button>
    <button class="btn btn--ghost btn--sm" data-cookie-decline>Decline</button>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
