<?php
CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Page Banner', 'laddo' ),
    'id'     => 'page_banner_meta',
    'icon'   => 'fa fa-picture-o',
    'post_type' => 'page',
    'fields' => array(

	    array(
		    'id'      => 'is_page_banner',
		    'type'    => 'switcher',
		    'title'   => esc_html__( 'Banner (Show/Hide)', 'laddo' ),
		    'desc'    => esc_html__('This switcher you can switch page banner for this page in your website', 'laddo'),
		    'default' => true,
	    ),

	    array(
		    'id'        => 'banner_bg_img',
		    'type'      => 'media',
		    'title'     => esc_html__( 'Background Image', 'laddo' ),
		    'add_title' => esc_html__( 'Upload', 'laddo' ),
		    'default'   => false,
		    'dependency' => array('is_page_banner', '==', '1' )
	    ),

    ),
) );