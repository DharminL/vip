<?php 

get_header(); 
$image_url = get_template_directory_uri().'/assets/images/default-bg.jpg';
?>

<!-- start page-title-wrapper -->
    <div class="page-title" style="background: url(<?php echo $image_url; ?>) center center/cover no-repeat local;">
        <div class="container">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </div>
    </div>
    <!-- end page-title-wrapper -->
<section class="clients-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12 client-list">
                <div class="client">
                    <?php 
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                //get post thumbnail url
                                $post_thumbnail_id = get_post_thumbnail_id();
                                $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
                            ?>
                            <div class="client-pic">
                                <img id="product-img" src="<?php if(!empty($post_thumbnail_url)){ echo $post_thumbnail_url; } else {  echo get_template_directory_uri()."/images/fallback.png"; } ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <div class="client-details">
                                <!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>