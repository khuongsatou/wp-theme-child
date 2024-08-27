<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <h1><?php bloginfo( 'name' ); ?></h1>
                </a>
                <p><?php bloginfo( 'description' ); ?></p>
                <?php
            }
            ?>
        </div>
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav>
    </header>
