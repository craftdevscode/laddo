<?php
//Footer Setting
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Footer', 'laddo' ),
	'icon'   => 'fa fa-arrow-down',
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
			'options'     => laddo_Theme_Helper()->get_all_posts('footer'),
			'dependency'  => array('footer_type', '==', 'el-templates'),
			'default'     => '',
		),

		array(
			'id'            => 'footer_copyright_text',
			'type'          => 'wp_editor',
			'title'         => esc_html__( 'Copyright Text', 'laddo' ),
			'tinymce'       => true,
			'quicktags'     => true,
			'media_buttons' => false,
			'height'        => '100px',
			'dependency'    => array('footer_type', '==', 'normal'),
		),

		array(
			'id'     => 'footer_text_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Text Color', 'laddo' ),
			'output' => '.site-footer .copyright p',
			'dependency'    => array('footer_type', '==', 'normal'),
		),

		array(
			'id'          => 'footer_padding',
			'type'        => 'spacing',
			'title'       => __( 'Padding Top/Bottom', 'laddo' ),
			'output'      => '.site_footer',
			'output_mode' => 'padding',
			'left'        => false,
			'right'       => false,
			'default'     => array(
				'unit' => 'px',
			),
			'dependency'    => array('footer_type', '==', 'normal'),
		),

		array(
			'id'          => 'footer_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Background Color', 'laddo' ),
			'output'      => '.site_footer',
			'output_mode' => 'background',
			'dependency'    => array('footer_type', '==', 'normal'),
		),
	)
) );