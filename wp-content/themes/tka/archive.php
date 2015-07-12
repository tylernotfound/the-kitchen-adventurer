<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tka
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<div class="cards js-msnry">
      <div class="gutter-sizer"></div>
      <div class="grid-sizer"></div>
  		<?php while ( have_posts() ) : the_post(); ?>

  			<?php

  				/*
  				 * Include the Post-Format-specific template for the content.
  				 * If you want to override this in a child theme, then include a file
  				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
  				 */
  				get_template_part( 'template-parts/content', get_post_format() );
  			?>

  		<?php endwhile; ?>
    </div>
		<?php the_posts_navigation(); ?>

	<?php else : ?>
    <div class="cards">
  		<?php get_template_part( 'template-parts/content', 'none' ); ?>
    </div>
	<?php endif; ?>

<?php get_footer(); ?>
