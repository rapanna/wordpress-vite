<?php
class Custom_Nav_Walker extends Walker_Nav_Menu {
    
    // Start Level
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="nav__sub">' . "\n";
    }

    // End Level
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>' . "\n";
    }

    // Start Element (Menu Item)
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        // Přidání třídy pro položky s podmenu
        if (in_array('menu-item-has-children', $classes)) {
            $class_names .= ' nav__item--has-sub js-nav__item--has-sub';
        }

        $output .= '<li class="nav__item ' . esc_attr( $class_names ) . '">';
        $output .= '<a href="' . esc_attr( $item->url ) . '" class="nav__link" title="' . esc_attr( $item->title ) . '">';
        $output .= esc_html( $item->title );
        $output .= '</a>';
    }

    // End Element (Menu Item)
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}