<!-- Navbar -->
<nav class="container-fluid navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="<?= get_site_url() ?>">
        <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

            if ( has_custom_logo() ) {
                echo '<img src="'. esc_url( $logo[0] ) .'">' . get_bloginfo( 'name' );
            } elseif(is_user_logged_in()) {
                echo '<span class="font-italic text-warning m-1">* [Logo 32x20]</span>' . get_bloginfo( 'name' );
            } else {
                echo get_bloginfo( 'name' );
            }
        ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <?php
            if ( has_nav_menu( "navbar-menu" ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'navbar-menu',
                    'menu_class'     => 'navbar-nav ml-auto',
                    'container'      => 'ul'
                ));
            } elseif(is_user_logged_in()) {
                echo '<span class="text-warning font-italic ml-auto">* `Navbar Menu` isn\'t set, enter customizer to set it.</span>';
            }
        ?>
    </div>
</nav>