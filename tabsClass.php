<?php
require_once 'modulesClass.php';
//namespace SEDIT\tabs;
use SEDIT\atoms\seditAtoms;

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
	public function pageTabsData($data) {
	    $this->tabs =  $data;
	}

	public function pageTabs(){
		if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		}
		?>
		<div class="wrap">
      <div id="icon-themes" class="icon32"></div>
      <h2><span style="margin:6px 10px 0 0;" class="dashicons dashicons-welcome-widgets-menus"></span><?php bloginfo('title'); ?> - opcje dodatkowe</h2>
			<?php settings_errors(); ?>
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
					foreach ($this->tabs as $key => $value) {
						if ($_GET['tab'] === $key) {
							foreach ($value as $title => $option) {
								$text = null;
								switch ($option['type']) {
									case 'input':
										echo seditAtoms::atomInput($title, $option);
										break;
									case 'textarea':
										echo seditAtoms::atomTextarea($title, $option);
										break;
									case 'wpeditor':
										echo seditAtoms::atomWpeditor($title, $option);
										break;
									case 'image':
										echo seditAtoms::atomImage($title, $option);
										break;
									case 'title':
										echo seditAtoms::atomTitle($title, $option);
										break;
									case 'separator':
										echo seditAtoms::atomSeparator($title, $option);
										break;
									case 'module:google':
										echo seditModules::moduleGoogle();
										break;
									default:
										echo seditAtoms::atomError($title, $option);
									break;
								}
								echo $text;
							}
						}
					}
					if (!empty($active_tab)) {
						echo '
						<tr>
							<td>
								<input name="submit" id="submit" class="button button-primary" value="Zapisz zmiany" type="submit">
							</td>
						</tr>
							';
					}else{
						echo '<h3>Witamy w panelu zarządzania treściami</h3>';
						echo '<p>Wybierz odpowiednią zakładkę, aby edytować treści</p>';
					}
					 ?>

				</tbody>
			</table>
		</form>
	 </div>
		<?php
	}



}
