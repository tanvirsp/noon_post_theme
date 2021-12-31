<?php
/**
 * Template part for Post Nagivation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noon_Post
 */

 //Get Previous & Next Post Details
    $prevPost = get_previous_post();
    $prev_post_link = get_permalink($prevPost->ID );
    $prev_post_title = get_the_title($prevPost->ID );
    $prevthumbnail = get_the_post_thumbnail($prevPost->ID); 


    $nextPost = get_next_post();
    $next_post_link = get_permalink($nextPost->ID );
    $next_post_title = get_the_title($nextPost->ID );
    $nextthumbnail = get_the_post_thumbnail($nextPost->ID);

?>




<!--next & previous-posts-->
<div class="row">
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-next-post">
                <?php
                    if($prevPost){
                        ?>    
                            <div class="small-post">
                                <div class="image">
                                    <a href="<?php echo $prev_post_link ?>">
                                    <img src="<?php echo $prevthumbnail ?>" alt="...">
                                    </a>                                          
                                </div>
                                <div class="content">
                                    <div>
                                        <a class="link" href="<?php echo $prev_post_link ?>"><i class="arrow_left"></i>Preview post</a>
                                    </div>
                                    <a href="<?php echo $prev_post_link ?>"><?php echo $prev_post_title ?></a>
                                </div>
                            </div>
                        <?php  
                    } else {
                        echo "No Prevoius Post";
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-previous-post">
                <?php
                if( $nextPost){
                    ?>
                        <div class="small-post">
                            <div class="image">
                                <a href="<?php echo $next_post_link ?>">
                                    <img src="<?php echo $nextthumbnail ?>" alt="...">
                                </a>
                            </div>
                            <div class="content">
                                <div>
                                    <a class="link" href="<?php echo $next_post_link ?>">
                                        <span> Next post</span>
                                        <span class="arrow_right"></span>
                                    </a>
                                </div>
                                <a href="<?php echo $next_post_link ?>"><?php echo $next_post_title ?></a>
                            </div>
                        </div>
                    <?php
                } else{ 
                    echo "No Next Post";
                    };
                ?>
                
            </div>
        </div>
    </div>
</div><!--/-->