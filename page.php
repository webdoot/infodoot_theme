<?php 
	get_header();
?>

<!-- Single Post With Sidebar Start -->
<div class="container-fluid mt-4 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

            	<?php 
                    if (have_posts()) {
                		while ( have_posts() ) { 
                			the_post();
            	?>    

                    <!-- Single Post Start -->
                    <div class="position-relative mb-3" id="post-<?php the_ID(); ?>" style="border-top: 5px solid #fc0">
                        <div class="bg-white border border-top-0 p-4">                            
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>                        
                    </div>
                    <!-- Single Post End --> 
                    
                    <?php } ?>

                <?php } else { ?>
                    <div class="col-12">
                        <div class="bg-white border border-top-0 p-4">
                            <p class="m-0 text-uppercase font-weight-bold">No items to display </p>
                        </div>
                    </div>
                <?php } ?>

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
