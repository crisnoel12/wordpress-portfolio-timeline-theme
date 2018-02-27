<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package cn12_portfolio_timeline
 */

get_header(); ?>

	<?= get_template_part('template-parts/main-content-top'); ?>

		<?php
			if ( have_posts() ) : ?>
				<h1 id="page-title" class="screen-reader-text"><?php 
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'cn12_portfolio_timeline' ), '<span>' . get_search_query() . '</span>' );
				?></h1>

				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content');

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

			endif; ?>

	<?= get_template_part('template-parts/main-content-bottom'); ?>

