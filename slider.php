<?php
/**
 * SLIDER piotrseed@gmail.com
 */
class seditSlider
{

  function __construct()
  {
    // code...
  }
  public function addSlider(){

    function create_slider_menu() {
      if (empty($settings)) {
        $settings = array(
            'name' => 'Slider',
            'singular_name' => 'Slajd',
            'all_items' => 'Zobacz wszystkie',
            'add_new' => 'Dodaj nowy',
            'add_new_item' => 'Dodaj nowy slajd',
            'edit' => 'Edytuj',
            'edit_item' => 'Edytuj slajd',
            'new_item' => 'Dodaj nowy slajd',
            'view' => 'Zobacz',
            'view_item' => 'Zobacz slajd',
            'search_items' => 'Szukaj',
            'featured_image' => 'Dodaj zdjęcie w tle',
            'set_featured_image' => 'Wybierz grafikę',
            'not_found' => 'Brak slajdów w bazie dodaj nowy.',
            'not_found_in_trash' => 'Brak usuniętych slajdów.',
            'parent' => 'slider'
        );
      }

        register_post_type( 'slider',
            array(
                'labels' => $settings,
    						'public' => true,
                'menu_position' => 1,
    						'supports' => array( 'title'),
                'taxonomies' => array( 'slider' ),
                'menu_icon' => 'dashicons-category',
    						'hierarchical' => false,
                'has_archive' => true
            )
        );
    }
    add_action( 'init', 'create_slider_menu' );
  }
}

//////////////SLIDER///////////////



function display_slider_meta_box( $review ) {
    $option1 = get_post_meta( $review->ID, 'option1', true );
    $option2 = get_post_meta( $review->ID, 'option2', true );
    $option3 = get_post_meta( $review->ID, 'option3', true );
    $option4 = get_post_meta( $review->ID, 'option4', true );
    $option5 = get_post_meta( $review->ID, 'option5', true );
    $option6 = get_post_meta( $review->ID, 'option6', true );
    $option7 = get_post_meta( $review->ID, 'option7', true );
  ?>
    <table style="width:100%;">
        <tr>
            <td><input type="text"  style="width:100%;" placeholder="Pierwsza tekst" name="option1" value="<?php echo $option1; ?>" /></td>
        </tr>
		    <tr>
		        <td><input type="text"  style="width:100%;" placeholder="Drugi tekst" name="option2" value="<?php echo $option2; ?>" /></td>
		    </tr>
		    <tr>
		        <td><input type="text"  style="width:100%;" placeholder="Trzeci tekst" name="option3" value="<?php echo $option3; ?>" /></td>
		    </tr>
		    <tr>
		        <td><input type="text"  style="width:100%;" placeholder="Czwarty tekst" name="option4" value="<?php echo $option4; ?>" /></td>
		    </tr>
		    <tr>
		        <td><input type="text"  style="width:100%;" placeholder="Piąty tekst" name="option5" value="<?php echo $option5; ?>" /></td>
		    </tr>
		    <tr>
		        <td><input type="text"  style="width:100%;" placeholder="Szósty tekst" name="option6" value="<?php echo $option6; ?>" /></td>
		    </tr>
		    <tr>
		        <td><input type="text"  style="width:100%;" placeholder="Siódmy tekst" name="option7" value="<?php echo $option7; ?>" /></td>
		    </tr>
    </table>
    <?php
}


function set_custom_edit_slider_columns( $columns ) {
  $date = $colunns['date'];
  unset( $columns['date'] );
  $columns['slider_obraz'] = 'Obraz';
  $columns['text'] = 'Treść slidera';


  return $columns;
}
add_filter( 'manage_slider_posts_columns', 'set_custom_edit_slider_columns');


function table_slider_content( $column_name, $post_id ) {
    if ($column_name == 'slider_obraz') {
			$slider_image = esc_html( get_post_meta( $post_id, 'slider_image', true ) );
			$array_image = explode(',', $slider_image);
			$image_attributes = wp_get_attachment_image_src($array_image[0], 'thumb200x80');
			echo '<img class="image-100" src="'.$image_attributes[0].'">';
		}
    if ($column_name == 'text') {
    	echo get_post_meta( $post_id, 'option1', true ).'<br>';
    	echo get_post_meta( $post_id, 'option2', true ).'<br>';
    	echo get_post_meta( $post_id, 'option3', true ).'<br>';
    	echo get_post_meta( $post_id, 'option4', true ).'<br>';
    }
}
add_action( 'manage_slider_posts_custom_column', 'table_slider_content', 10, 2  );

function my_title_place_holder($title , $post){
		if( $post->post_type == 'produkty' ){
				$my_title = "Nazwa produktu";
				return $my_title;
		}
		if( $post->post_type == 'slider' ){
				$my_title = "Nazwa slidera";
				return $my_title;
		}
		return $title;
}
add_filter('enter_title_here', 'my_title_place_holder' , 20 , 2 );



function my_slider_admin() {
	add_meta_box( 'slider_meta_box',
			'Tekst na slajderze',
			'display_slider_meta_box',
			'slider', 'normal', 'high'
	);
	add_meta_box( 'slider_image_meta_box',
			'Grafika slajdera',
			'display_slider_gallery_meta_box',
			'slider', 'normal', 'high'
	);
}
add_action( 'admin_init', 'my_slider_admin' );
function display_slider_gallery_meta_box( $review ) {
    ?>
    <table class="form-table">
  		<tbody>
        <tr>
    			<td>
  					<input type="hidden" name="txt_upload_image" id="txt_upload_image" value="<?php echo sedit($review->ID, 'slider_image', 'value', 'full', 58796); ?>">
  					<button type="button" data-id="58796" class="button addSingleMedia" data-media-uploader-target="#txt_upload_image">Wybierz zdjęcie</button>
    			</td>
    		</tr>
        <tr>
          <td class="term-group-58796">
            <?php echo sedit($review->ID, 'slider_image', 'image', 'full', 58796); ?>
          </td>
        </tr>
      </tbody>
    </table>
    <?php
}
///////SAVE SLIDER/////////
function add_slider_fields( $slider_id, $slider ) {
    if ( $slider->post_type == 'slider' ) {
        if ( isset( $_POST['option1'] ) && $_POST['option1'] != '' ) {
            update_post_meta( $slider_id, 'option1', $_POST['option1'] );
        }
        if ( isset( $_POST['option2'] ) && $_POST['option2'] != '' ) {
            update_post_meta( $slider_id, 'option2', $_POST['option2'] );
        }
        if ( isset( $_POST['option3'] ) && $_POST['option3'] != '' ) {
            update_post_meta( $slider_id, 'option3', $_POST['option3'] );
        }
        if ( isset( $_POST['option4'] ) && $_POST['option4'] != '' ) {
            update_post_meta( $slider_id, 'option4', $_POST['option4'] );
        }
        if ( isset( $_POST['option5'] ) && $_POST['option5'] != '' ) {
            update_post_meta( $slider_id, 'option5', $_POST['option5'] );
        }
        if ( isset( $_POST['option6'] ) && $_POST['option6'] != '' ) {
            update_post_meta( $slider_id, 'option6', $_POST['option6'] );
        }
        if ( isset( $_POST['option7'] ) && $_POST['option7'] != '' ) {
            update_post_meta( $slider_id, 'option7', $_POST['option7'] );
        }
        if ( isset( $_POST['txt_upload_image'] ) && $_POST['txt_upload_image'] != '' ) {
            update_post_meta( $slider_id, 'slider_image', $_POST['txt_upload_image']);
        }
    }
}
add_action( 'save_post', 'add_slider_fields', 10, 2 );
