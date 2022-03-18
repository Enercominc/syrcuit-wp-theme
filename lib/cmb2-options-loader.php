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
			case 'front-page-header':
				$obj->add_field(
					array(
						'name' => __( '<span style="font-size: 1.75rem; font-weight: 900;">Header <span style="font-weight: 400;">Options</span></span>', 'rra' ),
						'desc' => __( 'Below, configure the header for this page. To set or change the background image for the header, use the <em>Featured Image</em> option in the right sidebar.', 'rra' ),
						'id'   => '_syrcuit_header_info',
						'type' => 'title',
					)
				);
				$obj->add_field(
					array(
						'name'     => __( 'Headline', 'syrcuit-mu' ),
						'id'   => '_syrcuit_header_headline',
						'type'     => 'text',
						'desc' => syrcuit_get_tags_badge() . '(Optional) Provide a headline, or leave blank to use the page title.',
					)
				);
				$obj->add_field(
					array(
						'name'     => __( 'Sub Headline', 'syrcuit-mu' ),
						'id'   => '_syrcuit_header_sub_headline',
						'type'     => 'text',
						'desc' => syrcuit_get_tags_badge() . '(Optional) Provide a sub headline, or leave blank.',
					)
				);				
				break;
			case 'internal-header':
				$obj->add_field(
					array(
						'name' => __( '<span style="font-size: 1.75rem; font-weight: 900;">Header <span style="font-weight: 400;">Options</span></span>', 'rra' ),
						'desc' => __( 'Below, configure the header for this page. To set or change the background image for the header, use the <em>Featured Image</em> option in the right sidebar.', 'rra' ),
						'id'   => '_syrcuit_header_info',
						'type' => 'title',
					)
				);
				$obj->add_field(
					array(
						'name'     => __( 'Headline', 'syrcuit-mu' ),
						'id'   => '_syrcuit_header_headline',
						'type'     => 'text',
						'desc' => syrcuit_get_tags_badge() . '(Optional) Provide a headline, or leave blank to use the page title.',
					)
				);
				$obj->add_field(
					array(
						'name'     => __( 'Content', 'syrcuit-mu' ),
						'id'   => '_syrcuit_' . $prefix . '_content',
						'type'     => 'wysiwyg',
						'desc' => 'Provide content for the intro.',
					)
				);
				break;
			case 'content-box':
				$section_title = 'Content <span style="font-weight: 400;">Box</span>';
				$obj->add_field(
					array(
						'name' => __( '<span style="font-size: 1.75rem; font-weight: 900;">' . $section_title . '</span>', 'rra' ),
						'desc' => __( 'Below, configure content for this page.', 'rra' ),
						'id'   => '_syrcuit_' . $prefix . '_info',
						'type' => 'title',
					)
				);
				$obj->add_field(
					array(
						'name'     => __( 'Headline', 'syrcuit-mu' ),
						'id'   => '_syrcuit_' . $prefix . '_headline',
						'type'     => 'text',
						'desc' => syrcuit_get_tags_badge() . 'Provide a headline for the intro.',
					)
				);
				$obj->add_field(
					array(
						'name'     => __( 'Content', 'syrcuit-mu' ),
						'id'   => '_syrcuit_' . $prefix . '_content',
						'type'     => 'wysiwyg',
						'desc' => 'Provide content for the intro.',
					)
				);
				// $obj->add_field(
				// 	array(
				// 		'name'     => __( 'Excerpt', 'syrcuit-mu' ),
				// 		'id'   => '_syrcuit_' . $prefix . '_excerpt',
				// 		'type'     => 'text',
				// 		'desc' => 'Provide excerpt for the intro.',
				// 	)
				// );
				// $obj->add_field(
				// 		array(
				// 			'name'     => __( 'Image', 'syrcuit-mu' ),
				// 			'id'   => '_syrcuit_' . $prefix . '_img',
				// 			'type'     => 'file',
				// 			'desc' => 'Provide an image to display to the right of this section\'s content.',
				// 		)
				// 	);				
				break;
			case 'sections':
				$obj->add_field(
					array(
						'name' => __( '<span style="font-size: 1.75rem; font-weight: 900;">Section <span style="font-weight: 400;">Content</span></span>', 'rra' ),
						'desc' => __( 'Below, configure sections the <em>Front Page</em> .', 'rra' ),
						'id'   => '_syrcuit_' . $prefix . '_info',
						'type' => 'title',
					)
				);
				$sections = $obj->add_field(
					array(
						'id'          => '_syrcuit_' . $prefix . '_sections',
						'type'        => 'group',
						'description' => __( 'Below, add and configure each section of the front page.', 'syrcuit-mu' ),
						// 'repeatable'  => false, // use false if you want non-repeatable group
						'options'     => array(
							'group_title'   => __( 'Section {#}', 'syrcuit-mu' ), // since version 1.1.4, {#} gets replaced by row number
							'add_button'    => __( 'Add Another Section', 'syrcuit-mu' ),
							'remove_button' => __( 'Remove Section', 'syrcuit-mu' ),
							'sortable'      => true,
							'closed'        => true, // true to have the groups closed by default
						),
					)
				);
				$obj->add_group_field(
					$sections,
					array(
						'name' => __( 'Headline', 'syrcuit-mu' ),
						'desc' => __( syrcuit_get_tags_badge() . 'Provide a headline for this section.', 'syrcuit-mu' ),
						'id'   => 'headline',
						'type' => 'text',
					)
				);
				$obj->add_group_field(
					$sections,
					array(
						'name' => __( 'Content', 'syrcuit-mu' ),
						'desc' => __( 'Provide a short paragraph.', 'syrcuit-mu' ),
						'id'   => 'content',
						'type' => 'wysiwyg',
					)
				);
				$obj->add_group_field(
					$sections,
					array(
						'name' => __( 'Label', 'syrcuit-mu' ),
						'desc' => __( syrcuit_get_tags_badge() . 'Provide a label for this link. If you wish to insert an empty line for this item (for spacing, etc), set the label as <code>[empty]</code>', 'syrcuit-mu' ),
						'id'   => 'label',
						'type' => 'text',
					)
				);
				$obj->add_group_field(
					$sections,
					array(
						'name' => __( 'URL', 'syrcuit-mu' ),
						'desc' => __( 'Provide the destination URL for this link.', 'syrcuit-mu' ),
						'id'   => 'url',
						'type' => 'text_url',
					)
				);
				$obj->add_group_field(
					$sections,
					array(
						'name'    => 'Target',
						'id'      => 'target',
						'type'    => 'radio_inline',
						'options' => array(
							'_self'    => __( 'Same Window', 'cmb2' ),
							'_blank'  => __( 'New Window (or Tab)', 'cmb2' ),
						),
						'default' => '_self',
					)
				);
				break;
			case 'benefits':
				$obj->add_field(
					array(
						'name' => __( '<span style="font-size: 1.75rem; font-weight: 900;">Benefits <span style="font-weight: 400;">Section</span></span>', 'rra' ),
						'desc' => __( 'Below, configure benefits sections the <em>pages</em> .', 'rra' ),
						'id'   => '_syrcuit_' . $prefix . '_info',
						'type' => 'title',
					)
				);
				$benefits = $obj->add_field(
					array(
						'id'          => '_syrcuit_' . $prefix . '_benefits',
						'type'        => 'group',
						'description' => __( 'Below, add and configure each benefit of the page.', 'syrcuit-mu' ),
						// 'repeatable'  => false, // use false if you want non-repeatable group
						'options'     => array(
							'group_title'   => __( 'Benefit {#}', 'syrcuit-mu' ), // since version 1.1.4, {#} gets replaced by row number
							'add_button'    => __( 'Add Another Benefit', 'syrcuit-mu' ),
							'remove_button' => __( 'Remove Benefit', 'syrcuit-mu' ),
							'sortable'      => true,
							'closed'        => true, // true to have the groups closed by default
						),
					)
				);
				$obj->add_group_field(
					$benefits,
					array(
						'name' => __( 'Headline', 'syrcuit-mu' ),
						'desc' => __( syrcuit_get_tags_badge() . 'Provide a headline for this section.', 'syrcuit-mu' ),
						'id'   => 'headline',
						'type' => 'text',
					)
				);
				$obj->add_group_field(
					$benefits,
					array(
						'name' => __( 'Content', 'syrcuit-mu' ),
						'desc' => __( 'Provide a short paragraph.', 'syrcuit-mu' ),
						'id'   => 'content',
						'type' => 'wysiwyg',
					)
				);
				$obj->add_group_field(
					$benefits,
						array(
							'name' => __( 'Icon', 'rra' ),
							'desc' => __( 'Provide an image to display next to the benefit.', 'rra' ),
							'id'   => 'img',
							'type' => 'file',
						)
					);
				
				break;
			case 'management':
				$section_title = 'Management <span style="font-weight: 400;">Members</span>';
				$obj->add_field(
					array(
						'name' => __( '<span style="font-size: 1.75rem; font-weight: 900;">' . $section_title . '</span>', 'rra' ),
						'desc' => __( 'Below, configure content for this page.', 'rra' ),
						'id'   => '_syrcuit_' . $prefix . '_info',
						'type' => 'title',
					)
				);
				
				$obj->add_field(
					array(
						'name' => __( 'Headline', 'syrcuit-mu' ),
						'desc' => __( syrcuit_get_tags_badge() . 'Provide a headline for this team.', 'syrcuit-mu' ),
						'id'   => '_syrcuit_' . $prefix . '_headline',
						'type' => 'text',
					)
				);

				$obj->add_field(
					array(
						'name'     => __( 'Content', 'syrcuit-mu' ),
						'id'   => '_syrcuit_' . $prefix . '_content',
						'type'     => 'wysiwyg',
						'desc' => 'Provide content for the team.',
					)
				);				
				break;
			case 'board-of-directors':
				$section_title = 'Board of Director <span style="font-weight: 400;">Members</span>';
				$obj->add_field(
					array(
						'name' => __( '<span style="font-size: 1.75rem; font-weight: 900;">' . $section_title . '</span>', 'rra' ),
						'desc' => __( 'Below, configure content for this page.', 'rra' ),
						'id'   => '_syrcuit_' . $prefix . '_info',
						'type' => 'title',
					)
				);
				
				$obj->add_field(
					array(
						'name' => __( 'Headline', 'syrcuit-mu' ),
						'desc' => __( syrcuit_get_tags_badge() . 'Provide a headline for this team.', 'syrcuit-mu' ),
						'id'   => '_syrcuit_' . $prefix . '_headline',
						'type' => 'text',
					)
				);

				$obj->add_field(
					array(
						'name'     => __( 'Content', 'syrcuit-mu' ),
						'id'   => '_syrcuit_' . $prefix . '_content',
						'type'     => 'wysiwyg',
						'desc' => 'Provide content for the team.',
					)
				);				
				break;
			default:
				break;
		}
	}
	return;
}
