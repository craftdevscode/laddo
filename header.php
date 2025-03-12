<?php
/**
 * The header for our theme
 *
 * This is the template that displays all the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package laddo
 */
$menu_type = laddo_setting_apply('menu_type');
$menu_type_class = match ($menu_type) {
    'black' => '',
	default => ' dark bg-white shadow',
};
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> data-bs-theme="light">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class("overflow-x-hidden"); ?> data-animation="true">
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }

    /**
     * Pre-loader
     */
    //get_template_part('template-parts/header-elements/pre-loader');

    if (! is_404()) {
    ?>
        <div class="navbar-overlay">
            <nav class="navbar navbar-1 navbar-expand-lg<?php echo esc_attr($menu_type_class) ?>">
                <div class="container-fluid custom-container">

                    <?php Laddo_Theme_Helper()->logo(); ?>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryMenu" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="primaryMenu">
                        <?php
                        $menu_alignment = laddo_setting_apply('menu_alignment');
                        $alignment_class = match ( $menu_alignment ) {
	                        'left' => 'pt-2 ps-lg-10',
	                        'center' => 'mx-auto pt-1 pe-lg-10',
	                        default => 'ms-auto pt-2 pe-lg-10',
                        };

                        if (has_nav_menu('main_menu')) {
                            wp_nav_menu(array(
                                'menu'           => 'main_menu',
                                'theme_location' => 'main_menu',
                                'container'      => null,
                                'menu_class'     => 'navbar-nav align-items-lg-center gap-lg-3 ' . esc_attr($alignment_class),
                                'walker'         => new \laddo\inc\classes\Nav_Walker(),
                                'depth'          => 3
                            ));
                        }

                        // Action Button
                        get_template_part('template-parts/header-elements/action-button');
                        ?>
                    </div>

                </div>
            </nav>
        </div><!-- /Header -->
    <?php
    }
