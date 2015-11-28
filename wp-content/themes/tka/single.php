<?php
/**
 * The template for displaying all single posts.
 *
 * @package tka
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <div class="container">
  	<?php get_template_part( 'template-parts/content', 'single' ); ?>

    <?php
      $post_url = get_permalink();
      $post_title = get_the_title();
    ?>
    <div class="post-share">
      <nav class="nav">
        <div class="post-share__label post-share__item">
          Tell all your friends!
        </div>
        <div class="post-share__item">
          <a href="//www.pinterest.com/pin/create/button/?url=<?php print urlencode($post_url); ?>&media=<?php print urlencode(the_field('share_image')); ?>&description=<?php print urlencode($post_title); ?>" data-pin-do="buttonPin" data-pin-config="beside" data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
        </div>
        <div class="post-share__item">
          <a href="//yummly.com" class="YUMMLY-YUM-BUTTON">Yum</a>
        </div>
      </nav>
    </div>

  	<?php
  		// If comments are open or we have at least one comment, load up the comment template.
  		if ( comments_open() || get_comments_number() ) :
  			comments_template();
  		endif;
  	?>

    <?php tka_the_post_navigation(); ?>
  </div>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
