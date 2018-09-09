<?php
include 'sedit/core.php';

$sedit = new seditSlider();
$sedit->addSlider();

register_nav_menus( array(
	'top'    => 'Menu główne'
) );
