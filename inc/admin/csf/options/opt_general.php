<?php
CSF::createSection( $prefix, array(
	'id'    => 'bookjar_general',
	'title' => esc_html__( 'General', 'laddo' ),
	'icon'  => 'fa fa-home',
) );


// General Setting
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'General Settings', 'laddo' ),
	'parent' => 'bookjar_general',
	'fields' => array(
		array(
			'id'      => 'back_to_top',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Display Back To Top Button', 'laddo' ),
			'default' => true
		),

		array(
			'id'       => 'custom-css',
			'type'     => 'code_editor',
			'title'    => esc_html__( 'Custom CSS', 'laddo' ),
			'settings' => array(
				'theme' => 'mbo',
				'mode'  => 'css',
			),
			'default'  => '.element{ color: #ffbc00; }',
		),
	)
) );


// Pre-loader
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Pre-loader', 'laddo' ),
	'parent' => 'bookjar_general',
	'fields' => array(

		array(
			'id'         => 'is_preloader',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Pre-loader', 'laddo' ),
			'text_on'    => esc_html__('Enabled', 'banca'),
			'text_off'   => esc_html__('Disabled', 'banca'),
			'text_width' => 100,
			'default'    => true
		),

		array(
			'id'      => 'preloader_logo',
			'type'    => 'media',
			'title'   => esc_html__( 'Logo', 'laddo' ),
			'desc'    => esc_html__('Upload logo for Preloader', 'laddo'),
			'default' => [
				'url' => laddo_DIR_IMG . '/logo/logo-dark.svg'
			],
			'dependency' => array('is_preloader', '==', '1')
		),

	)
) );