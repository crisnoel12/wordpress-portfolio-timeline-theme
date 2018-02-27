<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cn12_portfolio_timeline
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Main Container -->
    <div id="main-container" class="container-fluid">
        <div class="row no-gutters">

		<div class="col-xs-12 col-md-4 col-lg-2">
			<div id="sidebar-about" class="text-center">
				<!-- About Picture -->				
                <?php if(is_user_logged_in() && get_theme_mod('cn12_portfolio_timeline-about-picture') == "") : ?>
                    <p class="font-italic text-warning">
                        * Your [about picture] is set to a generic avatar, enter customize mode to set your picture.
					</p>
				<?php else : ?>
					<img class="usr-img rounded-circle" src="<?php echo get_theme_mod('cn12_portfolio_timeline-about-picture', get_template_directory_uri() . '/assets/img/avatar.png'); ?>" />
                <?php endif; ?>

				<!-- About Name -->				
                <?php if(is_user_logged_in() && get_theme_mod('cn12_portfolio_timeline-about-name') == "") : ?>
                    <p class="font-italic text-warning about-name">
                        * Your [about name] is set to a generic name, enter customize mode to set your name.
					</p>
				<?php elseif(get_theme_mod('cn12_portfolio_timeline-about-name') == "") : ?>
					<h3 class="about-name">Your Name</h3>
				<?php else : ?>
					<?= '<h3 class="about-name">' . get_theme_mod('cn12_portfolio_timeline-about-name') . '</h3>' ?>
				<?php endif; ?>

				<!-- About Tagline -->
				<?php 
					if ( get_bloginfo( 'description' ) ) {
						echo '<span class="about-tagline">' . get_bloginfo( 'description' ) . '</span>'; 
					} elseif(is_user_logged_in()) {
						echo '<span class="font-italic text-warning about-tagline">* Your [about tagline] isn\'t set, enter customize mode to set your description.</span>';
					}
				?>

				<!-- About Description -->
				<?php if(get_theme_mod('cn12_portfolio_timeline-about-description') != ""): ?>
					<h5 class="about-text">About</h5>
                    <p class="about-description"><?php echo get_theme_mod('cn12_portfolio_timeline-about-description'); ?></p>
                <?php elseif(is_user_logged_in()) : ?>
					<br/>
					<br/>
                    <p class="font-italic text-warning about-description">
                        * Your [about description] isn't set, enter customize mode to set your description.
                    </p>
                <?php endif; ?>
				<hr/>
			</div>
			<div class="sidebar-filler"></div>
		</div>
	  
