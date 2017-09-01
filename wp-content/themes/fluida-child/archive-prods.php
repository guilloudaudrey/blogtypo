<?php
/*
Template Name: archive-prods
*/
/**
 * The template for displaying  prods CPT archive pages
 *
*
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Babel_Web_tutoriels
 * @since Babel Web tutoriels 1.0
 *
 *
 * @package Fluida
 *
 */
 ?>

<?php
get_header(); 

$args = array( 'post_type' => 'prods', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
?>
<div class="producteurs">
    <?php
while ( $loop->have_posts() ) : $loop->the_post();
?>

<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

    <a href="<?php echo get_page_link(40); ?>"><div class="producteur">
        <div class="thumbnail" style="background-image: url('<?php echo $thumb['0']; ?>')"></div>
        <div class="titre" style="text-align:center">
<?php
    the_title();
	?>
  
        </div>
    </div></a>

	<?php
    echo '<div class="entry-content">';
   // the_content();
    echo '</div>';
	?>

	<?php
endwhile;
?>
</div>
<?php

get_footer(); ?>

