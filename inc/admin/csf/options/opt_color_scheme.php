<?php
//Color Scheme
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Color Scheme', 'laddo' ),
	'icon'   => 'fa fa-paint-brush',
	'fields' => array(

		array(
			'type'    => 'subheading',
			'content' => esc_html__( 'General Color', 'laddo' ),
		),

		array(
			'id'     => 'body_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Body Color', 'laddo' ),
			'output' => 'body'
		),

		array(
			'id'     => 'main_heading_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Heading Color', 'laddo' ),
			'output' => 'h1,h2,h3,h4,h5,h6, .blog-content .entry-title a',
		),

		array(
			'id'     => 'main_primary_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Primary Color', 'laddo' ),
			'desc'   => esc_html__( 'Main Color Scheme', 'laddo' ),
			'output' => array(
				'color'            => '',

				'background' => '',

				'background-color'	   => '',

				'border-color'	   => '',
			),
		),

		array(
			'id'     => 'theme_gradient_color',
			'type'   => 'background',
			'title'  => esc_html__( 'Theme Gradient Color', 'laddo' ),
			'background_gradient'  => true,
			'background_image'     => false,
			'background_position'  => false,
			'background_size'      => false,
			'background_repeat'    => false,
			'background_attachment'=> false,
			'output'			   => [
				'background' => '
				
					',
			]
		),

		array(
			'id'     => 'theme_gradient_hover',
			'type'   => 'background',
			'title'  => esc_html__( 'Theme Gradient Hover Color', 'laddo' ),
			'background_gradient'  => true,
			'background_image'     => false,
			'background_position'  => false,
			'background_size'      => false,
			'background_repeat'    => false,
			'background_attachment'=> false,
			'output'			   => [
				'background' => '
					
					',
			]
		),

		array(
			'id'     => 'link_color',
			'type'   => 'link_color',
			'title'  => 'Link Color',
			'color'  => true,
			'hover'  => true,
			'focus'  => true,
			'output' => ''
		),


	)
) );