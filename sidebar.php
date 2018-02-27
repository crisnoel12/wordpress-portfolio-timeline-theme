<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cn12_portfolio_timeline
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-xs-12 col-lg-3">
	<div id="sidebar-widgets">
		<span id="sidebar-widgets-top-border"></span>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</div>
