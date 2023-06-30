<?php
/**
 * @package DOOT
 */

if ( ! function_exists( 'doot_setup' ) ) {
	/**
	 * This function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. 
	 */
	function doot_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'doot', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		// add_theme_support(
		// 	'post-formats',
		// 	array(
		// 		'link',
		// 		'aside',
		// 		'gallery',
		// 		'image',
		// 		'quote',
		// 		'status',
		// 		'video',
		// 		'audio',
		// 		'chat',
		// 	)
		// );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		/*
		 * Register menu
		 * Add navwalker for bootstrap menu
		 * @link https://github.com/wp-bootstrap/wp-bootstrap-navwalker
		 */
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'doot' ),
				'footer'  => esc_html__( 'Secondary menu', 'doot' ),
			)
		);
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
						        'size' => 'desktop-logo',
						        'mobile_size' => 'mobile-logo',
						 ));

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		// add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		
		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
	}
}
add_action( 'after_setup_theme', 'doot_setup' );

/**
 * Custom logo: separate for desktop & mobile 
 */
function doot_customize_register($wp_customize) {
	// Add mobile logo
    $wp_customize->add_setting('mobile_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mobile_logo', array(
        'label' => 'Mobile Logo',
        'section' => 'title_tagline',
        'settings' => 'mobile_logo',
    )));

    // Remove Homepage Settings: as it not required.
    $wp_customize->remove_section( 'static_front_page' );
}
add_action('customize_register', 'doot_customize_register');



/**
 * Register widget area. 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function doot_widgets_init() {

// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Footer Area-1', 'doot' ),
// 			'id'            => 'footer-area-1',
// 			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'doot' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);

// 	register_sidebar( array(
//         'name'          => __( 'Header Banner Ad', 'text-domain' ),
//         'id'            => 'header-banner-ad',
//         'description'   => __( 'Ad area in top header', 'text-domain' ),
//         'before_widget' => '',
//         'after_widget'  => '',
//         'before_title'  => '',
//         'after_title'   => '',
//         'before_sidebar'=> '',
//         'after_sidebar' => '',
//     ) );
// }
// add_action( 'widgets_init', 'doot_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'doot_scripts' ) ) {
	function doot_scripts() {
		// Styles
		wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap' );	
		wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css' );	
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');	
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css');
		wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css');			
		
		// Scripts				
		wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array('jquery'), false, false);
		wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array(), false, true);
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array(), false, true);
		wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);	

		// contact form
		wp_enqueue_script( 'contact-form-script', get_template_directory_uri() . '/assets/js/contact-form.js', array('jquery-form'), '1.0', true );

	    // Pass the admin-ajax.php URL and nonce to the JavaScript file
	    wp_localize_script( 'contact-form-script', 'contact_form_params', array(
	        'ajax_url' => admin_url( 'admin-ajax.php' ),
	        'nonce'    => wp_create_nonce( 'contact_form_submit' )
	    ));		
	}
}
add_action( 'wp_enqueue_scripts', 'doot_scripts' );

/**
 * Control the post excerpt length
 */
function doot_post_excerpt_length() {
	return 35;
}
add_filter( 'excerpt_length', 'doot_post_excerpt_length', 999 );


/**
 * Custom comment display area: Here a separate function were made to use in comment section
 */
function doot_comment ($comment_obj, $level=0) {
	$max_level = 2;
	// Parent comment
	if ($level == 0) {
		echo '<div class="media mb-4">';  // avoide lower margine
	}
	else {
		echo '<div class="media">';
	}    
    echo '<img src="' . get_avatar_url($comment_obj->user_id) . '" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">';
    echo '<div class="media-body">';
    echo '<h6><a class="text-secondary font-weight-bold" href="">' . $comment_obj->comment_author . '</a> <small><i>' . date(get_option('date_format'), strtotime($comment_obj->comment_date)) . '</i></small></h6>';
    echo '<p>' . $comment_obj->comment_content . '</p>';
    if ($level != $max_level) {
		// echo '<button class="btn btn-sm btn-outline-secondary">Reply</button>';
	}

    // Child comment
    $args = array(
	    'parent' => $comment_obj->comment_ID, // Retrieve replies
	    'status' => 'approve', // Retrieve only approved replies
	);
	foreach (get_comments($args) as $comment) {	
		if ($level >= $max_level) {
			break; 		// Comment goes upto lavel 2
		}
		doot_comment($comment, ++$level);
	}
    echo '</div>';
    echo '</div>';
}

