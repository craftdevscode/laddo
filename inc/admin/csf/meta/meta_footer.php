<?php
// Footer Menu
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Footer', 'laddo' ),
	'id'     => 'page_footer_meta',
	'icon'   => 'fa fa-home',
	'post_type' => 'page',
	'fields' => array(

		array(
			'id'          => 'footer_type',
			'type'        => 'select',
			'title'       => esc_html__('Footer Type', 'jobi' ),
			'options'     => array(
				'normal'        => esc_html__( 'Default', 'jobi' ),
				'el-templates'  => esc_html__('Elementor Template', 'jobi'),
			),
			'default'       => 'normal'
		),

		array(
			'id'          => 'footer_el_layout',
			'type'        => 'select',
			'title'       => esc_html__('Select Style', 'laddo' ),
			'options'     => Laddo_Theme_Helper()->get_all_posts('footer'),
			'dependency'  => array('footer_type', '==', 'el-templates'),
			'default'     => '',
		),
	)
) );