<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Plugin installation and activation for WordPress themes
 */
if ( !class_exists('laddo_Tgm_Plugin_Register') ) {

    class laddo_Tgm_Plugin_Register
    {

        public function __construct()
        {
            add_filter( 'insight_core_tgm_plugins', [ $this, 'register_required_plugins' ] );
        }


        /**
         * Register the required plugins for this theme.
         *
         * This function is hooked into tgmpa_init, which is fired within the
         * TGM_Plugin_Activation class constructor.
         */
        public function register_required_plugins($plugins): array {
            /*
             * Array of plugin arrays. Required keys are name and slug.
             * If the source is NOT from the .org repo, then a source is also required.
             */
            $new_plugins = array(

                array(
                    'name' => esc_html__('Elementor', 'laddo'),
                    'slug' => 'elementor',
                    'required' => true,
                ),

                array(
                    'name' => esc_html__('laddo Core', 'laddo'), // The plugin name.
                    'slug' => 'laddo-core', // The plugin slug (typically the folder name).
                    //'source' => 'https://wordpress-theme.spider-themes.net/resources/laddo/laddo-core.zip', // The plugin source.
                    'required' => true, // If false, the plugin is only 'recommended' instead of required.
                ),

                array(
                    'name' => esc_html__('CodeStar Framework', 'laddo'),
                    'slug' => 'codestar-framework', // The plugin slug (typically the folder name).
                    'source' => 'https://wordpress-theme.spider-themes.net/3rd-plugins/codestar-framework.zip', // The plugin sources.
                    'required' => true, // If false, the plugin is only 'recommended' instead of required.
                ),

                array(
                    'name' => esc_html__('Contact Form 7', 'laddo'),
                    'slug' => 'contact-form-7',
                    'required' => true,
                ),

                array(
                    'name' => esc_html__('One Click Demo Import', 'laddo'),
                    'slug' => 'one-click-demo-import',
                    'required' => false,
                ),

            );

            return array_merge( $plugins, $new_plugins );
        }


    }

    new laddo_Tgm_Plugin_Register;
}