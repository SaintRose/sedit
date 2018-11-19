<?php
namespace SEDIT;
require_once 'atomsClass.php';
use SEDIT\seditAtoms;
/**
 * Module
 */

class seditModules
{

	function __construct()
	{
    add_action( 'admin_footer', array($this, 'javascript_googlemap'));
    add_action( 'wp_footer', array($this, 'javascript_googlemap'));
	}
///////////////////////Google Maps//////////////////////////
	public function javascript_googlemap($grupe){
		echo $grupe.'
		<script type="text/javascript">
		function initMap() {
		  var myLatLng = {
		    lat: '.get_option('googlemapsx').',
		    lng: '.get_option('googlemapsy').'
		  };
		  var map = new google.maps.Map(document.getElementById("mapa"), {
		    zoom: '.get_option('sizemap').',
		    center: myLatLng
		  });
		  var image = "'.get_image_option('link', 'marker', 'marker', false).'";
		  var marker = new google.maps.Marker({
		    position: myLatLng,
		    map: map,
		    icon: image,
		    url: "'.get_option('linkmarker').'",
		    mapTypeControlOptions: {
		      mapTypeIds: ["styled_map"]
		    }
		  });
		  var styledMapType = new google.maps.StyledMapType();
		  map.mapTypes.set("styled_map", styledMapType);
		  map.setMapTypeId("styled_map");

		  google.maps.event.addListener(marker, "click", function() {
		    window.location.href = marker.url;
		});

		}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key='.get_option('googlemapapi').'&callback=initMap"></script>
		';
	}

	function moduleGoogle(){
		//$grupe w przyszłości gotowe do rozbudowy, aby użyć kolka razy
		//$grupe = string_for_save($grupe);
		$module = null;

		$module .= '
		<tr>
			<th scope="row">
				<h3>
				GOOGLE MAPS
				<i class="fas fa-copy copy"  data-clipboard-action="copy" data-clipboard-target="#copy-maps"></i>
				</h3>
				<l class="front-code-php">
					<label id="copy-maps">'.htmlspecialchars('<div id="mapa" style="width:100%;height:400px;"></div>').'</label>
				</l>
			</th>
		</tr>
		';



		$module .= seditAtoms::atomInput(null, [
			'title' => 'Współrzędna X',
			'name' => 'googlemapsx',
			'placeholder' => '55.038423',
			'description' => 'Położenie na osi x'
		]);

		$module .= seditAtoms::atomInput(null, [
			'title' => 'Współrzędna Y',
			'name' => 'googlemapsy',
			'placeholder' => '21.982128',
			'description' => 'Położenie na osi y'
		]);

		$module .= seditAtoms::atomInput(null, [
			'title' => 'API Key',
			'name' => 'googlemapapi',
			'placeholder' => 'AIzaSyC_xl2eHSi5uhXLqW9z8PZY3XDs68asYsM',
			'description' => 'API uzyskanie po rejestracji w Google'
		]);

		$module .= seditAtoms::atomImage(null, [
			'title' => 'Marker',
			'name' => 'marker',
			'size' => 'marker',
			'description' => 'Zalecane rozmiary maximum 64x64'
		]);

		$module .= seditAtoms::atomInput(null, [
			'title' => 'Widoczny obszar',
			'name' => 'sizemap',
			'placeholder' => '1 - 20',
			'description' => 'Wybierz poziom zblizenia 1 do 20'
		]);

		$module .= seditAtoms::atomInput(null, [
			'title' => 'Odnośnik',
			'name' => 'linkmarker',
			'placeholder' => 'https://www.google.com/maps/place/...',
			'description' => 'Przejdz pod adres po kliknięciu w marker'
		]);

		$module .= '
		<tr>
			<th scope="row"><label for="option">Podgląd na mapie</label></th>
			<td>
				<div id="mapa" style="width:100%;height:400px;"></div>
			</td>
		</tr>
		';

		return $module;
	}
	///////////////////////////////////////////////////////////
}
