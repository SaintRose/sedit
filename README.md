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
<?php
include 'sedit/core.php';

register_nav_menus( array(
	'top'    => 'Menu główne'
) );

$sTabs->pageTabsData([

	 [
		'page' => 'HOME',
		'title' => 'jakiś tytuł',
		'description' => 'główny opis dla sekcji',
		'function_before' => 'przed',
		'function_after' => 'po',
		'atoms' => [
			  [
				'title' => 'Imię',
				'name' => 'logdo',
				'type' => 'images',
				'placeholder' => 'Imię i nazwisko',
				'description' => 'Proszę uzupełnić dane',
				'function_before' => 'przed',
				'function_after' => 'po',
				],[
				'title' => 'Zdjęcie',
				'name' => 'foto',
				'type' => 'input',
				'placeholder' => 'input',
				'description' => 'Kliknij aby wybrać z biblioteki mediów.'
				],[
				'title' => 'Zdjęcie',
				'name' => 'foto',
				'type' => 'title',
				'placeholder' => 'input',
				'description' => 'Kliknij aby wybrać z biblioteki mediów.'
				],[
				'title' => 'Zdjęcie',
				'name' => 'foto',
				'type' => 'imagess',
				'placeholder' => 'input',
				'description' => 'Kliknij aby wybrać z biblioteki mediów.'
				]
			]
	 ],

	 [
		'page' => 'Google maps',
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
/// nie działa poprawnie rozne atomy dla roznych stron
$sPages->pageData([

	[
	 'page' => 'HOME',
	 'title' => 'jakiś tytuł',
	 'description' => 'główny opis dla sekcji',
	 'dashicons' => 'dashicons-format-status',
	 'atoms' => [
			 [
			 'title' => 'Imię',
			 'name' => 'logdo',
			 'type' => 'images',
			 'placeholder' => 'Imię i nazwisko',
			 'description' => 'Proszę uzupełnić dane',
			 ]
		 ]
	]

]);


```
