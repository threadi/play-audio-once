=== Play Audio Once ===
Contributors: threadi
Tags: audio, play audio once
Requires at least: 5.8
Tested up to: 6.4.1
Requires PHP: 7.4
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Stable tag: 1.1.3

== Description ==

Adds an option to the audio block in Gutenberg-editor to prevent the file from being played multiple times.

In the frontend, the option, if activated, is executed on the audio file if the visitor's browser has JavaScript activated. The fact that an audio file was played is saved in the browser session - not as a cookie. The storage takes place at the moment of playback, which means that it is no longer possible to rewind or fast-forward. The user is not offered an option to reset.

== Installation ==

1. Upload "play-audio-once" to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Choose the newly added option on any audio-block in your project.

== GitHub ==

The source-code of this plugin is hosted on [GitHub](https://github.com/threadi/play-audio-once).

== Screenshots ==

== Changelog ==

= 1.0.0 =
* Initial commit

= 1.0.1 =
* Updated dependencies

= 1.0.2 =
* Updated compatibility-flag for WordPress 6.0

= 1.0.3 =
* Updated compatibility-flag for WordPress 6.0.1
* Added build-system in repository

= 1.1.0 =
* Added translations for german (formal), spanisch and italian
* Fixed setting of default value for our plugin-option
* Updated compatibility-flag for WordPress 6.2
* Updated dependencies
* Cleanup repository

= 1.1.1 =
* Optimized translation-handling during plugin-build
* Compatible with WordPress Coding Standards
* Updated compatibility-flag for WordPress 6.3
* Updated dependencies

= 1.1.2 =
* Updated compatibility-flag for WordPress 6.4
* Updated dependencies
* Compatible with WordPress Coding Standards 3.0

= 1.1.3 =
* Removed language files from release
* Cleaned js-files
* Updated dependencies (security fixes in them)
