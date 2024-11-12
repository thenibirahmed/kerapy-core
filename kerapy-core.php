<?php 

/**
 * Plugin Name: Kerapy Core
 * Plugin URI: https://kerapy.com
 * Description: This is a core plugin for Kerapy theme.
 * Version: 1.0
 * Author: Kerapy
 * Author URI: https://kerapy.com
 * License: GPL2
 * Text Domain: kerapy-core
 * Domain Path: /languages
*/

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once( __DIR__ . '/vendor/autoload.php' );
} else {
    // Display admin notice if Composer autoload is missing
    add_action( 'admin_notices', function() {
        echo '<div class="notice notice-error"><p>' . esc_html__( 'Kerapy Core plugin requires Composer dependencies. Please run <code>composer install</code> in the plugin directory.', 'kerapy-core' ) . '</p></div>';
    });
    // Prevent plugin activation if dependencies are not installed
    return;
}
//require_once( 'vendor/autoload.php' );

use Kerapy\Core\ElementorInit;

final class Kerapy_Core {

    private static $instance;

    public static function instance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Kerapy_Core ) ) {
            self::$instance = new Kerapy_Core;
            //self::$instance->define_constants();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->define_constants();
        add_action( 'plugins_loaded', array( $this, 'init' ) );
        add_action( 'after_setup_theme', array($this, 'crb_load') );
        add_action( 'widgets_init', array($this, 'load_widgets') );
    }

    private function define_constants() {
        if ( ! defined( 'KERAPY_CORE_VERSION' ) ) define( 'KERAPY_CORE_VERSION', '1.0' );
        if ( ! defined( 'KERAPY_CORE_FILE' ) ) define( 'KERAPY_CORE_FILE', __FILE__ );
        if ( ! defined( 'KERAPY_CORE_PATH' ) ) define( 'KERAPY_CORE_PATH', dirname( KERAPY_CORE_FILE ) );
        if ( ! defined( 'KERAPY_CORE_URL' ) ) define( 'KERAPY_CORE_URL', plugins_url( '', KERAPY_CORE_FILE ) );
        if ( ! defined( 'KERAPY_CORE_ASSETS' ) ) define( 'KERAPY_CORE_ASSETS', KERAPY_CORE_URL . '/assets' );
    }

    function crb_load() {

        if ( class_exists( '\Carbon_Fields\Carbon_Fields' ) ) {
            \Carbon_Fields\Carbon_Fields::boot();
            require_once( KERAPY_CORE_PATH . '/inc/CarbonFields.php' );
        } else {
            add_action( 'admin_notices', function() {
                echo '<div class="notice notice-error"><p>' . esc_html__( 'Carbon Fields is not loaded. Please install it via Composer.', 'kerapy-core' ) . '</p></div>';
            });
        }
    }

    public function init() {
        do_action( 'kerapy_core_loaded' );
        
        ElementorInit::instance();

        if ( ! class_exists( 'ReduxFramework' ) && file_exists( KERAPY_CORE_PATH . '/lib/redux-framework/redux-core/framework.php' ) ) {
            require_once( KERAPY_CORE_PATH . '/lib/redux-framework/redux-core/framework.php' );
            require_once( KERAPY_CORE_PATH . '/lib/redux-framework/kerapy-options.php' );
        }

        require_once( KERAPY_CORE_PATH . '/lib/tgm/kerapy-tgm.php' );
        require_once( KERAPY_CORE_PATH . '/inc/custom-posts.php' );
    }

    public function load_widgets() {
        new Kerapy\Core\KerapyCoreWidgets();
    }

    public function __clone() {
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheating huh?', 'kerapy-core' ), KERAPY_CORE_VERSION );
    }

    public function __wakeup() {
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheating huh?', 'kerapy-core' ), KERAPY_CORE_VERSION );
    }
}

function kerapy_core() {
    return Kerapy_Core::instance();
}

kerapy_core();