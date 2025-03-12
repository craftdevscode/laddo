<?php
namespace laddo\inc\classes;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * laddo Theme Autoload
 *
 * @class        laddo_Theme_Autoload
 * @category     Class
 * @author       SpiderThemes
 */
class Init {

    public function __construct() {

	    /**
	     * @dir-> Classes Dir
	     */
	    #Theme Enqueue Script
	    $this->enqueue_script();

        #Theme Helper Function's
        $this->theme_helper();

	    #Customize theme
	    $this->walker_comment();

	    #Filter Actions
	    $this->filter_action();

	    #Nav Walker Menu
	    $this->nav_walker_menu();

	    /**
	     * @dir-> inc
	     */
	    #Template Functions and Filter Actions
	    $this->helper_functions();

	    /**
	     * @dir-> inc/Admin/CSF
	     */
        #Theme option
        if ( class_exists( 'CSF' ) ) {
            $this->theme_option();
        }

	    /**
	     * @dir-> inc/TGM
	     */
        #TGM init
        $this->tgm_register();

	    /**
	     * @dir-> inc/demos
	     */
        #Demo Importer
        $this->demo_config();

    }


    /**
     * Enqueue Script
     * @return void
     * @access public
     */
    public function enqueue_script(): void {
        require_once laddo_ROOT_DIR . '/inc/classes/Assets.php';
        new Assets();
    }


    /**
     * Theme Helper Functions
     * @return void
     * @access public
     */
    public function theme_helper(): void {
        require_once laddo_ROOT_DIR . '/inc/classes/Theme_Helper.php';
    }

	/**
	 * Walker Comment
	 * @return void
	 * @access public
	 */
	public function walker_comment(): void {
		require_once laddo_ROOT_DIR . '/inc/classes/Walker_Comment.php';
	}

	/**
	 * Walker Comment
	 * @return void
	 * @access public
	 */
	public function filter_action(): void {
		require_once laddo_ROOT_DIR . '/inc/classes/Filters.php';
	}

    /**
     * Nav Walker Menu
     * @return void
     * @access public
     */
    public function nav_walker_menu(): void {
        require_once laddo_ROOT_DIR . '/inc/classes/Nav_Walker.php';
    }

	public function helper_functions(): void
	{
		require get_template_directory() . '/inc/template_functions.php';
	}

    /**
     * Theme Settings and Page Meta Options
     * @return void
     * @access public
     */
    public function theme_option(): void {

        //Theme Settings
        require_once laddo_ROOT_DIR . '/inc/admin/csf/options/opt-config.php';

        //Page Meta
        require_once laddo_ROOT_DIR . '/inc/admin/csf/meta/meta-config.php';
    }

    public function tgm_register(): void {
        require_once laddo_ROOT_DIR . '/inc/tgm/class-tgm-plugin-activation.php';
        require_once laddo_ROOT_DIR . '/inc/tgm/class-plugins.php';
        require_once laddo_ROOT_DIR . '/inc/tgm/plugin-registration.php';
    }

    public function demo_config(): void
    {
        require get_template_directory() . '/inc/demos/demo_config.php';
    }

}
