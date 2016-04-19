<?php
/**
 * content-quote.php
 *
 * The default template for displaying post with the Quote post format.
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
  </footer>
</article>
