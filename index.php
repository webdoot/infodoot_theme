<?php 
    get_header();
?>
    
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    <?php
                        $post_id_arr = [23,28,40];  // Require post ID for display

                        if (count($post_id_arr)) {
                            foreach ($post_id_arr as $post_id) {
                                // Get post object
                                $post = get_post($post_id);
                                if ($post) {
                                    $post_title = $post->post_title;
                                    // $post_content = $post->post_content;
                                    $post_permalink = get_permalink($post);
                                    $post_thumbnail_url = get_the_post_thumbnail_url($post, 'thumbnail');
                                    $post_category = get_the_category($post);
                                    $post_date = get_the_date('', $post);

                                    echo '<div class="position-relative overflow-hidden" style="height: 500px;">';
                                    echo '<img class="img-fluid h-100" src="' .$post_thumbnail_url. '" alt="' .$post_title. '" style="object-fit: cover;">';
                                    echo '<div class="overlay">';
                                    echo '<div class="mb-2">';
                                    echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">' .$post_category[0]->name. '</a>';
                                    echo '<span class="text-white" href="">' .$post_date. '</span>';
                                    echo '</div>';
                                    echo '<a class="h2 m-0 text-white text-uppercase font-weight-bold" href="' .$post_permalink. '">' .$post_title. '</a>'; 
                                    echo '</div>'; 
                                    echo '</div>';
                                } else {
                                    echo '<div class="bg-white border border-top-0 p-4"> <p class="m-0 text-uppercase font-weight-bold">No items to display </p></div> ';
                                }
                            }
                        }                                
                    ?>
                </div>
            </div>

            <div class="col-lg-5 px-0">
                <div class="row mx-0">

                    <?php
                        $random_posts = get_posts(array(
                            'orderby'        => 'rand',
                            'posts_per_page' => 4,
                        ));

                        if ($random_posts) {
                            foreach ($random_posts as $random_post) {
                                $random_title = $random_post->post_title;
                                $random_url = get_permalink($random_post);
                                $random_categories = get_the_category($random_post);

                                echo '<div class="col-md-6 px-0">';
                                echo '<div class="position-relative overflow-hidden" style="height: 250px;">';
                                echo '<img class="img-fluid w-100 h-100" src="'. get_the_post_thumbnail_url($random_post, 'thumbnail'). '" alt="' .$random_title. '" style="object-fit: cover;">';                                
                                echo '<div class="overlay">';                                
                                echo '<div class="mb-2">';

                                if ($random_categories) {
                                    $cat_count=0;    // counting for category
                                    foreach ($random_categories as $category) {
                                        $category_link = get_category_link($category);
                                        $category_name = $category->name;                                
                                        $cat_count++;
                                        // Total no of category to display must be upto 3
                                        if ($cat_count <= 3) {
                                            echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="' . $category_link . '">' . $category_name . '</a>';
                                        }
                                    }
                                }
                                
                                echo '<small class="text-white">'. get_the_date('', $random_post). '</small>';
                                echo '</div>';
                                echo '<a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="'. $random_url .'">'. $random_title .'</a>';
                                echo '</div>';
                                echo '</div>';                        
                                echo '</div>';                        
                            }
                        } else {
                            echo '<div class="bg-white border border-top-0 p-4"> <p class="m-0 text-uppercase font-weight-bold">No items to display </p></div> ';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Tranding</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            <?php
                                $random_posts = get_posts(array(
                                    'orderby'        => 'rand',
                                    'posts_per_page' => 4,
                                ));

                                if ($random_posts) {                                    
                                    foreach ($random_posts as $random_post) {
                                        $random_title = $random_post->post_title;
                                        $random_url = get_permalink($random_post);

                                        echo '<div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="' . $random_url . '">' . $random_title . '</a></div>';
                                    }                                    
                                } else {
                                    echo '<div class="text-truncate">No item found</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- Featured News Slider Start -->
    <div class="container-fluid my-3 pt-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            
            <?php
                $random_posts = get_posts(array(
                    'orderby'        => 'rand',
                    'posts_per_page' => 10,
                ));

                if ($random_posts) {
                    foreach ($random_posts as $random_post) {
                        $random_title = $random_post->post_title;
                        $random_url = get_permalink($random_post);
                        $random_categories = get_the_category($random_post);

                        echo '<div class="position-relative overflow-hidden" style="height: 300px;">';
                        echo '<img class="img-fluid h-100" src="'. get_the_post_thumbnail_url($random_post, 'thumbnail'). '" alt="'.$random_title.'" style="object-fit: cover;">';
                        echo '<div class="overlay">';
                        echo '<div class="mb-2">';

                        if ($random_categories) {
                            $cat_count=0;    // counting for category
                            foreach ($random_categories as $category) {
                                $category_link = get_category_link($category);
                                $category_name = $category->name;                                
                                $cat_count++;
                                // Total no of category to display must be upto 3
                                if ($cat_count <= 3) {
                                    echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="' . $category_link . '">' . $category_name . '</a>';
                                }
                            }
                        }
                        
                        echo '<small class="text-white">'. get_the_date('', $random_post). '</small>';
                        echo '</div>';
                        echo '<a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="'. $random_url .'">'. $random_title .'</a>';
                        echo '</div>';
                        echo '</div>';                        
                    }
                } else {
                    echo '<div class="bg-white border border-top-0 p-4"> <p class="m-0 text-uppercase font-weight-bold">No items to display </p></div> ';
                }
            ?>
                
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid my-3 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold"> Latest </h4>
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