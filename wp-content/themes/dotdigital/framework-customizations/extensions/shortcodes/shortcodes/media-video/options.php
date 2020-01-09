<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'media_link'     => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Link to your side media', 'dotdigital' ),
		'desc'  => esc_html__( 'You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'dotdigital' ),
	),
	'media_video'    => array(
		'type'    => 'oembed',
		'value'   => '',
		'label'   => esc_html__( 'Video', 'dotdigital' ),
		'desc'    => esc_html__( 'Adds video player', 'dotdigital' ),
		'help'    => esc_html__( 'Leave blank if no needed', 'dotdigital' ),
		'preview' => array(
			'width'      => 278, // optional, if you want to set the fixed width to iframe
			'height'     => 185, // optional, if you want to set the fixed height to iframe
			/**
			 * if is set to false it will force to fit the dimensions,
			 * because some widgets return iframe with aspect ratio and ignore applied dimensions
			 */
			'keep_ratio' => true
		),
	),
	'width'  => array(
		'type'  => 'text',
		'label' => esc_html__( 'Video Width', 'dotdigital' ),
		'desc'  => esc_html__( 'Enter a value for the width', 'dotdigital' ),
		'value' => 300
	),
	'height' => array(
		'type'  => 'text',
		'label' => esc_html__( 'Video Height', 'dotdigital' ),
		'desc'  => esc_html__( 'Enter a value for the height', 'dotdigital' ),
		'value' => 200
	),
	'media_image'    => array(
		'type'        => 'upload',
		'value'       => array(),
		'label'       => esc_html__( 'Side media image', 'dotdigital' ),
		'desc'        => esc_html__( 'Select image that you want to appear as one half side image', 'dotdigital' ),
		'images_only' => true,
	),
);
