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
    $this->pages = $data;

  }

  function pageInitMenu(){

		if ($this->pages) {
			// echo '<pre>';
			// print_r($this->pages);
			// echo '</pre>';
			foreach ($this->pages as $key => $data) {
				add_menu_page($data['page'], $data['page'], 'manage_options', string_for_save($data['page']), array($this, 'pageTabs'), $data['dashicons'] ,0 );
	      // foreach ($data as $keyp => $page) {
				// 	//add_submenu_page($page, $submenu, $submenu, 'manage_options', 'pageTabs' );
	      // }
	    }
		}
  }

  function pageTabs($data){
		// echo '<pre>';
		// print_r($this->pages);
		// echo '</pre>';
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
