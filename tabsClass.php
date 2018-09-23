<?php
namespace SEDIT;
require_once 'atomsClass.php';
require_once 'modulesClass.php';
use SEDIT\seditAtoms;
use SEDIT\seditModules;
/**
 * Module
 */

class seditTabs extends seditAtoms
{

	function __construct()
	{
		add_action('admin_menu', array($this, 'pageInit'));
	}

	function pageInit(){
		$title_blog = get_bloginfo('title');

		add_menu_page($title_blog, $title_blog, 'manage_options', 'ustawienia', array($this, 'pageTabs'), 'dashicons-welcome-widgets-menus' ,0 );
	}
	// Pobranie wszytkich danych
	function pageTabsData($data) {
	    $this->tabs =  $data;

	}

	function pageTabs(){
		if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		}
		?>
		<div class="wrap">
      <div id="icon-themes" class="icon32"></div>
      <h2><span style="margin:6px 10px 0 0;" class="dashicons dashicons-welcome-widgets-menus"></span><?php bloginfo('title'); ?> - opcje dodatkowe</h2>
			<?php //settings_errors(); ?>
			<div class="nav-tab-wrapper">
				<?php
					foreach ($this->tabs as $key => $value) {
						echo '<a href="?page=ustawienia&tab='.$key.'" class="nav-tab '.($active_tab == $key ? 'nav-tab-active' : '').'">'.$key.'</a>';
					}
				 ?>
			</div>
			<form method="post" action="">
				<table class="form-table">
					<tbody>
					<?php
						echo seditAtoms::switch_atoms($this->tabs);
					 ?>
				</tbody>
			</table>
		</form>
	 </div>
		<?php
	}



}
