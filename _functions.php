<?php
include 'sedit/core.php';

$sedit = new seditSlider();
$sedit->addSlider();

register_nav_menus( array(
	'top'    => 'Menu główne'
) );


//do skasowania


function login_pdf( $atts, $content ) {
    extract( shortcode_atts( array(
        'nazwa' => '',
        'link' => '',
    ), $atts ) );

		if (is_user_logged_in()) {
			$link = '<a href="'.$atts['link'].'">'.$atts['nazwa'].'</a>';
		}else{
			$link = $atts['nazwa'].' (<a href="'.wp_login_url().'">Zaloguj się, aby zobaczyć </a>)';
		}

    return $link;
}
add_shortcode( 'PDF', 'login_pdf' );

// add new buttons
add_filter( 'mce_buttons', 'myplugin_register_buttons' );
function myplugin_register_buttons( $buttons ) {
   array_push( $buttons, 'separator', 'myplugin' );
   return $buttons;
}
add_action('init', 'wpse72394_shortcode_button_init');
function wpse72394_shortcode_button_init() {
		 if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
					return;
		 add_filter("mce_external_plugins", "wpse72394_register_tinymce_plugin");
		 add_filter('mce_buttons', 'wpse72394_add_tinymce_button');
}
function wpse72394_register_tinymce_plugin($plugin_array) {
	 $plugin_array['wpse72394_button'] = 'path/to/shortcode.js';
	 return $plugin_array;
}
function wpse72394_add_tinymce_button($buttons) {
	 $buttons[] = "wpse72394_button";
	 return $buttons;
}
