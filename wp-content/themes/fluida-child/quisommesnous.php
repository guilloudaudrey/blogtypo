<?php
/*
Template Name: quisommesnous
*/
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Fluida
 */

get_header(); ?>

	<div id="container" >
<div class="bandeau_qui" style="background-image: url('<?php the_field('bandeau_image_qui'); ?>');" /></div>
		<main id="main" role="main" class="main">
			<?php cryout_before_content_hook(); ?>
			
			<?php get_template_part( 'content/content', 'page' ); ?>

			<?php cryout_after_content_hook(); ?>
		</main><!-- #main -->

	
	</div><!-- #container -->

<?php get_footer();
