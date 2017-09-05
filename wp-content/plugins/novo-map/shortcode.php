<?php
include_once plugin_dir_path( __FILE__ ).'/map_script.php';

class Novo_Shortcode
{
  public function __construct()
  {
    add_shortcode('novo_map', array($this, 'novo_map_html'));
  }
  
  public function novo_map_html($atts, $content)
  {
    $atts = shortcode_atts(array('width' => '700px', 'height' => '500px', 'category' => ''), $atts);
    
    $html = array();
    $html[] = $content;
    $html[] = '<div id="novo-map-container" style="width:'.$atts['width'].'; height:'.$atts['height'].'">
               <div id="novo_map" style="width:<?php echo '.$atts['width'].'; height:'.$atts['height'].'"></div><div id="novo-map-logo" ><a href="http://www.novo-monde.com" target="_blank"><img src="http://www.novo-monde.com/Images/novo-map/novo-map-petit.jpg" alt="novo-map"></a></div>
               </div>';
     Add_Novo_Map_Script($atts['category']);
    return implode('', $html);
  }
}
