<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: https://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'kerapy_theme_options';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = __DIR__ . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore Generic.CodeAnalysis.AssignmentInCondition.FoundInWhileCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL → Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Kerapy Options', 'kerapy-core' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Kerapy Options', 'kerapy-core' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: https://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE → Not in use yet, but reserved or partially implemented.
	// Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);


Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START SECTIONS
 */
global $kerapy_theme_options;

 
// header options settings
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Header Settings', 'kerapy-core' ),
		'id'               => 'header_opt',
		'desc'             => esc_html__( 'These are header general settings.', 'kerapy-core' ),
		'icon'             => 'el el-road',
		'fields'           => array(
			array(
				'id'       => 'header_layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Header Layout', 'kerapy-core' ),
				'options'  => array(
					'layout1' => 'Layout 1',
					'customlayout' => 'Custom Template',
				),
			),
			array(
				'id'       => 'kerapy-logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Site Logo', 'kerapy-core' ),
				'url'			=> false
			),
		),
	)
);
Redux::set_field( $opt_name, 'header_opt', array(
	'id'       => 'h-img-width',
	'type'     => 'text',
	'title'    => esc_html__('Logo Width', 'kerapy-core'),
	'default'  => '120' ,
	'validate' => array( 'numeric', 'not_empty' ),
	'description' => __( 'Enter a numeric value for image width in pixels (px).', 'kerapy-core' ),
) );
Redux::set_field( $opt_name, 'header_opt', array(
	'id'       => 'h-img-height',
	'type'     => 'text',
	'title'    => esc_html__('Logo Height', 'kerapy-core'),
	'default'  => 'auto' ,
	'validate' => array( 'numeric', 'not_empty' ),
	'description' => __( 'Enter a numeric value for image height in pixels (px).', 'kerapy-core' ),
) );
Redux::set_field( $opt_name, 'header_opt', array(
	'id'       => 'h-btn-text',
	'type'     => 'text',
	'title'    => esc_html__( 'Button Text', 'kerapy-core' ),
	'default'  => 'Contact Us',
) );
Redux::set_field( $opt_name, 'header_opt', array(
	'id'       => 'h-btn-link',
	'type'     => 'text',
	'title'    => esc_html__( 'Button link', 'kerapy-core' ),
	'default'  => '#',
) );

Redux::set_field($opt_name, 'header_opt', array(
    'id'       => 'h-btn-border',
    'type'     => 'border',
    'title'    => esc_html__('Button Border', 'kerapy-core'),
    'default'  => array(
        'border-color'  => '#212529',
        'border-style'  => 'solid',  
        'border-top'    => '1px',    
        'border-right'  => '1px',    
        'border-bottom' => '1px',    
        'border-left'   => '1px',    
    ),
));
Redux::set_field( $opt_name, 'header_opt', array(
	'id'       => 'h-btn-radius',
	'type'     => 'text',
	'title'    => esc_html__('Button Border Radius', 'kerapy-core'),
	'default'  => '99999' ,
	'validate' => array( 'numeric', 'not_empty' ),
	'description' => __( 'Enter a numeric value for border radius in pixels (px).', 'kerapy-core' ),
) );
Redux::set_field( $opt_name, 'header_opt', array(
    'id'          => 'h-btn-typography',
    'type'        => 'typography', 
    'title'       => esc_html__('Button Text Typography', 'kerapy-core'),
	'google'      => true, 
    'font-backup' => true,
    'output'      => array('h2.site-description'),
    'units'       =>'px',
    'default'     => array(
        'color'       => '#212529', 
        'font-style'  => '400', 
        'font-family' => 'Inter, sans-serif', 
        'google'      => true,
        'font-size'   => '16px', 
        'line-height' => '24px'
    ),
) );

Redux::set_field( $opt_name, 'header_opt', array(
	'id'       => 'btn-hover',
    'type'     => 'color',
    'title'    => esc_html__('Button Hover Text Color', 'kerapy-core'), 
    'default'  => '#fff',
    'validate' => 'color',
) );

Redux::set_field( $opt_name, 'header_opt', array(
	'id'       => 'h-btn-bg',
	'type'     => 'link_color',
	'title'    => esc_html__('Button BG Color', 'kerapy-core'),
	'default'  => array(
		'regular'  => 'transparent',
		'hover'    => '#212529',  
	)
) );


