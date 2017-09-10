<?php
/**
 * Template Name: Homepage
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

get_header(); ?>

<!-- start of services-serction-s1 --> 
        <section class="services-serction-s2 section-padding">
            <div class="container">
                <div class="row section-title-s6">
                    <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <h2><?php echo cfs()->get( 'service_main_title' ); ?></h2>
                        <?php echo cfs()->get( 'service_main_content' ); ?>
                    </div>
                </div> <!-- end section-title -->
        
                <div class="row services-s2-grids">
                    <?php 
					$fields='';
					$field='';
					$fields = CFS()->get( 'service_box' );
					foreach ( $fields as $field ) {
					?>
                    <div class="col col-lg-4 col-xs-6">
                        <div class="grid">
                            <div class="img-holder">
                                <img src="<?php echo $field['service_image']; ?>" alt class="img img-responsive">
                            </div>
                            <div class="details">
                                <h3><a href="#"><?php echo $field['service_title']; ?></a></h3>
                                <?php echo $field['service_content']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
<!-- end of services-serction-s1 -->

<!-- start of how-we-work --> 
        <section class="how-we-work section-padding" style="background: url(<?php echo cfs()->get( 'why_choose_vip_image' ); ?>) center center/cover no-repeat local;">
            <div class="container">
                <div class="row section-title-s6">
                    <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <h2><?php echo cfs()->get( 'why_choose_vip_title' ); ?></h2>
                        <?php echo cfs()->get( 'why_choose_vip_content' ); ?>
                    </div>
                </div> <!-- end section-title -->
        
                <div class="row content">
                    <?php 
					$fields='';
					$field='';
					$fields = CFS()->get( 'vip_box' );
					foreach ( $fields as $field ) {
					?>
                    <div class="col col-md-4">
                        <div class="grid">
                            <span class="icon">
                                <i class="<?php echo $field['vip_box_icon']; ?>"></i>
                            </span>
                            <h3><?php echo $field['vip_box_title']; ?></h3>
                            <p><?php echo $field['vip_box_content']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
<!-- end of how-we-work -->

<!-- start of testimonial-section --> 
        <section class="testimonial-section section-padding">
            <div class="container">
                <div class="row section-title-s6">
                    <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <h2><?php echo cfs()->get( 'testimonial_main_title' ); ?></h2>
                        <p><?php echo cfs()->get( 'testimonial_main_content' ); ?></p>
                    </div>
                </div> <!-- end section-title -->
        
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="testimonials-slider dots-style-1">
                            <?php 
								$fields='';
								$field='';
								$fields = CFS()->get( 'testimonial_box' );
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
