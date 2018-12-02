<?php
namespace SEDIT;
require_once 'modulesClass.php';
use SEDIT\seditModules;
/**
 * pojedyncze atomy dla modulow
 */
class seditAtoms extends seditModules
{

	function __construct()
	{

	}
// INPUT
	public function atomInput($option){
		$postID = get_the_id();
		save_option($option['name'], $postID);
		$atom = null;
		$atom = '
		<ul>
			<li>
				<label>
					'.$option['title'].'
					<i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				</label>
				<input
					name="'.$option['name'].'"
					id="'.$option['name'].'"
					value="'.sedit($postID, $option['name'], "value", null, $random).'"
					placeholder="'.$option['placeholder'].'"
					type="text">

				'.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'

				<l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit('.$postID.', \''.$option['name'].'\', \'value\'); ?>').'</label></l>

			</li>
		</ul>
		';
		return $atom;
	}
// TEXTAREA
	function atomTextarea($option){
		$postID = get_the_id();
		save_option($option['name'], $postID);
		$atom = null;
		$atom = '
		<ul>
			<li>
				<label>
				  '.$option['title'].'
				  <i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				</label>
				<textarea
					name="'.$option['name'].'"
					id="'.$option['name'].'"
					placeholder="'.$option['placeholder'].'"
					class="regular-text"
					rows="5"
					>'.sedit($postID, $option['name'], "value", null, $random).'</textarea>

				'.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'

				<l class="front-code-php"><l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit('.$postID.', \''.$option['name'].'\', \'value\'); ?>').'</label></l></l>

			</li>
		</ul>
		';
		return $atom;
	}
// WPEDITOR
	function atomWpeditor($option){
		$postID = get_the_id();
		save_option($option['name'], $postID);
		$atom = null;
		$atom = '
		<ul>
			<li>
				<label>
				  '.$option['title'].'
				  <i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				</label>

				'.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'

				<l class="front-code-php">
						<l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit('.$postID.', \''.$option['name'].'\', \'value\'); ?>').'</label></l>
				</l>

			</li>
		</ul>
		';
		return $atom;
	}
// IMAGE
	function atomImage($option){
		$postID = get_the_id();
		save_option($option['name'], $postID);
		if ($option['size'] === 'marker') {
			$size = 'marker';
		}
		$random = rand(0, 10000);
		$atom = '
		<ul>
			<li class="term-group-'.$random .'">
				<label>
				  '.$option['title'].'
				  <i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				</label>

				<input
					name="'.$option['name'].'"
					id="'.$option['name'].'"
					value="'.sedit($postID, $option['name'], "value", null, $random).'"
					class="regular-text"
					type="hidden">

					<button
						type="button"
						data-id="'.$random .'"
						class="button addSingleMedia"
						data-media-uploader-target="#'.$option['name'].'"
						><i class="fas fa-images"></i> Wybierz z biblioteki</button>

					'.((!empty($option['description'])) ? ''.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'' : '').'

					<l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit('.$postID.', \''.$option['name'].'\', \'image\', \'thumb350\'); ?>').'</label></l>

					<span>'.sedit($postID, $option['name'], 'image', $size, $random).'</span>

			</li>
		</ul>
		';
		return $atom;
	}
	// IMAGES
		function atomImages($option){
			$postID = get_the_id();
			save_option($option['name'], $postID);
			if ($option['size'] === 'marker') {
				$size = 'marker';
			}

			$random = rand(0, 10000);
			$atom = '
			<ul>
				<li class="term-group-'.$random .'">
					<label>
					  '.$option['title'].'
					  <i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
					</label>

						<input
							name="'.$option['name'].'"
							id="'.$option['name'].'"
							value="'.sedit($postID, $option['name'], "value", null, null).'"
							class="regular-text input-name-'.$random .'"
							type="hidden">

							<button
								type="button"
								data-id="'.$random .'"
								class="button addMultiMedia"
								data-media-uploader-target="#'.$option['name'].'"
								data-name-field="'.$option['name'].'"
								><i class="fas fa-images"></i> Wybierz z biblioteki</button>

							<div
								class="button delete-all-image"
								data-crash="'.$random .'"
								input-name="'.$option['name'].'"><i class="fas fa-trash-alt"></i></div>


						'.((!empty($option['description'])) ? ''.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'' : '').'

						<l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit('.$postID.', \''.$option['name'].'\', \'images\', \'thumb350\', null); ?>').'</label></l>

						<span class="">
						<div class="sort-images sort-images-'.$random .' crash-all-image-'.$random .'">';
						$get_id_image = sedit($postID, $option['name'], "value", null, null);
	          if ($get_id_image) {
	          	if (!is_array($get_id_image)) {
	          		$get_id_image = explode(",", $get_id_image );
	          	}
							foreach ($get_id_image as $key => $value) {
		            $image_attributes = wp_get_attachment_image_src($value, 'thumb100');
								$rand = rand(0, 10000);
		            if ($image_attributes) {
		              $atom .= '
									<div class="image-'.$rand.' image-theme">
										<input name="'.$option['name'].'[]" class="'.$rand.'-trash" value="'.$value.'" type="hidden">
										<img src="'.$image_attributes[0].'">
										<div data-id="'.$rand.'" data-crash=".'.$rand.'-trash" class="image-remove"><i class="fas fa-trash"></i></div>
									</div>';
		            }
		          }
	          }else{
							$atom .=  '<img src="'.get_stylesheet_directory_uri() . '/sedit/images/noimage.png">';
						}

					$atom .= '
					</div>
					</span>

				</li>
			</ul>
			';
			return $atom;
		}
// TITLE
	function atomTitle($option){
		$atom = '
		<ul>
			<li>
				<h3><i class="fas fa-file"></i> '.$option['title'].'</h3>
				<p>'.$option['description'].'</p>
			</li>
		</ul>
		';
		return $atom;
	}

// ERROR
	function atomError($option){
		$atom = '
		<ul>
			<li>
			<p><i class="fas fa-exclamation-triangle"></i> <b>Błąd!</b> Nie ma takiego atomu lub modułu <b>[type = > '.$option['type'].']</b></p>
			</li>
		</ul>
		';
		return $atom;
	}


