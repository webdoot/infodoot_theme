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
    if (!is_search()) { 
?>
    <!-- Popular News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">

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

                            echo '<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">';
                            echo '<img class="img-fluid" src="'. get_the_post_thumbnail_url($random_post, 'thumbnail'). '" alt="'.$random_title.'" width="110" height="110">';
                            echo '<div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">';
                            echo '<div class="mb-2">';

                            if ($random_categories) {
                                $cat_count=0;    // counting for category
                                foreach ($random_categories as $category) {
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
                            
                            echo '<small class="text-body">'. get_the_date('', $random_post). '</small>';
                            echo '</div>';
                            echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="'. $random_url .'">'. $random_title .'</a>';
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