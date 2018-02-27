<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cn12_portfolio_timeline
 */

get_header(); ?>

	<?= get_template_part('template-parts/main-content-top'); ?>

		<?php
		if ( have_posts() ) : ?>

				<?php
					the_archive_title( '<h1 id="page-title">', '</h1>' );
					the_archive_description( '<div id="archive-description">', '</div>' );
				?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	<?= get_template_part('template-parts/main-content-bottom'); ?>
