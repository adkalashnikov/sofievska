<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js scheme_<?php
// Class scheme_xxx need in the <html> as context for the <body>!
echo esc_attr(windsor_get_theme_option('color_scheme'));
?>">
<head>
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800&amp;subset=cyrillic-ext"
          rel="stylesheet">
    <link rel="stylesheet" href="/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=5.4.1">
    <link rel="stylesheet" id="windsor-child-css" href="/wp-content/themes/windsor-child/style.css" type="text/css" media="all">
    <style>
        .top_panel {
            display: none;
        }

        .vc_custom_1525159018012 {
            background-color: #f2f3f3 !important;
        }
    </style>
</head>

<body <?php body_class('menu_style_left menu_style_side'); ?>>

<?php dynamic_sidebar('custom_widgets_1'); ?>


<?php do_action('windsor_action_before'); ?>

<div class="body_wrap">
    <div class="page_wrap">
        <?php
        // Desktop header
        get_template_part('templates/header-1');

        // Side menu
        get_template_part('templates/header-navi-side');

        // Mobile header
        get_template_part('templates/header-mobile');
        ?>

        <div class="page_content_wrap scheme_<?php echo esc_attr(windsor_get_theme_option('color_scheme')); ?>">
            <?php if (windsor_get_theme_option('body_style') != 'fullscreen') { ?>
            <div class="content_wrap">
                <?php } ?>
                <div class="content">

                    <?php while (have_posts()) {
                        the_post();?>

                    <article class="post_item_single">
                        <div class="entry-content post_content">
                            <div data-vc-full-width="true" data-vc-full-width-init="true"
                                 class="vc_row wpb_row vc_row-fluid vc_custom_1525159018012 vc_row-has-fill vc_row-o-full-height vc_row-o-columns-middle vc_row-o-content-middle vc_row-flex"
                                 style="width: 1070px; left: -95px; right: auto; padding-left: 95px; padding-right: 95px; position: relative; box-sizing: border-box; min-height: 100vh;">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_empty_space  height_tiny" style="height: 32px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-5">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                                                <div class="wpb_wrapper">
                                                                    <div class="page-title">
                                                                        <?php  the_title(); ?>
                                                                    </div>
                                                                    <div class="page-back-link">
                                                                        <a href="/#complex-advantages" class="toc_menu_icon icon-left-open">вернутся к плану</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                                                <div class="wpb_wrapper">
                                                                    <?php if ( has_post_thumbnail()) { ?>
                                                                            <?php the_post_thumbnail('full'); ?>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="vc_empty_space" style="height: 60px"><span
                                                                        class="vc_empty_space_inner"></span></div>

                                                            <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                                                <div class="wpb_wrapper">
                                                                    <button class="btn-default sc_button_hover_slide_left"
                                                                            data-toggle="modal"
                                                                            data-target="#modalCallMe">Записаться на просмотр
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-1">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper"></div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-5">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                                                <div class="wpb_wrapper">
                                                                    <img class="alignleft size-full wp-image-898"
                                                                         src="http://kden.tk/sofievska/wp-content/uploads/2018/05/rassrochka.png"
                                                                         alt="" width="428" height="98">
                                                                    <div class="vc_row-full-width vc_clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="vc_empty_space" style="height: 40px"><span
                                                                        class="vc_empty_space_inner"></span></div>

                                                            <div class="wpb_text_column wpb_content_element ">
                                                                <div class="wpb_wrapper">
                                                                    <?php the_content( ); ?>
                                                                </div>
                                                            </div>

                                                            <div class="vc_empty_space" style="height: 40px"><span class="vc_empty_space_inner"></span></div>

                                                            <div class="wpb_text_column wpb_content_element line-height-1-2">
                                                                <div class="wpb_wrapper">
                                                                    <p><strong>Комплектация квартир:</strong></p>
                                                                    <ul class="jks-list">
                                                                        <li>система отопления – автономная
                                                                            (индивидуальная) – установлен двухконтурный
                                                                            газовый котел;
                                                                        </li>
                                                                        <li>отопительные приборы – стальные радиаторы;
                                                                        </li>
                                                                        <li>электропроводка – медный провод, который
                                                                            подведен к квартире;
                                                                        </li>
                                                                        <li>счетчики на электричество, холодную воду и
                                                                            газ;
                                                                        </li>
                                                                        <li>индивидуальный стояк холодной воды (в каждой
                                                                            квартире);
                                                                        </li>
                                                                        <li>точки подключения сантехники;</li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space  height_tiny" style="height: 32px"><span
                                                        class="vc_empty_space_inner"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row-full-width vc_clearfix"></div>
                        </div><!-- .entry-content -->
                    </article>

                    <?php } ?>

<?php
get_footer();
?>