<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); the_post();?>

<!-- start page-title-wrapper -->
        <div class="page-title" style="background:url(<?php echo get_template_directory_uri().'/assets/images/default-bg.jpg' ?>) no-repeat local center center / cover;" >
            <div class="container">
                <h1>Blog Details</h1>
            </div>
        </div>
        <!-- end page-title-wrapper -->


        <!-- start blog-single-main-content -->
        <section class="blog-single-main-content section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-9 col-sm-12 blog-single-content">
                        <div class="post">
                            <div class="media">
                                <img src="images/blog-detail/img-1.jpg" alt class="img img-responsive">
                            </div>
                            <div class="post-title-meta">
                                <button  class="btn"><?php the_category(); ?></button>
                                <h2><?php the_title(); ?></h2>
                                <ul>
                                    <li><a href="#"><?php echo get_the_author();?></a></li>
                                    <li><?php the_date('d M, Y'); ?></li>
                                </ul>
                            </div>
                            <?php the_content(); ?>
                        </div> <!-- end post -->

                        <div class="tag-share">
                            <div>
                                <span>Tags: </span>
                                 <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                            </div>

                        </div>

                        <!--<div class="comments">
                            <div class="title">
                                <h3><span>2</span> comments</h3>
                            </div>

                            <ol>
                                <li>
                                    <div class="article">
                                        <div class="author-pic">
                                            <img src="images/blog-detail/comments/img-1.jpg" alt>
                                        </div>
                                        <div class="details">
                                            <div class="author-meta">
                                                <div class="name"><h4>Hasib sharif</h4></div>
                                                <div class="date"><span>2 hours ago</span></div>
                                            </div>
                                            <div class="comment-content">
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                                            </div>
                                            <div class="replay">
                                                <button>Replay</button>
                                            </div>
                                        </div>
                                    </div>
                                    <ol>
                                        <li>
                                            <div class="article">
                                                <div class="author-pic">
                                                    <img src="images/blog-detail/comments/img-2.jpg" alt>
                                                </div>
                                                <div class="details">
                                                    <div class="author-meta">
                                                        <div class="name"><h4>Ahmad sharif</h4></div>
                                                        <div class="date"><span>2 hours ago</span></div>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                                                    </div>
                                                    <div class="replay">
                                                        <button>Replay</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="article">
                                                <div class="author-pic">
                                                    <img src="images/blog-detail/comments/img-2.jpg" alt>
                                                </div>
                                                <div class="details">
                                                    <div class="author-meta">
                                                        <div class="name"><h4>Ahmad sharif</h4></div>
                                                        <div class="date"><span>2 hours ago</span></div>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                                                    </div>
                                                    <div class="replay">
                                                        <button>Replay</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>

                                <li>
                                    <div class="article">
                                        <div class="author-pic">
                                            <img src="images/blog-detail/comments/img-1.jpg" alt>
                                        </div>
                                        <div class="details">
                                            <div class="author-meta">
                                                <div class="name"><h4>Hasib sharif</h4></div>
                                                <div class="date"><span>2 hours ago</span></div>
                                            </div>
                                            <div class="comment-content">
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                                            </div>
                                            <div class="replay">
                                                <button>Replay</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>

                            <div class="comment-respond">
                                <h3>Post your comment</h3>
                                <form class="clearfix">
                                    <div class="col col-md-4">
                                        <input type="text" class="form-control" placeholder="username..">
                                    </div>
                                    <div class="col col-md-4">
                                        <input type="email" class="form-control" placeholder="email address..">
                                    </div>
                                    <div class="col col-md-4">
                                        <input type="text" class="form-control" placeholder="website..">
                                    </div>
                                    <div class="col col-xs-12">
                                        <textarea class="form-control" placeholder="write.."></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn theme-btn-s2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>--> <!-- end comments -->
                    </div> <!-- end blog-single-content -->

                    <div class="col col-md-3 col-sm-5">
                        <div class="blog-sidebar">
                            <?php get_sidebar('sidebar-1'); ?>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end blog-single-main-content -->      

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'vipindustrial' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'vipindustrial' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . vipindustrial_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'vipindustrial' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'vipindustrial' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . vipindustrial_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				) );

			endwhile; // End of the loop.
			?>
<?php get_footer();
