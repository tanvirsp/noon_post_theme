<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Noon_Post
 */

get_header();
?>

	<main id="primary" class="site-main">

		

	</main><!-- #main -->


<section class="section pt-55 ">
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8 mb-20">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="post-single">
				<div class="post-single-image">
					<?php the_post_thumbnail() ?>
				</div>
				<div class="post-single-content">

					
					<a >
						<?php 
						$categories = get_the_category();
						$separator = ' ';
						$result ='';

						if ($categories){
							foreach($categories as $category){
								$result .= '<a href ="' .get_category_link($category ->term_id) . '" class="categorie">' . $category->cat_name . '</a>' . $separator;
							}
							echo trim ($result, $separator);
						}

						?>
					</a> 
					
	
					<h4> <?php the_title() ?></h4>
					<div class="post-single-info">
						<ul class="list-inline">
							<li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>	
							</a></li>

							<li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author() ?></a> </li>
							<li class="dot"></li>
							<li><?php the_time('F j, Y') ?></li>
							<li class="dot"></li>
							<li> <?php comments_number(); ?>.</li>
						</ul>
					</div>
				</div>
		  
				<!-- post body -->
				<div class="post-single-body">
					<?php 
						the_content();
					?>
				</div>

				<div class="post-single-footer">
					<!--Post Tags -->
					<div class="tags">
						<?php 
							echo get_the_tag_list('<ul class="list-inline"><li>', '</li><li>', '</li></ul>' ) 
						?>
					</div>
					
					<!-- Social Sharing Icon -->
					<div class="social-media">
						<ul class="list-inline">
							<li>
								<a href="#" class="color-facebook">
									<i class="fab fa-facebook"></i>
								</a>
							</li>
							<li>
								<a href="#" class="color-instagram">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li>
								<a href="#" class="color-twitter">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
							<li>
								<a href="#" class="color-youtube">
									<i class="fab fa-youtube"></i>
								</a>
							</li>
							<li>
								<a href="#" class="color-pinterest">
									<i class="fab fa-pinterest"></i>
								</a>
							</li>
						</ul>
					</div>                           
				</div>
			</div> <!--/-->

			<?php
			get_template_part('template-parts/post-nagivation');

			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		
			

		
		</div>
 

		<!-- sidebar -->
		<div class="col-lg-4 max-width">
                    <?php get_template_part('sidebar') ?>
                </div>
	</div>
</div>
</section><!--/-->

<?php

get_footer();

?>
