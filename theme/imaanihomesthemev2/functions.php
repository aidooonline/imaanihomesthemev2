<?php
/** Imaani Homes v2 — bootstrap */
defined('ABSPATH') || exit;

define('IMAANI_VERSION', '1.0.0');
define('IMAANI_DIR', get_template_directory());
define('IMAANI_URI', get_template_directory_uri());

require IMAANI_DIR . '/inc/setup.php';
require IMAANI_DIR . '/inc/assets.php';
require IMAANI_DIR . '/inc/customizer.php';
require IMAANI_DIR . '/inc/projects.php';
require IMAANI_DIR . '/inc/cpt-portfolio.php';
require IMAANI_DIR . '/inc/schema.php';
require IMAANI_DIR . '/inc/forms.php';
require IMAANI_DIR . '/inc/helpers.php';
