=== Play Audio Once ===
Contributors: threadi
Tags: audio, play audio once
Requires at least: 5.8
Tested up to: 6.8
Requires PHP: 8.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Stable tag: @@VersionNumber@@

Adds the option to prevent an audio file from being played multiple times.

== Description ==

Adds the option to prevent an audio file from being played multiple times. You can set the option for the complete website
or restrict the audio files only for specific files added from you in your editor.

In the frontend, the option, if activated, is executed on the audio file if the visitor's browser has JavaScript activated. The fact that an audio file was played is saved in the browser session - not as a cookie. The storage takes place at the moment of playback, which means that it is no longer possible to rewind or fast-forward. The user is not offered an option to reset.

== Supported editors ==

The plugin actually supports following editors:

* Block Editor
* Multiple plugins which adds audio widget in Elementor

== Installation ==

1. Upload "play-audio-once" to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Choose the newly added option on any audio-block in your project.

== GitHub ==

The source-code of this plugin is hosted on [GitHub](https://github.com/threadi/play-audio-once).

== Screenshots ==

== Changelog ==

= @@VersionNumber@@ =
- Added setting for enable play audio once on frontend for all audio files
- Added setting link in plugin list
- Added hook documentation
- Optimized class loader
- Optimized some code spellings

[older changes](https://github.com/threadi/play-audio-once/blob/master/changelog.md)
