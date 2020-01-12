<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');

/*
 * Load styles of the button shortcode
 * This is temporary, in the future we
 * will call the render method on the
 * button shortcode, passing the button
 * options like link, label, target to to it
 * and the shortcode will load it's own styles
 */
wp_enqueue_style(
	'fw-shortcode-media-image',
	$shortcodes_extension->get_declared_URI('/shortcodes/media-image/static/css/styles.css')
);