<?php

/**
 * Loads the StoreFront parent theme stylesheet.
 */

function sf_child_theme_enqueue_styles() {

    wp_enqueue_style( 'storefront-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'storefront-style' ) );

}
add_action( 'wp_enqueue_scripts', 'sf_child_theme_enqueue_styles' );

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

/**
 * Styles / scripts
 */

function sf_child_theme_google_fonts() {
	wp_enqueue_style( 'asap', '//fonts.googleapis.com/css?family=Asap:400,400italic,700,700italic', array( 'storefront-style' ) );
}
add_action( 'wp_enqueue_scripts', 'sf_child_theme_google_fonts' );

/**
 * Customizer default color tweaks
 */

function sf_child_theme_color_cerise_red( $color ) {
	$color = '#E23D54';
	return $color;
}
add_filter( 'storefront_default_header_background_color', 'sf_child_theme_color_cerise_red' );

function sf_child_theme_color_white( $color ) {
	$color = '#ffffff';
	return $color;
}
add_filter( 'storefront_default_header_text_color', 'sf_child_theme_color_white' );

function sf_child_theme_color_mine_shaft( $color ) {
	$color = '#3F3F3F';
	return $color;
}
add_filter( 'storefront_default_button_background_color', 'sf_child_theme_color_mine_shaft' );

function sf_child_theme_color_peter_river( $color ) {
	$color = '#3498db';
	return $color;
}
add_filter( 'storefront_default_button_alt_background_color', 'sf_child_theme_color_peter_river' );
add_filter( 'storefront_default_accent_color', 'sf_child_theme_color_peter_river' );
add_filter( 'storefront_default_footer_link_color', 'sf_child_theme_color_peter_river' );

/**
 * Adjust the storefront homepage template layout
 */

function sf_child_theme_homepage_layout() {
	remove_action( 'homepage', 'storefront_homepage_content', 10 );
	remove_action( 'homepage', 'storefront_featured_products', 40 );
	remove_action( 'homepage', 'storefront_product_categories', 20 );

	add_action( 'sf_child_theme_before_homepage_content', 'storefront_homepage_content', 10 );
	add_action( 'sf_child_theme_before_homepage_content', 'storefront_featured_products', 20 );
}
add_action( 'init', 'sf_child_theme_homepage_layout' );

/**
 * Homepage
 */

function sf_chilld_theme_product_columns( $args ) {
	$args['limit'] = 3;
	$args['columns'] = 3;	
	return $args;
}
add_filter( 'storefront_featured_products_args', 'sf_chilld_theme_product_columns' );
add_filter( 'storefront_recent_products_args', 'sf_chilld_theme_product_columns' );
add_filter( 'storefront_popular_products_args', 'sf_chilld_theme_product_columns' );
add_filter( 'storefront_on_sale_products_args', 'sf_chilld_theme_product_columns' );
