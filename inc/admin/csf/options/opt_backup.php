<?php
//Backup
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Backup', 'laddo' ),
	'icon'   => 'fa fa-download',
	'fields' => array(
		array(
			'type' => 'backup',
		),
	)
) );