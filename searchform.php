<?php
/**
 * Doot Search Form 
 * Call: get_search_form();
 */
?>

<form role="search" class="form-inline mt-2 mt-lg-0" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group ml-lg-auto" style="width: 100%; max-width: 300px;">                    
        <input type="text" class="form-control border-0" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr_e( 'Search', 'doot' ); ?>">
        <div class="input-group-append">
            <button type="submit" class="input-group-text bg-primary text-dark border-0 px-3" aria-labelledby="Search"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>