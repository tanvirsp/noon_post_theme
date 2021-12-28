<?php
/**
 * Noon Post functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Noon_Post
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'noonpost_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function noonpost_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Noon Post, use a find and replace
		 * to change 'noonpost' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'noonpost', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'noonpost' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'noonpost_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

	

	



		//Add Post format support
		add_theme_support( 'post-formats', array( 'image', 'gallery', 'audio',  'video' ) );


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'noonpost_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function noonpost_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'noonpost_content_width', 640 );
}
add_action( 'after_setup_theme', 'noonpost_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function noonpost_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'noonpost' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'noonpost' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Social', 'noonpost' ),
			'id'            => 'footer-social',
			'description'   => esc_html__( 'Add widgets here.', 'noonpost' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Copyright text', 'noonpost' ),
			'id'            => 'footer-copyright',
			'description'   => esc_html__( 'Add widgets here.', 'noonpost' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'noonpost_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function noonpost_scripts() {
	wp_enqueue_style( 'noonpost-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'noonpost-style', 'rtl', 'replace' );

	//css files
	wp_enqueue_style( 'all', get_theme_file_uri("/assets/css/all.css"), array(), _S_VERSION );
	wp_enqueue_style( 'elegant-font-icons', get_theme_file_uri("/assets/css/elegant-font-icons.css"), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', get_theme_file_uri("/assets/css/bootstrap.min.css"), array(), _S_VERSION );
	wp_enqueue_style( 'owl-carousel', get_theme_file_uri("/assets/css/owl.carousel.css"), array(), _S_VERSION );
	wp_enqueue_style( 'main-style', get_theme_file_uri("/assets/css/style.css"), array(), _S_VERSION );
	wp_enqueue_style( 'custom-style', get_theme_file_uri("/assets/css/custom.css"), array(), _S_VERSION );

//script files
	wp_enqueue_script( 'noonpost-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array("jquery"), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.jss', array("jquery"), _S_VERSION, true );
	wp_enqueue_script( 'ajax-contact', get_template_directory_uri() . '/assets/js/ajax-contact.js', array("jquery"), _S_VERSION, true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array("jquery"), _S_VERSION, true );
	wp_enqueue_script( 'switch', get_template_directory_uri() . '/assets/js/switch.js', array("jquery"), _S_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array("jquery"), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'noonpost_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/plugin_installer.php';




//Comment Field Order
add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );
function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
	$fields['comment'] = $comment_field;
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
	
   
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}


function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment-item';
    } else {
        $tag       = 'li';
        $add_below = 'comment-item';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? 'comment-item' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s at %2$s'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            </a><?php 
            edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </div>
 
        <?php comment_text(); ?>
 
        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}






