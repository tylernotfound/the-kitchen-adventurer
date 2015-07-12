<?php
/**
 * Template part for displaying single posts.
 *
 * @package tka
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
      <p class="delta meta">
        <span class="meta__item"><?php the_category( ', '); ?></span>
        <span class="meta__item"><?php the_date(); ?></span>
        <span class="meta__item"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></span>
      </p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tka' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

