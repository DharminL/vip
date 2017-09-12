<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<?php if ( has_post_thumbnail() ) {
		$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
	} else {
		$image_url = get_template_directory_uri().'/assets/images/default-bg.jpg';
	}
?>

<!-- start page-title-wrapper -->
<div class="page-title" style="background: url(<?php echo $image_url; ?>) center center/cover no-repeat local;">
    <div class="container">
        <?php the_title( '<h1>', '</h1>' ); ?>
        <?php vipindustrial_edit_link( get_the_ID() ); ?>
    </div>
</div>
<!-- end page-title-wrapper -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="service-single-content-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-10 col-lg-offset-1 content">
                <?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'vipindustrial' ),
						'after'  => '</div>',
					) );
				?>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
</article><!-- #post-## -->
