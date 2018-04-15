<?php
/**
 * Default Theme Options and Internal Theme Settings
 *
 * @package WordPress
 * @subpackage WINDSOR
 * @since WINDSOR 1.0
 */



// -----------------------------------------------------------------
// -- Theme fonts (Google and/or custom fonts)
// -----------------------------------------------------------------
// 'theme_fonts' => array(
//		'p' => array(
//            'family'=> '"Open Sans", sans-serif',																			// (required) font family
//            'css' => '/css/font-face/opensans/stylesheet.css'
//			)
// );
//
// Allowed keys:
//		h1 ... h6	- headers
//		p			- plain text
//		logo		- logo text
//		slogan		- logo slogan text
//		menu		- menu elements
//		submenu		- submenu elements
//		info		- post meta blocks (author, date, counters, etc.)
//		link		- links
//		button		- buttons
//		input		- text input fields (single line and textareas)
//		decor		- decorative elements
windsor_storage_set('theme_fonts', array(
	'p' => array(					// Text
		'family'=> '"Open Sans", sans-serif',
        'css' => '/css/font-face/opensans/stylesheet.css'
		),
	'h1' => array(
		'family'=> '"Open Sans", sans-serif',
		),
	'h2' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'h3' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'h4' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'h5' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'h6' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'input' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'logo' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'info' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'menu' => array(
        'family'=> '"Open Sans", sans-serif',
		),
	'submenu' => array(
		'family'=> '"Open Sans", sans-serif',
		)
));
