<?php
namespace SEDIT;
require_once 'atomsClass.php';
require_once 'modulesClass.php';
use SEDIT\seditAtoms;
use SEDIT\seditModules;
/**
 * Module
 */

class seditPage extends seditAtoms
{

	function __construct()
	{
		//Konfigutacja dla //TYPE TABS//
		add_action('admin_menu', array($this, 'pageTabsInit'));
		//Konfigutacja dla //TYPE PAGES//
	  add_action('admin_menu', array($this, 'pagesMenu'));
		//Konfigutacja dla //POST TYPE//
		add_action( 'add_meta_boxes', array($this, 'page_create_metabox') );
		add_action( 'save_post', array($this, 'sedit_save_post') );
		//lang dla tabsow
		add_action( 'save_post', array($this, 'langData') );
	}

///////////////////////////////TYPE PAGES/////////////////////////////////
	// Pobranie wszytkich danych
	function pagesData($data){
		return $this->pages = $data;
	}
  function pagesMenu(){

		if ($this->pages) {
			foreach ($this->pages as $key => $data) {
				add_menu_page($data['page'], $data['page'], 'manage_options', $key+1, array($this, 'pagesContent'), $data['dashicons'] ,0 );
	    }
		}
  }

  function pagesContent($data){
    ?>
    <div class="wrap seditwrap">
			<form method="post" action="">
  			<div class="seditform">
  					<?php
  						echo seditAtoms::switch_atoms($this->pages, $_GET['page']-1);
  					 ?>
  			</div>
			</form>
	 </div>
  <?php
  }
/////////////////////////////////////TYPE TABS//////////////////////////////////////
	// Pobranie wszytkich danych
	function tabsData($data){
		return $this->tabs = $data;
	}
	function pageTabsInit(){
		$title_blog = get_bloginfo('title');
		add_menu_page($title_blog, $title_blog, 'manage_options', 'ustawienia', array($this, 'tabsContent'), 'dashicons-welcome-widgets-menus' ,0 );
	}
	function tabsContent(){
		if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		}
		?>
		<div class="wrap">
			<div id="icon-themes" class="icon32"></div>
			<h2><span style="margin:6px 10px 0 0;" class="dashicons dashicons-welcome-widgets-menus"></span><?php bloginfo('title'); ?> - ustawienia</h2>
			<?php //settings_errors(); ?>
			<div class="nav-tab-wrapper nav-tab-sedit">
				<?php
					$first = $_GET['tab'];
					if ($this->tabs) {
						foreach ($this->tabs as $pageTab => $pageArray) {
							$name = string_for_save($pageTab);
							echo '<a href="?page=ustawienia&tab='.$name.'"
											class="nav-tab '.(($active_tab === $name OR $first === null) ? 'nav-tab-active' : '').'">
											'.(($pageArray['dashicons']) ? '<span class="dashicons '.$pageArray['dashicons'].'"></span>' : '').'
											'.$pageArray['page'].'</a>';
							$first = true;
						}
					}
				 ?>
			</div>
			<form method="post" action="">
				<div class="seditform">
					<?php
					// echo "<pre>";
					// print_r($this->tabs);
						echo seditAtoms::switch_atoms($this->tabs, $_GET['tab']);
					 ?>
				</div>
		</form>
	 </div>
		<?php
	}
////////////////////////////////////////LANG/////////////////////////////////////
function langData(){
	if (function_exists( 'pll_register_string' )) {
		if (is_array($this->tabs)) {
			foreach ($this->tabs as $key => $array) {
				foreach ($array['atoms'] as $keyatom => $value) {
					$lang = sedit(null, $value['name'], 'value');
					pll_register_string('sedit', $lang);
				}
			}
		}
	}

}

////////////////////////////////////////POST TYPE//////////////////////////////////////


function postTypeData($data){
	$this->data = $data;
}

function page_create_metabox() {
	if ($this->data) {
		foreach ($this->data as $key => $postPage) {
			$this->posttype = $postPage['posttype'];
			$this->atoms = $postPage['atoms'];
				 add_meta_box(
					'page_metabox',
					'Karta',
					array($this, 'page_render_metabox'),
					$this->posttype,
					'normal',
					'default'
				);
			}
	}
}

function sedit_save_post( $post_id ){
	if (is_array($this->data)) {
		foreach ($this->data as $key => $array) {
			foreach ($array['atoms'] as $keyatom => $value) {
				update_post_meta( $post_id, $value['name'], $_POST[$value['name']]);
			}
		}
	}
}

function page_render_metabox(){
	echo seditAtoms::switch_atoms($this->data, 'posttype');
}
////////////////////////////////////////////////////////////////////////////























}
