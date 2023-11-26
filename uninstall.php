<?php
/**
 * Run uninstall tasks for this Plugin.
 *
 * @package play-audio-once
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Exit if file is not called during uninstall-process.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// nothing to do.
