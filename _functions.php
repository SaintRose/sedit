<?php
use Dompdf\Dompdf;
include 'sedit/core.php';


register_nav_menus( array(
	'top'    => 'Menu główne'
) );

$sTabs->pageTabsData([



	'Najnowsza' => [
		'title' => 'jakiś tytuł',
		'description' => 'Główny opis dla sekcji',
		'atoms' => [
			'Google' => [
				'name' => 'googlecddss',
				'type' => 'module:google',
				'placeholder' => 'Imię i nazwisko',
				'description' => 'Proszę uzupełnić dane'
				]
			]
	]

]);

$sPages->pageData([

	'BARCODE' => [
		'title' => 'Główny tytuł dla tel podstrony',
		'dashicons' => 'dashicons-chart-pie',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eius voluptatum, iusto laboriosam, commodi quas hic aperiam reiciendis a iste obcaecati cumque dolorum, accusantium enim atque quasi accusamus corporis debitis.',
		'function_after' => 'barcode_generator',
		'atoms' => [
			'Nazwa firmy' => [
				'name' => 'name',
				'type' => 'input',
				'placeholder' => 'Nazwa firmy',
				'description' => 'Wpisz pełną nazwę firmy',
			],
			'Kod kreskowy' => [
				'name' => 'barcode',
				'type' => 'input',
				'placeholder' => 'Kod kreskowy',
				'description' => 'Kod kreskowy do wygenerowania na naklejce',
			]
			]
	],

]);

function barcode_generator(){
	if (!empty(get_option('name')) AND !empty(get_option('barcode')) AND !empty(get_option('logo'))) {


		require_once 'sedit/modules/barcode/BarcodeGenerator.php';
		require_once 'sedit/modules/barcode/BarcodeGeneratorPNG.php';
		//require_once 'sedit/modules/dompdf/Dompdf.php';
		$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();

		$code .= '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode(get_option('barcode'), $generator::TYPE_EAN_13)) . '">';

		$text .= '
		<div class="barcode">
			<ul><h1>'.get_option('name').'</h1></ul>
			<ul><p>'.$code.'</p></ul>
			<ul><p>'.get_option('barcode').'</p></ul>
		</div>
		';
		return $text;

	}else{
		return 'Uzupełnij wszystkie dane aby wygenerować BARCODE';
	}
}


function przed(){
	return 'wynik: działa przed!';
}
function po(){
	return 'wynik: działa po!';
}
