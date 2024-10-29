<?php

function sw_module_menu_settings_pages( $settings_pages )
{
	$settings_pages[] = array(
		'id'            => 'sw-module-menu-options',
		'option_name'   => 'sw_module_menu_options',
		'parent'        => 'options-general.php',
		'menu_title'    => __( 'Beaverlodge Module Menu', 'sw_module_menu' ),
	);
	return $settings_pages;
}
add_filter( 'mb_settings_pages', 'sw_module_menu_settings_pages' );

function sw_module_menus_meta_boxes( $meta_boxes )
{
	$meta_boxes[] = array(
		'id'             => 'sw-module-menu',
		'title'          => __( 'Module Menu Settings', 'sw_module_menu' ),
		'settings_pages' => 'sw-module-menu-options',
		'fields'         => array(
            
			array(
				'name'      => __( 'Background Colour', 'sw_module_menu' ),
				'id'        => 'sw-module-menu-plain',
				'type'      => 'color',
				'std'       => '#eeeeee',
			),
            
			array(
				'name'      => __( 'Font Colour', 'sw_module_menu' ),
				'id'        => 'sw-module-menu-font',
				'type'      => 'color',
				'std'       => '#999999',
			),
            
			array(
				'name'      => __( 'Hover Background Colour', 'sw_module_menu' ),
				'id'        => 'sw-module-menu-hover',
				'type'      => 'color',
				'std'       => '#0074a1',
			),
            
			array(
				'name'      => __( 'Hover Font Colour', 'sw_module_menu' ),
				'id'        => 'sw-module-menu-font-hover',
				'type'      => 'color',
				'std'       => '#ffffff',
			),
            
		),
	);
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'sw_module_menus_meta_boxes' );