<?php
//Typography
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Typography', 'laddo' ),
	'icon'   => 'fa fa-font',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => esc_html__( 'Body Font Settings', 'laddo' ),
		),

		array(
			'id'      => 'body_typo',
			'type'    => 'typography',
			'title'   => esc_html__( 'Body', 'laddo' ),
			'output'  => 'body',
			'default' => array(
				'unit' => 'px',
				'type' => 'google',
			),
		),

		array(
			'type'    => 'subheading',
			'content' => esc_html__( 'Heading Font Settings', 'laddo' ),
		),
		array(
			'id'      => 'heading_h1_typo',
			'type'    => 'typography',
			'title'   => esc_html__( 'Heading H1', 'laddo' ),
			'output'  => 'h1',
			'default' => array(
				'unit'      => 'px',
				'type'      => 'google',
			),
		),
		array(
			'id'      => 'heading_h2_typo',
			'type'    => 'typography',
			'title'   => esc_html__( 'Heading H2', 'laddo' ),
			'output'  => 'h2',
			'default' => array(
				'unit'      => 'px',
				'type'      => 'google',
			),
		),
		array(
			'id'      => 'heading_h3_typo',
			'type'    => 'typography',
			'title'   => esc_html__( 'Heading H3', 'laddo' ),
			'output'  => 'h3',
			'default' => array(
				'unit'      => 'px',
				'type'      => 'google',
			),
		),
		array(
			'id'      => 'heading_h4_typo',
			'type'    => 'typography',
			'title'   => esc_html__( 'Heading H4', 'laddo' ),
			'output'  => 'h4',
			'default' => array(
				'unit'      => 'px',
				'type'      => 'google',
			),
		),
		array(
			'id'      => 'heading_h5_typo',
			'type'    => 'typography',
			'title'   => esc_html__( 'Heading H5', 'laddo' ),
			'output'  => 'h5',
			'default' => array(
				'unit'      => 'px',
				'type'      => 'google',
			),
		),

		array(
			'id'      => 'heading_h6_typo',
			'type'    => 'typography',
			'title'   => esc_html__( 'Heading H6', 'laddo' ),
			'output'  => 'h6',
			'default' => array(
				'unit'      => 'px',
				'type'      => 'google',
			),
		),

	)
) );