// blog options settings
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Blog Settings', 'kerapy-core' ),
		'id'               => 'blog_opt',
		'desc'             => esc_html__( 'These are site blog settings.', 'kerapy-core' ),
		'icon'             => 'el el-pencil',
		'fields'           => array(
			array(
				'id'       => 'pagination_type',
				'type'     => 'select',
				'title'    => esc_html__('Pagination Type', 'kerapy-core'), 
				'options'  => array(
					'button' => 'Load More Button',
					'number' => 'Page Number',
				),
				'default'  => 'button',
			),
			array(
				'id'       => 'featured_image_visibility',
				'type'     => 'switch', 
				'title'    => esc_html__('Featured Image Visibilaty', 'kerapy-core'),
				'default'  => true,
				'on' => 'Show',
    			'off' => 'Hide',
			), 
			array(
				'id'       => 'category_visibility',
				'type'     => 'switch', 
				'title'    => esc_html__('Category Visibilaty', 'kerapy-core'),
				'default'  => true,
				'on' => 'Show',
    			'off' => 'Hide',
			), 
			array(
				'id'       => 'date_visibility',
				'type'     => 'switch', 
				'title'    => esc_html__('Date Visibilaty', 'kerapy-core'),
				'default'  => true,
				'on' => 'Show',
    			'off' => 'Hide',
			), 
			array(
				'id'       => 'excerpt_visibility',
				'type'     => 'switch', 
				'title'    => esc_html__('Excerpt Visibilaty', 'kerapy-core'),
				'default'  => true,
				'on' => 'Show',
    			'off' => 'Hide',
			), 
			array(
				'id'       => 'excerpt_length',
				'type'     => 'text',
				'title'    => esc_html__( 'Excerpt Length', 'kerapy-core' ),
				'default'  => '10',
				'validate' => array( 'numeric', 'not_empty' )
			), 
			array(
				'id'       => 'relate_post_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Related Post Title', 'kerapy-core' ),
				'default'  => 'Related Posts',
			),
		),
	)
);


// styles settings
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Styles ', 'kerapy-core' ),
		'id'               => 'styles_opt',
		'desc'             => esc_html__( 'These are styles settings.', 'kerapy-core' ),
		'icon'             => 'el el-file',
		'fields'           => array(
			array(
			'id'       => 'primary_color',
			'type'     => 'color',
			'title'    => esc_html__('Primary Color', 'kerapy-core'), 
			'default'  => '#00DCC2',
			'validate' => 'color',
			),
			array(
			'id'       => 'heading_color',
			'type'     => 'color',
			'title'    => esc_html__('Heading Color', 'kerapy-core'), 
			'default'  => '#000',
			'validate' => 'color',
			),
			
		),
	)
);


// footer settings
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer Settings ', 'kerapy-core' ),
		'id'               => 'footer_opt',
		'desc'             => esc_html__( 'These are footer settings.', 'kerapy-core' ),
		'icon'             => 'el el-th-list',
		'fields'           => array(
			array(
				'id'       => 'footer_layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Footer Layout', 'kerapy-core' ),
				'options'  => array(
					'layout1' => 'Layout 1',
					'customlayout' => 'Custom ',
				),
			),
			array(
				'id'       => 'footer_bg_color',
				'type'     => 'color',
				'title'    => esc_html__('Footer Background Color', 'kerapy-core'), 
				'default'  => '#091D2D',
				'validate' => 'color',
			),
			
		),
	)
);
Redux::set_field( $opt_name, 'footer_opt', array(
    'id'          => 'footer-title-typography',
    'type'        => 'typography', 
    'title'       => esc_html__('Footer Heading Typography', 'kerapy-core'),
	'google'      => true, 
    'font-backup' => true,
    'output'      => array('h2.site-description'),
    'units'       =>'px',
    'default'     => array(
        'color'       => '#fff', 
        'font-style'  => '400', 
        'font-family' => 'Inter, sans-serif', 
        'google'      => true,
        'font-size'   => '16px', 
        'line-height' => '24px'
    ),
) );
Redux::set_field( $opt_name, 'footer_opt', array(
    'id'          => 'footer-content-typography',
    'type'        => 'typography', 
    'title'       => esc_html__('Footer Content Typography', 'kerapy-core'),
	'google'      => true, 
    'font-backup' => true,
    'output'      => array('h2.site-description'),
    'units'       =>'px',
    'default'     => array(
        'color'       => '#fff', 
        'font-style'  => '400', 
        'font-family' => 'Inter, sans-serif', 
        'google'      => true,
        'font-size'   => '16px', 
        'line-height' => '24px'
    ),
) );

