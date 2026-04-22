<?php

/**
 * Plugin Name: Disable Directory Browsing Htaccess Security
 * Plugin URI:  https://wordpress.org/plugins/disable-directory-browsing-htaccess-security/
 * Author:      Adeleye Ayodeji
 * Author URI:  https://adeleyeayodeji.com/
 * Description: Disable Apache directory browsing (Options -Indexes) by adding a safe, marker-based block to your site’s root .htaccess on activation.
 * Version:     0.1.1
 * Requires at least: 5.0
 * Tested up to: 6.9
 * Requires PHP: 7.2
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: disable-directory-browsing-htaccess-security
 */

if (! defined('ABSPATH')) {
    exit;
}

define('ADE_DDA_PLUGIN_FILE', __FILE__);
define('ADE_DDA_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include the main plugin class file.
require_once ADE_DDA_PLUGIN_DIR . 'includes/class-ade-disable-direct-access.php';


// Register activation and deactivation hooks to call the appropriate methods when the plugin is activated or deactivated.
register_activation_hook(__FILE__, array('Ade_DDBHS_Disable_Directory_Access', 'activate'));
register_deactivation_hook(__FILE__, array('Ade_DDBHS_Disable_Directory_Access', 'deactivate'));
