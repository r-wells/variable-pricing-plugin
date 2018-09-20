<?php
/*
Plugin Name:  Digi Vinyl Plugin
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  WordPress Plugin To Calculate Digi Vinyl Prices
Version:      1.0.0
Author:       Ryan Wells
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  digivinyl
Domain Path:  /languages
*/

if( ! defined( 'WPINC' ) ) {
    die;
}

define ('WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

//Add Template
include( plugin_dir_path( __FILE__ ) . 'templates/digi-vinyl.php' );

//Enqueue JS
include( plugin_dir_path( __FILE__ ) . 'includes/digivinyl-scripts.php' );
?>