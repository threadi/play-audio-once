<?php
/**
 * File to handle third-party-plugin-support.
 *
 * @package play-audio-once
 */

namespace PlayAudioOnce;

// prevent direct access.
defined( 'ABSPATH' ) || exit;

/**
 * Object to handle third party support.
 */
class ThirdPartySupport {
	/**
	 * Instance of this object.
	 *
	 * @var ?ThirdPartySupport
	 */
	private static ?ThirdPartySupport $instance = null;

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
	public static function get_instance(): ThirdPartySupport {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize this object.
	 *
	 * @return void
	 */
	public function init(): void {
		foreach ( $this->get_third_party_service() as $third_party_service ) {
			// bail if class does not exist.
			if ( ! class_exists( $third_party_service ) ) {
				continue;
			}

			// extend the class name to match callable.
			$class_name = $third_party_service . '::get_instance';

			// bail if it is not callable.
			if ( ! is_callable( $class_name ) ) {
				continue;
			}

			// get object.
			$obj = $class_name();

			// bail if object is not of type ThirdPartySupport_Base.
			if ( ! $obj instanceof ThirdPartySupport_Base ) {
				continue;
			}

			// run init of this object.
			$obj->init();
		}
	}

	/**
	 * Return list of supported third party service methods.
	 *
	 * @return array<string>
	 */
	private function get_third_party_service(): array {
		$list = array(
			'\PlayAudioOnce\ThirdPartySupport\Cp_Media_Player',
			'\PlayAudioOnce\ThirdPartySupport\Music_Player_For_Elementor',
			'\PlayAudioOnce\ThirdPartySupport\Responsive_Addons_for_Elementor',
		);

		/**
		 * Filter the list of third party support.
		 *
		 * @since 2.0.0 Available since 2.0.0.
		 * @param array $list List of third party support methods.
		 */
		return apply_filters( 'play_audio_once_third_party_services', $list );
	}
}
