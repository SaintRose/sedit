<?php
require_once 'atomsClass.php';
require_once 'pageClass.php';
require_once 'postTypeClass.php';
include 'slider.php';
use SEDIT\seditPage;
use SEDIT\seditAtoms;
use SEDIT\seditPostType;

$sedit = new seditPage();
$postType = new seditPostType();






add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
// dodatki dla admina
function load_custom_wp_admin_style() {
	wp_enqueue_media();
	wp_enqueue_style( 'font-family', get_template_directory_uri() . '/sedit/assets/css/fonts/font-family.css', false, '' );
 	wp_enqueue_script( 'wp-media', get_template_directory_uri() . '/sedit/assets/js/wp-media.js', false, '1.0.0' );
 	wp_enqueue_script( 'clipboard.min', get_template_directory_uri() . '/sedit/assets/js/clipboard.min.js', false, '1.0.0' );
 	wp_enqueue_script( 'code', get_template_directory_uri() . '/sedit/assets/js/code.js', false, '1.0.0' );
	wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/sedit/assets/css/style-admin.css', false, '' );
	wp_enqueue_style( 'print', get_template_directory_uri() . '/sedit/assets/css/print.css', false, '' );
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
add_image_size( 'thumb120', 120, 120, true );
add_image_size( 'thumb300', 300, 300, true );
add_image_size( 'thumb350', 350, false );
add_image_size( 'thumb500', 500, 500, true );
add_image_size( 'thumb530', 530, 430, true );
add_image_size( 'thumb200x80', 200, 80, true );
add_image_size( 'brama', 355, 800, true );
add_theme_support( 'post-thumbnails' );

//////////////Zapisanie ustawień///////////////

// echo "<pre>";
// print_r( $_REQUEST );
// echo "</pre>";
function save_option($name, $type){
	if ( isset( $_POST['submit'] ) OR isset( $_POST['save'] ) ) {
			if (is_array($_POST[$name])) {
				foreach ($_POST[$name] as $img_key => $img_value) {
					$idimg .= $img_value.',';
				}
				$_POST[$name] = $idimg;
			}
			update_option( $name, $_POST[$name] );
	}
}






// $data1 = $postType->postData();
// echo "<pre>";
// print_r( $data1 );
// echo "</pre>";














//////////////Pobranie multi info///////////////
// POSTID custom post czy ustawienia
// NAME nazwa zmiennej
// TYPE wyświetlanie wartości string lub obrazka
// SIZE rozmiar zdeginiowany w add_image_size
// ID losowy ciąc znaków int okreslający kontener
function sedit($postID = null, $name = null, $type = null, $size = null, $id = null){

  if (!empty($postID)) {
    $up_img = get_post_meta( $postID, $name, true );
  }else {
    $up_img = get_option($name);
  }
	switch ($type) {
		case 'value':
				return $up_img;
			break;

		case 'option':

				return $up_img;
			break;

		case 'file':
			if ($up_img) {
				$url_img = wp_get_attachment_url( $up_img );
			}
			$text = '<a class="hide-img hide-img-'.$id.'" href="'.$url_img.'">Podgląd</a>';
			return $text;
			break;

		case 'filelink':
			if ($up_img) {
				$url_img = wp_get_attachment_url( $up_img );
			}
			return $url_img;
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

		case 'images':
			if ($up_img) {
				if (!is_array($up_img)) {
					$get_id_image = explode(",", $up_img );
				}
				foreach ($up_img as $key => $value) {
					$image_attributes = wp_get_attachment_image_src($value, $size);
					if ($image_attributes) {
						$text .= '
						<div class="sedit-img-'.$key.'">
							<img src="'.$image_attributes[0].'">
						</div>';
					}
				}
			}
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
	$string= strtolower($string);
$string = str_replace(' ', '-', $string);
$string = str_replace(array('ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ź', 'ż'), array('a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z'), $string);
$string = preg_replace('/[^0-9a-z\-]+/', '', $string);
$string = preg_replace('/[\-]+/', '-', $string);
$string= trim($string,'-');


$string = str_replace(array(',', ':', ';', ' '), array('', '', '', '-'), $string);return $string;
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

		$logo = 'background-image: url('.get_stylesheet_directory_uri().'/sedit/images/logo.png);';

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

add_action( 'admin_bar_menu', 'custom_wp_toolbar_link', 999 );

function custom_wp_toolbar_link( $wp_admin_bar ) {
    if( current_user_can( 'level_5' ) ){

        $args = array(
            'id' => 'james',
            'title' => '<span class="ab-icon"></span><span class="ab-label">SEDIT</span>',
            'href' => null,
            'meta' => array(
                'class' => 'sedit-copy',
                'title' => 'Skopiuj, aby umieścić na stronie.'
            )
        );
        $wp_admin_bar->add_node($args);

    }
}

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
/////////////////////////////LINKOWANIE/////////////////////////////////
function asset($name){
	echo get_stylesheet_directory_uri().'/assets/images/'.$name;
}
function assetImg($name){
	echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/'.$name.'" >';
}
