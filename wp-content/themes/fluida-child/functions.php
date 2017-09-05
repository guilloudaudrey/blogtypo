<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action( 'init', 'remove_editor_init' );

function remove_editor_init() {
    $post_id = $_GET['post'] ? $_GET['post'] : filter_input( INPUT_GET, 'post_ID', FILTER_SANITIZE_NUMBER_INT );
    $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
    if($template_file == 'accueil.php' || $template_file == 'produits.php' || $template_file == 'archive-prods.php') {
           remove_post_type_support( 'page', 'editor' );
    }
}

?>
