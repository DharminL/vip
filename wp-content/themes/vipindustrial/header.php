<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- start page-wrapper -->
<div class="page-wrapper">

	<!-- start preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- end preloader -->

    <!-- Start header -->
    <header class="site-header header-style-1">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col col-sm-6 contact-info">
                        <ul>
                            <li><?php vipindustrial_display_email(); ?></li>
                            <li><?php vipindustrial_display_phonenumber(); ?></li>
                        </ul>
                    </div>
                    <div class="col col-sm-6 language-login-wrapper">
                        <div class="language-login clearfix">
                            <div class="client-login">
                                <a href="#" id="client-login-btn"><i class="fa fa-key" aria-hidden="true"></i> Client Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end topbar -->

        <nav class="navigation navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="open-btn">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    	<?php the_custom_logo(); ?>
                </div>

                <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                    <button class="close-navbar"><i class="fa fa-close"></i></button>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'top',
                        'menu_class'     => 'nav navbar-nav',
                    ) ); ?>
                </div><!-- end of nav-collapse -->

                <div class="social-links-holder">
                    <?php vipindustrial_show_social_icons(); ?>
                </div>
            </div><!-- end of container -->
        </nav>
    </header>
    <!-- end of header -->

    <?php if(is_front_page()) :?>
        <!-- start of hero -->
        <section class="hero hero-slider-wrapper hero-slider-s1">
            <?php echo do_shortcode( '[custom_slickslider location="homepage-slider"]' ); ?>
        </section>
        <!-- end of hero slider -->
    <?php endif; ?>
