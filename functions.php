<?php
include 'sedit/core.php';
include 'sedit/hooks.php';
include 'sedit/slider.php';
include 'sedit/settings.php';

$sedit = new seditSlider();
$sedit->addSlider();

register_nav_menus( array(
	'top'    => 'Menu główne'
) );
