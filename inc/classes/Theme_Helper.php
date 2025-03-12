<?php
/**
 * laddo theme helper functions and resources
 */

class laddo_Theme_Helper {

	/**
	 * Hold an instance of laddo_Theme_Helper_Class class.
	 * @var laddo_Theme_Helper
	 */
	protected static $instance = null;


	public function __construct() {

		// Custom Line Awesome Icons for CSF
		add_filter( 'csf_field_icon_add_icons', [ $this, 'csf_custom_icons' ] );

	}

	/**
	 * Main laddo_Theme_Helper_Class instance.
	 * @return laddo_Theme_Helper - Main instance.
	 */
	public static function instance() {

		if ( null == self::$instance ) {
			self::$instance = new laddo_Theme_Helper();
		}

		return self::$instance;
	}
    
    
	/**
	 * Display website logo with sticky and retina support.
	 */
	public function logo(): void {
		?>
        <a href="<?php echo esc_url(home_url('/')) ?>" class="navbar-brand logo">
			<?php
			$main_logo = laddo_setting_apply('main_logo');
			$main_retina_logo = laddo_setting_apply('main_retina_logo');
			$sticky_logo = laddo_setting_apply('sticky_logo');
			$sticky_retina_logo = laddo_setting_apply('sticky_retina_logo');

			$main_logo_url = !empty($main_logo['url']) ? $main_logo['url'] : '';
			$main_retina_url = !empty($main_retina_logo['url']) ? $main_retina_logo['url'] : '';
			$sticky_logo_url = !empty($sticky_logo['url']) ? $sticky_logo['url'] : '';
			$sticky_retina_url = !empty($sticky_retina_logo['url']) ? $sticky_retina_logo['url'] : '';

			$main_retina_srcset = !empty($main_retina_url) ? "srcset='$main_retina_url 2x'" : '';
			$sticky_retina_srcset = !empty($sticky_retina_url) ? "srcset='$sticky_retina_url 2x'" : '';

			if ($main_logo_url) { ?>
                <img class="logo__img" src="<?php echo esc_url($main_logo_url) ?>" alt="<?php bloginfo('name') ?>" <?php echo laddo_kses_post($main_retina_srcset) ?>>
                <img class="logo__img logo__sticky" src="<?php echo esc_url($sticky_logo_url) ?>" alt="<?php bloginfo('name') ?>" <?php echo laddo_kses_post($sticky_retina_srcset) ?>>
			    <?php
            } else { ?>
                <h3 class="text_logo"><?php echo get_bloginfo('name') ?></h3>
			    <?php
            }
            ?>
        </a>
		<?php
	}


	/**
	 * Social Links
	 **/
	function social_links() {

		if ( laddo_opt( 'facebook' ) ) { ?>
            <li><a href="<?php echo esc_url( laddo_opt( 'facebook' ) ) ?>"><i class="fab fa-facebook-f"></i></a></li>
			<?php
		}
		if ( laddo_opt( 'twitter' ) ) { ?>
            <li><a href="<?php echo esc_url( laddo_opt( 'twitter' ) ); ?>"><i class="fab fa-twitter"></i></a></li>
			<?php
		}
		if ( laddo_opt( 'instagram' ) ) { ?>
            <li><a href="<?php echo esc_url( laddo_opt( 'instagram' ) ); ?>"><i class="fab fa-instagram"></i></a></li>
			<?php
		}
		if ( laddo_opt( 'linkedin' ) ) { ?>
            <li><a href="<?php echo esc_url( laddo_opt( 'linkedin' ) ); ?>"><i class="fab fa-linkedin-in"></i></a></li>
			<?php
		}
	}

	/**
	 * Pagination
	 **/
	function pagination(): void {
		the_posts_pagination( array(
			'screen_reader_text' => ' ',
			'prev_text'          => '<i class="fa-solid fa-arrow-left fa-fw"></i>',
			'next_text'          => '<i class="fa-solid fa-arrow-right fa-fw"></i>'
		) );
	}

	/**
	 * Day link to archive page
	 **/
	function get_the_day_link(): string {
		$archive_year  = get_the_time( 'Y' );
		$archive_month = get_the_time( 'm' );
		$archive_day   = get_the_time( 'd' );

		return get_day_link( $archive_year, $archive_month, $archive_day );
	}

	/**
	 * estimated reading time
	 **/
	function the_reading_time( $words_per_minute = 200 ): string {

		$content      = get_post_field( 'post_content', get_the_ID() );
		$word_count   = str_word_count( wp_strip_all_tags( $content ) );
		$reading_time = ceil( $word_count / $words_per_minute );
		$timer        = _n( 'minute', 'minutes', $reading_time, 'spider-elements' );

		return sprintf( '%d %s', $reading_time, $timer );
	}

