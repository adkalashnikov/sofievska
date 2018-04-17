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



// -----------------------------------------------------------------
// -- Theme colors for customizer
// -- Attention! Inner scheme must be last in the array below
// -----------------------------------------------------------------
windsor_storage_set('schemes', array(

    // Color scheme: 'default'
    'default' => array(
        'title'	 => esc_html__('Default', 'windsor'),
        'colors' => array(

            // Whole block border and background
            // Whole block border and background
            'bg_color'				=> '#ffffff',
            'bd_color'				=> '#c2c2c2',

            // Text and links colors
            'text'					=> '#3f4346',
            'text_light'			=> '#a0b2be',
            'text_dark'				=> '#13162b',
            'text_link'				=> '#000000',
            'text_hover'			=> '#13162b',

            // Alternative blocks (submenu, buttons, tabs, etc.)
            'alter_bg_color'		=> '#e7eef2',
            'alter_bg_hover'		=> '#dae1e5',
            'alter_bd_color'		=> '#dae1e5',
            'alter_bd_hover'		=> '#ced5d9',
            'alter_text'			=> '#3f4346',
            'alter_light'			=> '#a0b2be',
            'alter_dark'			=> '#13162b',
            'alter_link'			=> '#3fb9be',
            'alter_hover'			=> '#13162b',

            // Input fields (form's fields and textarea)
            'input_bg_color'		=> '#f4f9fc',
            'input_bg_hover'		=> '#ebf4fa',
            'input_bd_color'		=> '#f4f9fc',
            'input_bd_hover'		=> '#dae9f2',
            'input_text'			=> '#a0b2be',
            'input_light'			=> '#8b9ba6',
            'input_dark'			=> '#76838c',

            // Inverse blocks (text and links on accented bg)
            'inverse_text'			=> '#f0f0f0',
            'inverse_light'			=> '#f7f7f7',
            'inverse_dark'			=> '#ffffff',
            'inverse_link'			=> '#ffffff',
            'inverse_hover'			=> '#13162b',

            // Additional accented colors (if used in the current theme)
            // For example:
            //'accent'				=> '3fb9be'

        )
    ),

    // Color scheme: 'light'
    'light' => array(
        'title'	 => esc_html__('Light', 'windsor'),
        'colors' => array(

            // Whole block border and background
            'bg_color'				=> '#ffffff',
            'bd_color'				=> '#c2c2c2',

            // Text and links colors
            'text'					=> '#3f4346',
            'text_light'			=> '#a0b2be',
            'text_dark'				=> '#13162b',
            'text_link'				=> '#000000',
            'text_hover'			=> '#13162b',

            // Alternative blocks (submenu, buttons, tabs, etc.)
            'alter_bg_color'		=> '#ffffff',
            'alter_bg_hover'		=> '#f7f7f7',
            'alter_bd_color'		=> '#f0f0f0',
            'alter_bd_hover'		=> '#e0e0e0',
            'alter_text'			=> '#3f4346',
            'alter_light'			=> '#a0b2be',
            'alter_dark'			=> '#13162b',
            'alter_link'			=> '#000000',
            'alter_hover'			=> '#13162b',

            // Input fields (form's fields and textarea)
            'input_bg_color'		=> '#f4f9fc',
            'input_bg_hover'		=> '#ebf4fa',
            'input_bd_color'		=> '#f4f9fc',
            'input_bd_hover'		=> '#dae9f2',
            'input_text'			=> '#a0b2be',
            'input_light'			=> '#b6cad9',
            'input_dark'			=> '#8b9ba6',

            // Inverse blocks (text and links on accented bg)
            'inverse_text'			=> '#f0f0f0',
            'inverse_light'			=> '#f7f7f7',
            'inverse_dark'			=> '#ffffff',
            'inverse_link'			=> '#ffffff',
            'inverse_hover'			=> '#13162b',

            // Additional accented colors (if used in the current theme)
            // For example:
            //'accent'				=> '3fb9be'

        )
    ),

    // Color scheme: 'side'
    'side' => array(
        'title'  => esc_html__('Side', 'windsor'),
        'colors' => array(

            // Whole block border and background
            'bg_color'				=> '#0d101f',
            'bd_color'				=> '#2b2e41',

            // Text and links colors
            'text'					=> '#969fa6',
            'text_light'			=> '#b8c3cc',
            'text_dark'				=> '#ffffff',
            'text_link'				=> '#3fb9be',
            'text_hover'			=> '#ffffff',

            // Alternative blocks (submenu, buttons, tabs, etc.)
            'alter_bg_color'		=> '#13162b',
            'alter_bg_hover'		=> '#1a1e3b',
            'alter_bd_color'		=> '#2b2e41',
            'alter_bd_hover'		=> '#32364d',
            'alter_text'			=> '#969fa6',
            'alter_light'			=> '#b8c3cc',
            'alter_dark'			=> '#ffffff',
            'alter_link'			=> '#3fb9be',
            'alter_hover'			=> '#ffffff',

            // Input fields (form's fields and textarea)
            'input_bg_color'		=> '#13162b',
            'input_bg_hover'		=> '#1a1e3b',
            'input_bd_color'		=> '#1a1e3b',
            'input_bd_hover'		=> '#1a1e3b',
            'input_text'			=> '#969fa6',
            'input_light'			=> '#b8c3cc',
            'input_dark'			=> '#ffffff',

            // Inverse blocks (text and links on accented bg)
            'inverse_text'			=> '#f0f0f0',
            'inverse_light'			=> '#f7f7f7',
            'inverse_dark'			=> '#ffffff',
            'inverse_link'			=> '#ffffff',
            'inverse_hover'			=> '#13162b',

            // Additional accented colors (if used in the current theme)
            // For example:
            //'accent'				=> '3fb9be'

        )
    ),

    // Color scheme: 'dark'
    'dark' => array(
        'title'  => esc_html__('Dark', 'windsor'),
        'colors' => array(

            // Whole block border and background
            'bg_color'				=> '#070811',
            'bd_color'				=> '#2b2e41',

            // Text and links colors
            'text'					=> '#969fa6',
            'text_light'			=> '#b8c3cc',
            'text_dark'				=> '#ffffff',
            'text_link'				=> '#3fb9be',
            'text_hover'			=> '#ffffff',

            // Alternative blocks (submenu, buttons, tabs, etc.)
            'alter_bg_color'		=> '#0e1123',
            'alter_bg_hover'		=> '#181e3d',
            'alter_bd_color'		=> '#181e3d',
            'alter_bd_hover'		=> '#1f254d',
            'alter_text'			=> '#969fa6',
            'alter_light'			=> '#b8c3cc',
            'alter_dark'			=> '#ffffff',
            'alter_link'			=> '#3fb9be',
            'alter_hover'			=> '#ffffff',

            // Input fields (form's fields and textarea)
            'input_bg_color'		=> '#0e1123',
            'input_bg_hover'		=> '#181e3d',
            'input_bd_color'		=> '#181e3d',
            'input_bd_hover'		=> '#181e3d',
            'input_text'			=> '#969fa6',
            'input_light'			=> '#b8c3cc',
            'input_dark'			=> '#ffffff',

            // Inverse blocks (text and links on accented bg)
            'inverse_text'			=> '#f0f0f0',
            'inverse_light'			=> '#f7f7f7',
            'inverse_dark'			=> '#ffffff',
            'inverse_link'			=> '#ffffff',
            'inverse_hover'			=> '#13162b',

            // Additional accented colors (if used in the current theme)
            // For example:
            //'accent'				=> '3fb9be'

        )
    )

));