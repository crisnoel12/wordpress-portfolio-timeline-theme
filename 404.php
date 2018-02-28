<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cn12_portfolio_timeline
 */

get_header(); ?>

	<?= get_template_part('template-parts/main-content-top'); ?>
		<h1 id="page-title" class="title-singular-page"><?php esc_html_e( '404 Page Not Found', 'cn12_portfolio_timeline' ); ?></h1>
			<p><?php esc_html_e( 'The page you are looking for does not exist. Maybe try a search?', 'cn12_portfolio_timeline' ); ?></p>

			<?php
				get_search_form();
			?>

	<?= get_template_part('template-parts/main-content-bottom'); ?>
