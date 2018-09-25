# Wtyczka BigCom

_Prosta instrukcja obsługi_


## Instalacja

Szubkie pobranie z github:

```bash
$ git clone git@github.com:piotrseed/sedit.git
```


## Przykład użycia

1.  Ponyższy kod należy użyć w `functions.php`

```php
include 'sedit/core.php';

register_nav_menus( array(
	'top'    => 'Menu główne'
) );

$sTabs->pageTabsData([

	'Przykładowa' => [
		'title' => 'jakiś tytuł',
		'description' => 'główny opis dla sekcji',
		'function_before' => 'przed',
		'function_after' => 'po',
		'atoms' => [
			'Imię' => [
				'name' => 'logo',
				'type' => 'image',
				'placeholder' => 'Imię i nazwisko',
				'description' => 'Proszę uzupełnić dane',
				],
			'Zdjęcie' => [
				'name' => 'foto',
				'type' => 'input',
				'description' => 'Kliknij aby wybrać z biblioteki mediów.'
				],
			'Przykładowy opis' => [
				'name' => 'opis',
				'type' => 'images',
				'description' => 'Uzupełnij to pole'
				]
			]
	],

	'Najnowsza' => [
		'title' => 'jakiś tytuł',
		'description' => 'główny opis dla sekcji',
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

	'chuj wie' => [
		'title' => 'Przykładowa strona',
		'description' => 'opis dla sekcji',
		'dashicons' => 'dashicons-format-status',
		'function_before' => 'przed',
		'function_after' => 'po',
		'atoms' => [
			'Imię' => [
				'name' => 'logoaaa',
				'type' => 'input',
				'placeholder' => 'Imię i nazwisko',
				'description' => 'Proszę uzupełnić dane',
				'function_before' => 'przed',
				'function_after' => 'po',
				]
			]
	],

	'Najnowsza' => [
		'title' => 'jakiś tytuł',
		'description' => 'główny opis dla sekcji',
		'dashicons' => 'dashicons-cart',
		'atoms' => 'po'
	]

]);

function przed(){
	return 'wynik: działa przed!';
}
function po(){
	return 'wynik: działa po!';
}

```
