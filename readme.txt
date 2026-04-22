=== Disable Directory Browsing Htaccess Security ===
Contributors: adeleyeayodeji
Donate link: https://adeleyeayodeji.com/
Tags: security, htaccess, apache, directory browsing, hardening
Requires at least: 5.0
Tested up to: 6.9
Requires PHP: 7.2
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Disable directory browsing on Apache servers by adding `Options All -Indexes` to your site’s root `.htaccess` on plugin activation.

== Description ==

Disable Directory Access is a lightweight security-hardening plugin that prevents visitors from viewing directory listings (for example, when an `index.php`/`index.html` file is missing).

On activation, the plugin safely inserts the following rules into your site’s root `.htaccess` using WordPress markers:

* `#Disable directory browsing | Disable Direct Access Plugin`
* `Options All -Indexes`

On deactivation, the plugin removes only its own marked block.

Important notes:

* This plugin targets Apache `.htaccess`. If your server does not use `.htaccess` (for example, some Nginx setups), these rules won’t apply.
* The plugin requires write access to the root `.htaccess` file.

== Installation ==

1. Upload the `disable-directory-browsing-htaccess-security` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Confirm your root `.htaccess` contains a block wrapped in `# BEGIN Disable Directory Access Plugin` / `# END Disable Directory Access Plugin`.

== Frequently Asked Questions ==

= Does this work on Nginx? =

No. Nginx does not use `.htaccess`. You’ll need to disable autoindex/directory listing in your Nginx site configuration.

= Will this overwrite my existing .htaccess rules? =

No. The plugin uses WordPress marker blocks and only adds/removes its own marked section.

= What if my .htaccess is not writable? =

The plugin won’t be able to write the rules. Ensure the web server user has permission to update the site root `.htaccess`.

== Changelog ==

= 0.1.0 =
* Initial release.

== Upgrade Notice ==

= 0.1.0 =
* Initial release.
