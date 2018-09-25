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



      if (1==1) {
        ?>
        <div class="wrap">
          <h2></h2>
    			<form method="post" action="">
    				<table class="form-table">
    					<tbody>
    					<?php
    						echo seditAtoms::switch_atoms($this->pages , $_GET['page']);
    					 ?>
    				</tbody>
    			</table>
    		</form>
    	 </div>
      <?php
      }
  }
}
