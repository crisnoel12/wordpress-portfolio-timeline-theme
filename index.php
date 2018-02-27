<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cn12_portfolio_timeline
 */

get_header(); ?>

	<?= get_template_part('template-parts/main-content-top'); ?>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<h1 id="page-title" class="screen-reader-text"><?php single_post_title(); ?></h1>

			<?php
			endif;

			echo '<h1 id="page-title">Posts</h1>';
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	<?= get_template_part('template-parts/main-content-bottom'); ?>
