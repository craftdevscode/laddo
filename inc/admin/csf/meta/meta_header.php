<?php
CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Header', 'laddo' ),
    'id'     => 'page_header_meta',
    'icon'   => 'fa fa-home',
    'post_type' => 'page',
    'fields' => array(

        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Header Styling', 'laddo' ),
        ),

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
		    'default'   => false
	    ),

	    array(
		    'id'        => 'main_retina_logo',
		    'type'      => 'media',
		    'title'     => esc_html__( 'Retina Logo Upload @2x', 'laddo' ),
		    'add_title' => esc_html__( 'Upload', 'laddo' ),
		    'desc'      => esc_html__( 'Upload your Retina Logo. This should be your Logo in double size (If your logo is 100 x 20px, it should be 200 x 40px)', 'laddo' ),
		    'default'   => false
	    ),

	    array(
		    'id'        => 'sticky_logo',
		    'type'      => 'media',
		    'title'     => esc_html__( 'Sticky Logo', 'laddo' ),
		    'desc'      => esc_html__( 'Upload logo for Header Sticky', 'laddo' ),
		    'add_title' => esc_html__( 'Upload', 'laddo' ),
		    'default'   => false
	    ),

	    array(
		    'id'        => 'sticky_retina_logo',
		    'type'      => 'media',
		    'title'     => esc_html__( 'Sticky Retina Logo @2x', 'laddo' ),
		    'desc'      => esc_html__( 'Upload your Retina Logo. This should be your Logo in double size (If your logo is 100 x 20px, it should be 200 x 40px)', 'laddo' ),
		    'add_title' => esc_html__( 'Upload', 'laddo' ),
		    'default'   => false
	    ),

        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Menu Settings', 'laddo' ),
        ),

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