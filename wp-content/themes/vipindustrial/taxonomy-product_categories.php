<?php
get_header();

$slug = get_query_var( 'term' );
$term = get_term_by( 'slug', $slug , 'product_categories' );
$term_id = $term->term_id;

$args=array(
        'hide_empty'        => 0,
        'parent'        => $term_id,
        'taxonomy'      => 'product_categories');

$categories=get_categories($args);
$image_url = get_template_directory_uri().'/assets/images/default-bg.jpg';

if(!$categories) {
    //get the product category name
	?>
	<!-- start page-title-wrapper -->
	<div class="page-title" style="background: url(<?php echo $image_url; ?>) center center/cover no-repeat local;">
	    <div class="container">
	        <?php echo "<h1>".$term->name."</h1>"; ?>
	    </div>
	</div>
	<!-- end page-title-wrapper -->
	<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
	    'posts_per_page' => 12, //remember posts per page should be less or more that what's set in general settings
	    'paged' => $paged,
	    'order' => 'desc',
	    'tax_query' => array(
            array(
	            'taxonomy' => 'product_categories',
	            'field' => 'slug',
	            'terms' => $slug
            )
        )
    );

    $products_query = new WP_Query($args);
    ?>
    <section class="latest-projects section-padding products-listing">
        <div class="container">
        	<div class="portfolio gallery-grid">
                <div class="row">
                    <div id="lightBox" class="gallery-wrapper">
					    <?php
					    if ($products_query->have_posts()) :
					    	echo '<ul class="portfolio-items courses list-unstyled" id="grid">';
						    while($products_query->have_posts()) : $products_query->the_post();
						        $post_thumbnail_id = get_post_thumbnail_id();
						        $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
							?>
								<li class="col-md-3 col-sm-6" data-groups='["simpsons"]'>
						            <figure class="portfolio-item gallery-caption grid">
						                <div class="inner">
								            <img src="<?php if($post_thumbnail_url) { echo $post_thumbnail_url; } else {  echo get_template_directory_uri()."/assets/images/product-image.jpg"; } ?>" alt="<?php the_title(); ?>" />
						                </div>
								        <div class="project-title">
		                    				<h3><?php the_title(); ?></h3>
		                    				<hr>
		                    				<div class="pro-desc"><?php echo substr(strip_tags($post->post_content), 0, 50);?>...</div>
		                    				<div class="pro-btn"><a href="<?php the_permalink(); ?>">Details</a></div>
								        </div>
								    </figure>
								</li>
						    <?php
						    endwhile;
						    echo '</ul>';
					    else: ?>
					    	<h3 style="text-align: center;">Sorry no products were found.</h3>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
						<?php
							$temp_query	 = $wp_query;
							$wp_query	 = NULL;
							$wp_query	 = $products_query;
						?>
						<div class="pagination">
							<?php wpbeginner_numeric_posts_nav(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
} else {
    //output current category name
    ?>
    <!-- start page-title-wrapper -->
	<div class="page-title" style="background: url(<?php echo $image_url; ?>) center center/cover no-repeat local;">
	    <div class="container">
	        <?php echo "<h1>".$term->name."</h1>"; ?>
	    </div>
	</div>
	<!-- end page-title-wrapper -->
	<section class="latest-projects section-padding products-listing">
        <div class="container">
        	<div class="portfolio gallery-grid">
                <div class="row">
                    <div id="lightBox" class="gallery-wrapper">
                        <ul class="portfolio-items courses list-unstyled" id="grid">
    <?php
    foreach($categories as $category) {
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
<?php } ?>
<?php get_footer(); ?>