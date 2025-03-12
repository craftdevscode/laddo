<?php
namespace laddo\inc\classes;

use Walker_Nav_Menu;

/**
 * WP Custom Nav Walker
 *
 * @package WP-Bootstrap-Navwalker
 */
class Nav_Walker extends Walker_Nav_Menu {

    /**
     * Start Level.
     *
     * @param mixed $output Passed by reference. Used to append additional content.
     * @param int   $depth Depth of page. Used for padding.
     * @param array $args Arguments.
     */
    public function start_lvl( &$output, $depth = 0, $args = null ): void {

		$indent = str_repeat("\t", $depth);

	    // Add specific classes for dropdowns based on depth
	    if ( $depth === 0 ) {
		    $output .= "\n$indent<ul role=\"menu\" class=\"contain-sub-1__content contain-sub-1__content-sm list-unstyled menu-depth-2nd\">\n";
	    } elseif ( $depth === 1 ) {
		    $output .= "\n$indent<ul role=\"menu\" class=\"contain-sub-1__content contain-sub-1__content-sm three_wraper list-unstyled menu-depth-3rd\">\n";
	    } else {
		    $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu menu-depth-" . ( $depth + 2 ) . "th\">\n";
	    }

    }

    /**
     * Start El.
     *
     * @param mixed $output Passed by reference. Used to append additional content.
     * @param mixed $data_object Menu item data object.
     * @param int   $depth Depth of menu item. Used for padding.
     * @param array $args Arguments.
     * @param int   $current_object_id Menu item ID.
     */
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ): void {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $data_object->classes ) ? array() : (array) $data_object->classes;

        // Add custom classes
        $classes[] = 'nav-item menu-item-' . $data_object->ID;
        if ( in_array( 'current-menu-item', $classes, true ) ) {
            $classes[] = 'active'; // Ensure 'active' is added when current menu item
        }

        // Custom class for menu items with children
        if ( ! empty( $args->has_children ) ) {
            $classes[] = 'contain-sub-1';
        }

        // Handle classes properly
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $data_object, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
        $current_object_id = ' id="menu-item-' . esc_attr( $data_object->ID ) . '"';

        $output .= $indent . '<li' . $current_object_id . $class_names . '>';

        // Set link attributes
        $atts = array(
            'title'  => ! empty( $data_object->attr_title ) ? esc_attr( $data_object->attr_title ) : '',
            'target' => ! empty( $data_object->target ) ? esc_attr( $data_object->target ) : '',
            'rel'    => ! empty( $data_object->xfn ) ? esc_attr( $data_object->xfn ) : '',
            'href'   => ! empty( $data_object->url ) ? esc_url( $data_object->url ) : ''
        );

	    // Adjust link classes for different menu levels
	    if ( $depth === 0 ) {
		    $atts['class'] = 'nav-link ff-heading fw-semibold';
	    } elseif ( $depth === 1 ) {
		    $atts['class'] = 'contain-sub-1__link d-block text-decoration-none fs-16 text-dark hover:text-primary py-1';
	    } elseif ( $depth === 2 ) {
		    $atts['class'] = 'nav-link nav_3rd d-block text-decoration-none fs-16 text-dark hover:text-primary py-1';
	    }

	    // Allow customization of attributes via filter
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $data_object, $args );

        // Build the link attributes string
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        // Generate the item output
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . esc_html( apply_filters( 'the_title', $data_object->title, $data_object->ID ) ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // Output the final HTML
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $data_object, $depth, $args );
    }

    /**
     * Display Element.
     *
     * @param mixed $element Data object.
     * @param mixed $children_elements List of elements to continue traversing.
     * @param mixed $max_depth Max depth to traverse.
     * @param mixed $depth Depth of current element.
     * @param mixed $args Arguments.
     * @param mixed $output Passed by reference. Used to append additional content.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ): void {
        if ( ! $element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        // Set has_children for the menu
        if ( is_array( $args ) && isset( $args[0] ) && is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        }

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}