/**
 * Custom comment form: Here a separate function were made to use in comment section
 */
function doot_comment_form () {
	if ( is_user_logged_in() ){
		// Comment form: Logged in user
		$comment_form_args = array(
			'class_container' 	 => 'bg-white border border-top-0 p-4',
			'title_reply' 		 => '',
			'title_reply_before' => '',
			'title_reply_after'  => '',
			'class_form' 		 => '',
		    'comment_field' 	 => '<div class="form-group"> <label for="message">' . _x( 'Comment*', 'noun' ) . '</label><textarea id="comment" name="comment" cols="30" rows="8" maxlength="1200" class="form-control" required="required"></textarea></div>',
		    'logged_in_as' 		 => '<div class="form-group"><label>' . sprintf( __( 'Logged in as <a href="%1$s" class="text-secondary font-weight-bold">%2$s</a>. <a href="%3$s" title="Log out of this account" class="text-reset font-italic">Log out?</a>' ), admin_url( 'profile.php' ), wp_get_current_user()->display_name, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</label></div>',
		    'class_submit' 		 => 'btn btn-primary font-weight-semi-bold py-2 px-3',
		    'submit_field' 		 => '<div class="form-group mb-0">%1$s %2$s</div>',
		    'label_submit' 		 => 'Leave a comment',	

		    // 'must_log_in' => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',		    
		);
		comment_form($comment_form_args);
	}
	else {
		// Comment instruction: Logged out user
		echo '<div class="bg-white border border-top-0 p-5">';
		echo '<p class="text-secondary font-weight-semi-bold">You must be logged in to post a comment.</p>';
		echo '<p> <a href="' . wp_login_url($_SERVER['REQUEST_URI']) . '" class="text-secondary font-italic">Log in</a> or ';
		echo '<a href="' . wp_registration_url() . '" class="text-secondary font-italic">Register</a> to comment. </p>';
		echo '</div>';
	}
}

/**
 * Show all categories
 */
function doot_show_catagories(){
	$categories = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    foreach( $categories as $category ) {
        $category_link = sprintf( 
            '<a href="%1$s" alt="%2$s" class="btn btn-sm btn-secondary m-1">%3$s</a>',
            esc_url( get_category_link( $category->term_id ) ),
            esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
            esc_html( $category->name )
        );
        
        echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link );
    } 
}

/**
 * Show all tags
 */
function doot_show_tags(){
	$tags = get_tags( array(
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    foreach( $tags as $tag ) {
        $tag_link = sprintf( 
            '<a href="%1$s" alt="%2$s" class="btn btn-sm btn-outline-secondary m-1">%3$s</a>',
            esc_url( get_category_link( $tag->term_id ) ),
            esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $tag->name ) ),
            esc_html( $tag->name )
        );
        
        echo sprintf( esc_html__( '%s', 'textdomain' ), $tag_link );
    } 
}

/**
 * Process ajax contact form
 */
function doot_contact_form() {
    // Check the nonce for security
    if ( ! isset( $_POST['contact_form_nonce'] ) || ! wp_verify_nonce( $_POST['contact_form_nonce'], 'contact_form_submit' ) ) {
        wp_send_json_error( 'Invalid nonce.' );
    }

    // Retrieve and sanitize form data
    $name    = sanitize_text_field( $_POST['name'] );
    $email   = sanitize_email( $_POST['email'] );
    $message = sanitize_textarea_field( $_POST['message'] );

    // Perform any desired actions with the form data
    // Send an email, save to database, etc.

    // Example: Send an email using wp_mail()
    $to      = 'mail@infodoot.com';
    $subject = 'Contact Form Submission: '. $name;
    $body    = "Name: $name <br> Email: $email <br><br> Message: $message";
    $headers = array( 'Content-Type: text/html; charset=UTF-8' );
    wp_mail( $to, $subject, $body, $headers );

    // Return success message
    wp_send_json_success( 'Message sent successfully.' );
}
add_action( 'wp_ajax_nopriv_contact_form', 'doot_contact_form' );
add_action( 'wp_ajax_contact_form', 'doot_contact_form' );

