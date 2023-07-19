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
                    <?php 
                        $tags = get_tags( array(
                            'orderby' => 'name',
                            'order'   => 'ASC'
                        ) );

                        // Header
                        echo '<div class="section-title mb-0">';
                        echo '<h4 class="m-0 text-uppercase font-weight-bold">Articles</h4>';
                        echo '</div>';
                        
                        if (!empty($tags)) {                            
                            // Items
                            echo '<div class="bg-white border border-top-0 p-3">';
                            echo '<div class="list-group">'; 

                            foreach ($tags as $tag) {
                                echo '<a href="'. esc_url( get_category_link( $tag->term_id ) ). '" class="list-group-item list-group-item-action">'. esc_html($tag->name). '</a>';
                            } 

                            echo '</div>';      // .list-group                            
                            echo '</div>';      // .bg-white                            
                        }
                        else {
                            echo '<div class="bg-white border border-top-0 p-4">';
                            echo '<p class="m-0 text-center text-uppercase font-weight-bold">No items to display </p>';
                            echo '</div>';
                        }
                    ?>                         
                    </div>                   
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
