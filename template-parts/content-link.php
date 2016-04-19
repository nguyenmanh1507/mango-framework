<?php
/**
 * content-link.php
 *
 * The default template for displaying post with the Link post format.
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <div class="entry-content">
    <?php
    the_content( __( 'Continue reading &rarr;', TEXTDOMAIN ) );
    wp_link_pages();
    ?>
  </div>

  <footer class="entry-footer">
    <div class="entry-meta">
      <?php mango_post_meta(); ?>
    </div>
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
