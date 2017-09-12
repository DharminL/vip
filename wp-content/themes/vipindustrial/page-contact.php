<?php
/**
 * Template Name: Contact Page
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

get_header(); 
$post_thumbnail_id = get_post_thumbnail_id( 18 );
$img=wp_get_attachment_image_url( $post_thumbnail_id,'full' );
?>
<!-- start page-title-wrapper -->
        <div class="page-title" style="background:url(<?php echo $img; ?>) no-repeat local center center / cover;" >
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <!-- end page-title-wrapper -->
<!-- start of contact-section --> 
        <section class="contact-section">
            <div class="contact-map" id="map"></div>
            <div class="container">
                <div class="row">
                    <div class="col col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6">
                        <div class="contact-form">
                            <h3>Contact Form</h3>
                            <ul>
                                <li><i class="fa fa-home"></i><?php echo cfs()->get( 'contact_address' ); ?></li>
                                <li><i class="fa fa-phone"></i><?php echo cfs()->get( 'contact_number' ); ?></li>
                            </ul>
                            <h4>Send Email</h4>
                            <div class="form contact-validation-active">
							<?php echo do_shortcode('[contact-form-7 id="155" title="Contact form 1"]'); ?></div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
<!-- end of contact-section -->
<?php get_footer();
