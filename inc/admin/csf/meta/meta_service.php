<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $meta = 'laddo_meta_service';

    // Service Custom Post Metabox
    CSF::createMetabox($meta, array(
        'title'     => esc_html__('Service Options', 'laddo'),
        'post_type' => 'service',
    ));


    // Create a section
    CSF::createSection($meta, array(
        'title'  => esc_html__('Service Icon', 'laddo'),
        'fields' => array(
            array(
                'id'          => 'service_select',
                'type'        => 'select',
                'title'       => esc_html__('Select Icon Type', 'laddo'),
                'placeholder' => 'No Icon',
                'options'     => array(
                    'icon'  => esc_html__('With Icon', 'laddo'),
                    'image'  => esc_html__('With Image', 'laddo'),
                ),
                'default'     => 'icon'
            ),

            array(
                'id'    => 'service_icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon', 'laddo'),
                'dependency' => array(
                    array('service_select', '==', 'icon'),
                ),
            ),

            array(
                'id'    => 'service_image',
                'type'  => 'media',
                'title' => esc_html__('Image', 'laddo'),
                'dependency' => array(
                    array('service_select', '==', 'image'),
                ),
            ),

        )
    ));
}
