<?php
/**
 * The template for displaying Page title and Breadcrumbs
 *
 * @package WordPress
 * @subpackage WINDSOR
 * @since WINDSOR 1.0
 */

// Page (category, tag, archive, author) title
if ( windsor_need_page_title() ) {
	set_query_var('windsor_title_showed', true);
	$windsor_top_icon = windsor_get_category_icon();
	?>
	<div class="top_panel_title_wrap">
		<div class="content_wrap">
			<div class="top_panel_title">
				<div class="page_title">
					<?php
					// Post meta on the single post
//					if ( is_single() )  {
//						windsor_show_post_meta(array(
//							'seo' => true,
//							'share' => false,
//							'counters' => ''
//							)
//						);
//					}
					
					// Blog/Post title
					$windsor_blog_title = windsor_get_blog_title();
					$windsor_blog_title_text = $windsor_blog_title_class = $windsor_blog_title_link = $windsor_blog_title_link_text = '';
					if (is_array($windsor_blog_title)) {
						$windsor_blog_title_text = $windsor_blog_title['text'];
						$windsor_blog_title_class = !empty($windsor_blog_title['class']) ? ' '.$windsor_blog_title['class'] : '';
						$windsor_blog_title_link = !empty($windsor_blog_title['link']) ? $windsor_blog_title['link'] : '';
						$windsor_blog_title_link_text = !empty($windsor_blog_title['link_text']) ? $windsor_blog_title['link_text'] : '';
					} else
						$windsor_blog_title_text = $windsor_blog_title;
					?>
					<h1 class="page_caption<?php echo esc_attr($windsor_blog_title_class); ?>"><?php
						if (!empty($windsor_top_icon)) {
							?><img src="<?php echo esc_url($windsor_top_icon); ?>" alt=""><?php
						}
						echo wp_kses_data($windsor_blog_title_text);
					?></h1>
					<?php
					if (!empty($windsor_blog_title_link) && !empty($windsor_blog_title_link_text)) {
						?><a href="<?php echo esc_url($windsor_blog_title_link); ?>" class="theme_button theme_button_small page_title_link"><?php echo esc_html($windsor_blog_title_link_text); ?></a><?php
					}
					
					// Category/Tag description
					if ( is_category() || is_tag() || is_tax() ) 
						the_archive_description( '<div class="page_description">', '</div>' );
					?>
				</div>
				<?php
				// Breadcrumbs
				if (windsor_is_on(windsor_get_theme_option('show_breadcrumbs'))) {
					windsor_show_layout(windsor_get_breadcrumbs(), '<div class="breadcrumbs">', '</div>');
				}

//				if ('post' == get_post_type()) {
//                    windsor_show_layout(windsor_get_breadcrumbs(), '<div class="breadcrumbs">', '</div>');
//                }
				?>
			</div>
		</div>
	</div>
	<?php
}
?>