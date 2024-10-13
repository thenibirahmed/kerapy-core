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

function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
add_action( 'after_setup_theme', 'crb_load' );