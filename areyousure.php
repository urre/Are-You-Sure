<?php
/*
* Plugin Name: Are you Sure?
* Plugin URI: http://urre.me
* Description: Adds a confirmation dialogue to the Publish button
* Version: 0.1
* Author: Urban Sanden
* Author URI: http://urre.me
* License: GPL2
*/

/*  Copyright 2104 Urban Sanden (email: hej@urre.me)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

# Load plugin text domain
add_action( 'init', 'plugin_textdomain' );

# Register admin scripts
add_action( 'admin_enqueue_scripts', 'register_admin_scripts' );

# Text domain for translations
function plugin_textdomain() {
    $domain = 'areyousure';
    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
    load_textdomain( $domain, WP_LANG_DIR.'/'.$domain.'/'.$domain.'-'.$locale.'.mo' );
    load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}

# Admin scripts + localized strings
function register_admin_scripts($hook) {

    # Enqueue script
    wp_enqueue_script( 'areyousure-admin-script', plugins_url( 'are-you-sure/js/are-you-sure.js' ), array('jquery') );

    # Localized strings for javascript
    wp_localize_script( 'areyousure-admin-script', 'prefix_object_name', array(
        'publish' => __( 'Publish', 'areyousure' ),
        'update' => __( 'Update', 'areyousure' ),
        'confirmationtext' => __( 'Are you sure you want to publish this?', 'areyousure' ),
    ));

}

?>