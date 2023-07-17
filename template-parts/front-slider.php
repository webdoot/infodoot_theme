    
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    <?php
                        // $post_id_arr = [23,28,40];  // Require post ID for display

                    	$posts_head = get_posts(array(
	                        'order' => 'dec',
	                        'posts_per_page' => 12,
	                        // required by PVC
	                        'suppress_filters' => false,
	                        'orderby' => 'post_views',
	                    ));

	                    if (count($posts_head)) {
	                    	$count = 0;
                            foreach ($posts_head as $post) {
                            	// counter increment 
			                    $count ++;
                            	// Total 3 post to display
                            	if ($count <= 3) {
                            		// post
	                            	$title = max_len($post->post_title, 45);
		                            $url = get_permalink($post);
		                            $date = get_the_date('', $post);
		                            $categories = get_the_category($post);
		                            // thumbnail image
		                            $img_post_id = get_post_thumbnail_id( $post->ID );
		                            $img_alt = get_post_meta($img_post_id, '_wp_attachment_image_alt', true);

	                            	echo '<div class="position-relative overflow-hidden" style="height: 500px;">';
	                                echo '<img class="img-fluid h-100" src="'. get_the_post_thumbnail_url($post, 'full'). '" alt="' .$img_alt. '" style="object-fit: cover;">';
	                                echo '<div class="overlay">';
	                                echo '<div class="mb-2">';

	                                if ($categories) {
	                                    $cat_count=0;    // counting for category
	                                    foreach ($categories as $category) {
	                                        $category_link = get_category_link($category);
	                                        $category_name = max_len($category->name, 20);                                
	                                        $cat_count++;
	                                        // Total no of category to display must be upto 3
	                                        if ($cat_count <= 6) {
	                                            echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="' . $category_link . '">' . $category_name . '</a>';
	                                        }
	                                    }
	                                }

	                                echo '<span class="text-white" href="">' .$date. '</span>';
	                                echo '</div>';
	                                echo '<a class="h2 m-0 text-white text-uppercase font-weight-bold" href="' .$url. '">' .$title. '</a>'; 
	                                echo '</div>'; 
	                                echo '</div>';	                                
			                    }			                    
                            }
                        } else {
                            echo '<div class="bg-white border border-top-0 p-4"> <p class="m-0 text-uppercase font-weight-bold">No items to display </p></div> ';
                        }                                                        
                    ?>
                </div>
            </div>

            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    <?php
                        if ($posts_head) {
                            $count = 0;
                            foreach ($posts_head as $post) {
                            	// counter increment 
			                    $count ++;
                            	// Total 3 post to display
                            	if ($count >= 4 && $count <= 7) {
                            		// post
	                            	$title = max_len($post->post_title, 45);
		                            $url = get_permalink($post);
		                            $date = get_the_date('', $post);
		                            $categories = get_the_category($post);
		                            // thumbnail image
		                            $img_post_id = get_post_thumbnail_id( $post->ID );
		                            $img_alt = get_post_meta($img_post_id, '_wp_attachment_image_alt', true);

	                                echo '<div class="col-md-6 px-0">';
	                                echo '<div class="position-relative overflow-hidden" style="height: 250px;">';
	                                echo '<img class="img-fluid w-100 h-100" src="'. get_the_post_thumbnail_url($post, 'full'). '" alt="' .$img_alt. '" style="object-fit: cover;">';                                
	                                echo '<div class="overlay">';                                
	                                echo '<div class="mb-2">';

	                                if ($categories) {
	                                    $cat_count=0;    // counting for category
	                                    foreach ($categories as $category) {
	                                        $category_link = get_category_link($category);
	                                        $category_name = max_len($category->name, 10);                                
	                                        $cat_count++;
	                                        // Total no of category to display must be upto 3
	                                        if ($cat_count <= 3) {
	                                            echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
	                                        href="' . $category_link . '">' . $category_name . '</a>';
	                                        }
	                                    }
	                                }
	                                
	                                echo '<small class="text-white">'. $date. '</small>';
	                                echo '</div>';
	                                echo '<a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="'. $url .'">'. $title .'</a>';
	                                echo '</div>';
	                                echo '</div>';                        
	                                echo '</div>';  
	                            }                     
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
                                if ($posts_head) {
		                            $count = 0;
		                            foreach ($posts_head as $post) {
		                            	// counter increment 
					                    $count ++;
		                            	// Total 3 post to display
		                            	if ($count >= 8) {
		                            		// post
			                            	$title = max_len($post->post_title, 60);
				                            $url = get_permalink($post);

	                                        echo '<div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="' . $url . '">' . $title . '</a></div>';
	                                    }
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




