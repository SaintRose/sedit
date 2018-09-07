# Wtyczka BigCom

_Prosta instrukcja obsługi_


## Instalacja

Szubkie pobranie z github:

```bash
$ git clone git@github.com:piotrseed/sedit.git
```


## Przykład użycia

Ponyższy kod należy użyć w `functions.php`

```php
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
```

## Slider

Ponyższy kod należy użyć w `functions.php`

```php
$sedit = new seditSlider();
$sedit->addSlider();
```
