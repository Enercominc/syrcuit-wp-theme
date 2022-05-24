<?php

//======================================================================
// CMB2 METABOXES
//======================================================================

/**
 * Front Page Metabox
 */

add_action( 'cmb2_admin_init', 'syrcuit_register_page_front_metabox' );

function syrcuit_register_page_front_metabox() {
	$prefix = '_syrcuit_';

	$cmb_options = new_cmb2_box(
		array(
			'id'            => $prefix . 'metabox_page_front',
			'title'         => esc_html__( 'Front Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'show_on' => array(
				'key' => 'front-page',
				'value' => '',
			),
		)
	);

	syrcuit_load_cmb2_options( $cmb_options, array( 'internal-header', 'content-box', 'sections' ) );

}

/**
 * Default Page Metabox
 */

add_action( 'cmb2_admin_init', 'syrcuit_register_page_default_metabox' );

function syrcuit_register_page_default_metabox() {
	$prefix = '_syrcuit_';

	$cmb_options = new_cmb2_box(
		array(
			'id'            => $prefix . 'metabox_page_default',
			'title'         => esc_html__( 'Additional Options', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'show_on' => array(
				'key' => 'default-page-template',
				'value' => '',
			),
		)
	);

	syrcuit_load_cmb2_options( $cmb_options, array( 'example' ) );

}

/*
Example CMB2 registration for a custom page template:

add_action( 'cmb2_admin_init', 'syrcuit_register_page_template_tmpname_metabox' );

function syrcuit_register_page_template_tmpname_metabox() {
	$prefix = '_syrcuit_';

	$cmb_options = new_cmb2_box(
		array(
			'id'            => $prefix . 'metabox_page_template_tmpname',
			'title'         => esc_html__( 'Template Options', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'priority'     => 'high',
			'show_on'      => array(
				'key'   => 'page-template',
				'value' => 'templates/page-template-tmpname.php',
			),
		)
	);

	syrcuit_load_cmb2_options( $cmb_options, array( 'elements' ) );

}

*/


// About (Page Template) Metabox

add_action( 'cmb2_admin_init', 'syrcuit_register_page_template_about_metabox' );

function syrcuit_register_page_template_about_metabox() {
	$prefix = '_syrcuit_';

	$cmb_options = new_cmb2_box(
		array(
			'id'            => $prefix . 'metabox_page_template_about',
			'title'         => esc_html__( 'Page Template Options', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'priority'     => 'high',
			'show_on'      => array(
				'key'   => 'page-template',
				'value' => 'templates/page-template-about.php',
			),
		)
	);

	syrcuit_load_cmb2_options( $cmb_options, array( 'internal-header', 'content-box' ) );

}


// Solar (Page Template) Metabox

add_action( 'cmb2_admin_init', 'syrcuit_register_page_template_solar_metabox' );

function syrcuit_register_page_template_solar_metabox() {
	$prefix = '_syrcuit_';

	$cmb_options = new_cmb2_box(
		array(
			'id'            => $prefix . 'metabox_page_template_solar',
			'title'         => esc_html__( 'Page Template Options', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'priority'     => 'high',
			'show_on'      => array(
				'key'   => 'page-template',
				'value' => 'templates/page-template-solar.php',
			),
		)
	);

	syrcuit_load_cmb2_options( $cmb_options, array( 'internal-header', 'section-box', 'geo-box-1', 'geo-box-2', 'geo-box-3', 'geo-box-4', 'benefits' ) );

}


// Geothermal (Page Template) Metabox

add_action( 'cmb2_admin_init', 'syrcuit_register_page_template_geothermal_metabox' );

function syrcuit_register_page_template_geothermal_metabox() {
	$prefix = '_syrcuit_';

	$cmb_options = new_cmb2_box(
		array(
			'id'            => $prefix . 'metabox_page_template_geothermal',
			'title'         => esc_html__( 'Page Template Options', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'priority'     => 'high',
			'show_on'      => array(
				'key'   => 'page-template',
				'value' => 'templates/page-template-geothermal.php',
			),
		)
	);

	syrcuit_load_cmb2_options( $cmb_options, array( 'internal-header', 'content-box', 'geo-box-1', 'geo-box-2'  ) ); // , 'benefits'

}

// Colorado’s Energy Future (Page Template) Metabox

add_action( 'cmb2_admin_init', 'syrcuit_register_page_template_colorado_metabox' );

function syrcuit_register_page_template_colorado_metabox() {
	$prefix = '_syrcuit_';

	$cmb_options = new_cmb2_box(
		array(
			'id'            => $prefix . 'metabox_page_template_colorado',
			'title'         => esc_html__( 'Page Template Options', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'priority'     => 'high',
			'show_on'      => array(
				'key'   => 'page-template',
				'value' => 'templates/page-template-colorado.php',
			),
		)
	);

	syrcuit_load_cmb2_options( $cmb_options, array( 'internal-header', 'content-box'  ) ); // , 'benefits' , 'geo-box-1', 'geo-box-2'

}

// The Team (Page Template) Metabox

add_action( 'cmb2_admin_init', 'syrcuit_register_page_template_the_team_metabox' );

function syrcuit_register_page_template_the_team_metabox() {
	$prefix = '_syrcuit_';

	$cmb_options = new_cmb2_box(
		array(
			'id'            => $prefix . 'metabox_page_template_the_team',
			'title'         => esc_html__( 'Page Template Options', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'priority'     => 'high',
			'show_on'      => array(
				'key'   => 'page-template',
				'value' => 'templates/page-template-the-team.php',
			),
		)
	);

	syrcuit_load_cmb2_options( $cmb_options, array( 'internal-header', 'management', 'board-of-directors' ) );

}