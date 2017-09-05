<?php
class Novo_Admin_Menu
{
  public function __construct()
  {
    add_action( 'admin_menu', 'Register_Novo_Admin_Menu', 20);
    add_action( 'admin_enqueue_scripts', 'add_admin_style' );
    
    //add the admin menu
    function Register_Novo_Admin_Menu()
    {
      add_menu_page( 'Novo Map Admin Menu', 'Novo Map', 'manage_options', 'Novo_Admin', 'Novo_Map_Admin_callback', plugins_url( 'novo-map/images/icon.png' ), 6 );
      add_action( 'admin_init', 'register_Novo_settings' );
    }
    
    function Novo_Map_Admin_callback()
    {
      $Novo_gmap_key = get_option('Novo_gmap_key');
      
      $Novo_center_lat = get_option('Novo_center_lat');
      if (empty($Novo_center_lat)) {
        $Novo_center_lat = '0';
      }
      
      $Novo_center_long = get_option('Novo_center_long');
      if (empty($Novo_center_long)) {
        $Novo_center_long = '0';
      }
      
      $Novo_zoom = get_option('Novo_zoom');
      if (empty($Novo_zoom)) {
        $Novo_zoom = '2';
      }
      
      $Novo_map_type_menu = get_option('Novo_map_type_menu');
      if (empty($Novo_map_type_menu)) {
        $Novo_map_type_menu = 'true';
      }
      
      $Novo_map_type_pos = get_option('Novo_map_type_pos');
      if (empty($Novo_map_type_pos)) {
        $Novo_map_type_pos = 'TOP_RIGHT';
      }

      $Novo_map_zoom_menu = get_option('Novo_map_zoom_menu');
      if (empty($Novo_map_zoom_menu)) {
        $Novo_map_zoom_menu = 'true';
      }
      
      $Novo_map_zoom_pos = get_option('Novo_map_zoom_pos');
      if (empty($Novo_map_zoom_pos)) {
        $Novo_map_zoom_pos = 'LEFT_CENTER';
      }  
      
      $Novo_cluster = get_option('Novo_cluster');
      if (empty($Novo_cluster)) {
        $Novo_cluster = 'YES';
      }
      
      $Novo_cluster_gridsize = get_option('Novo_cluster_gridsize');
      if (empty($Novo_cluster_gridsize)) {
        $Novo_cluster_gridsize = '25';
      }
      
      $Novo_cluster_marker_small = get_option('Novo_cluster_marker_small');
      if (empty($Novo_cluster_marker_small)) {
        $Novo_cluster_marker_small = 'cluster-marker-small.png';
      }
      
      $Novo_cluster_marker_small_width = get_option('Novo_cluster_marker_small_width');
      if (empty($Novo_cluster_marker_small_width)) {
        $Novo_cluster_marker_small_width = '32';
      }
      
      $Novo_cluster_marker_small_height = get_option('Novo_cluster_marker_small_height');
      if (empty($Novo_cluster_marker_small_height)) {
        $Novo_cluster_marker_small_height = '35';
      }
      
      $Novo_cluster_marker_small_color = get_option('Novo_cluster_marker_small_color');
      if (empty($Novo_cluster_marker_small_color)) {
        $Novo_cluster_marker_small_color = 'ffffff';
      }
      
      $Novo_cluster_marker_small_textsize = get_option('Novo_cluster_marker_small_textsize');
      if (empty($Novo_cluster_marker_small_textsize)) {
        $Novo_cluster_marker_small_textsize = '12';
      }
      
      $Novo_cluster_marker_small_textposition = get_option('Novo_cluster_marker_small_textposition');
      if (empty($Novo_cluster_marker_small_textposition)) {
        $Novo_cluster_marker_small_textposition = '[-3, -3]';
      }
      
      $Novo_cluster_marker_medium = get_option('Novo_cluster_marker_medium');
      if (empty($Novo_cluster_marker_medium)) {
        $Novo_cluster_marker_medium = 'cluster-marker-medium.png';
      }
      
      $Novo_cluster_marker_medium_width = get_option('Novo_cluster_marker_medium_width');
      if (empty($Novo_cluster_marker_medium_width)) {
        $Novo_cluster_marker_medium_width = '37';
      }
      
      $Novo_cluster_marker_medium_height = get_option('Novo_cluster_marker_medium_height');
      if (empty($Novo_cluster_marker_medium_height)) {
        $Novo_cluster_marker_medium_height = '41';
      }
      
      $Novo_cluster_marker_medium_color = get_option('Novo_cluster_marker_medium_color');
      if (empty($Novo_cluster_marker_medium_color)) {
        $Novo_cluster_marker_medium_color = 'ffffff';
      }
      
      $Novo_cluster_marker_medium_textsize = get_option('Novo_cluster_marker_medium_textsize');
      if (empty($Novo_cluster_marker_medium_textsize)) {
        $Novo_cluster_marker_medium_textsize = '14';
      }
      
      $Novo_cluster_marker_medium_textposition = get_option('Novo_cluster_marker_medium_textposition');
      if (empty($Novo_cluster_marker_medium_textposition)) {
        $Novo_cluster_marker_medium_textposition = '[-4, -4]';
      }
      
      $Novo_cluster_marker_big = get_option('Novo_cluster_marker_big');
      if (empty($Novo_cluster_marker_big)) {
        $Novo_cluster_marker_big = 'cluster-marker-big.png';
      }
      
      $Novo_cluster_marker_big_width = get_option('Novo_cluster_marker_big_width');
      if (empty($Novo_cluster_marker_big_width)) {
        $Novo_cluster_marker_big_width = '42';
      }
      
      $Novo_cluster_marker_big_height = get_option('Novo_cluster_marker_big_height');
      if (empty($Novo_cluster_marker_big_height)) {
        $Novo_cluster_marker_big_height = '46';
      }
      
      $Novo_cluster_marker_big_color = get_option('Novo_cluster_marker_big_color');
      if (empty($Novo_cluster_marker_big_color)) {
        $Novo_cluster_marker_big_color = 'ffffff';
      }
      
      $Novo_cluster_marker_big_textsize = get_option('Novo_cluster_marker_big_textsize');
      if (empty($Novo_cluster_marker_big_textsize)) {
        $Novo_cluster_marker_big_textsize = '16';
      }
      
      $Novo_cluster_marker_big_textposition = get_option('Novo_cluster_marker_big_textposition');
      if (empty($Novo_cluster_marker_big_textposition)) {
        $Novo_cluster_marker_big_textposition = '[-5, -5]';
      }
      
      $Novo_popup_width = get_option('Novo_popup_width');
      if (empty($Novo_popup_width)) {
        $Novo_popup_width = '500';
      }
      
      $Novo_popup_position_X = get_option('Novo_popup_position_X');
      if (empty($Novo_popup_position_X)) {
        $Novo_popup_position_X = '-250';
      }
      
      $Novo_popup_position_Y = get_option('Novo_popup_position_Y');
      if (empty($Novo_popup_position_Y)) {
        $Novo_popup_position_Y = '-150';
      }
      
      $Novo_popup_background = get_option('Novo_popup_background');
      if (empty($Novo_popup_background)) {
        $Novo_popup_background = 'box-background.png';
      }
      
      $Novo_popup_image_size_X = get_option('Novo_popup_image_size_X');
      if (empty($Novo_popup_image_size_X)) {
        $Novo_popup_image_size_X = '150';
      }
      
      $Novo_popup_image_size_Y = get_option('Novo_popup_image_size_Y');
      if (empty($Novo_popup_image_size_Y)) {
        $Novo_popup_image_size_Y = '150';
      }
      
      $Novo_actual = get_option('Novo_actual');
      if (empty($Novo_actual)) {
        $Novo_actual = 'YES';
      }
      
      $Novo_actual_pin = get_option('Novo_actual_pin');
      if (empty($Novo_actual_pin)) {
        $Novo_actual_pin = 'pin-red.png';
      }
      
      $Novo_actual_width = get_option('Novo_actual_width');
      if (empty($Novo_actual_width)) {
        $Novo_actual_width = '37';
      }
      
      $Novo_actual_height = get_option('Novo_actual_height');
      if (empty($Novo_actual_height)) {
        $Novo_actual_height = '41';
      }
      
      $Novo_actual_latitude = get_option('Novo_actual_latitude');
      if (empty($Novo_actual_latitude)) {
        $Novo_actual_latitude = '0';
      }
      
      $Novo_actual_longitude = get_option('Novo_actual_longitude');
      if (empty($Novo_actual_longitude)) {
        $Novo_actual_longitude = '0';
      }
      
      $Novo_actual_text = get_option('Novo_actual_text');
      if (empty($Novo_actual_text)) {
        $Novo_actual_text = 'Je me trouve en ce moment en France!';
      }      
      
      $Novo_map_style = get_option('Novo_map_style');
      if (empty($Novo_map_style)) {
        $Novo_map_style = '[ { "featureType": "water", "stylers": [ { "color": "#5a9ac6" } ] },{ "featureType": "administrative.country", "elementType": "labels.text", "stylers": [ { "visibility": "off" } ] },{ "featureType": "landscape.natural.landcover", "elementType": "geometry", "stylers": [ { "weight": 1.7 }, { "hue": "#00ff5e" }, { "saturation": 42 } ] },{ "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [ { "weight": 1.2 }, { "color": "#cbb68e" } ] },{ "featureType": "landscape.natural.landcover", "elementType": "geometry.fill", "stylers": [ { "hue": "#ffdd00" }, { "saturation": -3 }, { "gamma": 0.8 } ] } ]';
      }
            
      echo '<div class="wrap"><h2>'.get_admin_page_title().'</h2><br>';
      echo '<form method="post" action="options.php">';
      settings_fields('novo_map_settings');
      echo '  <label for="Novo_gmap_key">Google Map API Key. If you dont have one, <a href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key" target="_blank">get an API Key</a></label>
              <input type="text" name="Novo_gmap_key" value="' . esc_attr( $Novo_gmap_key ) . '" size="35" /><br>
              <fieldset>
                <legend>Adjust the Map:</legend>
                <label for="Novo_center_lat">lattitude of the map center, <a href="http://itouchmap.com/latlong.html" target="_blank">Find coordinates</a></label>
                <input type="text" name="Novo_center_lat" value="' . esc_attr( $Novo_center_lat ) . '" size="35" /><br>
                <label for="Novo_center_long">longitude of the map center</label>
                <input type="text" name="Novo_center_long" value="' . esc_attr( $Novo_center_long ) . '" size="35" /><br>
                <label for="Novo_zoom">Zoom of the map</label>
                <input type="text" name="Novo_zoom" value="' . esc_attr( $Novo_zoom ) . '" size="10" /><br>
                <label for="Novo_map_type_menu">Add map type control menu</label>
                <select name="Novo_map_type_menu">
                  <option value="true">Yes</option>
                  <option value="false">No</option>
                </select>
                <select name="Novo_map_type_pos">
                  <option value="TOP_RIGHT">TOP_RIGHT</option>
                  <option value="TOP_LEFT">TOP_LEFT</option>
                  <option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option>
                  <option value="LEFT_BOTTOM">LEFT_BOTTOM</option>
                  <option value="RIGHT_CENTER">RIGHT_CENTER</option>
                  <option value="LEFT_CENTER">LEFT_CENTER</option>
                </select><br>
                <label for="Novo_map_zoom_menu">Add a slider to zoom</label>
                <select name="Novo_map_zoom_menu">
                  <option value="true">Yes</option>
                  <option value="false">No</option>
                </select>
                <select name="Novo_map_zoom_pos">
                  <option value="LEFT_CENTER">LEFT_CENTER</option>
                  <option value="TOP_RIGHT">TOP_RIGHT</option>
                  <option value="TOP_LEFT">TOP_LEFT</option>
                  <option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option>
                  <option value="LEFT_BOTTOM">LEFT_BOTTOM</option>
                  <option value="RIGHT_CENTER">RIGHT_CENTER</option>
                </select>
              </fieldset>
              <fieldset>
                <legend>Cluster of pins:</legend>
                <label for="Novo_cluster">Do you want to turn on the pins clustering ?</label>';
                
                
       if($Novo_cluster == 'YES'){
          echo' <input type="radio" name="Novo_cluster" value="YES" checked> YES
                <input type="radio" name="Novo_cluster" value="NO"> NO<br>';
			}
       if($Novo_cluster == 'NO'){
          echo' <input type="radio" name="Novo_cluster" value="YES"> YES
                <input type="radio" name="Novo_cluster" value="NO" checked> NO<br>';
			}
       echo'    <label for="Novo_cluster_gridsize">Grid size for the pin clustering (default: 25)</label>
                <input type="text" name="Novo_cluster_gridsize" value="' . esc_attr( $Novo_cluster_gridsize ) . '" size="10" />
                <fieldset class="nested">
                  <legend>Small marker for small amount of pins clustered</legend>
                  <label for="Novo_cluster_marker_small">marker name (default: cluster-marker-small.png)</label><input type="text" name="Novo_cluster_marker_small" value="' . esc_attr( $Novo_cluster_marker_small ). '" size="35" />
                  <label for="Novo_cluster_marker_small_width">marker width and height in pixel (default: 32 and 35)</label><input type="text" name="Novo_cluster_marker_small_width" value="' . esc_attr( $Novo_cluster_marker_small_width ). '" size="10" /><input type="text" name="Novo_cluster_marker_small_height" value="' . esc_attr( $Novo_cluster_marker_small_height ). '" size="10" />
                  <label for="Novo_cluster_marker_small_color">color of the number in html (default: ffffff)</label><input type="text" name="Novo_cluster_marker_small_color" value="' .esc_attr( $Novo_cluster_marker_small_color ) . '" size="35" />
                  <label for="Novo_cluster_marker_small_textsize">size of the number (default: 12)</label><input type="text" name="Novo_cluster_marker_small_textsize" value="' . esc_attr( $Novo_cluster_marker_small_textsize ) . '" size="10" />
                  <label for="Novo_cluster_marker_small_textposition">number position (default: [-3, -3])</label><input type="text" name="Novo_cluster_marker_small_textposition" value="' . esc_attr( $Novo_cluster_marker_small_textposition ) . '" size="10" />
                </fieldset>
                <fieldset class="nested">
                  <legend>Medium marker for medium amount of pins clustered</legend>
                  <label for="Novo_cluster_marker_medium">marker name (default: cluster-marker-medium.png)</label><input type="text" name="Novo_cluster_marker_medium" value="' . esc_attr( $Novo_cluster_marker_medium ). '" size="35" />
                  <label for="Novo_cluster_marker_medium_width">marker width and height in pixel (default: 37 and 41)</label><input type="text" name="Novo_cluster_marker_medium_width" value="' . esc_attr( $Novo_cluster_marker_medium_width ). '" size="10" /><input type="text" name="Novo_cluster_marker_medium_height" value="' . esc_attr( $Novo_cluster_marker_medium_height ). '" size="10" />
                  <label for="Novo_cluster_marker_medium_color">color of the number in html (default: ffffff)</label><input type="text" name="Novo_cluster_marker_medium_color" value="' .esc_attr( $Novo_cluster_marker_medium_color ) . '" size="35" />
                  <label for="Novo_cluster_marker_medium_textsize">size of the number (default: 14)</label><input type="text" name="Novo_cluster_marker_medium_textsize" value="' . esc_attr( $Novo_cluster_marker_medium_textsize ) . '" size="10" />
                  <label for="Novo_cluster_marker_medium_textposition">number position (default: [-4, -4])</label><input type="text" name="Novo_cluster_marker_medium_textposition" value="' . esc_attr( $Novo_cluster_marker_medium_textposition ) . '" size="10" />
                </fieldset>
                <fieldset class="nested">
                  <legend>Big marker for big amount of pins clustered</legend>
                  <label for="Novo_cluster_marker_big">marker name (default: cluster-marker-big.png)</label><input type="text" name="Novo_cluster_marker_big" value="' . esc_attr( $Novo_cluster_marker_big ). '" size="35" />
                  <label for="Novo_cluster_marker_big_width">marker width and height in pixel (default: 42 and 46)</label><input type="text" name="Novo_cluster_marker_big_width" value="' . esc_attr( $Novo_cluster_marker_big_width ). '" size="10" /><input type="text" name="Novo_cluster_marker_big_height" value="' . esc_attr( $Novo_cluster_marker_big_height ). '" size="10" />
                  <label for="Novo_cluster_marker_big_color">color of the number in html (default: ffffff)</label><input type="text" name="Novo_cluster_marker_big_color" value="' .esc_attr( $Novo_cluster_marker_big_color ) . '" size="35" />
                  <label for="Novo_cluster_marker_big_textsize">size of the number (default: 16)</label><input type="text" name="Novo_cluster_marker_big_textsize" value="' . esc_attr( $Novo_cluster_marker_big_textsize ) . '" size="10" />
                  <label for="Novo_cluster_marker_big_textposition">number position (default: [-5, -5])</label><input type="text" name="Novo_cluster_marker_big_textposition" value="' . esc_attr( $Novo_cluster_marker_big_textposition ) . '" size="10" />
                </fieldset>
              </fieldset>
              <fieldset>
                <legend>Popup boxes:</legend>
                <label for="Novo_popup_width">Width of the box (default: 500)</label>
                <input type="text" name="Novo_popup_width" value="' . esc_attr( $Novo_popup_width ) . '" size="10" /><br>
                <label for="Novo_popup_position_X">position of the box (default: -250 and-150)</label>
                <input type="text" name="Novo_popup_position_X" value="' . esc_attr( $Novo_popup_position_X ) . '" size="10" /><input type="text" name="Novo_popup_position_Y" value="' . esc_attr( $Novo_popup_position_Y ) . '" size="10" />
                <label for="Novo_popup_background">Background image for the box (default: box-background.png)</label>
                <input type="text" name="Novo_popup_background" value="' . esc_attr( $Novo_popup_background ) . '" size="35" />
                <label for="Novo_popup_image_size">size of the image in the box (default: 150 and 150)</label>
                <input type="text" name="Novo_popup_image_size_X" value="' . esc_attr( $Novo_popup_image_size_X ) . '" size="10" /><input type="text" name="Novo_popup_image_size_Y" value="' . esc_attr( $Novo_popup_image_size_Y ) . '" size="10" />
              </fieldset>
              <fieldset>
                <legend>Add current position:</legend>
                <label for="Novo_cluster">Do you want to indicate your actual position ?</label>';
       if($Novo_actual == 'YES'){
          echo' <input type="radio" name="Novo_actual" value="YES" checked> YES
                <input type="radio" name="Novo_actual" value="NO"> NO<br>';
			}
       if($Novo_actual == 'NO'){
          echo' <input type="radio" name="Novo_actual" value="YES"> YES
                <input type="radio" name="Novo_actual" value="NO" checked> NO<br>';
			}
       echo'    <fieldset class="nested">
                  <legend>Marker that shows your actual position</legend>
                  <label for="Novo_actual_pin">marker name (default: pin-red.png)</label><input type="text" name="Novo_actual_pin" value="' . esc_attr( $Novo_actual_pin ). '" size="35" />
                  <label for="Novo_actual_width">marker width and height in pixel (default: 37 and 41)</label><input type="text" name="Novo_actual_width" value="' . esc_attr( $Novo_actual_width ). '" size="10" /><input type="text" name="Novo_actual_height" value="' . esc_attr( $Novo_actual_height ). '" size="10" />
                </fieldset>
                <label for="Novo_actual_latitude">Latitude of the current position</label>
                <input type="text" name="Novo_actual_latitude" value="' . esc_attr( $Novo_actual_latitude ) . '" size="35" />
                <label for="Novo_actual_longitude">Longitude of the current position</label>
                <input type="text" name="Novo_actual_longitude" value="' . esc_attr( $Novo_actual_longitude ) . '" size="35" />
                <label for="Novo_actual_text">Text you want see in the popup box </label>
                <input type="text" name="Novo_actual_text" value="' . esc_attr( $Novo_actual_text ) . '" size="35" />
              </fieldset>
              <label for="Novo_map_style">Code for the style of the map (use <a href="http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html" target="_blank">this tool</a> to compute the code)</label><br>
              <textarea name="Novo_map_style" rows="6" cols="85" />' . esc_attr( $Novo_map_style ) . '</textarea>
              <input id="admin_submit" type="submit" value="Save settings">
            </form>
            </div>';
    }
    
    function register_Novo_settings()
    {
      register_setting('novo_map_settings', 'Novo_gmap_key');
      register_setting('novo_map_settings', 'Novo_center_lat');
      register_setting('novo_map_settings', 'Novo_center_long');
      register_setting('novo_map_settings', 'Novo_map_type_menu');
      register_setting('novo_map_settings', 'Novo_map_type_pos');
      register_setting('novo_map_settings', 'Novo_map_zoom_menu');
      register_setting('novo_map_settings', 'Novo_map_zoom_pos');
      register_setting('novo_map_settings', 'Novo_zoom');
      register_setting('novo_map_settings', 'Novo_cluster');
      register_setting('novo_map_settings', 'Novo_cluster_gridsize');
      register_setting('novo_map_settings', 'Novo_cluster_marker_small');
      register_setting('novo_map_settings', 'Novo_cluster_marker_small_width');
      register_setting('novo_map_settings', 'Novo_cluster_marker_small_height');
      register_setting('novo_map_settings', 'Novo_cluster_marker_small_color');
      register_setting('novo_map_settings', 'Novo_cluster_marker_small_textsize');
      register_setting('novo_map_settings', 'Novo_cluster_marker_small_textposition');
      register_setting('novo_map_settings', 'Novo_cluster_marker_medium');
      register_setting('novo_map_settings', 'Novo_cluster_marker_medium_width');
      register_setting('novo_map_settings', 'Novo_cluster_marker_medium_height');
      register_setting('novo_map_settings', 'Novo_cluster_marker_medium_color');
      register_setting('novo_map_settings', 'Novo_cluster_marker_medium_textsize');
      register_setting('novo_map_settings', 'Novo_cluster_marker_medium_textposition');
      register_setting('novo_map_settings', 'Novo_cluster_marker_big');
      register_setting('novo_map_settings', 'Novo_cluster_marker_big_width');
      register_setting('novo_map_settings', 'Novo_cluster_marker_big_height');
      register_setting('novo_map_settings', 'Novo_cluster_marker_big_color');
      register_setting('novo_map_settings', 'Novo_cluster_marker_big_textsize');
      register_setting('novo_map_settings', 'Novo_cluster_marker_big_textposition');
      register_setting('novo_map_settings', 'Novo_popup_width');
      register_setting('novo_map_settings', 'Novo_popup_position_X');
      register_setting('novo_map_settings', 'Novo_popup_position_Y');
      register_setting('novo_map_settings', 'Novo_popup_background');
      register_setting('novo_map_settings', 'Novo_popup_image_size_X');
      register_setting('novo_map_settings', 'Novo_popup_image_size_Y');
      register_setting('novo_map_settings', 'Novo_actual');
      register_setting('novo_map_settings', 'Novo_actual_pin');
      register_setting('novo_map_settings', 'Novo_actual_width');
      register_setting('novo_map_settings', 'Novo_actual_height');
      register_setting('novo_map_settings', 'Novo_actual_latitude');
      register_setting('novo_map_settings', 'Novo_actual_longitude');      
      register_setting('novo_map_settings', 'Novo_actual_text');      
      register_setting('novo_map_settings', 'Novo_map_style');
    }
    
    function add_admin_style() 
    {
      if(is_admin()){
        wp_enqueue_style( 'admin-style', plugins_url('css/admin_menu.css', __FILE__) );
      }
    }
  }
}
