<form role="search" method="get" id="searchform" class="search-form ms-3 me-3 ms-lg-0 me-lg-3" action="<?php echo home_url( '/' ); ?>">
    <div class="form-floating">
        <input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" />
        <label for="s" class="secondary-text"> <i class="fas fa-search"></i> Buscar</label>
        <input type="hidden" name="post_type[]" value="accessories"/>
        <input type="hidden" name="post_type[]" value="clothes"/>
        <input type="hidden" name="post_type[]" value="shoes"/>
        <input type="hidden" name="post_type[]" value="bikinis"/>
        
    </div>
    <!-- <input type="submit" id="searchsubmit" value="Search" /> -->
</form>