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
class ThirdPartySupport_Base {

	/**
	 * Instance of this object.
	 *
	 * @var ?ThirdPartySupport_Base
	 */
	private static ?ThirdPartySupport_Base $instance = null;

	/**
	 * Constructor for Init-Handler.
	 */
	private function __construct() { }

	/**
	 * Prevent cloning of this object.
	 *
	 * @return void
	 */
	private function __clone() { }

	/**
	 * Return the instance of this Singleton object.
	 */
	public static function get_instance(): ThirdPartySupport_Base {
		if ( ! static::$instance instanceof static ) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * Initialize this object.
	 *
	 * @return void
	 */
	public function init(): void {}
}
