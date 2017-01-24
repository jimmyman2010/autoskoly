<?php

return array(
	'public' => true,
	'class' => 'AitItemCpt',

	'cpt' => array(
		'labels' => array(
			'name'               => _x('Autoškoly', 'post type general name', 'ait-toolkit'),
			'singular_name'      => _x('Item', 'post type singular name', 'ait-toolkit'),
			'menu_name'          => _x('Autoškoly', 'post type menu name', 'ait-toolkit'),
			'add_new'            => _x('Add New', 'Item', 'ait-toolkit'),
			'add_new_item'       => __('Add New Item', 'ait-toolkit'),
			'edit_item'          => __('Edit Item', 'ait-toolkit'),
			'new_item'           => __('New Item', 'ait-toolkit'),
			'view_item'          => __('View Item', 'ait-toolkit'),
			'search_items'       => __('Search Items', 'ait-toolkit'),
			'not_found'          => __('No Items found', 'ait-toolkit'),
			'not_found_in_trash' => __('No Items found in Trash', 'ait-toolkit'),
			'all_items'          => __('All Items', 'ait-toolkit'),
		),

		'args' => array(
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				'page-attributes',
				'excerpt',
				'comments',
			),
			'capability_type' => array('ait-item', 'ait-items'),
			'map_meta_cap' => true,
			'capabilities' => array(
				'edit_post'              => 'ait_toolkit_items_edit_item',
				'read_post'              => 'ait_toolkit_items_read_item',
				'delete_post'            => 'ait_toolkit_items_delete_item',
				'edit_posts'             => 'ait_toolkit_items_edit_items',
				'edit_others_posts'      => 'ait_toolkit_items_edit_others_items',
				'publish_posts'          => 'ait_toolkit_items_publish_items',
				'read_private_posts'     => 'ait_toolkit_items_read_private_items',
				'read'                   => 'ait_toolkit_items_read_items',
				'delete_posts'           => 'ait_toolkit_items_delete_items',
				'delete_private_posts'   => 'ait_toolkit_items_delete_private_items',
				'delete_published_posts' => 'ait_toolkit_items_delete_published_items',
				'delete_others_posts'    => 'ait_toolkit_items_delete_others_items',
				'edit_private_posts'     => 'ait_toolkit_items_edit_private_items',
				'edit_published_posts'   => 'ait_toolkit_items_edit_published_items',
			),
			'rewrite' => array('slug' => 'autoskoly')
		),
	),

	'taxonomies' => array(
		'items' => array(
			'labels' => array(
				'name'              => _x('Mestá', 'taxonomy general name', 'ait-toolkit'),
				'menu_name'         => _x('Mestá', 'taxonomy menu name', 'ait-toolkit'),
				'singular_name'     => _x('City', 'taxonomy singular name', 'ait-toolkit'),
				'search_items'      => __('Search Cities', 'ait-toolkit'),
				'all_items'         => __('Mestá', 'ait-toolkit'),
				'parent_item'       => __('Parent City', 'ait-toolkit'),
				'parent_item_colon' => __('Parent City:', 'ait-toolkit'),
				'edit_item'         => __('Edit City', 'ait-toolkit'),
				'view_item'         => __('View City', 'ait-toolkit'),
				'update_item'       => __('Update City', 'ait-toolkit'),
				'add_new_item'      => __('Add New City', 'ait-toolkit'),
				'new_item_name'     => __('New City Name', 'ait-toolkit'),
			),
			'args' => array(
				'rewrite' => array(
					'slug' => 'mesto',
				),
				'capabilities' => array(
					'manage_terms' => 'ait_toolkit_items_category_manage_items',
					'edit_terms'   => 'ait_toolkit_items_category_edit_items',
					'delete_terms' => 'ait_toolkit_items_category_delete_items',
					'assign_terms' => 'ait_toolkit_items_category_assign_items',
				),
			),
		),

		'locations' => array(
			'labels' => array(
				'name'              => _x('Kraje', 'taxonomy general name', 'ait-toolkit'),
				'menu_name'         => _x('Kraje', 'taxonomy menu name', 'ait-toolkit'),
				'singular_name'     => _x('Region', 'taxonomy singular name', 'ait-toolkit'),
				'search_items'      => __('Search Categories', 'ait-toolkit'),
				'all_items'         => __('Kraje', 'ait-toolkit'),
				'parent_item'       => __('Parent Region', 'ait-toolkit'),
				'parent_item_colon' => __('Parent Region:', 'ait-toolkit'),
				'edit_item'         => __('Edit Region', 'ait-toolkit'),
				'view_item'         => __('View Region', 'ait-toolkit'),
				'update_item'       => __('Update Region', 'ait-toolkit'),
				'add_new_item'      => __('Add New Region', 'ait-toolkit'),
				'new_item_name'     => __('New Region Name', 'ait-toolkit'),
			),
			'args' => array(
				'rewrite' => array(
					'slug' => 'kraj',
				),
				'capabilities' => array(
					'manage_terms' => 'ait_toolkit_items_category_manage_locations',
					'edit_terms'   => 'ait_toolkit_items_category_edit_locations',
					'delete_terms' => 'ait_toolkit_items_category_delete_locations',
					'assign_terms' => 'ait_toolkit_items_category_assign_locations',
				),
			),
		),
	),

	'metaboxes' => array(
		'item-data' => array(
			'title'        => _x('Item Options', 'custom metabox title', 'ait-toolkit'),
			'config'       => 'item-data',
			'saveCallback' => array('AitItemCpt', 'saveItemMeta'),
		),
		'item-author' => array(
			'title'        => _x('Author Options', 'custom metabox title', 'ait-toolkit'),
			'config'       => 'item-author',
			'saveCallback' => array('AitItemCpt', 'saveAuthorMetabox'),
		),
	),

	'featuredImageMetabox' => array(
		'labels' => array(
			'title'           => _x('Item Image', 'featured image metabox', 'ait-toolkit'),
			'linkSetTitle'    => _x('Set Item Image', 'featured image metabox', 'ait-toolkit'),
			'linkRemoveTitle' => _x('Remove Item Image', 'featured image metabox', 'ait-toolkit'),
		),
		'context' => 'normal',
		'priority' => 'default',
	),
);
