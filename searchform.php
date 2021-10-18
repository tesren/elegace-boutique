<form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url( '/' ); ?>">

    <div class="row">

        <div class="form-floating col-9 ps-0">
            <input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" />
            <label for="s" class="secondary-text"> <i class="fas fa-search"></i> Buscar</label>
            <input type="hidden" name="post_type[]" value="accessories"/>
            <input type="hidden" name="post_type[]" value="clothes"/>
            <input type="hidden" name="post_type[]" value="shoes"/>
            <input type="hidden" name="post_type[]" value="bikinis"/>
        </div>

        <input class="btn btn-outline-secondary col-3 px-0" type="submit" id="searchsubmit" value="Buscar" />

    </div>
  
</form>