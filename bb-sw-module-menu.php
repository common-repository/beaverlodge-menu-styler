<?php
/**
 * Plugin Name: Beaverlodge Menu Styler
 * Plugin URI: https://www.beaverlodgehq.com
 * Description: Style the module menu in Beaver Builder.
 * Version: 1.0.1
 * Author: Jon Mather
 * Author URI: https://www.beaverlodgehq.com
 */



add_action('wp_head','sw_bb_module_menu_css');

function sw_bb_module_menu_css() {
    
    $settings = get_option( 'sw_module_menu_options' );
    $plain = 'sw-module-menu-plain';
    $hover = 'sw-module-menu-hover';
    $font = 'sw-module-menu-font';
    $fontHover = 'sw-module-menu-font-hover';
    
    ?>

    <style>
        .fl-builder-block.fl-builder-block-module {
            background: <?php echo $settings[$plain]; ?>;
            color: <?php echo $settings[$font]; ?>;
        }
        .fl-builder-blocks-section-content .fl-builder-block:hover {            
            background: <?php echo $settings[$hover]; ?>;
            color: <?php echo $settings[$fontHover]; ?>;
        }
    </style>   

    <?php
    
}

function sw_bb_module_menu_style() {
    wp_register_style( 'bb-menu-style',  plugin_dir_url( __FILE__ ) . 'includes/style.css' );
    wp_enqueue_style( 'bb-menu-style' );
    wp_register_style( 'fontawesome',  plugin_dir_url( __FILE__ ) . 'includes/font-awesome-4.6.3/css/font-awesome.min.css' );
    wp_enqueue_style( 'fontawesome' );
}
add_action( 'wp_enqueue_scripts', 'sw_bb_module_menu_style' );

if ( ! class_exists( 'FLBuilder' )) {
	require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
	require_once dirname( __FILE__ ) . '/tgm_settings.php';
	
	function sw_bb_module_menu_lite_branding() {
		echo 'https://www.wpbeaverbuilder.com/?fla=283';
	}
	add_action ('fl_builder_upgrade_url', 'sw_bb_module_menu_lite_branding');

}


if( !class_exists( 'RW_Meta_Box' ) ) {
	include plugin_dir_path( __FILE__ ) . 'meta/meta-box/meta-box.php';
}

if( !class_exists( 'MB_Settings_Page_Meta_Box' ) ) {
	include plugin_dir_path( __FILE__ ) . 'meta/mb-settings-page/mb-settings-page.php';
}

if( !class_exists( 'MB_Conditional_Logic' ) ) {
	include plugin_dir_path( __FILE__ ) . 'meta/meta-box-conditional-logic/meta-box-conditional-logic.php';
}

include plugin_dir_path( __FILE__ ) . 'meta/sw-module-menu-settings.php';