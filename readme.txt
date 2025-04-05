=== Play Audio Once ===
Contributors: threadi
Tags: audio, play audio once
Requires at least: 5.8
Tested up to: 6.8
Requires PHP: 8.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Stable tag: @@VersionNumber@@

Adds an option to the audio block in Gutenberg-editor to prevent the file from being played multiple times.

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

= @@VersionNumber@@ =
- Added third party support possibility
- Added support for audio widget in plugin "CP Media Player" in Elementor
- Added support for audio widget in plugin "Music player for Elementor"
- Added support for audio widget in plugin "Responsive Addons for Elementor"
- Added help links in plugin list on our plugin
- Added how to use documentation
- Added some hooks
- Optimized JS-handles for own scripts
- Set minimum requirement to PHP 8.0
- Updated compatibility-flag for WordPress 6.8
- Updated dependencies
- Updated local build scripts for new releases

[older changes](https://github.com/threadi/image-upload-for-imgur/blob/master/changelog.md)
