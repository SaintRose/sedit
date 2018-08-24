<?php
//edytuje opcje
//////////////Zapisanie ustawień///////////////
function save_multi_option($name, $type){
	if ( isset( $_POST['submit'] ) && $_POST['submit'] != '' ) {
	foreach ($name as $key => $value) {
			update_option( $value.''.$type, $_POST[$value] );
		}
	}
}
//////////////Pobranie multi info///////////////
// POST_TYPE_ID custom post czy ustawienia
// NAME nazwa zmiennej
// TYPE wyświetlanie wartości string lub obrazka
// SIZE rozmiar zdeginiowany w add_image_size
// ID losowy ciąc znaków int okreslający kontener
function get_multi_info($post_type_id, $name, $type, $size, $id){
  if (!empty($post_type_id)) {
    $up_img = get_post_meta( $post_type_id, $name, true );
  }else {
      $up_img = get_option($name);
  }
	switch ($type) {
		case 'value':
				return $up_img;
			break;

		case 'image':
			if ($up_img) {
				$url_img = wp_get_attachment_image_src($up_img, $size, false);
			}else {
				$url_img[0] = get_stylesheet_directory_uri() . '/template/images/noimage.png';
			}
			$text = '<img class="hide-img hide-img-'.$id.'"  data-media-uploader-target="#img_logo" src="'.$url_img[0].'">';
			return $text;
			break;
	}
}
//////////////Pobranie pobranie konkretnego obrazka///////////////
function get_image_option($type, $name, $size, $crop){
// img = src, link = link file
  $id_image = get_option($name);
  $url_img = wp_get_attachment_image_src($id_image, $size, $crop);
	switch ($type) {
    case 'img':
      if ($id_image) {
        return '<img class="hide_img" src="'.$url_img[0].'">';
      }
      break;
    case 'link':
      if ($id_image) {
        return $url_img[0];
      }
      break;

    default:
      return false;
      break;
  }
}
