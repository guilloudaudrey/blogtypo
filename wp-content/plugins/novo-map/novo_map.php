<?php
/*
Plugin Name: Novo map
Plugin URI: http://www.novo-monde.com/plugin-wordpress-google-map-novomap.php
Description: Add a custom google map with your posts on it
Version: 1.3
Author: Luisier Benoit
Author URI: http://www.novo-monde.com
*/

class novo_map
{
  public function __construct()
  {
    include_once plugin_dir_path( __FILE__ ).'/map_plugin.php';
    new map_plugin();
    //to use if I want to create new columns in the wp_posts table on plugin activation
    //register_activation_hook(__FILE__, array('map_plugin', 'install'));
    
    //to use on plugin removal
    register_uninstall_hook(__FILE__, array('map_plugin','uninstall'));
  }
}
new novo_map();
