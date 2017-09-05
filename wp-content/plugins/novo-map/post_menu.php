<?php
class Novo_Post_Menu
{
  public function __construct()
  {
  
    //add the meta box in the post menu
    function Register_Novo_Post_Menu() 
    {
      $screens = array( 'post', 'prods' ); //pour mettre sur post et page :  array( 'post', 'page' );

	  foreach ( $screens as $screen ) {

		add_meta_box(
			'Novo_map_menu',
			__( 'Novo map menu', 'Novo map menu' ),
			'Novo_Map_Menu_callback',
			$screen
		);
	}
    }
    
    add_action('add_meta_boxes', 'Register_Novo_Post_Menu');
  
    // form for the meta box
    function Novo_Map_Menu_callback( $post ) 
    {
      wp_nonce_field( 'Novo_Map_Menu', 'Novo_Map_Menu_nonce' );
      
      $Novo_pin = get_post_meta( $post->ID, '_Novo_pin', true );
      if (empty($Novo_pin)) {
        $Novo_pin = 'NO';
      }
      $Novo_latitude = get_post_meta( $post->ID, '_Novo_latitude', true );
      $Novo_longitude = get_post_meta( $post->ID, '_Novo_longitude', true );
      $Novo_description = get_post_meta( $post->ID, '_Novo_map_description', true );
      $Novo_marker_infos = get_post_meta( $post->ID, '_Novo_marker_infos', true );
      $Novo_marker_category = get_post_meta( $post->ID, '_Novo_marker_category', true );
      
      $pid =  get_the_ID();
      
      if (empty($Novo_marker_infos)) {
        $Novo_marker_infos = 'pin-green.png;38;41';
      }
      
      echo '<p><label for="Novo_pin">';
      _e( 'Insert a pin on the map ?', 'Novo map menu' );
      echo '</label>';
      
      if($Novo_pin == 'YES'){
        echo'<input type="radio" name="Novo_pin" value="YES" checked> YES
             <input type="radio" name="Novo_pin" value="NO"> NO</p>';
			}
      if($Novo_pin == 'NO'){
        echo'<input type="radio" name="Novo_pin" value="YES"> YES
             <input type="radio" name="Novo_pin" value="NO" checked> NO</p>';
		}
      
      echo '<p><label for="Novo_latitude_field">';
      _e( 'Latitude of the point', 'Novo map menu' );
      echo '</label>';
      echo '<input type="text" id="Novo_latitude_field" name="Novo_latitude" value="' . esc_attr( $Novo_latitude ) . '" size="25" /></p>';
      
      echo '<p><label for="Novo_longitude_field">';
      _e( 'Longitude of the point', 'Novo map menu' );
      echo '</label>';
      echo '<input type="text" id="Novo_longitude_field" name="Novo_longitude" value="' . esc_attr( $Novo_longitude ) . '" size="25" /></p>';
      
      echo '<p><label for="Novo_marker_infos">';
      _e( 'Marker infos (default: pin-green.png;38;41)', 'Novo map menu' );
      echo '</label>';
      echo '<input type="text" id="Novo_marker_infos" name="Novo_marker_infos" value="' . esc_attr( $Novo_marker_infos ) . '" size="25" /></p>';
      
echo '<p><label for="Novo_marker_category">';
      _e( 'Marker category (default: empty)', 'Novo map menu' );
      echo '</label>';
      echo '<input type="text" id="Novo_marker_category" name="Novo_marker_category" value="' . esc_attr( $Novo_marker_category ) . '" size="25" /></p>';
      
      echo '<p><label id="Novo_description_label" for="Novo_description_field">';
      _e( 'Description of the point', 'Novo map menu' );
      echo '</label>';
      echo '<textarea id="Novo_description_field" name="Novo_description" rows="8" cols="45" />' . esc_attr( $Novo_description ) . '</textarea></p>';
	}
	
	//save the data in the database
	function Novo_map_save_meta_box_data( $pid ) 
	{
      if ( ! isset( $_POST['Novo_Map_Menu_nonce'] ) ) {
        return;
      }

      if ( ! wp_verify_nonce( $_POST['Novo_Map_Menu_nonce'], 'Novo_Map_Menu' ) ) {
        return;
      }

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
      }

	// Check the user's permissions.
      if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $pid ) ) {
          return;
        }

      } 
      else {

        if ( ! current_user_can( 'edit_post', $pid ) ) {
          return;
        }
      }

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
      if ( ! isset( $_POST['Novo_latitude'] ) and ! isset($_POST['Novo_longitude']) and ! isset($_POST['Novo_description']) ) {
        return;
      }

	// Sanitize user input.
      $Novo_latitude = sanitize_text_field( $_POST['Novo_latitude'] );
      $Novo_longitude = sanitize_text_field( $_POST['Novo_longitude'] );
      $Novo_description = sanitize_text_field( $_POST['Novo_description'] );
      $Novo_pin = sanitize_text_field( $_POST['Novo_pin'] );
      $Novo_marker_infos = sanitize_text_field( $_POST['Novo_marker_infos'] );
      $Novo_marker_category = sanitize_text_field( $_POST['Novo_marker_category'] );

	// Update the meta field in the database.
      update_post_meta( $pid, '_Novo_latitude', $Novo_latitude );
      update_post_meta( $pid, '_Novo_longitude', $Novo_longitude );
      update_post_meta( $pid, '_Novo_map_description', $Novo_description );
      update_post_meta( $pid, '_Novo_pin', $Novo_pin );
      update_post_meta( $pid, '_Novo_marker_infos', $Novo_marker_infos );
      update_post_meta( $pid, '_Novo_marker_category', $Novo_marker_category );
    }
    
    add_action( 'save_post', 'Novo_map_save_meta_box_data' );
    
  /**
  * Adds the meta box stylesheet when appropriate
  */
    function Novo_admin_styles(){
      global $typenow;
        if( $typenow == 'post' ) {
          wp_enqueue_style( 'Novo_meta_box_styles', plugin_dir_url( __FILE__ ) . 'css/post_menu.css' );
        }
    }
    add_action( 'admin_print_styles', 'Novo_admin_styles' );
    	
  }
}
