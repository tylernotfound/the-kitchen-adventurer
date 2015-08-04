<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package tka
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'tka' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p class="align--center"><a data-pjax class="colorize-text" href="http://thekitchenadventurer.com">🚀 Quick, travel safely back to the recipes page! 🚀</a></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
