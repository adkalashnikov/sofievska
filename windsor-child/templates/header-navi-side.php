<?php
/**
 * The template for displaying side menu
 *
 * @package WordPress
 * @subpackage WINDSOR
 * @since WINDSOR 1.0
 */
?>
<div class="menu_side_wrap scheme_<?php echo esc_attr(windsor_is_inherit(windsor_get_theme_option('menu_scheme')) 
																	? (windsor_is_inherit(windsor_get_theme_option('header_scheme')) 
																		? windsor_get_theme_option('color_scheme') 
																		: windsor_get_theme_option('header_scheme')) 
																	: windsor_get_theme_option('menu_scheme')); ?>">
	<span class="menu_side_button icon-menu-2"></span>

	<div class="menu_side_inner">
		<?php
		// Logo
		get_template_part( 'templates/header-logo' );
		// Main menu button
		?>
		<div class="toc_menu_item">
			<a href="#" class="toc_menu_description menu_mobile_description"><span class="toc_menu_description_title">
                    <?php esc_html_e('Меню', 'windsor'); ?></span>
            </a>
			<a class="menu_mobile_button toc_menu_icon icon-menu-2" href="#"></a>
		</div>		
		<?php
		// Main menu
		$windsor_windsor_menu_main = windsor_get_nav_menu('menu_main');
		if (empty($windsor_windsor_menu_main)) $windsor_windsor_menu_main = windsor_get_nav_menu();
		// Store menu layout for the mobile menu
		set_query_var('windsor_menu_main', $windsor_windsor_menu_main);
		?>
	</div>
	
</div><!-- /.menu_side_wrap -->
