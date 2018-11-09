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
		// code
	}
// INPUT
	public function atomInput($postID, $title, $option){
		save_option($option['name'], $postID);
		$atom = null;
		$atom = '
		<ul>
			<li>
				<label>
					'.$title.'
					<i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				</label>
				<input
					name="'.$option['name'].'"
					id="'.$option['name'].'"
					value="'.get_option($option['name']).'"
					placeholder="'.$option['placeholder'].'"
					type="text">

				'.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'

				<l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit(null, \''.$option['name'].'\', \'option\', null, null); ?>').'</label></l>

			</li>
		</ul>
		';
		return $atom;
	}
// TEXTAREA
	function atomTextarea($postID, $title, $option){
		save_option($option['name'], $postID);
		$atom = null;
		$atom = '
		<ul>
			<li>
				<label>
				  '.$title.'
				  <i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				</label>
				<textarea
					name="'.$option['name'].'"
					id="'.$option['name'].'"
					placeholder="'.$option['placeholder'].'"
					class="regular-text"
					rows="5"
					>'.get_option($option['name']).'</textarea>

				'.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'

				<l class="front-code-php"><l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit(null, \''.$option['name'].'\', \'option\', null, null); ?>').'</label></l></l>

			</li>
		</ul>
		';
		return $atom;
	}
// WPEDITOR
	function atomWpeditor($postID, $title, $option){
		save_option($option['name'], $postID);
		$atom = null;
		$atom = '
		<ul>
			<li>
				<label>
				  '.$title.'
				  <i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				</label>

				'.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'

				<l class="front-code-php">
						<l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit(null, \''.$option['name'].'\', \'option\', null, null); ?>').'</label></l>
				</l>

			</li>
		</ul>
		';
		return $atom;
	}
// IMAGE
	function atomImage($postID, $title, $option){
		save_option($option['name'], $postID);
		if ($option['size'] === 'marker') {
			$size = 'marker';
		}
		$random = rand(0, 10000);
		$atom = '
		<ul>
			<li class="term-group-'.$random .'">
				<label>
				  '.$title.'
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

					<l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit(null, \''.$option['name'].'\', \'image\', \'thumb350\', null); ?>').'</label></l>

					<span>'.sedit($postID, $option['name'], 'image', $size, $random).'</span>

			</li>
		</ul>
		';
		return $atom;
	}
	// IMAGES
		function atomImages($postID, $title, $option){
			save_option($option['name'], $postID);
			if ($option['size'] === 'marker') {
				$size = 'marker';
			}

			$random = rand(0, 10000);
			$atom = '
			<ul>
				<li class="term-group-'.$random .'">
					<label>
					  '.$title.'
					  <i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
					</label>

						<input
							name="'.$option['name'].'"
							id="'.$option['name'].'"
							value="'.sedit($postID, $option['name'], "value", null, null).'"
							class="regular-text"
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
								data-crash="'.$random .'
								input-name="'.$option['name'].'"><i class="fas fa-trash-alt"></i></div>


						'.((!empty($option['description'])) ? ''.((!empty($option['description'])) ? '<em>'.$option['description'].'</em>' : '').'' : '').'

						<l class="front-code-php"><label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit(null, \''.$option['name'].'\', \'images\', \'thumb350\', null); ?>').'</label></l>

						<span class="crash-all-image-'.$random .'">
						<div class="sort-images">';
	          $get_id_image = explode(",", sedit($postID, $option['name'], "value", null, null));
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

					$atom .= '
					</div>
					</span>

				</li>
			</ul>
			';
			return $atom;
		}
	// FILE
		function atomFile($postID, $title, $option){
			save_option($option['name'], $postID);
			if ($option['size'] === 'marker') {
				$size = 'marker';
			}
			$random = rand(0, 10000);
			$atom = '
			<tr>
				<th scope="row"><label for="option">'.$title.'</label></th>
				<td class="term-group-'.$random .'">
					<input
						name="'.$option['name'].'"
						id="'.$option['name'].'"
						value="'.sedit($postID, $option['name'], "value", null, $random).'"
						class="regular-text"
						type="hidden">
					<button
						type="button"
						data-id="'.$random .'"
						class="button addSingleMediaFile"
						data-media-uploader-target="#'.$option['name'].'"
						><i class="fas fa-images"></i> Wybierz z biblioteki</button>
						<i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
					<p class="description" style="margin:0 0 5px 0;">'.$option['description'].'</p>
					<l class="front-code-php">
						<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo sedit(null, \''.$option['name'].'\', \'file\', \'null\', null); ?>').'</label>
					</l>
					'.sedit($postID, $option['name'], 'file', null, null).'
				</td>
			</tr>
			';
			return $atom;
		}
