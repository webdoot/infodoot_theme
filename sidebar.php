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

                            echo '<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">';
                            echo '<img class="img-fluid" src="'. get_the_post_thumbnail_url($post, 'thumbnail'). '" alt="'.$title.'" width="110" height="110">';
                            echo '<div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">';
                            
                            echo '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="'. $url .'">'. $title .'</a>';

                            echo '<div class="mb-2">';
                            echo '<i class="fa fa-signal"></i> &nbsp; <small class="text-body">'. $post->post_views. '</small>';
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
    
<?php } ?>