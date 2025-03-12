<?php
//Page Header
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Banner (Page)', 'laddo' ),
	'icon'   => 'fa fa-picture-o',
	'fields' => array(

		array(
			'id'      => 'is_page_banner',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Banner (Show/Hide)', 'laddo' ),
			'desc'    => esc_html__('This switcher you can switch page banner whole website', 'laddo'),
			'default' => true,
		),

		array(
			'id'        => 'banner_bg_img',
			'type'      => 'media',
			'title'     => esc_html__( 'Background Image', 'laddo' ),
			'add_title' => esc_html__( 'Upload', 'laddo' ),
			'default'   => [
				'url'   => laddo_DIR_IMG . '/breadcrumb.webp',
			],
			'dependency' => array('is_page_banner', '==', '1' )
		),
	)
) );