<?php
namespace SEDIT;
require_once 'atomsClass.php';
require_once 'modulesClass.php';
use SEDIT\seditAtoms;
use SEDIT\seditModules;
/**
 * Module
 */

class seditPostType extends seditAtoms
{

	function __construct()
	{
    add_action( 'add_meta_boxes', array($this, 'page_create_metabox') );
		add_action( 'save_post', array($this, 'sedit_save_post') );
	}
  ///////////////////////////////////////////////////////////////////////////

  function postData($data){
    return $this->data = $data;
  }

  function savePostData($data){
    return $this->savedata = $data;
  }


  function page_create_metabox() {
    if ($this->data) {
      foreach ($this->data as $key => $postPage) {
        $this->posttype = $postPage['posttype'];
        $this->atoms = $postPage['atoms'];
        // echo "<pre>";
        // print_r($this->elements[0]);
        // echo "</pre>";
        //foreach ($postPage['atoms'] as $atomKey => $postAtoms) {
          // echo "<pre>";
          // print_r($postAtoms);
          // echo "</pre>";$postAtoms['atoms']['title']
           add_meta_box(
            'page_metabox',
            'Karta',
            array($this, 'page_render_metabox'),
            $this->posttype,
            'normal',
            'default'
          );
      //  }
      }
    }
  }

	function sedit_save_post( $post_id ){
		if (is_array($this->savedata)) {
			foreach ($this->savedata as $key => $value) {
				update_post_meta( $post_id, $value, $_POST[$value]);
			}
		}
	}

  function page_render_metabox(){
    echo seditAtoms::switch_atoms($this->data, 'posttype');
  }



















}
