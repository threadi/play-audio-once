<?php
/**
 * This file contains a helper object for this plugin.
 *
 * @package external-files-in-media-library
 */

namespace PlayAudioOnce;

// prevent direct access.
defined( 'ABSPATH' ) || exit;

/**
 * Initialize the helper for this plugin.
 */
class Helper {
    /**
     * Get plugin dir of this plugin.
     *
     * @return string
     */
    public static function get_plugin_dir(): string {
        return trailingslashit( plugin_dir_path( PLAO_PLUGIN ) );
    }

    /**
     * Get plugin URL of this plugin.
     *
     * @return string
     */
    public static function get_plugin_url(): string {
        return trailingslashit( plugin_dir_url( PLAO_PLUGIN ) );
    }
}
