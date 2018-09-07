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
				<p class="front-code-php">
					<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo get_option(\''.$option['name'].'\'); ?>').'</label>
				</p>
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
				<p class="front-code-php">
					<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo get_option(\''.$option['name'].'\'); ?>').'</label>
				</p>
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
				<p class="front-code-php">
					<label id="copy-'.$option['name'].'">'.htmlspecialchars('<?php echo get_image_option(\'link\', \''.$option['name'].'\', \'thumb350\', false); ?>').'</label>
				</p>
				'.get_multi_info(null, $option['name'], 'image', 'thumb350', $random).'
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
}
