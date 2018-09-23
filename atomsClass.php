<?php
namespace SEDIT;
/**
 * pojedyncze atomy dla modulow
 */
class seditAtoms
{

	function __construct()
	{
		// code
	}
// INPUT
	public function atomInput($postID, $title, $option){
		$atom = null;
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
				<i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				<p class="description">'.$option['description'].'</p>
				<l class="front-code-php">
					<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo get_option(\''.$option['name'].'\'); ?>').'</label>
				</l>
			</td>
		</tr>
		';
		return $atom;
	}
// TEXTAREA
	function atomTextarea($postID, $title, $option){
		$atom = null;
		$atom = '
		<tr>
			<th scope="row"><label for="option">'.$title.'</label></th>
			<td>
				<textarea
					name="'.$option['name'].'"
					id="'.$option['name'].'"
					placeholder="'.$option['placeholder'].'"
					class="regular-text"
					rows="5"
					>'.get_option($option['name']).'</textarea>
				<i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				<p class="description">'.$option['description'].'</p>
				<l class="front-code-php">
					<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo get_option(\''.$option['name'].'\'); ?>').'</label>
				</l>
			</td>
		</tr>
		';
		return $atom;
	}
// WPEDITOR
	function atomWpeditor($postID, $title, $option){
		$atom = null;
		$atom = '
		<tr>
			<th scope="row"><label for="option">'.$title.'</label></th>
			<td>
				wp_editor pracuje nad tym...
			</td>
		</tr>
		';
		return $atom;
	}
// IMAGE
	function atomImage($postID, $title, $option){
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
					value="'.get_multi_info($postID, $option['name'], "value", null, $random).'"
					class="regular-text"
					type="hidden">
				<button
					type="button"
					data-id="'.$random .'"
					class="button addSingleMedia"
					data-media-uploader-target="#'.$option['name'].'"
					><i class="fas fa-images"></i> Wybierz z biblioteki</button>
					<i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
				<p class="description" style="margin:0 0 5px 0;">'.$option['description'].'</p>
				<l class="front-code-php">
					<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo get_multi_info(null, \''.$option['name'].'\', \'image\', \'thumb350\', null); ?>').'</label>
				</l>
				'.get_multi_info($postID, $option['name'], 'image', $size, $random).'
			</td>
		</tr>
		';
		return $atom;
	}
	// IMAGES
		function atomImages($postID, $title, $option){
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
						value="'.get_multi_info($postID, $option['name'], "value", null, null).'"
						class="regular-text"
						type="hidden">
					<button
						type="button"
						data-id="'.$random .'"
						class="button addMultiMedia"
						data-media-uploader-target="#'.$option['name'].'"
						data-name-field="'.$option['name'].'"
						><i class="fas fa-images"></i> Wybierz z biblioteki</button>
						<i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-'.$option['name'].'"></i>
					<p class="description" style="margin:0 0 5px 0;">'.$option['description'].'</p>
					<l class="front-code-php">
						<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo get_multi_info(null, \''.$option['name'].'\', \'images\', \'thumb350\', null); ?>').'</label>
					</l>
					<div class="sort-images">';
          $get_id_image = explode(",", get_multi_info($postID, $option['name'], "value", null, null));
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
				</td>
			</tr>
			';
			return $atom;
		}
	// FILE
		function atomFile($postID, $title, $option){
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
						value="'.get_multi_info($postID, $option['name'], "value", null, $random).'"
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
						<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo get_multi_info(null, \''.$option['name'].'\', \'file\', \'null\', null); ?>').'</label>
					</l>
					'.get_multi_info($postID, $option['name'], 'file', null, null).'
				</td>
			</tr>
			';
			return $atom;
		}
// TITLE
	function atomTitle($title, $option){
		$atom = '
		<tr>
			<th scope="row"></th>
			<td>
				<h1>'.$title.'</h1>
				<p>'.$option['description'].'</p>
			</td>
		</tr>
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

		function switch_atoms($dataSwitch){
			foreach ($dataSwitch as $key => $value) {
					foreach ($value as $title => $option) {
						$text = null;
						switch ($option['type']) {
							case 'input':
								save_option($option['name'], null);
								echo $this->atomInput($post->ID, $title, $option);
								break;
							case 'textarea':
								save_option($option['name'], null);
								echo $this->atomTextarea($post->ID, $title, $option);
								break;
							case 'wpeditor':
								save_option($option['name'], null);
								echo $this->atomWpeditor($post->ID, $title, $option);
								break;
							case 'image':
								save_option($option['name'], null);
								echo $this->atomImage($post->ID, $title, $option);
								break;
							case 'images':
								save_option($option['name'], null);
								echo $this->atomImages($post->ID, $title, $option);
								break;
							case 'title':
								echo $this->atomTitle($title, $option);
								break;
							case 'link':
								save_option($option['name'], null);
								echo $this->atomLink($post->ID, $title, $option);
								break;
							case 'module:google':
								save_option($option['name'], null);
							//	echo seditModules::moduleGoogle();
								break;
							default:
								echo $this->atomError($title, $option);
							break;
						}
						echo $text;
					}
					echo '
					<tr>
						<td>
							<input name="submit" id="submit" class="button button-primary" value="Zapisz zmiany" type="submit">
						</td>
					</tr>
					';
			}
		}
}
