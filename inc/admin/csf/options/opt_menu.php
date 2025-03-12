<?php
CSF::createSection( $prefix, array(
	'id'    => 'laddo_menu',
	'title' => __( 'Menu', 'laddo' ),
	'icon'  => 'fa fa-bars',
) );


// Menu Bar Settings
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Menu Classic', 'laddo' ),
	'parent' => 'laddo_menu',
	'fields' => array(

		// Navbar Menu Colors
		array(
			'id'            => 'navbar_menu_colors',
			'type'          => 'tabbed',
			'title'         => esc_html__( 'Navbar Menu Colors', 'laddo' ),
			'subtitle'      => esc_html__('Here you can change the navbar menu colors.', 'laddo', ''),
			'tabs'          => array(

				//Menu → Normal Settings
				array(
					'title'     => esc_html__('Menu Normal', 'laddo'),
					'fields'    => array(
						array(
							'title'       => esc_html__( 'Text Color', 'laddo' ),
							'id'          => 'menu_normal_text_color',
							'type'        => 'color',
							'output'      => array(''),
						),

						array(
							'title'       => esc_html__( 'Text Hover Color', 'laddo' ),
							'id'          => 'menu_normal_text_hover_color',
							'type'        => 'color',
							'output'      => array(''),
						),

						array(
							'title'       => esc_html__( 'Background Color', 'laddo' ),
							'id'          => 'menu_normal_bg_color',
							'type'        => 'color',
							'output'      => array(''),
							'output_mode' => 'background'
						),
					)
				),

				//Menu → Sticky Settings
				array(
					'title'     => esc_html__('Menu Sticky', 'laddo'),
					'fields'    => array(
						array(
							'title'       => esc_html__( 'Text Color', 'laddo' ),
							'id'          => 'menu_sticky_text_color',
							'type'        => 'color',
							'output'      => array(''),
						),

						array(
							'title'       => esc_html__( 'Text Hover Color', 'laddo' ),
							'id'          => 'menu_sticky_text_hover_color',
							'type'        => 'color',
							'output'      => array(''),
						),

						array(
							'title'       => esc_html__( 'Background Color', 'laddo' ),
							'id'          => 'menu_sticky_bg_color',
							'type'        => 'color',
							'output'      => array(''),
							'output_mode' => 'background'
						),
					)
				),


				//Menu → Dropdown Settings
				array(
					'title'     => esc_html__('Submenu (Dropdown Item)', 'laddo'),
					'fields'    => array(
						array(
							'title'       => esc_html__( 'Text Color', 'laddo' ),
							'id'          => 'submenu_text_color',
							'type'        => 'color',
							'output'      => array(''),
						),

						array(
							'title'       => esc_html__( 'Text Hover Color', 'laddo' ),
							'id'          => 'submenu_text_hover_color',
							'type'        => 'color',
							'output'      => array(''),
						),

						array(
							'title'       => esc_html__( 'Background Color', 'laddo' ),
							'id'          => 'submenu_bg_color',
							'type'        => 'color',
							'output'      => array(''),
							'output_mode' => 'background'
						),
					)
				),


			),
		),

	)
) );