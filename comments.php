<?php
	if ( post_password_required() ) {
		return;
	}
?>

<!-- Comment List Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold"><?php echo get_comments_number(); ?> Comments</h4>
    </div>
    <div class="bg-white border border-top-0 p-4">
    	<?php 
	    	if ( have_comments() ) { 	
	    		$args = array(
				    'parent' => 0, // Retrieve comments without any parent (replies)
				    'status' => 'approve', // Retrieve only approved comments
				);    		
	    		foreach (get_comments($args) as $comment) {		    			
			        // Comment content
			        doot_comment($comment);			        				    
			    }
			}
    	?>
    </div>
</div>
<!-- Comment List End -->

<!-- Comment Form Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
    </div>
    
    <?php
		doot_comment_form();
	?>    
</div>
<!-- Comment Form End -->
