<?php 
    /**
     * Default page for all page types
     * Used for: Search result
     */
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
                                <h4 class="m-0 text-uppercase font-weight-bold"> <?php if (is_search()) echo 'Search'; else echo 'Latest'; ?> </h4>
                            </div>
                        </div>

                        <?php 
                            $count = 0; // Initialize the count variable
                            if (have_posts()) {
                                while (have_posts()) {
                                    the_post();
                                    $title = max_len(get_the_title(), 26);
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
                                                        $cat_count=0;    // counting for category
                                                        foreach ($categories as $category) {
                                                            $category_link = get_category_link($category);
                                                            $category_name = max_len($category->name, 10);
                                                            $cat_count++;
                                                            // Total no of category to display must be upto 2
                                                            if ($cat_count <= 2) {
                                                                echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="' . $category_link . '">' . $category_name . '</a>';
                                                            }
                                                        }
                                                    }
                                                ?>                                            
                                                <small> <?php echo get_the_date(); ?> </small>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?php echo get_permalink() ?>"> <?php echo $title; ?> </a>
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
                                                        $cat_count=0;    // counting for category
                                                        foreach ($categories as $category) {
                                                            $category_link = get_category_link($category);
                                                            $category_name = max_len($category->name, 10);
                                                            $cat_count++;
                                                            // Total no of category to display must be upto 2
                                                            if ($cat_count <= 2) {
                                                                echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="' . $category_link . '">' . $category_name . '</a>';
                                                            }
                                                        }
                                                    }
                                                ?>                                            
                                                <small> <?php echo get_the_date(); ?> </small>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?php echo get_permalink() ?>"><?php echo $title; ?></a>
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
                        get_sidebar();
                    ?> 
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

<?php 
    get_footer();
?>   