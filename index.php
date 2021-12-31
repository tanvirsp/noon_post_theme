<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noon_Post
 */

get_header();
?>

	 <!--mansory-layout-->
	 <section class="masonry-layout col2-layout mt-120">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mt--10 ">
                    <!--cards-->
                    <div class="card-columns">
                       
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/posts/post', get_post_type() );
							endwhile;
							
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>

                    </div>

                    <!--pagination-->
                    
                    

                    <div class="pagination mt-30 custom-pagination-style">

                            <?php the_posts_pagination( array(
                                    'mid_size'  => 2,
                                    'prev_text' => __( '<i class="arrow_carrot-2left"></i>', 'noonpost' ),
                                    'next_text' => __( '<i class="arrow_carrot-2right"></i>', 'noonpost' ),
                                ) ); 
                            ?>
                       
                    </div><!--/-->
                </div>

				<!-- sidebar -->
                <div class="col-lg-4 max-width">
                    <?php get_template_part('sidebar') ?>
                </div>

            </div>
        </div>
    </section><!--/-->



<?php
get_sidebar();
get_footer();




