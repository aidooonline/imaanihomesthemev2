<?php
defined('ABSPATH') || exit;
get_header();
while (have_posts()) : the_post();
?>
<section class="page-head">
  <div class="container container--narrow"><h1 class="page-head__title"><?php the_title(); ?></h1></div>
</section>
<section class="section">
  <div class="container container--narrow entry-content flow"><?php the_content(); ?></div>
</section>
<?php endwhile; get_footer(); ?>
