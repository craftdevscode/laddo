<?php
// Disable regenerating images while importing media
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

// Change some options for the jQuery modal window
function laddo_ocdi_confirmation_dialog_options( $options ): array
{
	return array_merge( $options, array(
		'width'       => 400,
		'dialogClass' => 'wp-dialog',
		'resizable'   => false,
		'height'      => 'auto',
		'modal'       => true,
	) );
}

add_filter( 'pt-ocdi/confirmation_dialog_options', 'laddo_ocdi_confirmation_dialog_options', 10, 1 );

function laddo_ocdi_intro_text( $default_text ): string
{
	$default_text .= '<div class="ocdi_custom-intro-text notice notice-info inline">';
	$default_text .= sprintf(
		'%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
		esc_html__( 'Install and activate all ', 'laddo' ),
		get_admin_url( null, 'themes.php?page=tgmpa-install-plugins' ),
		esc_html__( 'required plugins', 'laddo' ),
		esc_html__( 'before you click on the "Import" button.', 'laddo' )
	);
	$default_text .= sprintf(
		' %1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
		esc_html__( 'You will find all the pages in ', 'laddo' ),
		get_admin_url( null, 'edit.php?post_type=page' ),
		esc_html__( 'Pages.', 'laddo' ),
		esc_html__( 'Other pages will be imported along with the main Homepage.', 'laddo' )
	);
	$default_text .= '<br>';
	$default_text .= sprintf(
		'%1$s <a href="%2$s" target="_blank">%3$s</a>',
		esc_html__( 'If you fail to import the demo data, follow the alternative way', 'laddo' ),
		'https://is.gd/R6jpHq',
		esc_html__( 'here.', 'laddo' )
	);
	$default_text .= '</div>';

	return $default_text;
}

add_filter( 'pt-ocdi/plugin_intro_text', 'laddo_ocdi_intro_text' );


// OneClick Demo Importer
add_filter( 'pt-ocdi/import_files', 'laddo_import_files' );
function laddo_import_files(): array
{
	return array(

		array(
			'import_file_name'         => esc_html__( 'Home 01', 'laddo' ),
			'local_import_file'        => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
			'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
			'import_preview_image_url' => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/home_1.png',
			'preview_url'              => 'https://wordpress-theme.spider-themes.net/laddo/',
			'local_import_cs'          => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
					'option_name' => 'laddo_opt',
				),
			),
		),

		array(
			'import_file_name'         => esc_html__( 'Home 02', 'laddo' ),
			'local_import_file'        => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
			'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
			'import_preview_image_url' => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/home_2.png',
			'preview_url'              => 'https://wordpress-theme.spider-themes.net/laddo/home-02/',
			'local_import_cs'          => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
					'option_name' => 'laddo_opt',
				),
			),
		),

		array(
			'import_file_name'         => esc_html__( 'Home 03', 'laddo' ),
			'local_import_file'        => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
			'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
			'import_preview_image_url' => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/home_3.png',
			'preview_url'              => 'https://wordpress-theme.spider-themes.net/laddo/home-03/',
			'local_import_cs'          => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
					'option_name' => 'laddo_opt',
				),
			),
		),


	);
}


function laddo_after_import_setup( $selected_import ): void
{

	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'main_menu' => $main_menu->term_id,
		)
	);

	// Disable Elementor's Default Colors and Default Fonts
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
	update_option( 'elementor_global_image_lightbox', '' );

	// Assign front page and posts page (blog page).
	if ( 'Home 01' == $selected_import['import_file_name'] ) {
		$front_page_id = laddo_get_page_title( 'Home 01' );
	}

	if ( 'Home 02' == $selected_import['import_file_name'] ) {
		$front_page_id = laddo_get_page_title( 'Home 02' );
	}

	if ( 'Home 03' == $selected_import['import_file_name'] ) {
		$front_page_id = laddo_get_page_title( 'Home 03' );
	}

	$blog_page_id = laddo_get_page_title( 'Blog' );

	// Set the home page and blog page
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id );
	update_option( 'page_for_posts', $blog_page_id );

}

add_action( 'pt-ocdi/after_import', 'laddo_after_import_setup' );