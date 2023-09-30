<?php 
    get_header();
?>

<!-- News With Sidebar Start -->
<div class="container-fluid my-3 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">                            
                            <h1 class="h4 m-0 text-uppercase font-weight-bold">Software Category: <?php echo get_queried_object()->name; ?></h1>
                        </div>
                    </div>

                    <?php 
                        $count = 0; // Initialize the count variable
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                $count++;   
                    ?>

                        <?php if ($count <= 6) { ?>

                            <div class="col-lg-6">
                                <div class="bg-white border border-top-0 position-relative p-4 mb-3">
                                    <div class="text-center">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="logo">
                                        <?php } ?>
                                    </div>                                    
                                    
                                    <div class="mt-4">
                                        <div class="mb-2">                                            
                                            <?php 
                                                $categories = get_the_terms(get_the_ID(), 'software-category');
                                                if (!empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                    }
                                                }
                                            ?>                                            
                                            <a class="mt-2" href="<?php echo get_field('company_url'); ?>" style="color:#0059b3"><?php echo get_field('company'); ?> </a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?php echo get_permalink() ?>"> <?php echo max_len(get_the_title(), 26); ?> <span class="text-muted"> <?php echo end(get_field("versions"))["text"]; ?> </span> </a>
                                        <?php the_excerpt(); ?> 
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="col-lg-6">
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <div class="d-flex align-items-center h-100 border border-right-0 pl-3">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="logo" width="110" height="110">
                                    <?php } ?>
                                    </div>

                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="<?php echo get_permalink() ?>"> <?php echo max_len(get_the_title(), 26); ?> <span class="text-muted"> <?php echo end(get_field("versions"))["text"]; ?> </span> </a>

                                        <div class="my-2">  
                                            <?php 
                                                $categories = get_the_terms(get_the_ID(), 'software-category');
                                                if (!empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                    }
                                                }
                                            ?>                                            
                                            <a class="mt-2" href="<?php echo get_field('company_url'); ?>" style="color:#0059b3"><?php echo get_field('company'); ?> </a>
                                        </div>

                                    </div>                      
                                </div>
                            </div>

                        <?php } ?>
                    <?php } ?>

                    <?php } else { ?>
                        <div class="col-12">
                            <div class="bg-white border border-top-0 p-4">
                                <p class="m-0 text-uppercase font-weight-bold">No items to display </p>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            
            <div class="col-lg-4">
                <?php 
                    get_sidebar('software');
                ?> 
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<?php 
    get_footer(); 
?>
