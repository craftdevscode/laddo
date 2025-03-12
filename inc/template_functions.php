<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some functionality here could be replaced by core features.
 *
 * @package laddo
 */
//Add Image Size
add_image_size( 'laddo_1300X700', 1300, 700, true ); // Service Post Image
add_image_size('laddo_848x594', 848, 594, true ); // Blog Featured Image Size


/**
 * @param string $content Text content to filter.
 *
 * @return string Filtered content containing only the allowed HTML.
 * */
if ( ! function_exists( 'laddo_kses_post' ) ) {
	function laddo_kses_post( $content ): string
    {
		$allowed_tag = array(
			'strong' => [],
			'br'     => [],
			'p'      => [
				'class' => [],
				'style' => [],
			],
			'i'      => [
				'class' => [],
				'style' => [],
			],
			'ul'     => [
				'class' => [],
				'style' => [],
			],
			'li'     => [
				'class' => [],
				'style' => [],
			],
			'span'   => [
				'class' => [],
				'style' => [],
			],
			'a'      => [
				'href'  => [],
				'class' => [],
				'title' => []
			],
			'div'    => [
				'class' => [],
				'style' => [],
			],
			'h1'     => [
				'class' => [],
				'style' => []
			],
			'h2'     => [
				'class' => [],
				'style' => []
			],
			'h3'     => [
				'class' => [],
				'style' => []
			],
			'h4'     => [
				'class' => [],
				'style' => []
			],
			'h5'     => [
				'class' => [],
				'style' => []
			],
			'h6'     => [
				'class' => [],
				'style' => []
			],
			'img'    => [
				'class'  => [],
				'style'  => [],
				'height' => [],
				'width'  => [],
				'src'    => [],
				'srcset' => [],
				'alt'    => [],
			],

		);

		return wp_kses( $content, $allowed_tag );
	}
}

/**
 * Get laddo Banner
 * @return void @style
 * @package Banner
 */
function laddo_banner(): void {

	if ( is_singular( ['post', 'portfolio', 'service', 'team'] ) ) {
		get_template_part( 'template-parts/header-elements/banner-single' );
	} else {
		get_template_part( 'template-parts/header-elements/banner' );
	}

}


/**
 * Get post-meta value or theme option value.
 *
 * This function first attempts to retrieve a post-meta value. If the post meta
 * is not set or is empty, it falls back to the theme option value.
 *
 * @param string $setting_id The meta key or theme option key to retrieve.
 * @param string|null $default The default value to return if both meta and option are not set.
 *
 * @return mixed The post meta value, theme option value, or default value.
 */
function laddo_setting_apply( string $setting_id, null|string $default = '' ): mixed {

	$meta_value = laddo_meta( $setting_id, $default );
	$meta_value = $meta_value ?? laddo_opt( $setting_id, $default );

	if ( isset($meta_value) && $meta_value == '' ) {
		$meta_value = laddo_opt( $setting_id, $default );
	}

	return $meta_value;
}


function laddo_meta( $meta_id = '', $default = null ) {

	$meta_value = get_post_meta( get_the_ID(), $meta_id, true );
	return ! empty( $meta_value ) ? $meta_value : $default;

}

/**
 * @param $section_id
 * @param $default
 *
 * @return mixed|void
 * Get Customizer
 */
if ( ! function_exists( 'laddo_opt' ) ) {
	function laddo_opt( $field_id = '', $default = null ) {
		$options = get_option( 'laddo_opt' ); // Attention: Set your unique id of the framework
		return ( isset($options[$field_id]) ) ? $options[$field_id] : $default;
	}
}


/**
 * @param string $page_title_name
 * Get Page Title for demo config
 *
 * @return int|string|void
 */
