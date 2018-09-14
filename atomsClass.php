<?php
namespace SEDIT\atoms;
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
	function atomInput($title, $option){
		save_option($option['name'], null);
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
	function atomTextarea($title, $option){
		save_option($option['name'], null);
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
	function atomWpeditor($title, $option){
		save_option($option['name'], null);
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
	function atomImage($title, $option){
		save_option($option['name'], null);
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
					value="'.get_multi_info(null, $option['name'], "value", null, $random).'"
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
				'.get_multi_info(null, $option['name'], 'image', $size, $random).'
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
// SEPARATOR
	function atomSeparator($name, $option){
		$atom = '
		<tr id="'.$name.'" style="height:'.$option['height'].';background:'.$option['background'].'">
			<th scope="row"><label for="option">'.$title.'</label></th>
			<td>
				wp_editor pracuje nad tym...
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
		function atomLink($title, $option){
			save_option($option['name'], null);
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
}
