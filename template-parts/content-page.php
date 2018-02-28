<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cn12_portfolio_timeline
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h1 id="page-title">', '</h1>' ); ?>

	<?php cn12_portfolio_timeline_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cn12_portfolio_timeline' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</div><!-- #post-<?php the_ID(); ?> -->
