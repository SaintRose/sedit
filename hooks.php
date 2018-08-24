<?php

function page_create_metabox() {
	add_meta_box(
		'page_metabox',
		'<i class="fas fa-cogs"></i> Ustawienia',
		'page_render_metabox',
		'page',
		'normal',
		'default'
	);

}
add_action( 'add_meta_boxes', 'page_create_metabox' );

function page_render_metabox(){
	global $post;
	$details = get_post_meta( $post->ID, 'page_home_metabox', true );
	echo '
	<ul>
	<input type="text" name="page_custom_add_metabox" value="'.$details.'">
	Wyświetl strone w zakładce oferta na stronie głównej.
	</ul>
	';
}
// saves our data
function frontpage_save_meta_box_data( $post_id ){
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ){
        return;
    }
    if ( isset( $_REQUEST['page_custom_add_metabox'] ) ) {
        update_post_meta( $post_id, 'page_home_metabox', sanitize_text_field( $_POST['page_custom_add_metabox'] ) );
    }
}
add_action( 'save_post_page', 'frontpage_save_meta_box_data' );
