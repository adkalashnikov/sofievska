<?php
/**
 * Child-Theme functions and definitions
 */

// Theme storage
$WINDSOR_STORAGE = array(

    // Set list of the theme required custom fonts from folder /css/font-faces
    // Attention! Font's folder must have name equal to the font's name
    'required_custom_fonts' => array(
        'opensans'
    )

);

//Handler of the add_action('wp_enqueue_scripts', 'windsor_wp_scripts', 1000);
function windsor_wp_scripts() {

    // Enqueue styles
    //------------------------

    // Links to selected fonts
    $links = windsor_theme_fonts_links();
    if (count($links) > 0) {
        foreach ($links as $slug => $link) {
            windsor_enqueue_style( sprintf('windsor-font-%s', $slug), $link );
        }
    }

    // Fontello styles must be loaded before main stylesheet
    // This style NEED the theme prefix, because style 'fontello' in some plugin contain different set of characters
    // and can't be used instead this style!
    windsor_enqueue_style( 'windsor-fontello',  windsor_get_file_url('css/fontello/css/fontello-embedded.css') );

    // Load main stylesheet
    windsor_enqueue_style( 'windsor-main', get_template_directory_uri() . '/style.css', array(), null );

    // Animations
    if ( (windsor_get_theme_option('blog_animation')!='none' || windsor_get_theme_option('menu_animation_in')!='none' || windsor_get_theme_option('menu_animation_out')!='none') && (windsor_get_theme_option('animation_on_mobile')=='yes' || !wp_is_mobile()) && (!function_exists('windsor_vc_is_frontend') || !windsor_vc_is_frontend()))
        windsor_enqueue_style( 'windsor-animation',	windsor_get_file_url('css/animation.css') );

    // Custom colors
    if ( !is_customize_preview() && !isset($_GET['color_scheme']) && windsor_is_off(windsor_get_theme_option('debug_mode')) )
        windsor_enqueue_style( 'windsor-colors', windsor_get_file_url('css/__colors.css') );
    else
        wp_add_inline_style( 'windsor-main', windsor_customizer_get_css() );

    // Merged styles
    if ( windsor_is_off(windsor_get_theme_option('debug_mode')) )
        windsor_enqueue_style( 'windsor-styles', windsor_get_file_url('css/__styles.css') );

    // Add post nav background
    windsor_add_bg_in_post_nav();

    // Disable loading JQuery UI CSS
    wp_deregister_style('jquery_ui');
    wp_deregister_style('date-picker-css');


    // Enqueue scripts
    //------------------------

    // Modernizr will load in head before other scripts and styles
    if ( substr(windsor_get_theme_option('blog_style'), 0, 7) == 'gallery' || substr(windsor_get_theme_option('blog_style'), 0, 9) == 'portfolio' )
        windsor_enqueue_script( 'modernizr', windsor_get_file_url('js/theme.gallery/modernizr.min.js'), array(), null, false );

    // Merged scripts
    if ( windsor_is_off(windsor_get_theme_option('debug_mode')) )
        windsor_enqueue_script( 'windsor-init', windsor_get_file_url('js/__scripts.js'), array('jquery') );
    else {
        // Skip link focus
        windsor_enqueue_script( 'skip-link-focus-fix', windsor_get_file_url('js/skip-link-focus-fix.js') );
        // Superfish Menu
        windsor_enqueue_script( 'superfish', windsor_get_file_url('js/superfish.js'), array('jquery') );
        // Background video
        $header_video = windsor_get_theme_option('header_video');
        if (!empty($header_video) && !windsor_is_inherit($header_video))
            windsor_enqueue_script( 'bideo', windsor_get_file_url('js/bideo.js'), array() );
        // Theme scripts
        windsor_enqueue_script( 'windsor-utils', windsor_get_file_url('js/_utils.js'), array('jquery') );
        windsor_enqueue_script( 'windsor-init', windsor_get_file_url('js/_init.js'), array('jquery') );
    }

    // Comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Media elements library
    if (windsor_get_theme_setting('use_mediaelements')) {
        wp_enqueue_style ( 'mediaelement' );
        wp_enqueue_style ( 'wp-mediaelement' );
        wp_enqueue_script( 'mediaelement' );
        wp_enqueue_script( 'wp-mediaelement' );
    }

    wp_localize_script( 'windsor-init', 'WINDSOR_STORAGE', apply_filters( 'windsor_filter_localize_script', array(
            // AJAX parameters
            'ajax_url' => esc_url(admin_url('admin-ajax.php')),
            'ajax_nonce' => esc_attr(wp_create_nonce(admin_url('admin-ajax.php'))),

            // Site base url
            'site_url' => get_site_url(),

            // User logged in
            'user_logged_in' => is_user_logged_in() ? true : false,

            // Menu width for mobile mode
            'mobile_layout_width' => max(480, windsor_get_theme_option('mobile_layout_width')),

            // Use menu cache
            'menu_cache' => windsor_is_on(windsor_get_theme_option('menu_cache')),

            // Stretch sidemenu to window height
            'menu_stretch' => windsor_is_on(windsor_get_theme_option('menu_stretch')),

            // Menu animation
            'menu_animation_in' => windsor_get_theme_option('menu_animation_in'),
            'menu_animation_out' => windsor_get_theme_option('menu_animation_out'),

            // Video background
            'background_video' => windsor_get_theme_option('header_video'),

            // Video and Audio tag wrapper
            'use_mediaelements' => windsor_get_theme_setting('use_mediaelements') ? true : false,

            // Messages max length
            'message_maxlength'	=> intval(windsor_get_theme_setting('message_maxlength')),

            // Site color scheme
            'site_scheme' => sprintf('scheme_%s', windsor_get_theme_option('color_scheme')),


            // Internal vars - do not change it!

            // Flag for review mechanism
            'admin_mode' => false,

            // E-mail mask
            'email_mask' => '^([a-zA-Z0-9_\\-]+\\.)*[a-zA-Z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$',

            // Strings for translation
            'strings' => array(
                'ajax_error'		=> esc_html__('Invalid server answer!', 'windsor'),
                'error_global'		=> esc_html__('Error data validation!', 'windsor'),
                'name_empty' 		=> esc_html__("The name can't be empty", 'windsor'),
                'name_long'			=> esc_html__('Too long name', 'windsor'),
                'email_empty'		=> esc_html__('Too short (or empty) email address', 'windsor'),
                'email_long'		=> esc_html__('Too long email address', 'windsor'),
                'email_not_valid'	=> esc_html__('Invalid email address', 'windsor'),
                'text_empty'		=> esc_html__("The message text can't be empty", 'windsor'),
                'text_long'			=> esc_html__('Too long message text', 'windsor'),
                'search_error'		=> esc_html__('Search error! Try again later.', 'windsor'),
                'send_complete'		=> esc_html__("Send message complete!", 'windsor'),
                'send_error'		=> esc_html__('Transmit failed!', 'windsor')
            )
        ))
    );
}

// disable admin notifications
add_action('admin_enqueue_scripts', 'ds_admin_theme_style');
add_action('login_enqueue_scripts', 'ds_admin_theme_style');
function ds_admin_theme_style() {
    echo '<style>#setting-error-tgmpa, .update-nag, .updated, .error, .is-dismissible { display: none !important; }</style>';
}

?>