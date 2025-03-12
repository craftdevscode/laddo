<?php
namespace laddo\inc\classes;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @class        Laddo_Enqueue_Scripts
 * @category     Class
 * @author       SpiderThemes
 */
class Assets {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
	}

	public function frontend_scripts(): void {

		/*=======================
		Enqueue CSS style's
		========================*/
		$animation_handlers = [
			'e-animations',
			'e-animation-fadeIn',
			'e-animation-fadeInUp',
			'e-animation-fadeInRight',
			'e-animation-fadeInDown',
			'e-animation-fadeInLeft',
			'e-animation-zoomIn',
		];

		// Deregister all styles for the handlers
		foreach ($animation_handlers as $handler) {
			wp_deregister_style($handler);
		}

		// Enqueue all handlers pointing to the same file
		foreach ($animation_handlers as $handler) {
		 	wp_enqueue_style($handler, BIOPRESS_DIR_VEND . '/animation/animate.css', [], $this->get_theme_version() );
		}

		wp_enqueue_style( 'laddo-fonts', $this->laddo_fonts_url(), [], null );
		wp_enqueue_style( 'bootstrap', BIOPRESS_DIR_VEND . '/bootstrap/bootstrap.min.css', [], '5.3.3' );
		wp_enqueue_style( 'fontawesome', BIOPRESS_DIR_VEND . '/font-awesome/style.css', [], '6.6.0' );
		wp_enqueue_style( 'magnific-popup', BIOPRESS_DIR_VEND . '/magnific-popup/magnific-popup.min.css', [], $this->get_theme_version() );
		wp_enqueue_style( 'simplebar', BIOPRESS_DIR_VEND . '/scrollbar/css/simplebar.min.css', [], $this->get_theme_version() );
		wp_enqueue_style( 'swiper', BIOPRESS_DIR_VEND . '/swiper/swiper.min.css', [], $this->get_theme_version() );
		wp_enqueue_style( 'laddo-main', BIOPRESS_DIR_CSS . '/main.css', [], $this->get_theme_version() );
		wp_enqueue_style( 'laddo-wp-custom', BIOPRESS_DIR_CSS . '/wp-custom.css', [], $this->get_theme_version() );
		wp_enqueue_style( 'laddo-root', get_stylesheet_uri(), [], $this->get_theme_version() );


		/*=======================
		Enqueue JS scripts
		========================*/
		wp_enqueue_script( 'bootstrap', BIOPRESS_DIR_VEND . '/bootstrap/bootstrap.min.js', ['jquery'], '5.3.3', ['strategy' => 'defer'] );
		wp_enqueue_script( 'gsap', BIOPRESS_DIR_VEND . '/gsap/gsap.min.js', ['jquery'], '3.12.0', ['strategy' => 'defer'] );
		wp_enqueue_script( 'ScrollTrigger', BIOPRESS_DIR_VEND . '/gsap/ScrollTrigger.min.js', ['jquery'], '3.12.2', ['strategy' => 'defer'] );
		wp_enqueue_script( 'SplitText', BIOPRESS_DIR_VEND . '/gsap/SplitText.min.js', ['jquery'], '3.6.1', ['strategy' => 'defer'] );
		wp_enqueue_script( 'magnific-popup', BIOPRESS_DIR_VEND . '/magnific-popup/magnific-popup.min.js', ['jquery'], '1.1.0', ['strategy' => 'defer'] );
		wp_enqueue_script( 'simplebar', BIOPRESS_DIR_VEND . '/scrollbar/js/simplebar.min.js', ['jquery'], '5.3.6', ['strategy' => 'defer'] );
		wp_enqueue_script( 'SmoothScroll', BIOPRESS_DIR_VEND . '/scrollbar/js/SmoothScroll.js', ['jquery'], '1.4.10', ['strategy' => 'defer'] );
		wp_enqueue_script( 'swiper', BIOPRESS_DIR_VEND . '/swiper/swiper.min.js', ['jquery'], '11.1.1', ['strategy' => 'defer'] );

		wp_enqueue_script( 'laddo-scripts', BIOPRESS_DIR_JS . '/scripts.js', ['jquery'], '', true );

		$dynamic_css = '';

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_add_inline_style( 'laddo-root', $dynamic_css );
	}

	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function laddo_fonts_url(): string {
		$fonts_url = '';
		$fonts     = [];
		$subsets   = '';

		/* Inter font */
		if ( 'off' !== 'on' ) {
			$fonts[] = "Inter:400,900";
		}

        /* Unbounded font */
		if ( 'off' !== 'on' ) {
			$fonts[] = "Unbounded:900";
		}

		$is_ssl = is_ssl() ? 'https' : 'http';

		if ( $fonts ) {
			$fonts_url = add_query_arg( [
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			], "$is_ssl://fonts.googleapis.com/css" );
		}

		return $fonts_url;
	}

	/**
	 * Get theme current version
	 * @return array|false|string
	 */
	public function get_theme_version(): bool|array|string {
		$theme = wp_get_theme();

		return $theme->get( 'Version' );
	}


	/**
	 * Admin Enqueue Scripts
	 * @return void
	 */
	public function admin_scripts(): void {

		/*=======================
		Enqueued CSS style's
		========================*/
		wp_enqueue_style( 'laddo-admin', BIOPRESS_DIR_CSS . '/admin.css', [], $this->get_theme_version() );

		wp_enqueue_script('laddo-admin', BIOPRESS_DIR_JS . '/admin.js', [], $this->get_theme_version() );

	}

}