<!-- Tags Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            <?php
                doot_show_tags();
            ?>
        </div>
    </div>
</div>
<!-- Tags End -->

<?php 
    // Display only on non search page
    if (!is_search() && !is_page()) { 
?>
    <!-- Popular News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">

            <?php
                    $posts_latest = get_posts(array(
                        'order' => 'dec',
                        'posts_per_page' => 10,
                        // required by PVC
                        'suppress_filters' => false,
                        'orderby' => 'post_views',
                    ));

                    if (count($posts_latest)) {
                        foreach ($posts_latest as $post) {
                            $title = max_len($post->post_title, 26);
                            $url = get_permalink($post);
                            $date = get_the_date('', $post);
                            $categories = get_the_category($post);
                            // thumbnail image
                            $img_post_id = get_post_thumbnail_id( $post->ID );
                            $img_alt = get_post_meta($img_post_id, '_wp_attachment_image_alt', true);

                            echo '<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">';
                            echo '<img class="img-fluid" src="'. get_the_post_thumbnail_url($post, 'thumbnail'). '" alt="'.$img_alt.'" width="110" height="110">';
                            echo '<div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">';

                            echo '<div class="mb-2">';
                            if ($categories) {
                                $cat_count=0;    // counting for category
                                foreach ($categories as $category) {
                                    $category_link = get_category_link($category);
                                    $category_name = max_len($category->name, 10);                                
                                    $cat_count++;
                                    // Total no of category to display must be upto 3
                                    if ($cat_count <= 1) {
                                        echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                    href="' . $category_link . '">' . $category_name . '</a>';
                                    }
                                }
                            }
                            echo '<small class="text-body">'. $date. '</small>';
                            echo '</div>';  
                            
                            echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="'. $url .'">'. $title .'</a>'; 

                            echo '</div>';                       
                            echo '</div>';                        
                        }
                    } else {
                        echo '<div class="bg-white border border-top-0 p-4"> <p class="m-0 text-uppercase font-weight-bold">No items to display </p></div> ';
                    }
                ?>      

        </div>
    </div>
    <!-- Popular News End -->
    
<?php } ?>