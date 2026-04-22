<?php

if (! defined('ABSPATH')) {
    exit("No direct access allowed.");
}

/**
 * Class Ade_DDBHS_Disable_Directory_Access
 *
 * A class to handle the activation and deactivation of the Disable Directory Access plugin.
 */
class Ade_DDBHS_Disable_Directory_Access
{
    /**
     * Marker used in .htaccess to identify the plugin's rules.
     */
    public const MARKER = 'Disable Directory Access Plugin';

    /**
     * Activate the plugin by adding rules to .htaccess to disable directory access.
     */
    public static function activate(): void
    {
        self::update_htaccess(true);
    }

    /**
     * Deactivate the plugin by removing the rules from .htaccess.
     */
    public static function deactivate(): void
    {
        self::update_htaccess(false);
    }

    /**
     * Update the .htaccess file to enable or disable directory access.
     *
     * @param bool $enable Whether to enable (true) or disable (false) directory access.
     */
    private static function update_htaccess(bool $enable): void
    {
        if (! function_exists('get_home_path')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }

        if (! function_exists('WP_Filesystem')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }

        if (! function_exists('insert_with_markers')) {
            require_once ABSPATH . 'wp-admin/includes/misc.php';
        }

        $home_path = get_home_path();
        if (empty($home_path)) {
            return;
        }

        $htaccess_path = trailingslashit($home_path) . '.htaccess';

        global $wp_filesystem;
        if (! $wp_filesystem instanceof WP_Filesystem_Base) {
            // Initializes the filesystem API. May fall back to 'direct' in typical hosting setups.
            if (! WP_Filesystem()) {
                return;
            }
        }

        if (! $wp_filesystem->exists($htaccess_path)) {
            // Best-effort create so we can insert markers.
            $created = $wp_filesystem->put_contents($htaccess_path, '', defined('FS_CHMOD_FILE') ? FS_CHMOD_FILE : null);
            if (! $created) {
                return;
            }
        }

        if (! $wp_filesystem->is_writable($htaccess_path)) {
            return;
        }

        $lines = $enable
            ? array(
                '#Disable directory browsing | Disable Direct Access Plugin',
                'Options All -Indexes',
            )
            : array();

        /**
         * Use insert_with_markers to add or remove the plugin's rules in the .htaccess file. This function will look for the specified marker and replace the lines between the markers with the provided lines. If $enable is true, it will add the rules to disable directory access; if false, it will remove them.
         */
        insert_with_markers($htaccess_path, self::MARKER, $lines);
    }
}
