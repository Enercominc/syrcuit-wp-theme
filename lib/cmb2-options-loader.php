<?php

//======================================================================
// CMB2 OPTIONS LOADER
//======================================================================

function syrcuit_load_cmb2_options( &$obj, $temps ) {
	foreach ( $temps as $temp ) {
		$prefix = str_replace( '-', '_', $temp );
		switch ( $temp ) {
			case 'example':
				$obj->add_field(
					array(
						'name'     => __( '<span style="font-size: 1.5rem; font-weight: 900;">Example Section</span>', 'syrcuit' ),
						'id'   => '_syrcuit_example_info',
						'type'     => 'title',
					)
				);
				$obj->add_field(
					array(
						'name'     => __( 'Headline', 'syrcuit' ),
						'desc'     => __( syrcuit_get_tags_badge() . 'Provide a headline for this item.', 'syrcuit' ),
						'id'   => '_syrcuit_example_headline',
						'type'     => 'text',
					)
				);
				break;
			default:
				break;
		}
	}
	return;
}
