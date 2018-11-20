# SEEDIT
_wersja 1.0 (stabilna)_

`sedit` to wtyczka służąca do budowania przyjaznych interfejsów administracyjnych w WP
została zbudowana w oparciu o potrzeby prywatne. Panel Adminstracyjny staje się prosty
w obsłudze i bardzo czytelny. Wtyczka jest kompatybilna z kazdym motywem.


## Instalacja

Czysty motyw przygotowany do szybkiej integracji z wtyczką:

```bash
$ git clone git@github.com:piotrseed/theme.git
```

Wtyczka instalacja w głównym katalogu motywu

```bash
$ git clone git@github.com:piotrseed/sedit.git
```


## Aktywacja

TAby aktywować wtyczkę nazeży w pliku `functions.php` umieścic kod:

```php
include 'sedit/core.php';
```

Dodanie stron typu `PAGE`

```php
$sedit->pagesData([

	 [
		'page' => 'HOME',
		'title' => 'jakiś tytuł',
		'description' => 'główny opis dla sekcji',
		'dashicons' => 'dashicons-admin-tools',
		'atoms' => [
			  [
				'title' => 'Imię',
				'name' => 'logdo',
				'type' => 'images',
				'placeholder' => 'Imię i nazwisko',
				'description' => 'Proszę uzupełnić dane',
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
```

Dodanie stron typu `TABS`

```php
$sedit->tabsData([

	 [
		'page' => 'HOME',
		'title' => 'jakiś tytuł',
		'description' => 'główny opis dla sekcji',
		'dashicons' => 'dashicons-admin-tools',
		'atoms' => [
			  [
				'title' => 'Imię',
				'name' => 'logdo',
				'type' => 'images',
				'placeholder' => 'Imię i nazwisko',
				'description' => 'Proszę uzupełnić dane',
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
		'dashicons' => 'dashicons-admin-network',
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
```


### Uwagi

Przełączenie stron typu stron `PAGE` <-> `TABS` jest kompatybilne i działa w obie strony


```php
$sedit->pagesData()   <-->   $sedit->tabsData()
```

Atom TITLE

```toJSON

[
'title' => 'Tytuł',
'type' => 'title',
'description' => 'Opis pod tytułem',
]

```

Atom INPUT

```toJSON

[
'title' => 'Nazwa',
'name' => 'mojanazwa',
'type' => 'input',
'placeholder' => 'Nazwa',
'description' => 'Szczegółowy opis pod atomem',
]

```

Atom TEXTAREA

```toJSON

[
'title' => 'Opis',
'name' => 'mojopis',
'type' => 'textarea',
'placeholder' => 'Opis',
'description' => 'Szczegółowy opis pod atomem',
]

```

Atom IMAGE (pojedyńczy obraz)

```toJSON

[
'title' => 'Logo',
'name' => 'mojelogo',
'type' => 'image',
'description' => 'Szczegółowy opis pod atomem',
]

```

Atom IMAGES (wiele obrazów, sortowanie)

```toJSON

[
'title' => 'Galeria',
'name' => 'mojagaleria',
'type' => 'images',
'description' => 'Szczegółowy opis pod atomem',
]

```

# Zaawansowane opcje

Wtyczka posiada wbudowany system implementacji funkcji

```toJSON
[
'page' => 'Nazwa strony',
'title' => 'Tytuł',
'description' => 'opis',
'dashicons' => 'dashicons-admin-tools',
'function_before' => 'funkcja_przed',
'function_after' => 'funkcja_po',
'atoms' => [ ...	]
]
```

Dodatkowo można imprementować funkcje bezpośrednio w atomie

```toJSON
[
'title' => 'Nazwa',
'name' => 'mojanazwa',
'type' => 'input',
'placeholder' => 'Nazwa',
'description' => 'Szczegółowy opis pod atomem',
'function_before' => 'funkcja_przed',
'function_after' => 'funkcja_po',
]
```

Nazwy funkcji można własnoręcznie definiować

```php
function funkcja_przed(){
	return true;
}
```

```php
function funkcja_po(){
	return true;
}
```

## Licencja

Skontaktuj się ze mną: piotrseed@gmail.com