$menus = wp_get_nav_menus();
$menu_options = array();

foreach ($menus as $menu) {
    $menu_options[$menu->term_id] = $menu->name;
}
Redux::set_field( $opt_name, 'footer_opt', array(
		'id'       => 'footer_menu',
		'type'     => 'select',
		'title'    => esc_html__('Footer Bottom Menu', 'kerapy-core'),
		'subtitle' => esc_html__('Choose a footer menu from the list.', 'kerapy-core'),
		'options'  => $menu_options,
		'default'  => key($menu_options), // Set the first menu as default if available
	)
 );
Redux::set_field( $opt_name, 'footer_opt', array(
	'id'       => 'footer_right_copyright',
	'type'     => 'text',
	'title'    => esc_html__('Footer Copyright Text', 'kerapy-core'),
	'default'  => '2024 Elegance In Code. All right reserved.',
),
 );






// maintenance mode settings
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Maintenance Mode ', 'kerapy-core' ),
		'id'               => 'maintenance_mode_opt',
		'desc'             => esc_html__( 'These are maintenance mode settings.', 'kerapy-core' ),
		'icon'             => 'el el-cogs',
		'fields'           => array(
			array(
				'id'       => 'maintenance_mode',
				'type'     => 'switch', 
				'title'    => esc_html__('Maintenance Mode', 'kerapy-core'),
				'default'  => false,
				'on' => 'On',
    			'off' => 'Off',
			), 
			

		),
	)
);


// custom scripts
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Custom Scripts ', 'kerapy-core' ),
		'id'               => 'custom_scripts_opt',
		'desc'             => esc_html__( 'These are custom scripts settings.', 'kerapy-core' ),
		'icon'             => 'el el-css',
		'fields'           => array(
			//  custom css
			array(
				'id'       => 'css_on_header',
				'type'     => 'ace_editor',
				'title'    => esc_html__('Custom CSS On Header', 'your-project-name'),
				'subtitle' => esc_html__('Paste your CSS code here.', 'your-project-name'),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'default'  => "/* Example CSS for header */\n.selector {\n    margin: 0 auto;\n    background-color: #f8f8f8;\n    padding: 20px;\n}"
			), 
			array(
				'id'       => 'css_on_body_start',
				'type'     => 'ace_editor',
				'title'    => esc_html__('Custom CSS On Body Start', 'your-project-name'),
				'subtitle' => esc_html__('Paste your CSS code here.', 'your-project-name'),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'default'  => "/* Example CSS for header */\n.selector {\n    margin: 0 auto;\n    background-color: #f8f8f8;\n    padding: 20px;\n}"
			), 
			array(
				'id'       => 'css_on_body_end',
				'type'     => 'ace_editor',
				'title'    => esc_html__('Custom CSS On Body End', 'your-project-name'),
				'subtitle' => esc_html__('Paste your CSS code here.', 'your-project-name'),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'default'  => "/* Example CSS for header */\n.selector {\n    margin: 0 auto;\n    background-color: #f8f8f8;\n    padding: 20px;\n}"
			), 
			// custom scripts
			array(
				'id'       => 'js_on_header',
				'type'     => 'ace_editor',
				'title'    => esc_html__('Custom js On Header', 'your-project-name'),
				'subtitle' => esc_html__('Paste your js code here.', 'your-project-name'),
				'mode'     => 'javascript',
				'theme'    => 'monokai',
				'default'  => "/* Example JavaScript for header */\nconsole.log('Header script loaded');"
			), 
			array(
				'id'       => 'js_on_body_start',
				'type'     => 'ace_editor',
				'title'    => esc_html__('Custom js On Body Start', 'your-project-name'),
				'subtitle' => esc_html__('Paste your js code here.', 'your-project-name'),
				'mode'     => 'javascript',
				'theme'    => 'monokai',
				'default'  => "/* Example JavaScript for header */\nconsole.log('Header script loaded');"
			), 
			array(
				'id'       => 'js_on_body_end',
				'type'     => 'ace_editor',
				'title'    => esc_html__('Custom js On Body End', 'your-project-name'),
				'subtitle' => esc_html__('Paste your js code here.', 'your-project-name'),
				'mode'     => 'javascript',
				'theme'    => 'monokai',
				'default'  => "/* Example JavaScript for header */\nconsole.log('Header script loaded');"
			), 

		),
	)
);






