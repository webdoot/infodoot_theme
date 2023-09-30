<?php 
	get_header();
?>
    
    <?php 
        // header slider
        get_template_part('template-parts/front-slider');
    ?>

    <!-- Featured News Slider Start -->
    <div class="container-fluid my-3 pt-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured Articles</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            
            <?php
                $random_posts = get_posts(array(
                    'orderby'        => 'rand',
                    'posts_per_page' => 10,
                ));

                if ($random_posts) {
                    foreach ($random_posts as $random_post) {
                        $random_title = max_len($random_post->post_title, 26);
                        $random_url = get_permalink($random_post);
                        $random_categories = get_the_category($random_post);

                        echo '<div class="position-relative overflow-hidden" style="height: 300px;">';
                        echo '<img class="img-fluid h-100" src="'. get_the_post_thumbnail_url($random_post, 'full'). '" alt="'.$random_title.'" style="object-fit: cover;">';
                        echo '<div class="overlay">';
                        echo '<div class="mb-2">';

                        if ($random_categories) {
                            $cat_count=0;    // counting for category
                            foreach ($random_categories as $category) {
                                $category_link = get_category_link($category);
                                $category_name = max_len($category->name, 10);                                
                                $cat_count++;
                                // Total no of category to display must be upto 1
                                if ($cat_count <= 1) {
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
                                <h1 class="h4 m-0 text-uppercase font-weight-bold"> Latest Articles </h1>
                            </div>
                        </div>

                        <?php
                        $posts = get_posts(array(
                            'orderby'        => 'date',
                            'posts_per_page' => 16,
                        ));
                   
                        if ($posts) {
                            $count = 0; // Initialize the count variable
                            foreach ($posts as $post) {
                                $title = max_len($post->post_title, 28);
                                $excerpt= get_the_excerpt();
                                $url = get_permalink($post);
                                $categories = get_the_category($post);

                                $count++;  
                                if ($count <= 4) {     
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="position-relative mb-3">';
                                    echo '<img class="img-fluid w-100" src="'. get_the_post_thumbnail_url($post, 'full'). '" alt="'.$title.'" style="object-fit: cover;">';
                                    echo '<div class="bg-white border border-top-0 p-4">';
                                    echo '<div class="mb-2">';

                                    if ($categories) {
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

                                    echo '<small>'. get_the_date('', $post). '</small>';
                                    echo '</div>';
                                    echo '<a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="'. $url .'">'. $title .'</a>';
                                    echo $excerpt;
                                    echo '</div>';
                                    echo '</div>';   
                                    echo '</div>'; 
                                }  // if
                                elseif ($count <= 8) {
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="position-relative mb-3">';
                                    echo '<img class="img-fluid w-100" src="'. get_the_post_thumbnail_url($post, 'full'). '" alt="'.$title.'" style="object-fit: cover;">';
                                    echo '<div class="bg-white border border-top-0 p-4">';
                                    echo '<div class="mb-2">';

                                    if ($categories) {
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

                                    echo '<small>'. get_the_date('', $post). '</small>';
                                    echo '</div>';
                                    echo '<a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="'. $url .'">'. $title .'</a>';
                                    echo '</div>';
                                    echo '</div>';   
                                    echo '</div>'; 
                                }
                                elseif ($count <= 12) {
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">';
                                    echo '<img class="img-fluid" src="'. get_the_post_thumbnail_url($post, 'thumbnail'). '" alt="'.$title.'" width="110" height="110">';
                                    echo '<div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">';
                                    echo '<div class="mb-2">';

                                    if ($categories) {
                                        $cat_count=0;    // counting for category
                                        foreach ($categories as $category) {
                                            $category_link = get_category_link($category);
                                            $category_name = max_len($category->name, 10);                                
                                            $cat_count++;
                                            // Total no of category to display must be upto 2
                                            if ($cat_count <= 1) {
                                                echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="' . $category_link . '">' . $category_name . '</a>';
                                            }
                                        }
                                    }

                                    echo '<small>'. get_the_date('', $post). '</small>';
                                    echo '</div>';
                                    echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="'. $url .'">'. $title .'</a>';
                                    echo '</div>';
                                    echo '</div>';   
                                    echo '</div>'; 
                                }
                                else {
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="d-flex align-items-center bg-white mb-3" style="height: 85px;">';
                                    echo '<div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">';
                                    echo '<div class="mb-2">';

                                    if ($categories) {
                                        $cat_count=0;    // counting for category
                                        foreach ($categories as $category) {
                                            $category_link = get_category_link($category);
                                            $category_name = max_len($category->name, 10);                                
                                            $cat_count++;
                                            // Total no of category to display must be upto 2
                                            if ($cat_count <= 1) {
                                                echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="' . $category_link . '">' . $category_name . '</a>';
                                            }
                                        }
                                    }

                                    echo '<small>'. get_the_date('', $post). '</small>';
                                    echo '</div>';
                                    echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="'. $url .'">'. $title .'</a>';
                                    echo '</div>';
                                    echo '</div>';   
                                    echo '</div>'; 
                                }
                            }  // foreach
                        }
                        else {
                            echo '<div class="col-12">';
                            echo '<div class="bg-white border border-top-0 p-4">';
                            echo '<p class="m-0 text-uppercase font-weight-bold">No items to display </p>';
                            echo '</div>';
                            echo '</div>';
                        }  
                        ?>

                    </div>
                </div>
                
                <div class="col-lg-4">
                    <?php 
                        get_sidebar('home');
                    ?> 
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

<?php 
	get_footer();
?>   