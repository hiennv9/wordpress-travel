<?php
/**
 * Room Settings for Archive
 *
 * @package Mytravel/ACF/Settings/RoomDetails
 */

acf_add_local_field_group(
	array(
		'key'                   => 'group_60bdd503376e4',
		'title'                 => 'Room Details',
		'fields'                => array(
			array(
				'key' => 'field_625d06e8803b3',
				'label' => 'General',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_625d08f36451c',
				'label' => 'Hotel Name',
				'name' => 'hotel_name',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'product',
				),
				'taxonomy' => array(
					0 => 'product_format:product-format-hotel',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
			array(
				'key'               => 'field_60bdd52e74314',
				'label'             => 'Room size',
				'name'              => 'area',
				'type'              => 'text',
				'instructions'      => 'Enter the room size',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_60c0ef8e206d4',
				'label'             => 'Max. Adults',
				'name'              => 'max_adults',
				'type'              => 'number',
				'instructions'      => 'Enter the maximum number of adults allowed in this room',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => 2,
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'min'               => 1,
				'max'               => '',
				'step'              => 1,
			),
			array(
				'key'               => 'field_60c0efec206d5',
				'label'             => 'Max. Children',
				'name'              => 'max_children',
				'type'              => 'number',
				'instructions'      => 'Enter the maximum number of children allowed in this room. Enter 0 if children are not allowed',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => 2,
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'min'               => 0,
				'max'               => '',
				'step'              => 1,
			),
			array(
				'key'               => 'field_60bdd794fad80',
				'label'             => 'Beds',
				'name'              => 'total_beds',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_60bdd5f374316',
				'label'             => 'Primary Room Amenities',
				'name'              => 'primary_room_amenities',
				'type'              => 'taxonomy',
				'instructions'      => 'Check the amenities you want to show in the preview. Choose only 2',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'taxonomy'          => 'pa_room-amenities',
				'field_type'        => 'checkbox',
				'add_term'          => 0,
				'save_terms'        => 0,
				'load_terms'        => 0,
				'return_format'     => 'object',
				'multiple'          => 0,
				'allow_null'        => 0,
			),
			array(
				'key'               => 'field_60bdd5a474315',
				'label'             => 'Room Amenities',
				'name'              => 'room_amenities',
				'type'              => 'taxonomy',
				'instructions'      => 'Complete list of amenities available in the room',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'taxonomy'          => 'pa_room-amenities',
				'field_type'        => 'checkbox',
				'add_term'          => 1,
				'save_terms'        => 0,
				'load_terms'        => 0,
				'return_format'     => 'object',
				'multiple'          => 0,
				'allow_null'        => 0,
			),
			array(
				'key'               => 'field_61b981d0d82a0',
				'label'             => 'Max.Infant',
				'name'              => 'max_infant',
				'type'              => 'number',
				'instructions'      => 'Enter the maximum number of infant allowed in this room. Enter 0 if infant are not allowed',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => 1,
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'min'               => 0,
				'max'               => '',
				'step'              => 1,
			),
			array(
				'key'               => 'field_61d578a4e5d67',
				'label'             => 'Badges',
				'name'              => '',
				'type'              => 'tab',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'placement'         => 'left',
				'endpoint'          => 0,
			),
			array(
				'key'               => 'field_60c31d6d9e561',
				'label'             => 'Badge',
				'name'              => 'badge',
				'type'              => 'text',
				'instructions'      => 'Enter this room\'s badge. Separate the text and color by |',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => 'Badge Text|color',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_61d578aae5d68',
				'label'             => 'Single Room Page Above Title',
				'name'              => 'single_room_above_title_badges',
				'type'              => 'taxonomy',
				'instructions'      => 'Badges displayed above title in single room page',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'taxonomy'          => 'product_tag',
				'field_type'        => 'checkbox',
				'add_term'          => 1,
				'save_terms'        => 0,
				'load_terms'        => 0,
				'return_format'     => 'object',
				'multiple'          => 0,
				'allow_null'        => 0,
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'product',
				),
				array(
					'param'    => 'post_taxonomy',
					'operator' => '==',
					'value'    => 'product_format:product-format-room',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
		'show_in_rest'          => 0,
	)
);

