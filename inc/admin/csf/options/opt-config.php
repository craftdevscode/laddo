<?php
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	// Set a unique slug-like ID
	$prefix = 'laddo_opt';

	// Create options
	CSF::createOptions( $prefix, array(
		'menu_title'      => esc_html__( 'Theme Settings', 'laddo' ),
		'menu_slug'       => 'laddo-options',
		'framework_title' => esc_html__( 'laddo', 'laddo' ),
		'menu_type'       => 'menu',
		'menu_position'   => 10,
		'menu_hidden'     => false,
		'theme'           => 'dark',
		'sticky_header'   => 'true',
	) );

	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_general.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_banner.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_header.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_footer.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_menu.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_blog.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_typography.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_color_scheme.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_404.php';
	include laddo_ROOT_DIR . '/inc/admin/csf/options/opt_backup.php';

}