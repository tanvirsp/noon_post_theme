<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Noon_Post
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!--loading -->
<!-- <div class="loading">
        <div class="circle"></div>
    </div> -->
<!--/-->

<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!--logo-->
            <div class="logo">
                <a href="<?php site_url() ?>">
                   <?php the_custom_logo() ?>
                   
                </a>
            </div>
            
    
            <!--navbar-collapse-->
                <?php 
                    get_template_part('template-parts/nav') 
                    
                ?>
                
            <!--/-->
    


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'noonpost' ); ?></a>

	<header id="masthead" class="site-header">
	

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'noonpost' ); ?></button>
			
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->





<!--
	   Font Google
		<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
