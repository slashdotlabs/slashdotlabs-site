<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy = $ext_team_settings['taxonomy_name'];

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'fw' ),
		'desc'  => esc_html__( 'Option Team Slider Title', 'fw' ),
		'type'  => 'text',
	),
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'fw' ),
		'desc'       => esc_html__( 'Number of posts to display', 'fw' ),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'fw'),
		'desc'  => esc_html__('You can select one or more categories', 'fw'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 100,
		'limit' => 100,
	)
);