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

require_once( 'vendor/autoload.php' );

use Kerapy\Core\ElementorInit;

final class Kerapy_Core {

    private static $instance;

    public static function instance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Kerapy_Core ) ) {
            self::$instance = new Kerapy_Core;
            self::$instance->define_constants();
        }

        return self::$instance;
    }

    public function __construct() {
        add_action( 'plugins_loaded', array( $this, 'init' ) );
        add_action( 'after_setup_theme', array($this, 'crb_load') );
        add_action( 'widgets_init', array($this, 'load_widgets') );
    }

    function crb_load() {
        \Carbon_Fields\Carbon_Fields::boot();
    }

    public function init() {
        do_action( 'kerapy_core_loaded' );
        
        ElementorInit::instance();

        if ( ! class_exists( 'ReduxFramework' ) && file_exists( KERAPY_CORE_PATH . '/lib/redux-framework/redux-core/framework.php' ) ) {
            require_once( KERAPY_CORE_PATH . '/lib/redux-framework/redux-core/framework.php' );
            require_once( KERAPY_CORE_PATH . '/lib/redux-framework/kerapy-options.php' );
        }

        require_once( KERAPY_CORE_PATH . '/lib/tgm/kerapy-tgm.php' );
    }

    public function load_widgets() {
        new Kerapy\Core\KerapyCoreWidgets();
    }

    private function define_constants() {
        define( 'KERAPY_CORE_VERSION', '1.0' );
        define( 'KERAPY_CORE_FILE', __FILE__ );
        define( 'KERAPY_CORE_PATH', dirname( KERAPY_CORE_FILE ) );
        define( 'KERAPY_CORE_URL', plugins_url( '', KERAPY_CORE_FILE ) );
        define( 'KERAPY_CORE_ASSETS', KERAPY_CORE_URL . '/assets' );
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