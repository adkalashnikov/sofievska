<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage WINDSOR
 * @since WINDSOR 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js scheme_<?php
										 // Class scheme_xxx need in the <html> as context for the <body>!
										 echo esc_attr(windsor_get_theme_option('color_scheme'));
										 ?>">
<head>
	<?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
</head>

<body <?php	body_class(); ?>>

	<?php do_action( 'windsor_action_before' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			get_template_part( 'templates/'.windsor_get_theme_option("header_style"));

			// Side menu
			if (in_array(windsor_get_theme_option('menu_style'), array('left', 'right'))) {
				get_template_part( 'templates/header-navi-side' );
			}

			// Mobile header
			get_template_part( 'templates/header-mobile');
			?>

            <div class="page_content_wrap scheme_<?php echo esc_attr(windsor_get_theme_option('color_scheme')); ?>">

				<?php if (windsor_get_theme_option('body_style') != 'fullscreen') { ?>
				<div class="content_wrap">
				<?php } ?>

					<?php
					// Widgets area above page content
					windsor_create_widgets_area('widgets_above_page');
					?>				

					<div class="content">
						<?php
						// Widgets area inside page content
						windsor_create_widgets_area('widgets_above_content');
						?>				
