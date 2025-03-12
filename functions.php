<?php
/**
 * laddo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package laddo
 */
if ( ! function_exists( 'laddo_setup' ) ) {

	/**
     * Sets up theme defaults and register support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post-thumbnails.
     */
    function laddo_setup(): void {

        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gull, use a find and replace
		 * to change 'gull' to the name of your theme in all the template files.
		 */
        load_theme_textdomain( 'laddo', get_template_directory() . '/languages/' );

        if ( function_exists( 'add_theme_support' ) ) {

            add_theme_support( 'automatic-feed-links' );
            add_theme_support( 'revisions' );

            // Enable excerpt support for page
            add_post_type_support( 'page', 'excerpt' );

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support( 'title-tag' );

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support( 'post-thumbnails' );
            add_theme_support( 'post-formats', array( 'gallery', 'video', 'quote', 'audio', 'link' ) );

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support( 'html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ) );

            add_theme_support( 'align-wide' );
            add_theme_support( 'editor-styles' );
            add_editor_style( 'style-editor.css' );
            add_theme_support( 'responsive-embeds' );
            add_theme_support( 'wp-block-styles' );
        }


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'main_menu' => esc_html__( 'Main Menu', 'laddo' ),
            )
        );

        // This variable is intended to be overruled from themes.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters( 'laddo_content_width', 1320 );

    }
}

add_action( 'after_setup_theme', 'laddo_setup' );

/**
 * Constants
 * Defining default asset paths
 */
define( 'laddo_ROOT_DIR', get_template_directory() );
define( 'laddo_DIR_CSS', get_template_directory_uri() . '/assets/css' );
define( 'laddo_DIR_JS', get_template_directory_uri() . '/assets/js' );
define( 'laddo_DIR_VEND', get_template_directory_uri() . '/assets/vendors' );
define( 'laddo_DIR_IMG', get_template_directory_uri() . '/assets/img' );
define( 'laddo_DIR_FONT', get_template_directory_uri() . '/assets/fonts' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/classes/Init.php';
new \laddo\inc\classes\Init();