	function switch_atoms($dataSwitch, $get_page){
			$posttype = get_post_type();
			if ($_GET['page']) {
				$get_page = 0;
			}
			if (is_array($dataSwitch)) {
				foreach ($dataSwitch as $pageTab => $data) {
				// 	echo '<pre>';
				// 	print_r($data);
				// 	echo '</pre>';
				if (strval($pageTab) == strval($get_page) OR $data['posttype'] === $posttype) {
					$first = true; $head = null; $text = null;
					// atomy
					$head .= '
					<ul>
						<li>
							<h3 style="margin:0;"><i class="fas fa-file"></i> '.$data['title'].'</h3>
							<p>'.$data['description'].'</p>
						</li>
					</ul>
					';
					//akcja funkcji przed wszystkimi atomami
				$text .= $this->hook_function($data['function_before']);

				if (is_array($data['atoms'])) {
				foreach ($data['atoms'] as $title => $option) {
							//akcja funkcji przed atomem
							$text .= $this->hook_function($data['function_before']);
							// atom
							switch ($option['type']) {
								case 'input':
									$text .= $this->atomInput($option);
									break;
								case 'textarea':
									$text .= $this->atomTextarea($option);
									break;
								case 'wpeditor':
									$text .= $this->atomWpeditor($option);
									break;
								case 'image':
									$text .= $this->atomImage($option);
									break;
								case 'images':
									$text .= $this->atomImages($option);
									break;
								case 'title':
									$text .= $this->atomTitle($option);
									break;
								case 'link':
									$text .= $this->atomLink($option);
									break;
								case 'module:google':
									$text .= seditModules::moduleGoogle();
									break;
								default:
									$text .= $this->atomError($option);
								break;
							}
							//akcja funkcji po atome
							$text .= $this->hook_function($data['function_after']);
						}
						//akcja po wszystkich atomach
						$text .= $this->hook_function($data['function_after']);

						$text .= '
						<ul>
							<li>
								<button	type="submit" name="submit" value="1" class="button"><i class="fas fa-save"></i> Zapisz zmiany</button>
							</li>
						</ul>
						';

					}else{
						//akcja funkcji gdy brak atomow
						$text .= $this->hook_function($data['atoms']);
					}
					echo $head.$text;
				}
			}
		}else{
			echo '
			<ul>
				<li>
					<p><i class="fas fa-database"></i> Brak danych konfiguracyjnych</p>
				</li>
			</ul>
			';
		}
	}

		function hook_function($name_function){
			if (!empty($name_function)) {
				$text = '
				<ul>
					<li>
						<p>'.call_user_func($name_function).'</p>
					</li>
				</ul>
				';
				return $text;
			}
		}
}
