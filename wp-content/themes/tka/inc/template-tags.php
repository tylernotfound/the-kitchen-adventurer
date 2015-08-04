<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package tka
 */

if ( ! function_exists( 'tka_the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function tka_the_posts_navigation() {
  // Don't print empty markup if there's only one page.
  if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
    return;
  }
  ?>
   <div class="more-posts">
      <?php if ( get_next_posts_link() ) : ?>
        <?php next_posts_link( esc_html__( 'Older', 'tka' ) ); ?>
      <?php endif; ?>

      <?php if ( get_previous_posts_link() ) : ?>
        <?php previous_posts_link( esc_html__( 'Newer', 'tka' ) ); ?>
      <?php endif; ?>
    </div>
  <?php
}
endif;

if ( ! function_exists( 'tka_the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function tka_the_post_navigation() {
  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );
  $is_single = !$next || !$previous;

  if ( ! $next && ! $previous ) {
    return;
  }
  ?>

  <nav class="post-nav <?php if ($is_single): ?>is-single<?php endif; ?>">

    <?php if ($previous): ?>
      <div class="post-nav__item post-nav__previous">
        <a data-pjax href="<?php echo get_permalink( $previous->ID ); ?>" class="block-link"></a>
        <img class="post-nav__photo" src="<?php echo get_field('thumbnail', $previous->ID); ?>" alt="">
        <div class="vcenter">
          <div class="vcenter__inner">
            <p class="zeta">Previous Recipe</p>
            <h6 class="alpha"><a data-pjax class="colorize-text" href="<?php echo get_permalink( $previous->ID ); ?>"><?php echo get_the_title( $previous->ID ); ?></a></h6>
          </div>
        </div>
        <!-- <p class="zeta">You're at the start!</p> -->
      </div>
    <?php endif; ?>

    <?php if ($next): ?>
      <div class="post-nav__item post-nav__next">
        <a data-pjax href="<?php echo get_permalink( $next->ID ); ?>" class="block-link"></a>
        <img class="post-nav__photo" src="<?php echo get_field('thumbnail', $next->ID); ?>" alt="">
        <div class="vcenter">
          <div class="vcenter__inner">
            <p class="zeta">Next Recipe</p>
            <h6 class="alpha"><a data-pjax class="colorize-text" href="<?php echo get_permalink( $next->ID ); ?>"><?php echo get_the_title( $next->ID ); ?></a></h6>
          </div>
        </div>
        <!-- <p class="zeta">You're at the latest!</p> -->
      </div>
    <?php endif; ?>

  </nav>

  <?php
}
endif;

if ( ! function_exists( 'tka_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tka_posted_on() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );

  $posted_on = sprintf(
    esc_html_x( 'Posted on %s', 'post date', 'tka' ),
    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  );

  $byline = sprintf(
    esc_html_x( 'by %s', 'post author', 'tka' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );

  // Hide category and tag text for pages.
  // if ( 'post' == get_post_type() ) {
  //   /* translators: used between list items, there is a space after the comma */
  //   $categories_list = get_the_category_list( esc_html__( ', ', 'tka' ) );
  //   if ( $categories_list && tka_categorized_blog() ) {
  //     printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'tka' ) . '</span>', $categories_list ); // WPCS: XSS OK.
  //   }
  // }

  echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'tka_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function tka_entry_footer() {
  // Hide category and tag text for pages.
  if ( 'post' == get_post_type() ) {
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( esc_html__( ', ', 'tka' ) );
    if ( $categories_list && tka_categorized_blog() ) {
      printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'tka' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }

    /* translators: used between list items, there is a space after the comma */
    $tags_list = get_the_tag_list( '', esc_html__( ', ', 'tka' ) );
    if ( $tags_list ) {
      printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'tka' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }
  }

  if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    echo '<span class="comments-link">';
    comments_popup_link( esc_html__( 'Leave a comment', 'tka' ), esc_html__( '1 Comment', 'tka' ), esc_html__( '% Comments', 'tka' ) );
    echo '</span>';
  }

  edit_post_link( esc_html__( 'Edit', 'tka' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
  if ( is_category() ) {
    $title = sprintf( esc_html__( 'Category: %s', 'tka' ), single_cat_title( '', false ) );
  } elseif ( is_tag() ) {
    $title = sprintf( esc_html__( 'Tag: %s', 'tka' ), single_tag_title( '', false ) );
  } elseif ( is_author() ) {
    $title = sprintf( esc_html__( 'Author: %s', 'tka' ), '<span class="vcard">' . get_the_author() . '</span>' );
  } elseif ( is_year() ) {
    $title = sprintf( esc_html__( 'Year: %s', 'tka' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'tka' ) ) );
  } elseif ( is_month() ) {
    $title = sprintf( esc_html__( 'Month: %s', 'tka' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'tka' ) ) );
  } elseif ( is_day() ) {
    $title = sprintf( esc_html__( 'Day: %s', 'tka' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'tka' ) ) );
  } elseif ( is_tax( 'post_format' ) ) {
    if ( is_tax( 'post_format', 'post-format-aside' ) ) {
      $title = esc_html_x( 'Asides', 'post format archive title', 'tka' );
    } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
      $title = esc_html_x( 'Galleries', 'post format archive title', 'tka' );
    } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
      $title = esc_html_x( 'Images', 'post format archive title', 'tka' );
    } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
      $title = esc_html_x( 'Videos', 'post format archive title', 'tka' );
    } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
      $title = esc_html_x( 'Quotes', 'post format archive title', 'tka' );
    } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
      $title = esc_html_x( 'Links', 'post format archive title', 'tka' );
    } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
      $title = esc_html_x( 'Statuses', 'post format archive title', 'tka' );
    } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
      $title = esc_html_x( 'Audio', 'post format archive title', 'tka' );
    } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
      $title = esc_html_x( 'Chats', 'post format archive title', 'tka' );
    }
  } elseif ( is_post_type_archive() ) {
    $title = sprintf( esc_html__( 'Archives: %s', 'tka' ), post_type_archive_title( '', false ) );
  } elseif ( is_tax() ) {
    $tax = get_taxonomy( get_queried_object()->taxonomy );
    /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
    $title = sprintf( esc_html__( '%1$s: %2$s', 'tka' ), $tax->labels->singular_name, single_term_title( '', false ) );
  } else {
    $title = esc_html__( 'Archives', 'tka' );
  }

  /**
   * Filter the archive title.
   *
   * @param string $title Archive title to be displayed.
   */
  $title = apply_filters( 'get_the_archive_title', $title );

  if ( ! empty( $title ) ) {
    echo $before . $title . $after;  // WPCS: XSS OK.
  }
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
  $description = apply_filters( 'get_the_archive_description', term_description() );

  if ( ! empty( $description ) ) {
    /**
     * Filter the archive description.
     *
     * @see term_description()
     *
     * @param string $description Archive description to be displayed.
     */
    echo $before . $description . $after;  // WPCS: XSS OK.
  }
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function tka_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'tka_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      'hide_empty' => 1,

      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'tka_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so tka_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so tka_categorized_blog should return false.
    return false;
  }
}

/**
 * Flush out the transients used in tka_categorized_blog.
 */
function tka_category_transient_flusher() {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient( 'tka_categories' );
}
add_action( 'edit_category', 'tka_category_transient_flusher' );
add_action( 'save_post',     'tka_category_transient_flusher' );
