<?php
CSF::createSection( $prefix, array(
	'id'    => 'laddo_header',
	'title' => __( 'Header', 'laddo' ),
	'icon'  => 'fa fa-home',
) );


// Header Setting
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Logo', 'laddo' ),
	'parent' => 'laddo_header',
	'id'     => 'laddo_header_logo',
	'fields' => array(

		array(
			'type'    => 'subheading',
			'content' => esc_html__( 'Logo Settings', 'laddo' ),
		),

		array(
			'id'        => 'main_logo',
			'type'      => 'media',
			'title'     => esc_html__( 'Logo Upload', 'laddo' ),
			'add_title' => esc_html__( 'Upload', 'laddo' ),
			'desc'      => esc_html__( 'Upload logo for Header', 'laddo' ),
			'default'   => [
				'url' => laddo_DIR_IMG . '/logo/logo-dark.svg'
			]
		),

		array(
			'id'        => 'main_retina_logo',
			'type'      => 'media',
			'title'     => esc_html__( 'Retina Logo Upload @2x', 'laddo' ),
			'add_title' => esc_html__( 'Upload', 'laddo' ),
			'desc'      => esc_html__( 'Upload your Retina Logo. This should be your Logo in double size (If your logo is 100 x 20px, it should be 200 x 40px)', 'laddo' ),
			'default'   => [
				'url' => laddo_DIR_IMG . '/logo/logo-dark.svg'
			]
		),

		array(
			'id'        => 'sticky_logo',
			'type'      => 'media',
			'title'     => esc_html__( 'Sticky Logo', 'laddo' ),
			'desc'      => esc_html__( 'Upload logo for Header Sticky', 'laddo' ),
			'add_title' => esc_html__( 'Upload', 'laddo' ),
			'default'   => [
				'url' => laddo_DIR_IMG . '/logo/logo-dark.svg'
			]
		),

		array(
			'id'        => 'sticky_retina_logo',
			'type'      => 'media',
			'title'     => esc_html__( 'Sticky Retina Logo @2x', 'laddo' ),
			'desc'      => esc_html__( 'Upload your Retina Logo. This should be your Logo in double size (If your logo is 100 x 20px, it should be 200 x 40px)', 'laddo' ),
			'add_title' => esc_html__( 'Upload', 'laddo' ),
			'default'   => [
				'url' => laddo_DIR_IMG . '/logo/logo-dark.svg'
			]
		),

		array(
			'id'        => 'logo_dimensions',
			'type'      => 'dimensions',
			'title'     => esc_html__( 'Logo dimensions', 'banca' ),
			'subtitle'  => esc_html__( 'Set a custom height width for your upload logo.', 'banca' ),
			'units'     => array( 'em','px','%' ),
			'output'    => '.logo-area img',
		),

		array(
			'id'          => 'logo_padding',
			'type'        => 'spacing',
			'title'       => esc_html__( 'Padding', 'banca' ),
			'subtitle'    => esc_html__( 'Padding around the logo. Input the padding as clockwise (Top Right Bottom Left)', 'banca' ),
			'output'      => '.logo-area',
			'output_mode' => 'padding', // or margin, relative
		),
	)
) );


//========= Header-> Styling
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Header Styling', 'laddo' ),
	'parent' => 'laddo_header',
	'id'     => 'laddo_header_styling',
	'fields' => array(

		array(
			'id'      => 'menu_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Menu Type', 'laddo' ),
			'options' => array(
				'white' => esc_html__( 'White', 'laddo' ),
				'black' => esc_html__( 'Black', 'laddo' ),
			),
			'default' => 'white'
		),

		array(
			'id'      => 'menu_alignment',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Menu Alignment', 'laddo' ),
			'options' => array(
				'left' => esc_html__( 'Left', 'laddo' ),
				'center' => esc_html__( 'Center', 'laddo' ),
				'right' => esc_html__( 'Right', 'laddo' ),
			),
			'default' => 'right'
		),

	)
) );


//============ Call to Action
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Action Button', 'laddo' ),
	'parent' => 'laddo_header',
	'id'     => 'laddo_header_cta',
	'fields' => array(

		array(
			'id'      => 'is_cta_menu_btn',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Button (On/Off)', 'laddo' ),
			'default' => false,
		),

		array(
			'id'       => 'cta_menu_btn',
			'type'     => 'link',
			'title'    => esc_html__('Action Button', 'laddo'),
			'default'  => array(
				'url'    => '#',
				'text'   => esc_html__('Contact Us', 'laddo'),
				'target' => '_self'
			),
			'dependency' => array('is_cta_menu_btn', '==', '1' )
		),

		// Action Button Colors
		array(
			'id'            => 'c2a_btn_label_colors',
			'type'          => 'tabbed',
			'title'         => esc_html__( 'Button Label Colors', 'laddo' ),
			'subtitle'      => esc_html__('Here you can change the button label colors.', 'laddo'),
			'dependency'   => array( 'is_c2a_btn', '==', '1' ),
			'tabs'          => array(
				array(
					'title'     => esc_html__('Normal', 'laddo'),
					'fields'    => array(
						array(
							'title'       => esc_html__( 'Text Color', 'laddo' ),
							'id'          => 'c2a_btn_normal',
							'type'        => 'color',
							'output'    => '', //Selector Class
						),
						array(
							'id'          => 'c2a_btn_bg_color',
							'type'        => 'color',
							'title'       => esc_html__( 'Background Color', 'laddo' ),
							'output'      => '', //Selector Class
							'output_mode' => 'background-color',
						),
					)
				),
				array(
					'title'     => esc_html__('Hover', 'laddo'),
					'fields'    => array(

						array(
							'id'        => 'c2a_btn_label_color_hover',
							'type'      => 'color',
							'title'     => esc_html__( 'Text Color', 'laddo' ),
							'output'    => '', //Selector Class
						),

						array(
							'id'          => 'c2a_btn_bg_hover_color',
							'type'        => 'color',
							'title'       => esc_html__( 'Background Color', 'laddo' ),
							'output'      => '', //Selector Class
							'output_mode' => 'background-color',
						),

					)
				),
			),
		),

	)
) );