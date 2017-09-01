<?php
/*
Template Name: produits
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

	<div id="container" class="<?php echo fluida_get_layout_class(); ?>">

		<main id="main" role="main" class="main">
			<?php cryout_before_content_hook(); ?>

			
		<div class="page_produits">
			<h3>Les produits</h3>
			<div class="container_produits">
				<div class="cat_produits">
					<h5>Légumes</h5>
					<div class="illus_produits" style="background-image: url('<?php the_field('produit_illus1'); ?>');"></div>
					
						<p><?php the_field('liste_prod1')?></p>
				
				</div>
						<div class="cat_produits">
					<h5>Fruits</h5>
					<div class="illus_produits"><div class="illus_produits" style="background-image: url('<?php the_field('produit_illus2'); ?>');"></div></div>
					<p><?php the_field('liste_prod2')?></p>
				</div>
						<div class="cat_produits">
					<h5>Viandes </h5>
					<div class="illus_produits"><div class="illus_produits" style="background-image: url('<?php the_field('produit_illus3'); ?>');"></div></div>
						<p><?php the_field('liste_prod3')?></p>
				</div>
						<div class="cat_produits">
					<h5>Produits laitiers</h5>
					<div class="illus_produits"><div class="illus_produits" style="background-image: url('<?php the_field('produit_illus4'); ?>');"></div></div>
						<p><?php the_field('liste_prod4')?></p>
				</div>
						<div class="cat_produits">
					<h5>Boissons</h5>
					<div class="illus_produits"><div class="illus_produits" style="background-image: url('<?php the_field('produit_illus5'); ?>');"></div></div>
						<p><?php the_field('liste_prod5')?></p>
				</div>
						<div class="cat_produits">
					<h5>Douceurs</h5>
					<div class="illus_produits"><div class="illus_produits" style="background-image: url('<?php the_field('produit_illus6'); ?>');"></div></div>
						<p><?php the_field('liste_prod6')?></p>
				</div>
			</div>
		</div>
		</main><!-- #main -->

	</div><!-- #container -->

<?php get_footer();
