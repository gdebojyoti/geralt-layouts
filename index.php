<?php
/**
 * Plugin Name: Geralt Card Layout
 * Plugin URI: http://geralt.debojyotighosh.com
 * Description: Create card layouts supported by the Geralt WordPress theme
 * Version: 0.0.1-a
 * Author: Debojyoti Ghosh
 * Author URI: https://www.debojyotighosh.com
 */


// Featured card layout
// usage: [card-layout-featured category="category title"]
require_once get_template_directory() . '/inc/card-layout-featured.php'; // Include featured card layout definition
function geralt_sc_card_featured( $atts = [], $content = null ) {
	extract( shortcode_atts( array (
		'category' => '',
	), $atts ) );

	$category_id = get_cat_ID($category);
	echo geralt_card_layout_featured($category_id, 'cat');
}
add_shortcode( 'card-layout-featured', 'geralt_sc_card_featured' );


// General card layout
// usage: [card-layout category="category title"]
require_once get_template_directory() . '/inc/card-layout-general.php'; // Include general card layout definition
function geralt_sc_card_general( $atts = [], $content = null ) {
	extract( shortcode_atts( array (
		'category' => '',
	), $atts ) );

	$category_id = get_cat_ID($category);
	echo geralt_card_layout_general($category_id, 'cat');
}
add_shortcode( 'card-layout', 'geralt_sc_card_general' );


// 3 column layout
// usage: [one-third]First column text[/one-third][one-third]Second column text[/one-third][one-third]Third column text[/one-third] 
function geralt_three_col_layout( $atts, $content ) {
	return '<div class="col-sm-4">' . $content . '</div>';
}
add_shortcode( 'one-third', 'geralt_three_col_layout' );

?>