<?php
// dołączenie wszytkich modułów
require_once 'atomsClass.php';
require_once 'tabsClass.php';
include 'slider.php';
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
// dodatki dla admina
function load_custom_wp_admin_style() {
	wp_enqueue_media();
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css', false, '' );
 	wp_enqueue_script( 'wp-media', get_template_directory_uri() . '/sedit/assets/js/wp-media.js', false, '1.0.0' );
 	wp_enqueue_script( 'clipboard.min', get_template_directory_uri() . '/sedit/assets/js/clipboard.min.js', false, '1.0.0' );
 	wp_enqueue_script( 'code', get_template_directory_uri() . '/sedit/assets/js/code.js', false, '1.0.0' );
	wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/sedit/assets/css/style-admin.css', false, '' );
}


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
// dodatki dla stylu
function theme_enqueue_styles() {
		wp_enqueue_style( 'style-slider', get_template_directory_uri() . '/sedit/assets/css/slider.css', false, '' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, '' );
		wp_enqueue_script( 'jquery.min', get_template_directory_uri() . '/sedit/assets/js/jquery.min.js', false, '3.3.1' );
		wp_enqueue_script( 'responsiveslides.min', get_template_directory_uri() . '/sedit/assets/js/responsiveslides.min.js', false, '1.0.0' );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/sedit/assets/js/slick.js', false, '1.0.0' );
		wp_enqueue_script( 'rodo', get_template_directory_uri() . '/sedit/assets/js/rodo.js', false, '1.0.0' );
		wp_enqueue_script( 'code', get_template_directory_uri() . '/sedit/assets/js/code-style.js', false, '1.0.0' );
}

add_image_size( 'marker', 64, false );
add_image_size( 'thumb100', 100, 100, true );
add_image_size( 'thumb300', 300, 300, true );
add_image_size( 'thumb350', 350, false );
add_image_size( 'thumb500', 500, 500, true );
add_image_size( 'thumb200x80', 200, 80, true );
add_theme_support( 'post-thumbnails' );

//////////////Zapisanie ustawień///////////////
function save_option($name, $type){
	if ( isset( $_POST['submit'] ) && $_POST['submit'] != '' ) {
			update_option( $name.$type, $_POST[$name] );
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
				$url_img[0] = get_stylesheet_directory_uri() . '/sedit/images/noimage.png';
			}
			$text = '<img class="hide-img hide-img-'.$id.'"  data-media-uploader-target="#img_logo" src="'.$url_img[0].'">';
			return $text;
			break;

		case 'link':
			if ($up_img) {
				$url_img = wp_get_attachment_image_src($up_img, $size, false)[0];
			}
			return $url_img;
			break;
	}
}
//////////////Pobranie pobranie konkretnego obrazka///////////////
function get_image_option($type, $name, $size, $crop){
// TYPE img lub mysqli_get_links_stats
// NAME nazwa zmiennej
// SIZE rozmiar full = oryginalny rozmiar
// CROP kadrowanie true lub false
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
///////////////////////////Generowanie stringu do zapisu////////////////////////
function string_for_save($string){
  $string = strtr($string, 'ĘęÓóĄąŚśŁłŹźŻżĆćŃń', 'EeOoAaSsLlZzZzCcNn');
  $string = strtr($string, 'ˇ¦¬±¶Ľ','ASZasz');
  $string = preg_replace("'[[:punct:][:space:]]'",'-',$string);
  $string = strtolower($string);
  $znaki = '-';
  $powtorzen = 1;
  $string = preg_replace_callback('#(['.$znaki.'])\1{'.$powtorzen.',}#', create_function('$a', 'return substr($a[0], 0,'.$powtorzen.');'), $string);
  return $string;
}
/////////////////////////////INNE//////////////////////////////////
function new_dashboard_home($username, $user){
    if(array_key_exists('administrator', $user->caps)){
        wp_redirect(admin_url('admin.php?page=ustawienia', 'http'), 301);
        exit;
    }
}
add_action('wp_login', 'new_dashboard_home', 10, 2);
function my_login_logo() {
	if (get_multi_info(null, 'logo', 'link', 'full', null)) {
		$logo = 'background-image: url('.get_multi_info(null, 'logo', 'link', 'full', null).');';
	}else{
		$logo = 'background-image: url('.get_stylesheet_directory_uri().'/sedit/images/logo.png);';
	}
	?>
    <style type="text/css">
        #login h1 a, .login h1 a {
					<?php echo $logo; ?>
					height:80px;
					width:320px;
					background-size: auto 80px;
					background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
