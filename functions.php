<?php
function load_custom_wp_admin_style() {
	wp_enqueue_media();
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css', false, '' );
 	wp_enqueue_script( 'custom_wp_admin_script', get_template_directory_uri() . '/assets/js/wp-media.js', false, '1.0.0' );
 	wp_enqueue_script( 'custom_wp_admin_script', get_template_directory_uri() . '/assets/js/code.js', false, '1.0.0' );
	wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/assets/css/style-admin.css', false, '' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

add_image_size( 'thumb100', 100, 100, true );
add_image_size( 'thumb300', 300, 300, true );
add_image_size( 'thumb350', 350, false );
add_image_size( 'thumb500', 500, 500, true );
add_image_size( 'thumb200x80', 200, 80, true );
add_theme_support( 'post-thumbnails' );


include 'sedit/core.php';
include 'sedit/hooks.php';
include 'sedit/slider.php';
include 'sedit/settings.php';

$sedit = new seditSlider();
$sedit->addSlider();

register_nav_menus( array(
	'top'    => 'Menu główne',
	'footer1'    => 'Nasza oferta',
	'footer2'    => 'Informacje'
) );
