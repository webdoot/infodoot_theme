<?php 
    get_header();
?>

<!-- News With Sidebar Start -->
<div class="container-fluid my-3 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="row">                    
                    <div class="col-12">
                    <?php 
                        $args = array(
                            'posts_per_page' => 30,     // no of article per page
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                        );
                        query_posts($args);

                        // Header
                        echo '<div class="section-title mb-0">';
                        echo '<h1 class="h4 m-0 text-uppercase font-weight-bold">Articles</h1>';
                        echo '</div>';
                        
                        if (have_posts()) {
                            // Items
                            echo '<div class="bg-white border border-top-0 p-3">';
                            echo '<div class="list-group">'; 

                            while (have_posts()) {
                                the_post();

                                // echo '<a href="'. esc_url(get_permalink()). '" class="list-group-item list-group-item-action">'. get_the_title(). '</a>';

                                echo '<div class="list-group-item list-group-item-action">';
                                echo '<img class="rounded mr-3" src="'. get_the_post_thumbnail_url($post, "post-thumbnail"). '" width="56" height="35" alt="">';
                                echo '<a href="'. esc_url(get_permalink()). '" class="list-group-item-action">'. get_the_title(). '</a>';
                                echo '</div>';
                                
                            } 

                            echo '</div>';     // .list-group

                            global $wp_query;
                            $total_pages = $wp_query->max_num_pages;
                            $current_page = max(1, get_query_var('paged'));

                            if ($total_pages > 1) {
                                echo '<nav class="mt-3">';
                                echo '<ul class="pagination justify-content-center">';
                                
                                // First 
                                if ($current_page == 1) {
                                    echo '<li class="page-item mr-1"><a class="page-link text-dark active" href="#">First</a></li>'; 
                                } else {
                                    echo '<li class="page-item mr-1"><a class="page-link text-dark" href="'. get_pagenum_link(1). '">First</a></li>';     
                                }

                                // Second
                                if ($total_pages>2 && $current_page == 2) {
                                    echo '<li class="page-item mr-1"><a class="page-link text-dark active" href="#">2</a></li>'; 
                                } elseif ($total_pages>2) {
                                    echo '<li class="page-item mr-1"><a class="page-link text-dark" href="'. get_pagenum_link(2). '">2</a></li>';     
                                }
                                                           
                                // medile pages
                                for ($i = 3; $i <= $total_pages-2; $i++) {
                                    if ($i >= $current_page-2 && $i <= $current_page+2) {
                                        if ($i == $current_page) {
                                            echo '<li class="page-item mr-1"><a class="page-link text-dark active">'. $i. '</a></li>';
                                        } else {
                                            echo '<li class="page-item mr-1"><a class="page-link text-dark" href="'. get_pagenum_link($i). '">'. $i. '</a></li>';
                                        }
                                    } else {
                                            echo '<a class="text-dark" href="'. get_pagenum_link($i). '">&nbsp;.&nbsp;</a>';
                                    }                                        
                                }

                                // pre last
                                if ($total_pages>3 && $current_page == $total_pages-1) {
                                    echo '<li class="page-item mr-1"><a class="page-link text-dark active" href="#">'. ($total_pages-1). '</a></li>'; 
                                } elseif ($total_pages>3) {
                                    echo '<li class="page-item mr-1"><a class="page-link text-dark" href="'. get_pagenum_link($total_pages-1). '">'. ($total_pages-1). '</a></li>';     
                                }

                                // Last 
                                if ($total_pages>1 && $current_page == $total_pages) {
                                    echo '<li class="page-item"><a class="page-link text-dark active" href="#">Last</a></li>'; 
                                } elseif ($total_pages>1) {
                                    echo '<li class="page-item"><a class="page-link text-dark" href="'. get_pagenum_link($total_pages). '">Last</a></li>';     
                                }

                                echo '</ul>';
                                echo '</nav>';
                            }
                            else {
                                echo '<br>';
                            }
                            
                            echo '</div>';  // .bg-white                            
                        }
                        else {
                            echo '<div class="bg-white border border-top-0 p-4">';
                            echo '<p class="m-0 text-center text-uppercase font-weight-bold">No items to display </p>';
                            echo '</div>';
                        }

                        // Reset Query
                        wp_reset_query();
                    ?>                         
                    </div>                   
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
