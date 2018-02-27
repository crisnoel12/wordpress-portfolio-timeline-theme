<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cn12_portfolio_timeline
 */

?>

<div id="post-<?php the_ID(); ?>" <?php is_singular() ? null : post_class(); ?>>
	<?php
	if ( is_singular() ) :
		the_title( '<h1 id="page-title" class="title-singular-page">', '</h1>' );
		the_post_thumbnail();
		the_content();
	else : ?>
		<i class="vertical-line"></i>
		<h2 class="post-date"><?= the_date(); ?></h2>
		<div class="post-panel">
			<h3 class="post-title"><?= the_title(); ?></h3>
			<p class="post-excerpt"><?= the_excerpt(); ?></p>
			<a href="<?= esc_url( get_permalink() ) ?>">Read More</a>
		</div>
	<?php
	endif;
 	?>

	<?php 
		if ( is_singular() ) :
	?>
		<footer class="entry-footer">
			<?php cn12_portfolio_timeline_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php
		endif;
	?>
</div><!-- #post-<?php the_ID(); ?> -->
