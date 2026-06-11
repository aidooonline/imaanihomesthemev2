<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="section">
  <div class="container blog-list">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article <?php post_class('post-card'); ?>>
        <div class="post-card__body">
          <h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</section>
<?php get_footer(); ?>
