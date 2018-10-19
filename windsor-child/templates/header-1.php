<?php
/**
 * The template to display "Header 1"
 *
 * @package WordPress
 * @subpackage WINDSOR
 * @since WINDSOR 1.0
 */

$windsor_header_css = $windsor_header_image = '';
$windsor_header_video = wp_is_mobile() ? '' : windsor_get_theme_option('header_video');
if (true || empty($windsor_header_video)) {
	$windsor_header_image = get_header_image();
	if (windsor_is_on(windsor_get_theme_option('header_image_override')) && apply_filters('windsor_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($windsor_cat_img = windsor_get_category_image()) != '')
				$windsor_header_image = $windsor_cat_img;
		} else if (is_singular() || windsor_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$windsor_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($windsor_header_image)) $windsor_header_image = $windsor_header_image[0];
			} else
				$windsor_header_image = '8888888';
		}
	}
}

// Store header image for navi
set_query_var('windsor_header_image', $windsor_header_image || $windsor_header_video);

?><header class="top_panel top_panel_style_1<?php
                    if (in_category('novosti')) {
                        echo ' jks-post-header';
                    }
                    elseif (in_category('fotogalereya')) {
                        echo ' jks-post-fotogalereya';
                    }

                    echo !empty($windsor_header_image) || !empty($windsor_header_video) ? ' with_bg_image' : ' without_bg_image';
					if ($windsor_header_video!='') echo ' with_bg_video';
					if ($windsor_header_image!='') echo ' '.esc_attr(windsor_add_inline_style('background-image: url('.esc_url($windsor_header_image).');'));
					if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
					if (windsor_is_on(windsor_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
					?> scheme_<?php echo esc_attr(windsor_is_inherit(windsor_get_theme_option('header_scheme'))
													? windsor_get_theme_option('color_scheme')
													: windsor_get_theme_option('header_scheme'));
					?>"><?php

	// Main menu
	if (windsor_get_theme_option("menu_style") == 'top') {
		// Mobile menu button
		?><a class="menu_mobile_button icon-menu-2"></a><?php
		// Navigation panel
		get_template_part( 'templates/header-navi' );
	}

	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	get_template_part( 'templates/header-single' );

?></header>
