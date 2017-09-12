<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 
$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
    $featured_image = $img[0];
?>

<!-- start page-title-wrapper -->
        <div class="page-title" style="background:url(<?php echo $featured_image; ?>) no-repeat local center center / cover;">
            <div class="container">
                <h1>Blog</h1>
            </div>
        </div>
        <!-- end page-title-wrapper -->


        <!-- start blog-with-sidebar-section -->
        <section class="blog-with-sidebar-section section-padding">
            <div class="container">
                <div class="row blog-with-sidebar">
                    <div class="blog-content col col-lg-8 col-md-8">
                        <div class="row blog-s2-grids">
                            <?php
								while ( have_posts() ) : the_post();
							?>
                            <div class="col col-sm-6">
                                <div class="grid">
                                    <div class="entry-media">
                                        <?php the_post_thumbnail('full', array('class' => 'img img-responsive')); ?>
                                    </div>
                                    <div class="entry-details">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <span class="entry-date"><?php echo get_the_date('d M, Y'); ?></span>

                                        <div class="entry-footer">
                                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                                            <a href="<?php the_permalink(); ?>" class="comments"><i class="fa fa-comments" aria-hidden="true"></i> <?php wp_count_comments( post_id ); ?> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  endwhile; ?>
                        </div> <!-- end row -->

                        <div class="pagination">
   						<?php wpbeginner_numeric_posts_nav(); ?>                    
                        </div>                
                    </div> <!-- end blog-content -->

                    <div class="blog-sidebar col col-lg-3 col-lg-offset-1 col-md-4 col-sm-5">
                        <?php get_sidebar('sidebar-1'); ?>
                    </div>                    
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end blog-with-sidebar-section -->       


<?php get_footer();
