<?php
add_filter('get_search_form', function($form) {

	$value = get_search_query() ? get_search_query() : '';
	return '<form action="' . esc_url(home_url("/")) . '" class="search-form input-group">
	            <input type="search" name="s" class="form-control" placeholder="' . esc_attr__( 'Search', 'laddo' ) . '" value="' . esc_attr($value) . '">
	            <span class="input-group-addon"><button type="submit"><i class="icon_search"></i></button></span>
	         </form>';

});