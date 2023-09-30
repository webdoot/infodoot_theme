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
                    <div class="bg-white border border-top-0 p-4">

                        <div class="row">
                            <div class="col-md-2 text-center">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($post, 'thumbnail'); ?>" alt="logo" width="80" height="80">
                            </div>
                            <div class="col-md-8">
                                <h1 class="h4 mt-md-2 mt-3 text-secondary text-uppercase font-weight-bold"><?php echo max_len(get_the_title(), 40); ?> <span class="ml-2 text-muted font-weight-normal"> <?php echo end(get_field('versions'))["text"]; ?> </span> </h1>

                                <a class="h5 mt-2" href="<?php echo get_field('company_url'); ?>" style="color:#0059b3"><?php echo get_field('company'); ?> </a> 
                                <span class="h5 text-uppercase mt-2 mr-3"> (<?php echo get_field('licence'); ?>) </span>
                                <?php
                                    $categories = get_the_terms(get_the_ID(), 'software-category');
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            echo '<a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 my-1 mr-2" href="'. esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-success my-3" href="<?php echo end(get_field('versions'))["url"]; ?>"> Download for Window </a>
                            </div>
                        </div>
                        <hr> 
                        <h4 class="mt-4 mb-3">Description:</h4>
                        <?php the_content(); ?>
                        
                        <br> <hr> 

                        <h4 class="mt-4 mb-3">Technical:</h4>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped text-secondary">                          
                                    <tbody>
                                        <tr>
                                            <th>Title</th>
                                            <td><?php echo get_the_title(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Company</th>
                                            <td><?php echo get_field('company'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>License</th>
                                            <td><?php echo get_field('licence'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Language</th>
                                            <td><?php echo get_field('language'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Available languages</th>
                                            <td>
                                                <?php 
                                                $langs = get_field('language_avl');
                                                if ($langs) {
                                                    foreach ($langs as $key => $value) {
                                                        if ($key==0) {
                                                            echo $value ;
                                                        }
                                                        else {
                                                            echo ', '. $value ;
                                                        }
                                                    }                                            
                                                } 
                                                ?>                                        
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Requirements</th>
                                            <td>
                                                <?php 
                                                $platforms = get_field('requirements');
                                                if ($platforms) {
                                                    foreach ($platforms as $key => $value) {
                                                        if ($key==0) {
                                                            echo $value ;
                                                        }
                                                        else {
                                                            echo ', '. $value ;
                                                        }
                                                    }                                            
                                                } 
                                                ?>                                        
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Latest update</th>
                                            <td><?php echo get_field('update'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br> <hr> 
                        <h4 class="mt-4 mb-3">Screenshots:</h4>
                        <div class="row">
                        <?php 
                            $screenshots = get_field('screenshots');
                            if ($screenshots) {
                                foreach ($screenshots as $value) {
                                    echo '<div class="col-md-4"> <img src="'. $value. '" class="img-fluid" alt="screenshot"> </div>';
                                }                                            
                            } 
                        ?>  
                        </div>

                        <br> <hr> 
                        <h4 class="mt-4 mb-3">Older Versions:</h4>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered text-secondary">
                                <?php 
                                    $versions = get_field('versions');
                                    if ($versions) {
                                        foreach (array_reverse($versions) as $value) {
                                            echo '<tr>';
                                            echo '<td>'. get_the_title(). ' '. $value['text']. '</td>';
                                            echo '<td> <a class="text-success my-3" href="'. $value["url"]. '"> Download </a> </td>';
                                            echo '</tr>';
                                        }                                            
                                    } 
                                ?>
                                </table>  
                            </div>
                        </div>
                        
                        <br>
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
                    get_sidebar('software');
                ?> 
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<?php 
	get_footer(); 
?>
