<?php
/**
 * The Template for displaying all single custom posts prods
  *
 * @package WordPress
 * @subpackage Babel_Web_Tutoriels
 * @since Babel Web Tutoriels 1.0
 */

get_header();?>

<div id="container" class="<?php echo fluida_get_layout_class(); ?>">

<!--photo bandeau-->

			<div class="bandeauprod" style="background-image: url('<?php the_field('visuel_principal'); ?>');" alt="valeur 1" /></div>

		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); cryout_schema_microdata( 'article' );?>>
				<div class="schema-image">
					<?php cryout_featured_hook(); ?>
				</div>

				<div class="article-inner">
		
					<header>
						<?php cryout_post_title_hook(); ?>
						<?php the_title( '<h1 class="entry-title" ' . cryout_schema_microdata( 'entry-title', 0 ) . '>', '</h1>' ); ?>

						<div class="entry-meta">
							<?php cryout_post_meta_hook(); ?>
						</div><!-- .entry-meta -->

					</header>
					
					

	<main id="main" role="main" class="main">

		<?php cryout_before_content_hook(); ?>
		<div class="produits_prod">
<h5>Les produits</h5>
<p class="produits"><?php the_field('liste_produits')?></p>
<h5>Présentation</h5>
<p class="presentation">
<?php the_field('presentation_prod')?>
</p>
</div>

					<?php cryout_singular_before_inner_hook();  ?>

					<div class="entry-content" <?php cryout_schema_microdata('entry-content'); ?>>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'fluida' ), 'after' => '</span></div>' ) ); ?>
					</div><!-- .entry-content -->

					<?php if ( get_the_author_meta( 'description' ) ) {
							// If a user has filled out their description, show a bio on their entries
							get_template_part( 'content/author-bio' );
					} ?>


<!--liste de produits-->


					<footer class="entry-meta">
						<?php cryout_post_footer_hook(); ?>
					</footer><!-- .entry-meta -->

					<nav id="nav-below" class="navigation" role="navigation">
						<div class="nav-previous"><?php previous_post_link( '%link', '<i class="icon-angle-left"></i> <span>%title</span>' ); ?></div>
						<div class="nav-next"><?php next_post_link( '%link', '<span>%title</span> <i class="icon-angle-right"></i>' ); ?></div>
					</nav><!-- #nav-below -->

					<?php comments_template( '', true ); ?>
					<?php cryout_singular_after_inner_hook();  ?>
				</div><!-- .article-inner -->
			</article><!-- #post-## -->

		<?php endwhile; // end of the loop. ?>

		<?php cryout_after_content_hook(); ?>
	</main><!-- #main -->


</div><!-- #container -->

<?php get_footer();
