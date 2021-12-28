<?php
/**
 * Template part for displaying Standard post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noon_Post
 */

?>

 <!--Post-1-->
 <div class="card">
    <div class="post-card">
    <div class="post-card-image">
        <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail() ?>
        </a>
    </div>
    <div class="post-card-content">

        <!-- Category Showing -->
        <a >
            <?php 
            $categories = get_the_category();
            $separator = ', ';
            $result ='';

            if ($categories){
                foreach($categories as $category){
                    $result .= '<a href ="' .get_category_link($category ->term_id) . '" class="categorie">' . $category->cat_name . '</a>' . $separator;
                }
                echo trim ($result, $separator);
            }

            ?>
        </a>     
    
        <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a> </h5>
        
      
        <p>
          <?php 
            the_excerpt();
            ?>        
  
        </p>
        <div class="post-card-info">
            <ul class="list-inline">
                <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></a></li>
                <li>
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author() ?></a>
                </li>
                <li class="dot"></li>
                <li><?php the_time('F j, Y') ?></li>
            </ul>
        </div>
    </div>
    </div>
</div>