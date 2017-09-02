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
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i>  mail@solid-industry.co.uk</li>
                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>  +012 (3456) 88 974</li>
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
                    <ul class="nav navbar-nav">
                        <li class="menu-item-has-children current-menu-ancestor current-menu-parent">
                            <a href="#">Home</a>
                            <ul class="sub-menu">
                                <li class="current-menu-item"><a href="index.html">Home style 1</a></li>
                                <li><a href="index-2.html">Home style 2</a></li>
                                <li><a href="index-3.html">Home style 3</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">Projects</a>
                            <ul class="sub-menu">
                                <li><a href="projects-s1.html">Projects style 1</a></li>
                                <li><a href="projects-s2.html">Projects style 2</a></li>
                                <li><a href="projects-s3.html">Projects style 3</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="service-single.html">Service single</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="time-line.html">Time line</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="clients.html">Clients</a></li>
                                <li><a href="careers.html">Careers</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#Level3">Testimonials</a>
                                    <ul class="sub-menu">
                                        <li><a href="testimonials-s1.html">Testimonials style 1</a></li>
                                        <li><a href="testimonials-s2.html">Testimonials style 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                <li><a href="blog-single.html">Blog single</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div><!-- end of nav-collapse -->

                <div class="social-links-holder">
                    <ul class="social-links">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div><!-- end of container -->
        </nav>
    </header>
    <!-- end of header -->

	<div class="site-content-contain">
		<div id="content" class="site-content">
