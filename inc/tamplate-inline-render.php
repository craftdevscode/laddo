<?php
/**
 * Inline Style
 */
$dynamic_css = '';

//Page Meta Options
/*$meta = get_post_meta( get_the_ID(), 'banner_bg_img', true );
$banner_bg_img = !empty($meta['banner_bg_img']) ? $meta['banner_bg_img'] : '';

if ( !empty($banner_bg_img) ) {
	$dynamic_css .= '
		.banner-blog-area { 
			background-image: url('.esc_url($banner_bg_img).'); 
		}
    ';
}*/

wp_add_inline_style('laddo-root', $dynamic_css);