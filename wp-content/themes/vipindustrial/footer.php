<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->
			<footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-3 col-xs-6">
                    <div class="widget about-widget">
                        <?php             
                            dynamic_sidebar( 'first-footer-widget-area' );   
                        ?>
                    </div>
                    </div>
                    <div class="col col-lg-2 col-md-3 col-xs-6">
                        <div class="widget site-map-widget">
                            <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-3 col-xs-6">
                    <div class="widget about-widget">
                    <?php dynamic_sidebar( 'third-footer-widget-area' );?>
                    </div>
                    </div>
                    <div class="col col-lg-3 col-md-3 col-xs-6">
						
                        <div class="widget social-media-widget">
                         <?php dynamic_sidebar( 'fourth-footer-widget-area' );?>
                           
							<?php vipindustrial_show_social_icons(); ?>
                           
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </footer>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'vipindustrial' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . vipindustrial_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				//get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- end of page-wrapper -->
<?php wp_footer(); ?>

</body>
</html>
