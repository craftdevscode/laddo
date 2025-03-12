<?php
//Blog Setting
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Blog', 'laddo' ),
	'id'     => 'laddo_blog',
	'icon'   => 'fa fa-file-text-o',
	'fields' => array()
) );


// Archive Page Settings
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Archive Setting', 'laddo' ),
	'parent' => 'laddo_blog',
	'fields' => array(

		array(
			'id'      => 'author_info',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Display Author Bio Box', 'laddo' ),
			'default' => false
		),

		array(
			'id'      => 'blog_list_meta_author',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Hide post-meta author?', 'laddo' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_list_meta_categories',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Hide post-meta categories?', 'laddo' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_list_meta_date',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Hide post-meta date?', 'laddo' ),
			'default' => false,
		),


	)
) );


// Single Post Settings
CSF::createSection( $prefix, array(
	'title'  => esc_html__( 'Single Post', 'laddo' ),
	'parent' => 'laddo_blog',
	'fields' => array(

		array(
			'type'    => 'subheading',
			'content' => esc_html__( 'Title Bar', 'laddo' ),
		),

		array(
			'id'                    => 'blog_single_banner_bg_img',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Background', 'laddo' ),
			'background_gradient'   => true,
			'background_origin'     => true,
			'background_clip'       => true,
			'background_blend_mode' => true,
			'default'               => '',
			'output'                => '.banner-blog-details-area',
		),

		array(
			'type'    => 'subheading',
			'content' => esc_html__( 'Related Post', 'laddo' ),
		),

		array(
			'id'      => 'is_related_posts',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Hide Related Post?', 'laddo' ),
			'default' => false,
		),

	)
) );