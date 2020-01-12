<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$slider_extension = fw()->extensions->get( 'slider' );
$choices = '';
if ( ! empty ( $slider_extension ) ) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

//adding empty value to disable slider
$choices['0'] = esc_html__( 'No Slider', 'dotdigital' );

$options = array(
	'logo_section'    => array(
		'title'   => esc_html__( 'Site Logo', 'dotdigital' ),
		'options' => array(
			'logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Main logo image that appears in header', 'dotdigital' ),
				'desc'        => esc_html__( 'Select your logo', 'dotdigital' ),
				'help'        => esc_html__( 'Choose image to display as a site logo', 'dotdigital' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif', 'svg' ),
			),
			'logo_text'              => array(
				'type'  => 'text',
				'value' => 'Dotdigital',
				'attr'  => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
				'label' => esc_html__( 'Logo Text', 'dotdigital' ),
				'desc'  => esc_html__( 'Text that appears near logo image', 'dotdigital' ),
				'help'  => esc_html__( 'Type your text to show it in logo', 'dotdigital' ),
			),
			'logo_subtext'              => array(
				'type'  => 'text',
				'value' => 'WordPress Theme',
				'attr'  => array( 'class' => 'logo_subtext-class', 'data-logo_subtext' => 'logo_subtext' ),
				'label' => esc_html__( 'Logo Tagline', 'dotdigital' ),
				'desc'  => esc_html__( 'Text that appears near logo text', 'dotdigital' ),
			),
		),
	),
	'color_scheme_number'     => array(
		'title'   => esc_html__( 'Theme Color Scheme', 'dotdigital' ),
		'options' => array(
			'color_scheme_number' => array(
				'type'    => 'image-picker',
				'value'   => '',
				'label'   => esc_html__( 'Color scheme', 'dotdigital' ),
				'desc'    => esc_html__( 'Select one of predefined theme main colors', 'dotdigital' ),
				'choices' => array(
					'' => get_template_directory_uri() . '/img/theme-options/color_scheme1.png',
					'2' => get_template_directory_uri() . '/img/theme-options/color_scheme2.png',
					'3' => get_template_directory_uri() . '/img/theme-options/color_scheme3.png',
					'4' => get_template_directory_uri() . '/img/theme-options/color_scheme4.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),

		),
	),
	'blog_posts' => array(
		'title'   => esc_html__( 'Theme Blog', 'dotdigital' ),
		'options' => array(
			'post_categories'         => array(
				'label'        => esc_html__( 'Post Categories', 'dotdigital' ),
				'desc'         => esc_html__( 'Show post categories?', 'dotdigital' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'dotdigital' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'dotdigital' )
				),
				'value'        => 'yes',
			),
			'post_author'         => array(
				'label'        => esc_html__( 'Post Author', 'dotdigital' ),
				'desc'         => esc_html__( 'Show post author?', 'dotdigital' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'dotdigital' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'dotdigital' )
				),
				'value'        => 'yes',
			),
			'post_date'         => array(
				'label'        => esc_html__( 'Post Date', 'dotdigital' ),
				'desc'         => esc_html__( 'Show post date?', 'dotdigital' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'dotdigital' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'dotdigital' )
				),
				'value'        => 'yes',
			),
			'post_tags'         => array(
				'label'        => esc_html__( 'Post Tags', 'dotdigital' ),
				'desc'         => esc_html__( 'Show post tags?', 'dotdigital' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'dotdigital' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'dotdigital' )
				),
				'value'        => 'yes',
			),
			'blog_slider_switch' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'blog_slider_enabled' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__( 'Post slider', 'dotdigital' ),
						'desc'         => esc_html__( 'Enable slider on blog page', 'dotdigital' ),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'No', 'dotdigital' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dotdigital' ),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'slider_id' => array(
							'type'    => 'select',
							'value'   => '',
							'label'   => esc_html__( 'Select Slider', 'dotdigital' ),
							'choices' => $choices
						),
					),
				),
			),
		)
	),
	'headers'     => array(
		'title'   => esc_html__( 'Theme Header', 'dotdigital' ),
		'options' => array(

			'header'       => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'header-thumbnail',
					'data-foo' => 'header',
				),
				'label'   => esc_html__( 'Template Header', 'dotdigital' ),
				'desc'    => esc_html__( 'Select one of predefined theme headers', 'dotdigital' ),
				'help'    => esc_html__( 'You can select one of predefined theme headers', 'dotdigital' ),
				'choices' => array(
					'1' => get_template_directory_uri() . '/img/theme-options/header1.png',
					'2' => get_template_directory_uri() . '/img/theme-options/header2.png',
					'21' => get_template_directory_uri() . '/img/theme-options/header21.png',
					'22' => get_template_directory_uri() . '/img/theme-options/header22.png',
					'23' => get_template_directory_uri() . '/img/theme-options/header23.png',
					'24' => get_template_directory_uri() . '/img/theme-options/header24.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'header_phone' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Header phone', 'dotdigital' ),
				'desc'  => esc_html__( 'Phone number to appear in header', 'dotdigital' ),
				'help'  => esc_html__( 'Not all headers display this info', 'dotdigital' ),
			),
		),
	),
	'footer'          => array(
		'title'   => esc_html__( 'Theme Footer', 'dotdigital' ),
		'options' => array(
			'copyrights_text' => array(
				'type'  => 'textarea',
				'value' => '&copy; Copyright 2017 All Rights Reserved',
				'label' => esc_html__( 'Copyrights text', 'dotdigital' ),
				'desc'  => esc_html__( 'Please type your copyrights text', 'dotdigital' ),
			),
		),
	),
	'fonts_panel'     => array(
		'title'   => esc_html__( 'Theme Fonts', 'dotdigital' ),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__( 'Font for body', 'dotdigital' ),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'dotdigital' ),
								'desc'         => esc_html__( 'Enable custom body font', 'dotdigital' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'dotdigital' ),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__( 'Enabled', 'dotdigital' ),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Poppins',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 16,
										'line-height'    => 30,
										'letter-spacing' => 0,
										'color'          => '#323232'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'dotdigital' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'dotdigital' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'dotdigital' ),
								),
							),
						),
					),
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__( 'Font for headings', 'dotdigital' ),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'dotdigital' ),
								'desc'         => esc_html__( 'Enable custom heading font', 'dotdigital' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'dotdigital' ),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__( 'Enabled', 'dotdigital' ),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 16,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#323232'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'dotdigital' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'dotdigital' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'dotdigital' ),
								),
							),
						),
					),
				),
			),

		),
	),
	'preloader_panel' => array(
		'title' => esc_html__( 'Theme Preloader', 'dotdigital' ),

		'options' => array(
			'preloader_enabled' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Preloader', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),

			'preloader_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Custom preloader image', 'dotdigital' ),
				'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'dotdigital' ),
				'images_only' => true,
			),


		),
	),
	'share_buttons'   => array(
		'title' => esc_html__( 'Theme Share Buttons', 'dotdigital' ),

		'options' => array(
			'share_facebook'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Facebook Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_twitter'     => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Twitter Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_google_plus' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Google+ Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_pinterest'   => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Pinterest Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_linkedin'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable LinkedIn Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_tumblr'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Tumblr Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_reddit'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Reddit Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),

		),
	),

);