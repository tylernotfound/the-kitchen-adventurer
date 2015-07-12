<?php
/**
 * Template part for displaying posts.
 *
 * @package tka
 */

?>


<article <?php post_class('card'); ?>>
  <div class="card__photo">
    <a class="card__photo-link" data-pjax href="<?php print esc_url( get_permalink() ); ?>"><img src="<?php the_field('thumbnail'); ?>" alt="<?php the_title(); ?>"></a>
  </div>
  <div class="card__body">
    <?php the_title( sprintf( '<h2 class="card__title"><a data-pjax href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <p class="delta meta meta--small">
      <span class="meta__item"><?php the_date(); ?></span>
      <span class="meta__item"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></span>
    </p>
    <p><?php the_field('abstract'); ?></p>
    <p class="card__more"><a data-pjax href="<?php print esc_url( get_permalink() ); ?>">View Recipe</a></p>
  </div>
</article>
