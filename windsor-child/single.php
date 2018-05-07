<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage WINDSOR
 * @since WINDSOR 1.0
 */

get_header();

while ( have_posts() ) { the_post();

	get_template_part( 'content', get_post_format() );
}

get_footer();
?>