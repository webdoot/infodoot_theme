<?php 
	get_header();
?>

<!-- Breaking News Start -->
<div class="container-fluid my-3 pt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title border-right-0 mb-0" style="width: 180px;">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                    </div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0" style="width: calc(100% - 180px); padding-right: 100px;">
                        <?php
                        // Get Previous & Next Post to Current Post
                            $previous_post = get_previous_post();
                            $next_post = get_next_post();

                            if ($previous_post) {
                                $previous_title = $previous_post->post_title;
                                $previous_url = get_permalink($previous_post);

                                echo '<div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="' . $previous_url . '">' . $previous_title . '</a></div>';
                            }

                            if ($next_post) {
                                $next_title = $next_post->post_title;
                                $next_url = get_permalink($next_post);

                                echo '<div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="' . $next_url . '">' . $next_title . '</a></div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->

<!-- Single Post With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

            	<?php 
                    if (have_posts()) {
                		while ( have_posts() ) { 
                			the_post();
            	?>    

                    <!-- Single Post Start -->
                    <div class="position-relative mb-3" id="post-<?php the_ID(); ?>">
                    	<?php if (has_post_thumbnail()) { ?>
    	                    <img class="img-fluid w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" style="object-fit: cover;">
    	                <?php } ?>
                        
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                            	<?php 
                            		$categories = get_the_category();
                            		if (!empty($categories)) {
    							        foreach ($categories as $category) {
    							            echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
    							        }
    							    }
                            	?>
                                <a class="text-body" href=""><?php echo get_the_date(); ?></a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <!-- Single Post End -->

                    <?php
    	                // If comments are open or we have at least one comment, load up the comment template.
    					if ( comments_open() || get_comments_number() ) {
    						comments_template();
    					}					
    				?>

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
