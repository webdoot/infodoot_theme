<?php 
    // Heder      
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body>
	<?php wp_body_open(); ?>
	
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-white py-4 px-lg-5">
            <div class="col-lg-4">
            	<?php
				if (function_exists('the_custom_logo')) {
				    $custom_logo_id = get_theme_mod('custom_logo');
				    $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');
				    $logo_url_mob = get_theme_mod('mobile_logo');
				    $logo_width = 300;
				    $logo_width_mob = 174;
				?>
				    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand p-0 d-none d-lg-block" rel="home">
				        <img src="<?php echo esc_url($logo_url[0]); ?>" alt="Logo" width="<?php echo esc_attr($logo_width); ?>" >
				    </a>
				<?php } ?>               
            </div>
            <div class="col-lg-8 text-center text-lg-right">                
                <?php 
                    // if ( is_active_sidebar( 'header-banner-ad' ) ) { 
                    //      dynamic_sidebar( 'header-banner-ad' ); 
                    //  }                        
                ?>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand d-block d-lg-none">
                <img src="<?php echo esc_url($logo_url_mob); ?>" alt="Logo" width="<?php echo esc_attr($logo_width_mob); ?>" >
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse justify-content-between px-0 px-lg-3 mt-3 mt-lg-0',
                    'container_id' => 'navbarCollapse',
                    'menu_class' => 'navbar-nav mr-auto py-0',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new wp_bootstrap_navwalker(),
                ));
            }
            ?>
            
            <?php get_search_form(); ?>
            
        </nav>
    </div>
    <!-- Navbar End -->


        