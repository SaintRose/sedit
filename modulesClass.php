<?php
require_once 'atomsClass.php';

use SEDIT\atoms\seditAtoms;
/**
 * Module
 */
class seditModules extends seditAtoms
{

	function __construct()
	{
		// code...
	}
	function moduleGoogle($grupe){
		$grupe = string_for_save($grupe);
		$module = null;

		$args = [
			'name' => 'googlemaps-'.$grupe,
			'placeholder' => 'Wpisz tu coś',
			'description' => 'Tytuł dla tej sekcji'
		];
		$module .= seditAtoms::atomInput('Nazwa sekcji', $args);

		$args = [
			'name' => 'wx-'.$grupe,
			'placeholder' => 'jakaś tam nazwa',
			'description' => 'Opis pod obrazkiem'
		];
		$module .= seditAtoms::atomImage('Zdjęcie', $args);

		return $module;
	}
}