function laddo_get_page_title( $post_type= 'page', string $page_title_name = '' ) {
	$args = array(
		'post_type'      => $post_type,
		'posts_per_page' => - 1,
		'post_status'    => 'publish'
	);

	$pages = get_posts( $args );

	if ( ! empty( $pages ) ) {
		$title_name_id = '';
		foreach ( $pages as $page ) {
			if ( $page->post_title == $page_title_name ) {
				$title_name_id = $page->ID;
			}
		}

		return $title_name_id;
	}
}


function laddo_breadcrumbs( $class = ''): void {

	// Settings
	$separator	         = '|';
	$breadcrums_id	     = 'breadcrumbs';
	$breadcrums_class	 = 'breadcrumb ' . $class;
	$home_title          = esc_html__('Home',  'laddo' );

	// Get the query & post information
	global $post;

	// Do not display on the homepage
	if ( !is_front_page() && !is_home() && !is_search() ) {

		// Build the breadcrums
		echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '" data-wow-delay="0.3s">';

		// Home page
		echo '<li class="item item-home"><a class="breadcrumb-link breadcrumb-home" href="' . esc_url(get_home_url()) . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		if ( is_author() ) {
			echo '<li class="item item-current item-archive"><span class="breadcrumb-current breadcrumb-archive">' . get_the_author_meta('display_name') . '</span></li>';
		} elseif (class_exists('WooCommerce') && is_product()) {
			echo '<li class="item item-current item-archive"><span class="breadcrumb-current breadcrumb-archive">' . get_the_title('') . '</span></li>';
		} elseif (class_exists('WooCommerce') && is_woocommerce()) {
			echo '<li class="item item-current item-archive"><span class="breadcrumb-current breadcrumb-archive">' . woocommerce_page_title('') . '</span></li>';
		} elseif (class_exists( 'bbPress' ) && is_bbpress() ) {
			echo '<li class="item item-current item-archive"><span class="breadcrumb-current breadcrumb-archive">' . get_the_title() . '</span></li>';
		} elseif ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

			echo '<li class="item item-current item-archive"><span class="breadcrumb-current breadcrumb-archive">' . get_the_archive_title() . '</span></li>';

		} else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post-type display name and link
			if($post_type != 'post') {

				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);

				echo '<li class="item item-cat item-custom-post-type-' . $post_type . '"><a class="breadcrumb-cat breadcrumb-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

			}

			$custom_tax_name = get_queried_object()->name;
			echo '<li class="item item-current item-archive"><span class="breadcrumb-current breadcrumb-archive">' . $custom_tax_name . '</span></li>';

		} else if ( is_single() ) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if($post_type != 'post') {

				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);

				echo '<li class="item item-cat item-custom-post-type-' . $post_type . '"><a class="breadcrumb-cat cpt-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

			}

			// Get post-category info
			$category = get_the_category();

			if(!empty($category)) {

				// Get last category post is in
				$all_category = array_values($category);
				$last_category = end($all_category);

				// Get parent any categories and create array
				$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
				$cat_parents = explode(',',$get_cat_parents);

				// Loop through parent categories and store in variable $cat_display
				$cat_display    = '';
				foreach($cat_parents as $parents) {
					$cat_display .= $parents;
				}

			}

			// Check if the post is in a category
			if(!empty( $last_category ) ) {
				echo  '<li class="item item-cat"> ' . $cat_display . ' </li>';
				echo '<li class="item item-current item-' . $post->ID . '"><span class="breadcrumb-current breadcrumb-' . $post->ID . '" title="' . get_the_title() . '">'. wp_trim_words( get_the_title(), 99, '...' ) .'</span></li>';

				// Else if post is in a custom taxonomy
			} else if(!empty($cat_id)) {

				echo '<li class="item item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="breadcrumb-cat breadcrumb-cat-' . $cat_id . ' breadcrumb-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
				echo '<li class="item item-current item-' . $post->ID . ' active">' . get_the_title() . '</li>';

			} else {

				echo '<li class="item item-current item-' . $post->ID . ' active">' . get_the_title() . '</li>';

			}

		} else if ( is_category() ) {

			// Category page
			echo '<li class="item item-current item-cat"><span class="breadcrumb-current breadcrumb-cat">' . single_cat_title('', false) . '</span></li>';

		} else if ( is_home() ) {
			echo '<li class="item active item-cat"><span class="breadcrumb-current breadcrumb-cat">' . wp_title('', false) . '</span></li>';

		} else if ( is_page() ) {

			// Standard page
			if( $post->post_parent ){

				// If child page, get parents
				$anc = get_post_ancestors( $post->ID );

				// Get parents in the right order
				$anc = array_reverse($anc);
				$parents = '';
				// Parent page loop
				foreach ( $anc as $ancestor ) {
					$parents .= $ancestor;
					echo '<li class="item item-parent item-parent-' . $ancestor . '"><a class="breadcrumb-parent breadcrumb-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
				}

				// Current page
				echo '<li class="item item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';

			} else {

				// Just display current page if not parents
				echo '<li class="item item-current item-' . $post->ID . '"><span class="breadcrumb-current breadcrumb-' . $post->ID . '"> ' . get_the_title() . '</span></li>';

			}

		} else if ( is_tag() ) {

			// Tag page

			// Get tag information
			$term_id	 = get_query_var('tag_id');
			$taxonomy	 = 'post_tag';
			$args	 = 'include=' . $term_id;
			$terms	 = get_terms( $taxonomy, $args );
			$get_term_id	 = $terms[0]->term_id;
			$get_term_slug	 = $terms[0]->slug;
			$get_term_name	 = $terms[0]->name;

			// Display the tag name
			echo '<li class="item item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="breadcrumb-current breadcrumb-tag-' . $get_term_id . ' breadcrumb-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';

		} elseif ( is_day() ) {

			// Day archive

			// Year link
			echo '<li class="item item-year item-year-' . get_the_time('Y') . '"><a class="breadcrumb-year breadcrumb-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'laddo') .'</a></li>';
			echo '<li class="item separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

			// Month link
			echo '<li class="item item-month item-month-' . get_the_time('m') . '"><a class="breadcrumb-month breadcrumb-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives', 'laddo') .'</a></li>';
			echo '<li class="item separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

			// Day display
			echo '<li class="item item-current item-' . get_the_time('j') . '"><span class="breadcrumb-current breadcrumb-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . esc_html__(' Archives', 'laddo') .'</span></li>';

		} else if ( is_month() ) {

			// Month Archive

			// Year link
			echo '<li class="item item-year item-year-' . get_the_time('Y') . '"><a class="breadcrumb-year breadcrumb-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'laddo') .' </a></li>';
			echo '<li class="item separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

			// Month display
			echo '<li class="item item-month item-month-' . get_the_time('m') . '"><span class="breadcrumb-month breadcrumb-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives', 'laddo') .' </span></li>';

		} else if ( is_year() ) {

			// Display year archive
			echo '<li class="item item-current item-current-' . get_the_time('Y') . '"><span class="breadcrumb-current breadcrumb-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'laddo').' </span></li>';

		} else if ( is_author() ) {

			// Auhor archive

			// Get the author information
			global $author;
			$userdata = get_userdata( $author );

			// Display author name
			echo '<li class="item item-current item-current-' . $userdata->user_nicename . '"><span class="breadcrumb-current breadcrumb-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . esc_html__( 'Author: ', 'laddo' ) . $userdata->display_name . '</span></li>';

		} else if ( get_query_var('paged') ) {

			// Paginated archives
			echo '<li class="item item-current item-current-' . get_query_var('paged') . '"><span class="breadcrumb-current breadcrumb-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page', 'laddo' ) . ' ' . get_query_var('paged') . '</span></li>';

		} elseif ( is_404() ) {

			// 404 page
			echo '<li>'. esc_html__('404 Error', 'laddo') .'</li>';
		}

		echo '</ul>';

	}

}