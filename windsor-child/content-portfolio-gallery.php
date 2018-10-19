<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage WINDSOR
 * @since WINDSOR 1.0
 */

$windsor_blog_style = explode('_', windsor_get_theme_option('blog_style'));
$windsor_columns = empty($windsor_blog_style[1]) ? 2 : max(2, $windsor_blog_style[1]);
$windsor_post_format = get_post_format();
$windsor_post_format = empty($windsor_post_format) ? 'standard' : str_replace('post-format-', '', $windsor_post_format);
$windsor_animation = windsor_get_theme_option('blog_animation');
$windsor_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($windsor_columns).' post_format_'.esc_attr($windsor_post_format) ); ?>
	<?php echo (!windsor_is_off($windsor_animation) ? ' data-animation="'.esc_attr(windsor_get_animation_classes($windsor_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($windsor_image[1]) && !empty($windsor_image[2])) echo intval($windsor_image[1]) .'x' . intval($windsor_image[2]); ?>"
	data-src="<?php if (!empty($windsor_image[0])) echo esc_url($windsor_image[0]); ?>"
	>

	<?php
	$windsor_image_hover = windsor_get_theme_option('image_hover');
	if (in_array($windsor_image_hover, array('icons', 'zoom'))) $windsor_image_hover = 'title';
	// Featured image
	windsor_show_post_featured(array(
		'hover' => 'title',
		'thumb_size' => windsor_get_thumb_size( strpos(windsor_get_theme_option('body_style'), 'full')!==false || $windsor_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'class' => '',
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. windsor_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'windsor') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>