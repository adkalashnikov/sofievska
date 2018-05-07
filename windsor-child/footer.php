<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage WINDSOR
 * @since WINDSOR 1.0
 */

						// Widgets area inside page content
						windsor_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					windsor_create_widgets_area('widgets_below_page');

					$windsor_body_style = windsor_get_theme_option('body_style');
					if ($windsor_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			$windsor_footer_scheme =  windsor_is_inherit(windsor_get_theme_option('footer_scheme')) ? windsor_get_theme_option('color_scheme') : windsor_get_theme_option('footer_scheme');
			?>
			
			<footer class="site_footer_wrap scheme_<?php echo esc_attr($windsor_footer_scheme); ?>">
				<?php
				// Footer sidebar
				$windsor_footer_name = windsor_get_theme_option('footer_widgets');
				$windsor_footer_present = !windsor_is_off($windsor_footer_name) && is_active_sidebar($windsor_footer_name);
				if ($windsor_footer_present) { 
					windsor_storage_set('current_sidebar', 'footer');
					$windsor_footer_wide = windsor_get_theme_option('footer_wide');
					ob_start();
					do_action( 'windsor_action_before_sidebar' );
					if ( !dynamic_sidebar($windsor_footer_name) ) {
						// Put here html if user no set widgets in sidebar
					}
					do_action( 'windsor_action_after_sidebar' );
					$windsor_out = ob_get_contents();
					ob_end_clean();
					$windsor_out = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $windsor_out);
					$windsor_need_columns = true;	//or check: strpos($windsor_out, 'columns_wrap')===false;
					if ($windsor_need_columns) {
						$windsor_columns = max(0, (int) windsor_get_theme_option('footer_columns'));
						if ($windsor_columns == 0) $windsor_columns = min(6, max(1, substr_count($windsor_out, '<aside ')));
						if ($windsor_columns > 1)
							$windsor_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($windsor_columns).' widget ', $windsor_out);
						else
							$windsor_need_columns = false;
					}
					?>
					<div class="footer_wrap widget_area<?php echo !empty($windsor_footer_wide) ? ' footer_fullwidth' : ''; ?>">
						<div class="footer_wrap_inner widget_area_inner">
							<?php 
							if (!$windsor_footer_wide) { 
								?><div class="content_wrap"><?php
							}
							if ($windsor_need_columns) {
								?><div class="columns_wrap"><?php
							}
							windsor_show_layout($windsor_out);
							if ($windsor_need_columns) {
								?></div><!-- /.columns_wrap --><?php
							}
							if (!$windsor_footer_wide) {
								?></div><!-- /.content_wrap --><?php
							}
							?>
						</div><!-- /.footer_wrap_inner -->
					</div><!-- /.footer_wrap -->
				<?php
				}

				// Logo
				if (windsor_is_on(windsor_get_theme_option('logo_in_footer'))) {
					$windsor_logo_image = '';
					if (windsor_get_retina_multiplier(2) > 1)
						$windsor_logo_image = windsor_get_theme_option( 'logo_footer_retina' );
					if (empty($windsor_logo_image))
						$windsor_logo_image = windsor_get_theme_option( 'logo_footer' );
					$windsor_logo_text   = get_bloginfo( 'name' );
					if (!empty($windsor_logo_image) || !empty($windsor_logo_text)) {
						?>
						<div class="logo_footer_wrap">
							<div class="logo_footer_wrap_inner">
								<?php
								if (!empty($windsor_logo_image)) {
									$windsor_attr = windsor_getimagesize($windsor_logo_image);
									echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($windsor_logo_image).'" class="logo_footer_image" alt=""'.(!empty($windsor_attr[3]) ? sprintf(' %s', $windsor_attr[3]) : '').'></a>' ;
								} else if (!empty($windsor_logo_text)) {
									echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($windsor_logo_text) . '</a></h1>';
								}
								?>
							</div>
						</div>
						<?php
					}
				}

				// Socials
				if ( windsor_is_on(windsor_get_theme_option('socials_in_footer')) && ($windsor_output = windsor_get_socials_links()) != '') {
					?>
					<div class="socials_footer_wrap socials_wrap">
						<div class="socials_footer_wrap_inner">
							<?php windsor_show_layout($windsor_output); ?>
						</div>
					</div>
					<?php
				}

                // Footer menu
                $windsor_menu_footer = windsor_get_nav_menu('menu_footer');
                if (!empty($windsor_menu_footer) && !is_front_page()) {
                    ?>
                    <div class="content_wrap">
                        <div class="menu_footer_wrap">
                            <div class="menu_footer_wrap_inner">
                                <a class="footer-logo" href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo-footer.png" alt="" width="110" height="50"></a>
                                <nav class="menu_footer_nav_area"><?php windsor_show_layout($windsor_menu_footer); ?></nav>
                                <div class="footer-phone">
                                    <a href="tel:+380969005500">096 900 55 00</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }

				// Copyright area
				$windsor_copyright_scheme = windsor_is_inherit(windsor_get_theme_option('copyright_scheme')) ? $windsor_footer_scheme : windsor_get_theme_option('copyright_scheme');
				?>
				<div class="copyright_wrap scheme_<?php echo esc_attr($windsor_copyright_scheme); ?>">
					<div class="copyright_wrap_inner">
						<div class="content_wrap">
							<div class="copyright_text"><?php
								$windsor_copyright = windsor_get_theme_option('copyright');
								if (!empty($windsor_copyright)) {
									if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $windsor_copyright, $windsor_matches)) {
										$windsor_copyright = str_replace($windsor_matches[1], date(str_replace(array('{', '}'), '', $windsor_matches[1])), $windsor_copyright);
									}
									windsor_show_layout(nl2br($windsor_copyright));
								}
							?></div>
						</div>
					</div>
				</div>

			</footer><!-- /.site_footer_wrap -->
			
		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (windsor_is_on(windsor_get_theme_option('debug_mode')) && file_exists(windsor_get_file_dir('images/makeup.jpg'))) { ?>
		<img src="<?php echo esc_url(windsor_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

    <!-- Modals -->
    <div class="modal fade" id="modalCallMe" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[contact-form-7 id="885" title="форма заказа звонка"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalWriteMe" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[contact-form-7 id="808" title="форма контакты"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        //svg icons
        require_once 'svg-sprite.php';
    ?>

	<script>
    jQuery(document).ready(function(a) {
        a(".single_prod a").hover(function() {
            a(".single_prod a").addClass("not_hov_img");
            a(".ne_akt_obl").addClass("not_hov_img");
            a(".block_tenni").addClass("block_tenni_cher");
            a(this).addClass("hov_img");
            a(this).prev().removeClass("block_tenni_cher")
        }, function() {
            a(".single_prod a").removeClass("not_hov_img");
            a(this).removeClass("hov_img");
            a(".ne_akt_obl").removeClass("not_hov_img");
            a(".block_tenni").removeClass("block_tenni_cher")
        })
    });
	</script>
</body>
</html>