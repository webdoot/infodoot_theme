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
                        $categories = get_categories( array(
                            'orderby' => 'name',
                            'order'   => 'ASC'
                        ) ); 

                        // Header
                        echo '<div class="section-title mb-0">';
                        echo '<h4 class="m-0 text-uppercase font-weight-bold">Categories</h4>';
                        echo '<span class="text-uppercase font-weight-medium">Total: '. count($categories). ' </span>';
                        echo '</div>';

                        // Items
                        echo '<div class="bg-white border border-top-0 p-3">';
                        if (!empty($categories)) {
                            foreach ($categories as $category) {                                
                                echo '<a href="'. esc_url( get_category_link( $category->term_id ) ). '" class="btn btn-outline-secondary d-flex justify-content-between w-100 my-3 p-2">';
                                echo '<span class="text-uppercase font-weight-bold m-0">'. esc_html($category->name). '</span>';
                                echo '<span class="font-weight-medium m-0">('. esc_html($category->count). ')</span>';
                                echo '</a>';
                            }
                        }
                        else {
                            echo '<div class="bg-white border border-top-0 p-4">';
                            echo '<p class="m-0 text-uppercase font-weight-bold">No items to display </p>';
                            echo '</div>';
                        }
                        echo '</div>';
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
