<?php
/**
 * Plugin Name: Mapbox Plugin
 * Plugin URI: 
 * Description: Display content using a shortcode to insert in a page or post
 * Version: 0.1
 * Text Domain: mapbox_map_display
 * Author: MoiCW
 * Author URI: 
 */
 add_action('admin_menu', 'mapbox_setup_menu');
 
function mapbox_setup_menu(){
    add_menu_page( 'Mapbox Setup', 'Mapbox Setup', 'manage_options', 'test-plugin', 'mapbox_init' );
}
 
function mapbox_init(){
    mapbox_form_submit();
    $mapbox_plugin_setting = get_option('mapbox_plugin_setting');
    if($mapbox_plugin_setting == null || $mapbox_plugin_setting == '')
    {
 
    $options['mapbox_accessToken'] = "";
   
    $newoption = json_encode($options);
    update_option( 'mapbox_plugin_setting', $newoption);
    }
    
    
    $mapbox_plugin_setting = json_decode($mapbox_plugin_setting,true);
    include 'mapbox-admin.php';
    
}

function mapbox_form_submit()
{
    
    if(isset($_POST["mapbox_token"]))
    {
        $options['mapbox_accessToken'] = $_POST["mapbox_token"];
        $newoption = json_encode($options);
        update_option( 'mapbox_plugin_setting', $newoption);
    }
}


function mapbox_map_display($atts) {
	include 'mapbox-content.php';
    return $Content;
}

add_shortcode('mapbox-shortcode', 'mapbox_map_display');
