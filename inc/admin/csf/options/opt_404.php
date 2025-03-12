<?php
//Color Scheme
CSF::createSection( $prefix, array(
	'title'  => esc_html__( '404 Page', 'laddo' ),
	'icon'   => 'fa fa-paint-brush',
	'fields' => array(

		array(
			'id'     => 'error_heading',
			'type'   => 'text',
			'title'  => esc_html__( 'Title', 'laddo' ),
			'default' => esc_html__( 'Error. We can’t find the page you’re looking for.', 'laddo' )
		),

		array(
			'id'     => 'error_content',
			'type'   => 'text',
			'title'  => esc_html__( 'Content', 'laddo' ),
			'default' => esc_html__( 'Sorry for the inconvenience. Go to our homepage or check out our latest collections for Fashion,Chair, Decoration...', 'laddo' )
		),

		array(
			'id'     => 'error_btn_title',
			'type'   => 'text',
			'title'  => esc_html__( 'Button Title', 'laddo' ),
			'default' => esc_html__( 'Back to Home Page', 'laddo' )
		),

	)
) );