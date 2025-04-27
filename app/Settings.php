<?php
/**
 * File which handles the plugin settings.
 *
 * @package play-audio-once
 */

namespace PlayAudioOnce;

// prevent direct access.
defined( 'ABSPATH' ) || exit;

/**
 * Object to handle third party support.
 */
class Settings {
	/**
	 * Instance of this object.
	 *
	 * @var ?Settings
	 */
	private static ?Settings $instance = null;

	/**
	 * Constructor for Init-Handler.
	 */
	private function __construct() {}

	/**
	 * Prevent cloning of this object.
	 *
	 * @return void
	 */
	private function __clone() { }

	/**
	 * Return the instance of this Singleton object.
	 */
	public static function get_instance(): Settings {
		if ( ! static::$instance instanceof static ) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * Add the settings.
	 *
	 * @return void
	 */
	public function add_settings(): void {
		/**
		 * Configure the basic settings object.
		 */
		$settings_obj = Dependencies\easySettingsForWordPress\Settings::get_instance();
		$settings_obj->set_slug( 'play-audio-once' );
		$settings_obj->set_plugin_slug( 'play-audio-once' );
		$settings_obj->set_menu_title( __( 'Play Audio Once settings', 'play-audio-once' ) );
		$settings_obj->set_title( __( 'Settings for Play Audio Once', 'play-audio-once' ) );
		$settings_obj->set_menu_slug( 'play-audio-once' );
		$settings_obj->set_url( Helper::get_plugin_url() . 'app/Dependencies/easySettingsForWordPress/' );

		/**
		 * Configure all tabs for this object.
		 */
		// add general tab.
		$general_tab = $settings_obj->add_tab( 'play-audio-once-general' );
		$general_tab->set_name( 'play-audio-once-general' );
		$general_tab->set_title( __( 'General Settings', 'play-audio-once' ) );
		$settings_obj->set_default_tab( $general_tab );

		/**
		 * Configure all sections for this settings object.
		 */
		// add general settings section.
		$general_tab_general_section = $general_tab->add_section( 'settings_section_general' );
		$general_tab_general_section->set_title( __( 'General Settings', 'play-audio-once' ) );
		$general_tab_general_section->set_setting( $settings_obj );

		// add setting for enable play audio once in frontend.
		$setting = $settings_obj->add_setting( 'play_audio_once_whole_site' );
		$setting->set_section( $general_tab_general_section );
		$field = new Dependencies\easySettingsForWordPress\Fields\Checkbox();
		$field->set_title( __( 'Enable play audio once', 'play-audio-once' ) );
		$field->set_description( __( 'If enabled each audio file in frontend of your website will be handled by this plugin. You do not need to configure each audio file in your editor.', 'play-audio-once' ) );
		$setting->set_field( $field );

		// initialize this settings object.
		$settings_obj->init();
	}
}
