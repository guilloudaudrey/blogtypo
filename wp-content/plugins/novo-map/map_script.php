<?php
class Novo_Map_Script
{
  public function __construct()
  {
    function Add_Novo_Map_Script($Novo_map_category) 
    {
      //get the data for the map
      $Novo_gmap_key = get_option( 'Novo_gmap_key', true );
      $Novo_center_lat = get_option( 'Novo_center_lat', true );
      $Novo_center_long = get_option( 'Novo_center_long', true );
      $Novo_zoom = get_option( 'Novo_zoom', true );
      $Novo_map_type_menu = get_option( 'Novo_map_type_menu', true );
      $Novo_map_type_pos = get_option( 'Novo_map_type_pos', true );
      $Novo_map_zoom_menu = get_option( 'Novo_map_zoom_menu', true );
      $Novo_map_zoom_pos = get_option( 'Novo_map_zoom_pos', true );
      $Novo_cluster = get_option( 'Novo_cluster', true );
      $Novo_cluster_gridsize = get_option( 'Novo_cluster_gridsize', true );
      $Novo_cluster_marker_small = get_option( 'Novo_cluster_marker_small', true );
      $Novo_cluster_marker_small_width = get_option( 'Novo_cluster_marker_small_width', true );
      $Novo_cluster_marker_small_height = get_option( 'Novo_cluster_marker_small_height', true );
      $Novo_cluster_marker_small_color = get_option( 'Novo_cluster_marker_small_color', true );
      $Novo_cluster_marker_small_textsize = get_option( 'Novo_cluster_marker_small_textsize', true );
      $Novo_cluster_marker_small_textposition = get_option( 'Novo_cluster_marker_small_textposition', true );
      $Novo_cluster_marker_medium = get_option( 'Novo_cluster_marker_medium', true );
      $Novo_cluster_marker_medium_width = get_option( 'Novo_cluster_marker_medium_width', true );
      $Novo_cluster_marker_medium_height = get_option( 'Novo_cluster_marker_medium_height', true );
      $Novo_cluster_marker_medium_color = get_option( 'Novo_cluster_marker_medium_color', true );
      $Novo_cluster_marker_medium_textsize = get_option( 'Novo_cluster_marker_medium_textsize', true );
      $Novo_cluster_marker_medium_textposition = get_option( 'Novo_cluster_marker_medium_textposition', true );
      $Novo_cluster_marker_big = get_option( 'Novo_cluster_marker_big', true );
      $Novo_cluster_marker_big_width = get_option( 'Novo_cluster_marker_big_width', true );
      $Novo_cluster_marker_big_height = get_option( 'Novo_cluster_marker_big_height', true );
      $Novo_cluster_marker_big_color = get_option( 'Novo_cluster_marker_big_color', true );
      $Novo_cluster_marker_big_textsize = get_option( 'Novo_cluster_marker_big_textsize', true );
      $Novo_cluster_marker_big_textposition = get_option( 'Novo_cluster_marker_big_textposition', true );
      $Novo_popup_width = get_option( 'Novo_popup_width', true );
      $Novo_popup_position_X = get_option( 'Novo_popup_position_X', true );
      $Novo_popup_position_Y = get_option( 'Novo_popup_position_Y', true );
      $Novo_popup_background = get_option( 'Novo_popup_background', true );
      $Novo_popup_image_size_X = get_option( 'Novo_popup_image_size_X', true );
      $Novo_popup_image_size_Y = get_option( 'Novo_popup_image_size_Y', true );
      $Novo_actual = get_option( 'Novo_actual', true );
      $Novo_actual_pin = get_option( 'Novo_actual_pin', true );
      $Novo_actual_width = get_option( 'Novo_actual_width', true );
      $Novo_actual_height = get_option( 'Novo_actual_height', true );
      $Novo_actual_pos = (float)$Novo_actual_width/2;
      $Novo_actual_latitude = get_option( 'Novo_actual_latitude', true );
      $Novo_actual_longitude = get_option( 'Novo_actual_longitude', true );
      $Novo_actual_text = esc_attr(get_option( 'Novo_actual_text', true ));
      $Novo_map_style = get_option( 'Novo_map_style', true );
      $count = 0;
      ?>     
       <!-- This site use the Novo-map plugin for awesome customized google map - http://www.novo-monde.com -->

       <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=<?php echo esc_attr( $Novo_gmap_key ) ?>&amp;sensor=false"></script>
       <script src="<?php echo plugins_url('lib/markerclusterer/markerclusterer.js' , __FILE__ ) ?>" type="text/javascript"></script>
       <script src="<?php echo plugins_url('lib/infobox/infobox.js', __FILE__ ) ?>" type="text/javascript"></script>
       <script type="text/javascript">
	   function initialize() {
            var latlng = new google.maps.LatLng(<?php echo esc_attr( $Novo_center_lat ) ?>, <?php echo esc_attr( $Novo_center_long ) ?>);
		    var settings = {
			zoom: <?php echo esc_attr( $Novo_zoom ) ?>,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			streetViewControl: false,
			panControl: false,
			mapTypeControl: <?php echo $Novo_map_type_menu ?>,
			mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU, position: google.maps.ControlPosition.<?php echo $Novo_map_type_pos ?>},
            zoomControl: <?php echo $Novo_map_zoom_menu ?>,
            zoomControlOptions: {style: google.maps.ZoomControlStyle.LARGE, position: google.maps.ControlPosition.<?php echo $Novo_map_zoom_pos ?>}
            };
            var map = new google.maps.Map(document.getElementById("novo_map"), settings);
            
            // cluster de marker
            <?php
            if( $Novo_cluster == 'YES')
            {
            ?>
            var clustermarkers = [];
            var cmstyles = [{
                  url: '<?php echo plugins_url('images/pins/' . $Novo_cluster_marker_small . '', __FILE__ ) ?>',
                  width: <?php echo $Novo_cluster_marker_small_width ?>,
                  height: <?php echo $Novo_cluster_marker_small_height ?>,
                  textColor: '#<?php echo $Novo_cluster_marker_small_color ?>',
                  textSize: <?php echo $Novo_cluster_marker_small_textsize ?>,
                  anchorText: <?php echo $Novo_cluster_marker_small_textposition ?>
                }, {
                  url: '<?php echo plugins_url('images/pins/' . $Novo_cluster_marker_medium . '', __FILE__ ) ?>',
                  width: <?php echo $Novo_cluster_marker_medium_width ?>,
                  height: <?php echo $Novo_cluster_marker_medium_height ?>,
                  textColor: '#<?php echo $Novo_cluster_marker_medium_color ?>',
                  textSize: <?php echo $Novo_cluster_marker_medium_textsize ?>,
                  anchorText: <?php echo $Novo_cluster_marker_medium_textposition ?>
                }, {
                  url: '<?php echo plugins_url('images/pins/' . $Novo_cluster_marker_big . '', __FILE__ ) ?>',
                  width: <?php echo $Novo_cluster_marker_big_width ?>,
                  height: <?php echo $Novo_cluster_marker_big_height ?>,
                  textColor: '#<?php echo $Novo_cluster_marker_big_color ?>',
                  textSize: <?php echo $Novo_cluster_marker_big_textsize ?>,
                  anchorText: <?php echo $Novo_cluster_marker_big_textposition ?>
                }];
            var mcOptions = {gridSize: <?php echo esc_attr( $Novo_cluster_gridsize ) ?>, styles: cmstyles}; 
            <?php 
            }?>
            
            //map style
            var styles = <?php echo $Novo_map_style ?>;
            map.setOptions({styles: styles});            
            
            //style pop up
            var pop_up_info = "background-image: url('<?php echo plugins_url('images/popup/' . $Novo_popup_background . '', __FILE__ ) ?>'); padding:10px; margin-top: 8px; box-shadow: 0px 4px 5px #1c1a19;";
            
            
      <?php
       
       
       //Do the loop to create the pins
       if (!empty($Novo_map_category)) 
       {
       $args = array(
         'post_type' => 'post',
         'posts_per_page' => -1,
         'meta_query' => array(array('key' => '_Novo_pin', 'value' => 'YES'), array('key' => '_Novo_marker_category', 'value' => $Novo_map_category)) 
       ); 
       }
       else
       {
       $args = array(
         'post_type' => 'post',
         'posts_per_page' => -1,
         'meta_query' => array(array('key' => '_Novo_pin', 'value' => 'YES')) 
       );
       }
       
       $the_query = new WP_Query( $args );
       
       // The Loop
       
       if ( $the_query->have_posts() ) :
         while ( $the_query->have_posts() ) : $the_query->the_post();
         // Do Stuff
           // get post related infos
           $count = $count + 1;
           $post_id = get_the_ID();
           $title = esc_attr(get_the_title($post_id));
           $permalink = esc_attr(get_permalink($post_id));
           $thumbnail = get_the_post_thumbnail($post_id,  array((int)$Novo_popup_image_size_X,(int)$Novo_popup_image_size_Y));
           $Novo_latitude = esc_attr( get_post_meta( $post_id, '_Novo_latitude', true ));
           $Novo_longitude = esc_attr( get_post_meta( $post_id, '_Novo_longitude', true ));
           $Novo_description = esc_attr(get_post_meta( $post_id, '_Novo_map_description', true ));
           $Novo_marker_infos = esc_attr(get_post_meta( $post_id, '_Novo_marker_infos', true ));
           list($Novo_marker,$Novo_marker_width,$Novo_marker_height) = explode(';',$Novo_marker_infos);
           $Novo_marker_pos = (float)$Novo_marker_width/2;
           $Novo_marker_url = plugins_url('images/pins/' . $Novo_marker . '', __FILE__ );
           
        ?>  
            var markerlogo<?php echo $count ?> = new google.maps.MarkerImage('<?php echo $Novo_marker_url ?>',
	          new google.maps.Size(<?php echo $Novo_marker_width ?>,<?php echo $Novo_marker_height ?>),
	          new google.maps.Point(0,0),
	          new google.maps.Point(<?php echo $Novo_marker_pos ?>,<?php echo $Novo_marker_height ?>)
            );
            var markerpos<?php echo $count ?> = new google.maps.LatLng(<?php echo $Novo_latitude ?>, <?php echo $Novo_longitude ?>);
            var marker<?php echo $count ?> = new google.maps.Marker({
              position: markerpos<?php echo $count ?>,
              map: map,
              icon: markerlogo<?php echo $count ?>,
              title:"<?php echo $title ?>"
            });

            var boxText<?php echo $count ?> = document.createElement("div");
            boxText<?php echo $count ?>.style.cssText = pop_up_info;
            boxText<?php echo $count ?>.innerHTML = '<div class="map-title"><a href="<?php echo $permalink ?>" class="map-link"><?php echo $title ?></a></div><a href="<?php echo $permalink ?>" class="map-link"><?php echo $thumbnail ?></a><div class="map-description"><?php echo $Novo_description ?></div>';
            
            var infoboxOptions<?php echo $count ?> = {
              content: boxText<?php echo $count ?>
              ,disableAutoPan: false
              ,maxWidth: 0
              ,pixelOffset: new google.maps.Size(<?php echo $Novo_popup_position_X ?>,<?php echo $Novo_popup_position_Y ?>)
              ,zIndex: null
              ,boxStyle: {
                width: "<?php echo $Novo_popup_width ?>px"
              }
              ,closeBoxMargin: "10px 2px 2px 2px"
              ,closeBoxURL: "<?php echo plugins_url('images/popup/button_close.png', __FILE__ ) ?>"
              ,infoBoxClearance: new google.maps.Size(1, 1)
              ,isHidden: false
              ,pane: "floatPane"
              ,enableEventPropagation: false
            };
            infobox<?php echo $count ?> = new InfoBox(infoboxOptions<?php echo $count ?>);
            google.maps.event.addListener(marker<?php echo $count ?>, 'click', function(e) {
			infobox<?php echo $count ?>.open(map, this);
			map.setCenter(marker<?php echo $count ?>.getPosition());
			});
			<?php
            if( $Novo_cluster == 'YES')
            {
            ?>
			clustermarkers.push(marker<?php echo $count ?>); 
            <?php } ?>
         <?php
         endwhile;
       endif;
       
       
       // Reset Post Data
       wp_reset_postdata();
       ?>
       <?php
       if( $Novo_cluster == 'YES')
       {
       ?>
       var mc = new MarkerClusterer(map, clustermarkers, mcOptions);
       <?php } ?>
       // Actual position
       <?php if($Novo_actual == 'YES'){ ?>
            var markerlogo0 = new google.maps.MarkerImage('<?php echo plugins_url('images/pins/' . $Novo_actual_pin . '', __FILE__ ) ?>',
	          new google.maps.Size(<?php echo $Novo_actual_width ?>,<?php echo $Novo_actual_height ?>),
	          new google.maps.Point(0,0),
	          new google.maps.Point(<?php echo $Novo_actual_pos ?>,<?php echo $Novo_actual_height ?>)
            );
            var markerpos0 = new google.maps.LatLng(<?php echo $Novo_actual_latitude ?>, <?php echo $Novo_actual_longitude ?>);
            var marker0 = new google.maps.Marker({
              position: markerpos0,
              map: map,
              icon: markerlogo0,
              zIndex: 999,
              title:"<?php echo $Novo_actual_text ?>"
            });
            var pop_up_info_nous = "background-image: url('<?php echo plugins_url('images/popup/' . $Novo_popup_background . '', __FILE__ ) ?>'); padding:10px; margin-top: 8px; box-shadow: 0px 4px 5px #1c1a19;";
            
            var boxText0 = document.createElement("div");
            boxText0.style.cssText = pop_up_info_nous;
            boxText0.innerHTML = '<div id="current-position"><?php echo $Novo_actual_text ?></div>';
            
            var infoboxOptions0 = {
              content: boxText0
              ,disableAutoPan: false
              ,maxWidth: 0
              ,pixelOffset: new google.maps.Size(<?php echo $Novo_popup_position_X ?>,<?php echo $Novo_popup_position_Y ?>)
              ,zIndex: null
              ,boxStyle: {
                width: "<?php echo $Novo_popup_width ?>px"
              }
              ,closeBoxMargin: "10px 2px 2px 2px"
              ,closeBoxURL: "<?php echo plugins_url('images/popup/button_close.png', __FILE__ ) ?>"
              ,infoBoxClearance: new google.maps.Size(1, 1)
              ,isHidden: false
              ,pane: "floatPane"
              ,enableEventPropagation: false
            };
            infobox0 = new InfoBox(infoboxOptions0);
            google.maps.event.addListener(marker0, 'click', function(e) {
			infobox0.open(map, this);
			});
	      <?php }?>
	   }
	   google.maps.event.addDomListener(window, 'load', initialize);
	   </script>
	   
       <!-- Novo-map plugin - http://www.novo-monde.com -->
       <?php
    }
    
    function Add_Novo_Map_Style() 
    {
      wp_enqueue_style( 'Novo_map_style', plugins_url('css/Novo_map_style.css', __FILE__) );
    }
    add_action( 'wp_enqueue_scripts', 'Add_Novo_Map_Style' );
  }
}
