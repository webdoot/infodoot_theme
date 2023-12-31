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
                            <h1 class="h4 m-0 text-uppercase font-weight-bold"> Article Category: <?php echo get_queried_object()->name; ?></h4>
                        </div>
                    </div>

                    <?php 
                        $count = 0; // Initialize the count variable
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                $count++;   
                    ?>

                        <?php if ($count <= 4) { ?>

                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <img class="img-fluid w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" style="object-fit: cover;">
                                    <?php } ?>
                                    
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">                                            
                                            <?php 
                                                $categories = get_the_category();
                                                if (!empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                    }
                                                }
                                            ?>                                            
                                            <small> <?php echo get_the_date(); ?> </small>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?php echo get_permalink() ?>"> <?php the_title(); ?> </a>
                                        <?php the_excerpt(); ?> 
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="col-lg-6">
                                <div class="position-relative mb-3">  
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">                                            
                                            <?php 
                                                $categories = get_the_category();
                                                if (!empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                    }
                                                }
                                            ?>                                            
                                            <small> <?php echo get_the_date(); ?> </small>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?php echo get_permalink() ?>"><?php the_title(); ?></a>
                                        <?php the_excerpt(); ?> 
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
                    get_sidebar('article');
                ?> 
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<?php 
    get_footer(); 
?>
