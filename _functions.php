<?php
include 'sedit/core.php';

$sedit = new seditSlider();
$sedit->addSlider();

$tabs = [

	'Zakładka 1' => [
		'Imię' => [
			'name' => 'name',
			'type' => 'input',
			'placeholder' => 'Imię i nazwisko',
			'description' => 'Proszę uzupełnić dane'
			],
		'Zdjęcie' => [
			'name' => 'foto',
			'type' => 'image',
			'description' => 'Kliknij aby wybrać z biblioteki mediów.'
			],
		'Przykładowy opis' => [
			'name' => 'opis',
			'type' => 'textarea',
			'description' => 'Uzupełnij to pole'
			]
		],

	'Testowy moduł' => [
		'mod1' => [
			'name' => 'googlemap',
			'type' => 'module:google'
			]
		]
];

$sedit = new seditTabs();
$sedit->pageTabsData($tabs);

register_nav_menus( array(
	'top'    => 'Menu główne'
) );
