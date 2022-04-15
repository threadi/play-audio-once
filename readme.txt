=== Play Audio Once ===
Contributors: threadi
Tags: audio
Requires at least: 5.8
Tested up to: 5.9.3
Requires PHP: 7.4
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Stable tag: 1.0.0

== Description ==

Adds an option to the audio block in Gutenberg-editor to prevent the file from being played multiple times.

In the frontend, the option, if activated, is executed on the audio file if the visitor's browser has JavaScript activated. The fact that an audio file was played is saved in the browser session - not as a cookie. The storage takes place at the moment of playback, which means that it is no longer possible to rewind or fast-forward. The user is not offered an option to reset.

### Deutsch

Fügt dem Audioblock im Gutenberg-Editor eine Option hinzu, die verhindert, dass die Datei mehrfach abgespielt wird.

Im Frontend wird die Option, wenn aktiviert, an der Audio-Datei ausgeführt, wenn der Browser des Besuchers JavaScript aktiviert hat. Dass eine Audio-Datei abgespielt wurde, wird in der Browser-Sitzung gespeichert - nicht als Cookie. Die Speicherung erfolgt im Moment des Abspielens wodurch auch ein vor- und zurück-spulen nicht mehr möglich ist. Es wird dem Nutzer keine Option zum Zurücksetzen angeboten.

---

== Installation ==

### English

1. Upload "play-audio-once" to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Choose the newly added option on any audio-block in your project.

### Deutsch

1. Lade "play-audio-once" in das Verzeichnis "/wp-content/plugins/" hoch.
2. Aktivieren Sie das Plugin über das Menü "Plugins" in WordPress.
3. Wählen Sie die neu hinzugefügte Option für einen beliebigen Audio-Block in Ihrem Projekt.

== Screenshots ==

== Changelog ==

= 1.0.0 =
* Initial commit

= 1.0.1 =
* Updated dependencies