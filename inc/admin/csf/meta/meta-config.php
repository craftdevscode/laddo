<?php
if ( !defined('ABSPATH') ) {
	exit; // Exit if accessed directly
}

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	// Set a unique slug-like ID
	$prefix = 'laddo_meta';

	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'         => esc_html__( 'Laddo:: Meta Options', 'laddo' ),
		'post_type'     => ['page'],
		'priority'      => 'high',
		'show_restore'  => true,
		'data_type'     => 'unserialize', // The type of the database save options. `Serialize` or `unserialize`
	) );

	require get_template_directory() . '/inc/admin/csf/meta/meta_service.php';


	require get_template_directory() . '/inc/admin/csf/meta/meta_header.php';
	require get_template_directory() . '/inc/admin/csf/meta/meta_banner.php';
	require get_template_directory() . '/inc/admin/csf/meta/meta_footer.php';

}