<?php
add_action('admin_menu', 'my_admin_menu');
function my_admin_menu() {
	$title_blog = get_bloginfo('title');
		add_menu_page($title_blog, $title_blog, 'manage_options', 'ustawienia', 'page_settings', 'dashicons-welcome-widgets-menus' ,0 );

}
//////////////USTAWIENIA///////////////

		function page_settings() {
?>
    <div class="wrap">
        <div id="icon-themes" class="icon32"></div>
        <h2><span style="margin:6px 10px 0 0;" class="dashicons dashicons-welcome-widgets-menus"></span><?php bloginfo('title'); ?> - opcje dodatkowe</h2>
        <?php settings_errors(); ?>
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            }
        ?>
        <h2 class="nav-tab-wrapper">
            <a href="?page=ustawienia&tab=option1" class="nav-tab <?php echo $active_tab == 'option1' ? 'nav-tab-active' : ''; ?>">Podstawowe</a>
            <a href="?page=ustawienia&tab=option2" class="nav-tab <?php echo $active_tab == 'option2' ? 'nav-tab-active' : ''; ?>">Dane kontaktowe</a>
            <a href="?page=ustawienia&tab=option3" class="nav-tab <?php echo $active_tab == 'option3' ? 'nav-tab-active' : ''; ?>">Socialmedia</a>
            <a href="?page=ustawienia&tab=option4" class="nav-tab <?php echo $active_tab == 'option4' ? 'nav-tab-active' : ''; ?>">sdfdsfdsf</a>
        </h2>

        <form method="post" action="">

            <?php
							switch ($active_tab) {
								case 'option1':
									field1();
									break;
								case 'option2':
									field2();
									break;
								case 'option3':
									field3();
									break;
								case 'option4':
									field11();
									break;

								default:
									field1();
									break;
							}
						 ?>
						 <p class="submit"><input name="submit" id="submit" class="button button-primary" value="Zapisz zmiany" type="submit"></p>
        </form>
    </div>
<?php
}
function field11(){
  echo 111;
}
function field1(){
///////SAVE PAGE/////////
	 $name = array(
		 'img_logo',
		 'googlex',
		 'googley',
		 'googleapikey'
	 );
	 save_multi_option($name, '');
	?>
	<p>Podstawowe dane konfiguracyjne dla strony</p>
	<table class="form-table">
		<tbody>

  		<tr>
  			<th scope="row"><label for="img_logo">Logo</label></th>
  			<td class="term-group-2222222">
					<input type="hidden" name="img_logo" id="img_logo" value="<?php echo get_multi_info(null, 'img_logo', 'value', 'thumb350', 2222222); ?>">
					<button type="button" data-id="2222222" class="button addSingleMedia" data-media-uploader-target="#img_logo">Dodaj nowe logo</button>
					<hr>
					<?php echo get_multi_info(null, 'img_logo', 'image', 'thumb350', 2222222); ?>
  			</td>
  		</tr>



			<tr>
				<th scope="row"><label for="google">Google</label></th>
				<td>
					<input name="googlex" style="display:block;" id="googlex" placeholder="50.040339" value="<?php echo get_option('googlex'); ?>" class="regular-text" type="text">
					<input name="googley" id="googley" placeholder="22.000041" value="<?php echo get_option('googley'); ?>" class="regular-text" type="text">
					<p class="description">Współrzedne punktu na mapie Google</p>
					<input name="googleapikey" id="googleapikey" placeholder="Google maps APIKEY" value="<?php echo get_option('googleapikey'); ?>" class="regular-text" type="text">

				</td>
			</tr>

		</tbody>
	</table>
	<?php
}
function field2(){
///////SAVE PAGE/////////
	 $name = array(
		 'adress',
		 'telephone',
		 'option',
		 'email'
	 );
	 save_multi_option($name, '');
	?>
	<p>Podstawowe dane kontaktowe</p>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row"><label for="adress">Adress</label></th>
				<td>
					<input name="adress" id="adress" value="<?php echo get_option('adress'); ?>" class="regular-text" type="text">
					<p class="description">Adres firmowy</p>
				</td>
			</tr>

      <tr>
      	<th scope="row"><label for="option">Opis</label></th>
      	<td>
      		<input name="option" id="option" value="<?php echo get_option('option'); ?>" class="regular-text" type="tel">
    			<p class="description">Tekst znajdujący się nad menu</p>
    		</td>
    	</tr>

      <tr>
      	<th scope="row"><label for="telephone">Telefon</label></th>
      	<td>
      		<input name="telephone" id="telephone" value="<?php echo get_option('telephone'); ?>" class="regular-text" type="tel">
    			<p class="description">Telefon kontaktowy</p>
    		</td>
    	</tr>

			<tr>
				<th scope="row"><label for="email">Adres email</label></th>
				<td>
					<input name="email" id="email" value="<?php echo get_option('email'); ?>" class="regular-text ltr" type="email">
					<p class="description">Email firmowy</strong></p>
				</td>
			</tr>

		</tbody>
	</table>
	<?php
}
function field3(){
///////SAVE PAGE/////////
		 $name = array(
			 'facebook',
			 'instagram',
			 'youtube'
		 );
		 save_multi_option($name, '');
		?>
	<p>Linki do mediów społecznościowych</p>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row"><label for="facebook">Facebook</label></th>
				<td>
					<input name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" class="regular-text" type="text">
					<p class="description">https://www.facebook.com/</p>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="Instagram">Instagram</label></th>
				<td>
					<input name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>" class="regular-text" type="text">
					<p class="description">https://www.instagram.com/</p>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="youtube">Youtube</label></th>
				<td>
					<input name="youtube" id="youtube" value="<?php echo get_option('youtube'); ?>" class="regular-text ltr" type="text">
					<p class="description">https://www.youtube.com/</strong></p>
				</td>
			</tr>

		</tbody>
	</table>
	<?php
}
