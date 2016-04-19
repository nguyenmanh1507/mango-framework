<?php
/**
 * content-none.php
 * The default template for displaying post with the Gallery post format.
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <header class="entry-header">

  <?php

  // If single page, display the title
  // Else, we display the title in a link
  if ( is_single() ) : ?>
    <h1><?php the_title(); ?></h1>
  <?php else: ?>
    <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  <?php endif; ?>

    <div class="entry-meta">
      <?php
      // Display the meta information
      mango_post_meta();
      ?>
    </div>
  </header>

  <div class="entry-content">
    <?php
    the_content( __( 'Continue reading &rarr;', TEXTDOMAIN ) );
    wp_link_pages();
    ?>
  </div>

  <footer class="entry-footer">
    <?php
    // If we have a single page and the author bio exists,
    // display it
    if ( is_single() && get_the_author_meta( 'description' ) ) {
      echo '<h2>' . __( 'Written by', TEXTDOMAIN ) . get_the_author() . '</h2>';
      echo '<p>' . get_the_author_meta( 'description' ) . '</p>';
    }
    ?>
  </footer>
</article>
