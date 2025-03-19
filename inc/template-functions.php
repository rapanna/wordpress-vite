<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sablona-wp
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sablona-wp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'sablona-wp_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sablona-wp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sablona-wp_pingback_header' );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

function zobrazit_vsechny_reference() {
    ob_start();

    if( have_rows('reference', 'option') ): ?>
		<?php while( have_rows('reference', 'option') ): the_row(); 
			$reference_logo = get_sub_field('reference_logo');
			$reference_text = get_sub_field('reference_text');
			$reference_link = get_sub_field('reference_link');
		?>
			<div class="reference__item">
				<a href="<?php echo esc_url($reference_link); ?>" target="_blank">
					<img class="reference__logo" src="<?php echo esc_url($reference_logo); ?>" alt="<?php echo esc_attr($reference_text); ?>" />
				</a>
				<p><?php echo esc_html($reference_text); ?></p>
			</div>
		<?php endwhile; ?>
    <?php endif;

    return ob_get_clean();
}
add_shortcode('vsechny_reference', 'zobrazit_vsechny_reference');
// volani [vsechny_reference]

function footer_widget_init() {
	register_sidebar( array(
		'name' => 'Footer widget',
		'id' => 'muj-widget',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	}
add_action( 'widgets_init', 'footer_widget_init' );