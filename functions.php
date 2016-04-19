<?php
/**
 * functions.php
 *
 * The theme's functions and definitions.
 */

/**
 * -----------------------------------------------------------------------------
 * 1.0 - Define constants.
 * -----------------------------------------------------------------------------
 */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/js' );
define( 'FRAMEWORK', get_template_directory() .'/framework' );
define( 'TEXTDOMAIN', 'mango' );

/**
 * -----------------------------------------------------------------------------
 * 2.0 - Load the framework.
 * -----------------------------------------------------------------------------
 */
require_once( FRAMEWORK . '/init.php' );

/**
 * -----------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme'design.
 * -----------------------------------------------------------------------------
 */
if ( !isset( $content_width ) ) {
  $content_width = 800;
}

/**
 * -----------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * -----------------------------------------------------------------------------
 */
if ( !function_exists( 'mango_setup' ) ) {
  function mango_setup() {
    /**
     * Make the theme available for translation.
     */
    $lang_dir = THEMEROOT . '/languages';
    load_theme_textdomain( TEXTDOMAIN, $lang_dir );

    /**
     * Add support for post format.
     */
    add_theme_support( 'post-formats', array(
      'gallery',
      'link',
      'image',
      'quote',
      'video',
      'audio'
    ) );

    /**
     * Add support for automatic feed links.
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Add support for post thumbnails.
     */
    add_theme_support( 'post-thumbnails' );

    /**
     * Register nav menus.
     */
    register_nav_menus(
      array(
        'main-menu' => __( 'Main Menu', TEXTDOMAIN )
      )
    );
  }
  add_action( 'after_theme_setup', 'alpha_setup' );
}

/**
 * -----------------------------------------------------------------------------
 * 5.0 - Display meta information for a specific post.
 * -----------------------------------------------------------------------------
 */
 if ( !function_exists( 'mango_post_meta' ) ) {
   function mango_post_meta() {
    echo '<ul class="list-inline entry-meta">';
    if ( get_post_type() === 'post' ) {
      // If the post is sticky, mark it.
      if ( is_sticky() ) {
        echo '<li class="meta-featured_post"><i class="fa fa-thumb-tack"></i>' . __( 'Sticky', TEXTDOMAIN ) . '</li>';
      }

      // Get the post author.
      printf(
        '<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );

      // Get the date.
      echo '<li class="meta-date">' . get_the_date() . '</li>';

      // The categories.
      $category_list = get_the_category_list( ', ' );
      if ( $category_list ) {
        echo '<li class="meta-categories">' . $category_list . '</li>';
      }

      // The tags.
      $tag_list = get_the_tag_list( '', ', ' );
      if ( $tag_list ) {
        echo '<li class="meta-tags">' . $tag_list . '</li>';
      }

      // Comment link.
      if ( comments_open() ) {
        echo '<li>';
        echo '<span>';
        comments_popup_link(
          __( 'Leave a comment', TEXTDOMAIN ),
          __( 'One comment so far', TEXTDOMAIN ),
          __( 'View all % comments', TEXTDOMAIN )
        );
        echo '</span>';
        echo '</li>';
      }

      // Edit link.
      if ( is_user_logged_in() ) {
        echo '<li>';
        edit_post_link(
          __( 'Edit', TEXTDOMAIN ),
          '<span class="meta-edit">',
          '</span>'
        );
        echo '</li>';
      }
    }
    echo '</ul>';
   }
 }
