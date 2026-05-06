<?php

/**
 * Plugin Name: Ade IndexShield Directory Lock
 * Plugin URI:  https://wordpress.org/plugins/ade-indexshield-directory-lock/
 * Author:      Adeleye Ayodeji
 * Author URI:  https://adeleyeayodeji.com/
 * Description: Disable Apache directory browsing (Options -Indexes) by adding a safe, marker-based block to your site's root .htaccess on activation.
 * Version:     0.1.3
 * Requires at least: 5.0
 * Tested up to: 6.9
 * Requires PHP: 7.2
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ade-indexshield-directory-lock
 */

if (! defined('ABSPATH')) {
    exit;
}

define('ADEINDIL_DDA_PLUGIN_FILE', __FILE__);
define('ADEINDIL_DDA_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include the main plugin class file.
require_once ADEINDIL_DDA_PLUGIN_DIR . 'includes/class-ade-disable-direct-access.php';


// Register activation and deactivation hooks to call the appropriate methods when the plugin is activated or deactivated.
register_activation_hook(__FILE__, array('ADEINDIL_DDBHS_Disable_Directory_Access', 'activate'));
register_deactivation_hook(__FILE__, array('ADEINDIL_DDBHS_Disable_Directory_Access', 'deactivate'));
