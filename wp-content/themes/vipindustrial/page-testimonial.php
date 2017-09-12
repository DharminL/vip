<?php
/**
 * Template Name: Testimonials
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();?>

<!-- start of testimonial-section --> 
        <section class="testimonial-section section-padding">
            <div class="container">
                <div class="row section-title-s6">
                    <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <h2><?php echo cfs()->get( 'testimonial_main_title',16 ); ?></h2>
                        <p><?php echo cfs()->get( 'testimonial_main_content',16 ); ?></p>
                    </div>
                </div> <!-- end section-title -->
        
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="testimonials-slider dots-style-1">
                            <?php 
								$fields='';
								$field='';
								$fields = CFS()->get( 'testimonial_box',16 );
								foreach ( $fields as $field ) {
							?>
                            <div class="grid">
                                <div class="client-quote">
                                    <p><?php echo $field['testimonial_content']; ?></p>
                                </div>
                                <div class="client-info">
                                    <div class="client-pic">
                                        <img src="<?php echo $field['testimonial_image']; ?>" alt>
                                    </div>
                                    <div class="client-details">
                                        <h4><?php echo $field['testimonial_title']; ?></h4>
                                        <span><?php echo $field['testimonial_second_title']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
<!-- end of testimonial-section -->

<?php get_footer();
