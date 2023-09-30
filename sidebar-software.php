<!-- Tags Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold"> Categories </h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            <?php
                doot_show_catagories('software-category');
            ?>
        </div>
    </div>
</div>
<!-- Tags End -->

<!-- Popular News Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">

        <?php
            $posts_latest = get_posts(array(
                'post_type' => 'software',
                'order' => 'dec',
                'posts_per_page' => 10,
                // required by PVC
                'suppress_filters' => true,
                'orderby' => 'post_views',
            ));

            if (count($posts_latest)) {
                foreach ($posts_latest as $post) {
                    $title = max_len($post->post_title, 26);
                    $url = get_permalink($post);
                    $versions = get_field('versions');
                    $company = get_field('company');
                    // thumbnail image
                    $img_post_id = get_post_thumbnail_id( $post->ID );
                    $img_alt = get_post_meta($img_post_id, '_wp_attachment_image_alt', true);

                    echo '<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">';
                    echo '<div class="d-flex align-items-center h-100 border border-right-0 pl-3"> <img class="img-fluid" src="'. get_the_post_thumbnail_url($post, 'thumbnail'). '" alt="'.$img_alt.'" width="110" height="110"> </div>';

                    echo '<div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">';                      
                    
                    echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="'. $url .'">'. $title .'</a>'; 

                    echo '<div class="my-1">'; 
                           
                    $categories = get_the_terms($post->ID, 'software-category');
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold py-1 px-2 mr-2" href="'. esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                        }
                    }
                    
                    echo '<small class="text-body">'. $company. '</small>';
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
<!-- Popular News End -->
    


