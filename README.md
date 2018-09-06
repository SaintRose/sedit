<h2>Instalacja</h2>

<pre>
  git clone git@github.com:piotrseed/sedit.git
</pre>
<p>Pierwsza wersja 1.0, stabilna sposób użycia</p>
<pre>
include 'sedit/core.php';
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
</pre>
