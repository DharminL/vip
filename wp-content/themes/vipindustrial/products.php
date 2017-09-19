<?php
/**
 Template Name: Products
 */
 
get_header();

$args=array(
    'hide_empty'        => 0,
    'parent'        => 0,
    'taxonomy'      => 'product_categories');

$categories=get_categories($args);

if ( has_post_thumbnail() ) {
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
<section class="latest-projects section-padding products-listing">
        <div class="container">
        	<div class="portfolio gallery-grid">
                <div class="row">
                    <div id="lightBox" class="gallery-wrapper">
                        <ul class="portfolio-items courses list-unstyled" id="grid">
						<?php foreach($categories as $category) {
						    if (function_exists('z_taxonomy_image_url')) {
						        	$thumb_url = z_taxonomy_image_url($category->term_id);
						        }
						        $product_cat_url = get_term_link( $category->slug, 'product_categories' );
							?>
								<li class="col-md-3 col-sm-6" data-groups='["simpsons"]'>
						            <figure class="portfolio-item gallery-caption grid">
						                <div class="inner">
						            		<img src="<?php if($thumb_url){ echo $thumb_url; } else{ echo get_template_directory_uri()."/assets/images/product-image.jpg"; } ?>" alt="<?php echo $category->name; ?>" />
						        		</div>
						        		<div class="project-title">
						                    <h3><?php echo $category->name; ?></h3>
						                    <hr/>
						                    <div class="pro-btn"><a href="<?php echo $product_cat_url ; ?>">Products</a></div>
						                </div>
						            </figure>
						        </li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>