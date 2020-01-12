<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'dotdigital' ),
		'desc'          => esc_html__( 'Create your tabs', 'dotdigital' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'dotdigital' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'dotdigital' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'dotdigital' ),
				'image'       => esc_html__( 'Featured image for your tab', 'dotdigital' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'dotdigital' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'dotdigital' ),
				'set'   => 'rt-icons-2',
			),
		),
	),
	'id'         => array( 'type' => 'unique' ),
);