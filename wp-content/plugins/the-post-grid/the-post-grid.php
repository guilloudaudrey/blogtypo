<?php
/**
 * Plugin Name: The Post Grid
 * Plugin URI: http://demo.radiustheme.com/wordpress/plugins/the-post-grid/
 * Description: Fast & Easy way to display WordPress post in Grid, List & Isotope view ( filter by category, tag, author..)  without a single line of coding.
 * Author: RadiusTheme
 * Version: 1.9
 * Text Domain: the-post-grid
 * Domain Path: /languages
 * Author URI: https://radiustheme.com/
*/
if ( ! defined( 'ABSPATH' ) )  exit;

define('RT_THE_POST_GRID_PLUGIN_PATH', dirname(__FILE__));
define('RT_THE_POST_GRID_PLUGIN_ACTIVE_FILE_NAME', plugin_basename(__FILE__));
define('RT_THE_POST_GRID_PLUGIN_URL', plugins_url('', __FILE__));
define('RT_THE_POST_GRID_LANGUAGE_PATH', dirname( plugin_basename( __FILE__ ) ) . '/languages');

require ('lib/init.php');