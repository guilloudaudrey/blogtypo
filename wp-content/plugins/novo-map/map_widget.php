<?php
include_once plugin_dir_path( __FILE__ ).'/map_script.php';
new Novo_Map_Script();

class Novo_Map_Widget extends WP_Widget {
  public function __construct()
  {
    parent::__construct('Novo_Map_Widget', 'Map - Widget', array('description' => 'Google map of articles to be placed wherever you want.'));
  }
  public function widget($args, $instance)
  {
    echo $args['before_widget'];
    //$poslog = ((int)$instance['width'] / 2) - 60;
    ?>
    <div id="novo-map-container" style="width:<?php echo $instance['width'] ?>; height:<?php echo $instance['height'] ?>;">
    <div id="novo_map" style="width:<?php echo $instance['width'] ?>; height:<?php echo $instance['height'] ?>;"></div><div id="novo-map-logo" ><a href="http://www.novo-monde.com" target="_blank"><img src="http://www.novo-monde.com/Images/novo-map/novo-map-petit.jpg" alt="novo-map"></a></div>
    </div>
    <?php
    echo $args['after_widget'];
    //Only way I found to pass the variable category to the fonction but did not managed to put the scripts at the end
    Add_Novo_Map_Script($instance['category']);
  }
  public function form($instance)
  {
    $width = isset($instance['width']) ? $instance['width'] : '';
    $height = isset($instance['height']) ? $instance['height'] : '';
    $category = isset($instance['category']) ? $instance['category'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_name( 'width' ); ?>"><?php _e( 'Width: (px,cm,%)' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo  $width; ?>" />
        <label for="<?php echo $this->get_field_name( 'height' ); ?>"><?php _e( 'height: (px)' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo  $height; ?>" />
        <label for="<?php echo $this->get_field_name( 'category' ); ?>"><?php _e( 'category' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo  $category; ?>" />
    </p>
    <?php
  }
}
