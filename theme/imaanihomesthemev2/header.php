<?php defined('ABSPATH') || exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main">Skip to content</a>

<div class="utility-bar">
  <div class="container utility-bar__row">
    <span class="utility-bar__tagline"><?php echo esc_html(get_theme_mod('imaani_tagline', 'Where Elegance Meets Exclusivity')); ?></span>
    <span class="utility-bar__contact">
      <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('imaani_phone', '+233 595 959595'))); ?>"><?php echo esc_html(get_theme_mod('imaani_phone', '+233 595 959595')); ?></a>
      <span class="utility-bar__sep" aria-hidden="true">·</span>
      <a href="mailto:<?php echo esc_attr(get_theme_mod('imaani_email', 'info@imaanihomes.com')); ?>"><?php echo esc_html(get_theme_mod('imaani_email', 'info@imaanihomes.com')); ?></a>
    </span>
  </div>
</div>

<header class="site-header" id="site-header">
  <div class="container site-header__row">
    <div class="site-brand">
      <?php if (has_custom_logo()) : the_custom_logo(); else : ?>
        <a class="site-brand__text" href="<?php echo esc_url(home_url('/')); ?>">
          <span class="site-brand__name">Imaani Homes</span>
        </a>
      <?php endif; ?>
    </div>

    <nav class="site-nav" aria-label="Primary" data-nav>
      <?php
      wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'site-nav__list',
          'fallback_cb'    => function () {
              echo '<ul class="site-nav__list">';
              foreach ([
                  ['Home', home_url('/')],
                  ['About', home_url('/about/')],
                  ['Projects', home_url('/projects/')],
                  ['Investors', home_url('/investors/')],
                  ['Blog', home_url('/blog/')],
                  ['FAQ', home_url('/faq/')],
                  ['Contact', home_url('/contact/')],
              ] as [$label, $url]) {
                  printf('<li><a href="%s">%s</a></li>', esc_url($url), esc_html($label));
              }
              echo '</ul>';
          },
      ]);
      ?>
    </nav>

    <a class="btn btn--primary site-header__cta" href="<?php echo esc_url(home_url('/contact/')); ?>">Get In Touch</a>

    <button class="nav-toggle" data-nav-toggle aria-expanded="false" aria-controls="site-header" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main id="main" class="site-main">
