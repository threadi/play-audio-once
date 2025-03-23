<?php
/**
 * File to handle support for plugin "Music Player for Elementor".
 *
 * @package play-audio-once
 */

namespace PlayAudioOnce\ThirdPartySupport;

// prevent direct access.
defined( 'ABSPATH' ) || exit;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PlayAudioOnce\ThirdPartySupport_Base;

/**
 * Object to handle third party support.
 */
class Music_Player_For_Elementor extends ThirdPartySupport_Base {
	/**
	 * Initialize this object.
	 *
	 * @return void
	 */
	public function init(): void {
		add_action( 'elementor/element/slide-compact-player/section_playlist/before_section_end', array( $this, 'add_settings' ) );
		add_filter( 'elementor/widget/render_content', array( $this, 'render_setting' ), 10, 2 );
	}

	/**
	 * Add control for our setting.
	 *
	 * @param Widget_Base $widget The widget object.
	 * @return void
	 */
	public function add_settings( Widget_Base $widget ): void {
		$widget->add_control(
			'play_audio_once',
			array(
				'label'        => __( 'Play only once per session', 'play-audio-once' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'play-audio-once' ),
				'label_off'    => esc_html__( 'No', 'play-audio-once' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);
	}

	/**
	 * Render the output and add our play audio once marker if enabled.
	 *
	 * @param string      $content The content to output.
	 * @param Widget_Base $instance The widget object.
	 * @return string
	 */
	public function render_setting( string $content, Widget_Base $instance ): string {
		// bail if this is not the widget.
		if ( 'slide-compact-player' !== $instance->get_name() ) {
			return $content;
		}

		// bail if setting is not enabled.
		if ( empty( $instance->get_settings( 'play_audio_once' ) ) ) {
			return $content;
		}

		// add our marker on HTML output and return the resulting string.
		return str_replace( 'swp-compact-player', 'swp-compact-player audio-play-once-true', $content );
	}
}
