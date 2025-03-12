<?php
namespace laddo\inc\classes;

class Filters {

	public function __construct() {

		// Filter to allow SVG uploads by adding the MIME type.
		add_filter('upload_mimes', [$this, 'svg_mime_types']);

		// Adds extra classes to post classes based on certain conditions.
		add_filter('post_class', [$this, 'post_class']);

		// Disables automatic paragraph tags in Contact Form 7 output.
		add_filter('wpcf7_autop_or_not', [$this, 'contact_form_7']);

		// Modifies archive links to style the count differently.
		add_filter('get_archives_link', [$this, 'sidebar_archive_link']);

		// Modifies category list links to style the count differently.
		add_filter('wp_list_categories', [$this, 'sidebar_list_categories']);

		// Reorders fields in the comment form to move the comment field to the end.
		add_filter('comment_form_fields', [$this, 'comment_form_fields']);

		// Customizes the class name for comment reply links.
		add_filter('comment_reply_link', [$this, 'comment_reply_link']);

		// Adds a ping back URL to the header if pings are enabled.
		add_action('wp_head', [$this, 'ping_back_header']);

		// Adds custom post-type support for Elementor after the theme is activated.
		add_action('after_switch_theme', [$this, 'add_cpt_support']);

		// Removes the admin bar bump CSS for better alignment with custom layouts.
		add_action('get_header', [$this, 'admin_bar_bump_cb']);

        add_action('widgets_init', [$this, 'widgets_init']);

	}

	/**
	 * Adds a custom class to the comment reply link.
	 * Replaces the default class with `comment_reply` for custom styling.
	 *
	 * @param string $class Original comment reply link class.
	 *
	 * @return array|string Updated class name for a comment reply link.
	 */
	public function comment_reply_link( string $class): array|string {
		return str_replace("class='comment-reply-link", "class='comment_reply", $class);
	}

	/**
	 * Reorders the comment form fields, moving the comment field to the end.
	 *
	 * @param array $fields The original comment form fields.
	 * @return array The reordered comment form fields.
	 */
	public function comment_form_fields(array $fields): array {
		$comment_field = $fields['comment'];
		unset($fields['comment']);
		$fields['comment'] = $comment_field;

		return $fields;
	}

	/**
	 * Removes the admin bar bump from the header.
	 * Useful for custom theme layouts where the admin bar disrupts the layout.
	 */
	public function admin_bar_bump_cb(): void {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}

	/**
	 * Customizes category list items in the sidebar by wrapping the count in a span.
	 * Modifies the category count display for styling purposes.
	 *
	 * @param array|string $links The original category list HTML links.
	 *
	 * @return array|string The modified category list HTML links.
	 */
	public function sidebar_list_categories( array|string $links): array|string {
		$links = str_replace('</a> (', '<span>(', $links);
		return str_replace(')', ')</span> </a>', $links);
	}

	/**
	 * Customizes archive links in the sidebar by wrapping the count in a span.
	 * Allows styling of archive post counts in sidebar lists.
	 *
	 * @param array|string $links The original archive links.
	 *
	 * @return array|string The modified archive links.
	 */
	public function sidebar_archive_link( array|string $links): array|string {
		$links = str_replace('</a>&nbsp;(', '<span>(', $links);
		return str_replace(')', ')</span> </a>', $links);
	}

	/**
	 * Disables the automatic paragraph (`<p>`) tags in Contact Form 7 output.
	 *
	 * @return bool Returns false to disable autop.
	 */
	public function contact_form_7(): bool {
		return false;
	}

	/**
	 * Adds support for Elementor custom post types if not already present.
	 * Useful after switching themes to ensure custom post types are recognized by Elementor.
	 */
	public function add_cpt_support(): void {
		$cpt_support = get_option('elementor_cpt_support');
		if (!$cpt_support) {
			$cpt_support = ['page', 'post'];
			update_option('elementor_cpt_support', $cpt_support);
		}
	}

	/**
	 * Adds a ping back URL header if pings are open on the current post.
	 * Adds a `<link>` tag in the header for supporting ping back URLs.
	 */
	public function ping_back_header(): void {
		if (is_singular() && pings_open()) {
			echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
		}
	}

	/**
	 * Adds classes to the post based on its properties.
	 * Adds `no-post-thumbnail` if no thumbnail exists and `sticky` if the post is sticky.
	 *
	 * @param array $classes The original post classes.
	 *
	 * @return array Modified post-classes.
	 */
	public function post_class( array $classes): array {
		if (!has_post_thumbnail()) {
			$classes[] = 'no-post-thumbnail';
		}
		if (is_sticky() && !in_array('sticky', $classes)) {
			$classes[] = 'sticky';
		}
		return $classes;
	}

	/**
	 * Adds SVG MIME type support for media uploads.
	 * Allows SVG files to be uploaded through the WordPress media library.
	 *
	 * @param array $mimes The existing allowed MIME types.
	 * @return array Modified array with an SVG MIME type.
	 */
	public function svg_mime_types(array $mimes): array {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

    public function widgets_init(): void
    {
        //=============================== Blog Sidebar Widgets ==========================//
        register_sidebar( array(
            'name'          => esc_html__( 'Primary Sidebar', 'laddo' ),
            'description'   => esc_html__( 'Place widgets in blog sidebar widgets area.', 'laddo' ),
            'id'            => 'sidebar_widgets',
            'before_widget' => '<div id="%1$s" class="widget sidebar_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="c_head">',
            'after_title'   => '</h3>'
        ) );

    }

}