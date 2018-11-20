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
/// nie działa poprawnie rozne atomy dla roznych stron
// wyswietlanie funkcji na stronie i w atomie
// 'function_before' => 'przed',
// 'function_after' => 'po',

function przed(){
	return 'wynik: działa przed!';
}
function po(){
	return 'wynik: działa po!';
}

```













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

```toJSON

[
'title' => 'Imię',
'name' => 'logdo',
'type' => 'input',
'placeholder' => 'Imię i nazwisko',
'description' => 'Proszę uzupełnić dane',
]

```


Full example:

```html
<h1 class="animated infinite bounce delay-2s">Example</h1>
```

[Check out all the animations here!](https://daneden.github.io/animate.css/)

It's possible to change the duration of your animations, add a delay or change the number of times that it plays:

```css
.yourElement {
  animation-duration: 3s;
  animation-delay: 2s;
  animation-iteration-count: infinite;
}
```

## Usage with jQuery

You can do a whole bunch of other stuff with animate.css when you combine it with jQuery. A simple example:

```javascript
$('#yourElement').addClass('animated bounceOutLeft');
```

You can also detect when an animation ends:

<!--
Before you make changes to this file, you should know that $('#yourElement').one() is *NOT A TYPO*

http://api.jquery.com/one/
-->

```javascript
// See https://github.com/daneden/animate.css/issues/644
var animationEnd = (function(el) {
  var animations = {
    animation: 'animationend',
    OAnimation: 'oAnimationEnd',
    MozAnimation: 'mozAnimationEnd',
    WebkitAnimation: 'webkitAnimationEnd',
  };

  for (var t in animations) {
    if (el.style[t] !== undefined) {
      return animations[t];
    }
  }
})(document.createElement('div'));

$('#yourElement').one(animationEnd, doSomething);
```

[View a video tutorial](https://www.youtube.com/watch?v=CBQGl6zokMs) on how to use Animate.css with jQuery here.

**Note:** `jQuery.one()` is used when you want to execute the event handler at most _once_. More information [here](http://api.jquery.com/one/).

It's possible to extend jQuery and add a function that does it all for you:

```javascript
$.fn.extend({
  animateCss: function(animationName, callback) {
    var animationEnd = (function(el) {
      var animations = {
        animation: 'animationend',
        OAnimation: 'oAnimationEnd',
        MozAnimation: 'mozAnimationEnd',
        WebkitAnimation: 'webkitAnimationEnd',
      };

      for (var t in animations) {
        if (el.style[t] !== undefined) {
          return animations[t];
        }
      }
    })(document.createElement('div'));

    this.addClass('animated ' + animationName).one(animationEnd, function() {
      $(this).removeClass('animated ' + animationName);

      if (typeof callback === 'function') callback();
    });

    return this;
  },
});
```

And use it like this:

```javascript
$('#yourElement').animateCss('bounce');
or;
$('#yourElement').animateCss('bounce', function() {
  // Do something after animation
});
```

## Setting _Delay_ and _Speed_

### Delay Class

It's possible to add delays directly on the element's class attribute, just like this:

```html
<div class="animated bounce delay-2s">Example</div>
```

| Class Name | Delay Time |
| ---------- | ---------- |
| `delay-2s` | `2s`       |
| `delay-3s` | `3s`       |
| `delay-4s` | `4s`       |
| `delay-5s` | `5s`       |

> _**Note**: The default delays are from 1 second to 5 seconds only. If you need custom delays, add it directly to your own CSS code._

### Slow, Slower, Fast, and Faster Class

It's possible to control the speed of the animation by adding these classes, as a sample below:

```html
<div class="animated bounce faster">Example</div>
```

| Class Name | Speed Time |
| ---------- | ---------- |
| `slow`     | `2s`       |
| `slower`   | `3s`       |
| `fast`     | `800ms`    |
| `faster`   | `500ms`    |

> _**Note**: The `animated` class has a default speed of `1s`. If you need custom duration, add it directly to your own CSS code._

## Custom Builds

Animate.css is powered by [gulp.js](http://gulpjs.com/), which means you can create custom builds pretty easily. First of all, you’ll need Gulp and all other dependencies:

```sh
$ cd path/to/animate.css/
$ sudo npm install
```

Next, run `gulp` to compile your custom builds. For example, if you want only some of the “attention seekers”, simply edit the `animate-config.json` file to select only the animations you want to use.

```javascript
"attention_seekers": {
  "bounce": true,
  "flash": false,
  "pulse": false,
  "shake": true,
  "headShake": true,
  "swing": true,
  "tada": true,
  "wobble": true,
  "jello":true
}
```

## Accessibility

Animate.css supports the [`prefers-reduced-motion` media query](https://webkit.org/blog/7551/responsive-design-for-motion/) so that users with motion sensitivity can opt out of animations. On supported platforms (currently only OSX Safari and iOS Safari), users can select "reduce motion" on their operating system preferences and it will turn off CSS transitions for them without any further work required.

## License

Animate.css is licensed under the MIT license. (http://opensource.org/licenses/MIT)

## Contributing

Pull requests are the way to go here. We only have two rules for submitting a pull request: match the naming convention (camelCase, categorised [fades, bounces, etc]) and let us see a demo of submitted animations in a [pen](http://codepen.io). That **last one is important**.
