<?php
/**
 * content.php
 *
 * the default template for displaying content.
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <header class="entry-header">
  <?php
  // If the post has a thumbnail and it's not password protected
  // then display the thumbnail
  if ( has_post_thumbnail() && !post_password_required() ) :
  ?>
    <figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
  <?php endif;

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
    if ( is_search() ) {
      the_excerpt();
    } else {
      the_content( __( 'Continue reading &rarr;', TEXTDOMAIN ) );
      wp_link_pages();
    }
    ?>
  </div>

  <footer class="entry-footer">
    <?php
    // If we have a single page and the author bio exists,
    // display it
    if ( is_single() && get_the_author_meta( 'description' ) ) {
      echo '<h2>' . __( 'Written by', TEXTDOMAIN ) . the_author() . '</h2>';
    }
    ?>
  </footer>
</article>
