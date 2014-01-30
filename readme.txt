=== Admin Restriction ===
Contributors: barrykooij
Donate link: 
Tags: WordPress Core update, plugin install, plugin update, plugin delete
Requires at least: 3.0
Tested up to: 3.8.1
Stable tag: 1.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Disables updating the WordPress Core plus plugin and theme installation, updating and removal for all users except the administrator user with ID 1.

== Description ==

Disables updating the WordPress Core plus plugin and theme installation, updating and removal for all users except the administrator user with ID 1.

== Installation ==

1. Upload `admin-restriction` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently asked questions ==

= What users will be able to upgrade core, theme and plugin modifications? =

The administrator created at WordPress installation (administrator with id 1) will be the only user that is able to do Core, plugin and theme installation, updating and removal.


== Changelog ==

= trunk =
* Changed static function to non static function bug, props [Remyvv](https://github.com/remyvv).
* Wrapped DISALLOW_FILE_MODS definition in a defined check, props [Remyvv](https://github.com/remyvv).
* Code style change, file name change.


= 1.1.2 =
* Added WordPress 3.5.1 support.
* Small meta information changes.

= 1.1.1 =
* Added WordPress 3.5 support.
* Small meta information changes.

= 1.1.0 =
* Fixed hiding plugin activation link bug.
* Added a method that prevents users from trying to activate/deactivate plugins through direct URL entry.

