<?php
/**
 * Plugin Name:       Htmx Shortcode
 * Description:       Shortcode example for https://github.com/svandragt/htmxpress
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            jasalt
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       htmx-server-shortcode
 */


add_filter( 'htmx.template_paths', static function ( $paths ) {
	$paths[] = __DIR__ . '/templates';
	return $paths;
} );


function htmx_shortcode_function($atts) {
	ob_start();
	load_template( __DIR__ . '/templates/random_posts.php' );
	return ob_get_clean();
}
add_shortcode('htmx_shortcode', 'htmx_shortcode_function');
