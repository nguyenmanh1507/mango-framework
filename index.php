<?php
/**
* index.php
* The main template file.
*/
?>
<main class="main-content" role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', get_post_format() ); ?>
  <?php endwhile; ?>

  <?php else: ?>
    <?php get_template_part( 'content', 'none' ); ?>
  <?php endif; ?>
</main>
<!-- /.main-content -->