// TITLE
	function atomTitle($title, $option){
		$atom = '
		<ul>
			<li>
				<h3>'.$option['title'].'</h3>
				<p>'.$option['description'].'</p>
			</li>
		</ul>
		';
		return $atom;
	}

// ERROR
	function atomError($title, $option){
		$atom = '
		<tr>
			<th scope="row"><label for="option">'.$title.'</label></th>
			<td>
				<p><b>Błąd!</b> Nie ma takiego atomu lub modułu</p>
				<p>Wartość <b>[type = > '.$option['type'].']</b> jest nieprawidłowa</p>
			</td>
		</tr>
		';
		return $atom;
	}
	// LINK
		function atomLink($postID, $title, $option){
		save_option($option['name'], $postID);
		/*
		$args = array(
		'depth'                 => 0,
		'child_of'              => 0,
		'selected'              => $option['name'],
		'echo'                  => 0,
		'name'                  => $option['name'],
		'id'                    => null,
		'class'                 => null,
		'show_option_none'      => null,
		'show_option_no_change' => null,
		'option_none_value'     => null);
		'.wp_dropdown_pages($args).'
		*/

			$atom = '
			<tr>
				<th scope="row"><label for="option">'.$title.'</label></th>
				<td>
				<input
					name="'.$option['name'].'"
					id="'.$option['name'].'"
					value="'.get_option($option['name']).'"
					class="regular-text"
					type="text"
					placeholder="'.$option['placeholder'].'">
				</td>
			</tr>
			';
			return $atom;
		}

		function switch_atoms($dataSwitch, $get_page){
			$first = $_GET['tab'];// OR empty($first)
				foreach ($dataSwitch as $pageTab => $pageArray) {
				//opisy dla sekcji
				if (string_for_save($pageTab) === string_for_save($get_page)  OR $first === null) {
					$first = true;
					$head = null;
					$text = null;
					// atomy
					$head .= '
					<ul>
				 		<li>
							<h3>'.$pageArray['title'].$page.'</h3>
							<p>'.$pageArray['description'].'</p>
						</li>
				 	</ul>
					';
					//akcja funkcji przed wszystkimi atomami
					if (!empty($pageArray['function_before'])) {
						$text .= '
						<ul>
							<li>
								<p>'.call_user_func($pageArray['function_before']).'</p>
							</li>
						</ul>
						';
					}
				if (is_array($pageArray['atoms'])) {
				foreach ($pageArray['atoms'] as $title => $option) {
							//akcja funkcji przed atomem
							if (!empty($option['function_before'])) {
								$text .= '
								<ul>
									<li>
										<p>'.call_user_func($pageArray['function_before']).'</p>
									</li>
								</ul>
								';
							}
							// atom
							switch ($option['type']) {
								case 'input':
									$text .= $this->atomInput($post->ID, $title, $option);
									break;
								case 'textarea':
									$text .= $this->atomTextarea($post->ID, $title, $option);
									break;
								case 'wpeditor':
									$text .= $this->atomWpeditor($post->ID, $title, $option);
									break;
								case 'image':
									$text .= $this->atomImage($post->ID, $title, $option);
									break;
								case 'images':
									$text .= $this->atomImages($post->ID, $title, $option);
									break;
								case 'title':
									$text .= $this->atomTitle($title, $option);
									break;
								case 'link':
									$text .= $this->atomLink($post->ID, $title, $option);
									break;
								case 'module:google':
									$text .= seditModules::moduleGoogle();
									break;
								default:
									$text .= $this->atomError($title, $option);
								break;
							}
							//akcja funkcji po atome
							if (!empty($option['function_after'])) {
								$text .= '
								<ul>
									<li>
										<p>'.call_user_func($pageArray['function_after']).'</p>
									</li>
								</ul>
								';
							}
						}
						//akcja po wszystkich atomach
						if (!empty($pageArray['function_after'])) {
							$text .= '
							<ul>
								<li>
									<p>'.call_user_func($pageArray['function_after']).'</p>
								</li>
							</ul>
							';
						}

						$text .= '
						<ul>
							<li>
								<button	type="submit" name="submit" value="1" class="button"><i class="fas fa-save"></i> Zapisz zmiany</button>
							</li>
						</ul>
						';

					}else{
						//akcja funkcji gdy brak atomow
						if (!empty($pageArray['atoms'])) {
							$text .= '
							<ul>
								<li>
									<p>'.call_user_func($pageArray['atoms']).'</p>
								</li>
							</ul>
							';
						}
					}
					echo $head.$text;
				}
			}
		}
}