	/**
	 * Post's excerpt text
	 *
	 * @param string $settings_key
	 * @param bool $echo
	 *
	 * @return string
	 **/
	function get_the_excerpt( string $settings_key = '', bool $echo = true ): string {

        $excerpt_limit = laddo_opt( $settings_key, 40 );
		$post_excerpt  = get_the_excerpt();
		$excerpt       = ( strlen( trim( $post_excerpt ) ) != 0 ) ? wp_trim_words( get_the_excerpt(), $excerpt_limit, '' ) : wp_trim_words( get_the_content(), $excerpt_limit, '' );

        return wp_kses_post( wpautop( $excerpt ) );
	}

	/**
	 * Post-author avatar
	 **/
	function post_author_avatar( $size = 50, $attr = '' ): void {
		$post_author_id = get_post_field( 'post_author', get_the_ID() );
		echo get_avatar( $post_author_id, $size, '', '', '' );
	}


	// Get comment count text

	/**
	 * Get the first category name
	 *
	 * @param string $term
	 */
	function first_taxonomy( string $term = 'category' ): string {
		$cats = get_the_terms( get_the_ID(), $term );
		return is_array( $cats ) ? $cats[0]->name : '';
	}

	/**
	 * Get the first category link
	 *
	 * @param string $term
	 */
	function first_taxonomy_link( string $term = 'category' ): string {
		$cats = get_the_terms( get_the_ID(), $term );

		return is_array( $cats ) ? get_category_link( $cats[0]->term_id ) : '';
	}


	// Banner Subtitle

	/**
	 * Limit latter
	 *
	 * @param $string
	 * @param $limit_length
	 * @param string $suffix
	 */
	function limit_latter( $string, $limit_length, string $suffix = '...' ): void {
		if ( strlen( $string ) > $limit_length ) {
			echo strip_shortcodes( substr( $string, 0, $limit_length ) . $suffix );
		} else {
			echo strip_shortcodes( esc_html( $string ) );
		}
	}

	function comment_count( $post_id ) {
		$comments_number = get_comments_number( $post_id );
		if ( $comments_number == 0 ) {
			$comment_text = esc_html__( 'No Comment', 'laddo' );
		} elseif ( $comments_number == 1 ) {
			$comment_text = esc_html__( '1 Comment', 'laddo' );
		} elseif ( $comments_number > 1 ) {
			$comment_text = $comments_number . esc_html__( ' Comments', 'laddo' );
		}
		echo esc_html( $comment_text );
	}

	/**
	 * Retrieve a specific HTML tag content from loaded content.
	 *
	 * @param string $tag - HTML tag to extract.
	 * @param string $html - HTML content.
	 */
	function get_html_tag( string $tag = 'blockquote', string $html = ''): void {
		$dom = new \DOMDocument();

		// Handle errors internally
		libxml_use_internal_errors(true);

		$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
		$divs = $dom->getElementsByTagName($tag);

		// Clear errors
		libxml_clear_errors();

		$i = 0;
		foreach ($divs as $div) {
			if ($i === 1) {
				break;
			}
			echo "<h4 class='c_head'>{$div->nodeValue}</h4>";
			$i++;
		}
	}

	function social_share() {
		?>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i
                    class="lab la-facebook-f"></i></a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i
                    class="lab la-linkedin-in"></i></a>
        <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>"><i class="lab la-pinterest"></i></a>
        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="lab la-twitter"></i></a>
		<?php
	}

	function get_all_posts($post_type = 'post'): array {

		$query_post = get_posts([
			'posts_per_page' => -1,
			'post_type' => $post_type,
			'orderby' => 'name',
			'order' => 'ASC'
		]);

		$post_titles = ['' => esc_html__('None', 'laddo')];
		foreach ($query_post as $value) {
			$post_titles[$value->ID] = $value->post_title;
		}
		return $post_titles;

	}

	/**
	 * Custom Line Awesome Icons for CSF
	 *
	 * @param array $icons
	 *
	 * @return array
	 */
	function csf_custom_icons( array $icons = [] ): array {

		$icons[] = array(
			'title' => esc_html__('Elegant Icons', 'laddo'),
			'icons' => array(
				'social_twitter',
				'social_facebook',
				'social_pinterest',
				'social_linkedin',
				'social_instagram',
				'social_dribbble',
				'social_wordpress',
			)
		);

		// Move custom icons to the top of the list.
		return array_reverse( $icons );
	}


}


/**
 * Instance of laddo_Theme_Helper class
 */
function laddo_Theme_Helper() {
	return laddo_Theme_Helper::instance();
}