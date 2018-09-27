<?php
namespace SEDIT;
require_once 'atomsClass.php';
use SEDIT\seditAtoms;
/**
 * Module
 */

class seditPages extends seditAtoms
{

	function __construct()
	{
    add_action('admin_menu', array($this, 'pageInitMenu'));
	}

  function pageData($data){
    $this->pages =  $data;
  }

  function pageInitMenu(){

    foreach ($this->pages as $page => $data) {
      add_menu_page($page, $page, 'manage_options', string_for_save($page), array($this, 'pageTabs'), $data['dashicons'] ,0 );
      if (is_array($data['subpage'])) {
        foreach ($data['subpage'] as $submenu => $subdata) {
          add_submenu_page($page, $submenu, $submenu, 'manage_options', 'pageTabs' );
        }

      }
    }
  }

  function pageTabs(){
        ?>
        <div class="wrap seditwrap">
					<form method="post" action="">
	    			<div class="seditform">
	    					<?php
	    						echo seditAtoms::switch_atoms($this->pages , $_GET['page']);
	    					 ?>
	    			</div>
    			</form>
    	 </div>
      <?php
  }
}
