<?php
include_once plugin_dir_path( __FILE__ ).'/map_widget.php';

class map_plugin
{
  public function __construct()
  {
    if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);

    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
    }
    if (PHP_VERSION_ID > 50300) {
      add_action('widgets_init', function(){register_widget('Novo_Map_Widget');});
    }
    //si problème avec les fonctions anonymes function(){}...
    if (PHP_VERSION_ID < 50300) {
      add_action( 'widgets_init', create_function( '', 'register_widget( "Novo_Map_Widget" );' ) );
    }
    else{
      add_action( 'widgets_init', create_function( '', 'register_widget( "Novo_Map_Widget" );' ) );
    }
    include_once plugin_dir_path( __FILE__ ).'/shortcode.php';
    new Novo_Shortcode();
    include_once plugin_dir_path( __FILE__ ).'/post_menu.php';
    new Novo_Post_Menu();
    include_once plugin_dir_path( __FILE__ ).'/admin_menu.php';
    new Novo_Admin_Menu();
  }
  
  //only necessary if I want to store the data in wp_posts instead the in wp_postmeta
  public static function install()
  {
   global $wpdb;
     $query="ALTER TABLE wp_posts ADD (latitude varchar(30), longitude varchar(30), map_description text);";
     $wpdb->query($query);
  }

  //function called when the plugin is uninstalled
  public static function uninstall()
  {
   global $wpdb;
   $query1 = "DELETE FROM wp_options WHERE option_name LIKE 'Novo%'";
   $query2 = "DELETE FROM wp_postmeta WHERE meta_key LIKE '_Novo%'";
   $wpdb->query($query1);
   $wpdb->query($query2);
  }
}
