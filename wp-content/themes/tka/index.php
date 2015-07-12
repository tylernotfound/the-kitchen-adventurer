<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tka
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
  <div class="cards js-msnry">
    <div class="gutter-sizer"></div>
    <div class="grid-sizer"></div>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php
        get_template_part( 'template-parts/content', get_post_format() );
      ?>
    <?php endwhile; ?>
  </div>
  <?php tka_the_posts_navigation(); ?>
<?php else : ?>
  <div class="cards">
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
  </div>
<?php endif; ?>

<?php get_footer(); ?>
