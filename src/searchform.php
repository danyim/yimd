<form role="search" method="get" class="form-inline search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="form-row align-items-center">
    <div class="col-auto">  
      <input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search for posts', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </div>
    <div class="col-auto">  
      <button type="submit" class="btn btn-default search-submit"><?php echo esc_attr_x( 'Search', 'submit button' ) ?></button>
    </div>
  </div> 
</form>
