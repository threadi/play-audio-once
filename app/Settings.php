<?php
/**
 * File, which handles the plugin settings.
 *
 * @package play-audio-once
 */

namespace PlayAudioOnce;

// prevent direct access.
defined( 'ABSPATH' ) || exit;

use easySettingsForWordPress\Fields\Checkbox;
use easySettingsForWordPress\Page;

/**
 * Object to handle third party support.
 */
class Settings {
	/**
	 * The settings object.
	 *
	 * @var ?\easySettingsForWordPress\Settings
	 */
	private ?\easySettingsForWordPress\Settings $settings_obj = null;

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
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
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
		$settings_obj = $this->get_settings_obj();
		$settings_obj->set_slug( 'play-audio-once' );
		$settings_obj->set_menu_title( __( 'Play Audio Once settings', 'play-audio-once' ) );
		$settings_obj->set_title( __( 'Settings for Play Audio Once', 'play-audio-once' ) );
		$settings_obj->set_menu_slug( 'play-audio-once' );
		$settings_obj->show_settings_link_in_plugin_list( true );

		// get the settings page.
		$settings_page = $settings_obj->get_page( 'play-audio-once' );

		// bail if page could not be found.
		if ( ! $settings_page instanceof Page ) {
			return;
		}

		/**
		 * Configure all tabs for this object.
		 */
		// add the general tab.
		$general_tab = $settings_page->add_tab( 'play-audio-once-general', 10 );
		$general_tab->set_name( 'play-audio-once-general' );
		$general_tab->set_title( __( 'General Settings', 'play-audio-once' ) );
		$settings_page->set_default_tab( $general_tab );

		/**
		 * Configure all sections for this settings object.
		 */
		// add general settings section.
		$general_tab_general_section = $general_tab->add_section( 'settings_section_general', 10 );
		$general_tab_general_section->set_title( __( 'General Settings', 'play-audio-once' ) );
		$general_tab_general_section->set_setting( $settings_obj );

		// add setting for enable play audio once in the frontend.
		$setting = $settings_obj->add_setting( 'play_audio_once_whole_site' );
		$setting->set_section( $general_tab_general_section );
		$field = new Checkbox( $settings_obj );
		$field->set_title( __( 'Enable play audio once', 'play-audio-once' ) );
		$field->set_description( __( 'If enabled each audio file in the frontend of your website will be handled by this plugin. You do not need to configure each audio file in your editor.', 'play-audio-once' ) );
		$setting->set_field( $field );

		// initialize this settings object.
		$settings_obj->init();
	}

	/**
	 * Return the settings object.
	 *
	 * @return \easySettingsForWordPress\Settings
	 */
	public function get_settings_obj(): \easySettingsForWordPress\Settings {
		if ( null === $this->settings_obj ) {
			$this->settings_obj = new \easySettingsForWordPress\Settings( PLAO_PLUGIN );
		}

		// return the settings object.
		return $this->settings_obj;
	}
}
