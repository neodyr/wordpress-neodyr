<?php
/**
 * Page d'accueil — Neodyr Access.
 *
 * Bannière + blocs de mise en avant (configurables), puis les derniers articles
 * (accueil « blog ») ou le contenu de la page choisie comme page d'accueil.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/features' );
?>

	<main id="main" class="site-main container" tabindex="-1">

		<?php
		if ( is_home() ) :
			// Accueil « derniers articles ».
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				neodyr_pagination();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
		else :
			// Page statique choisie comme page d'accueil.
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'entry' ); ?>>
					<div class="entry-content"><?php the_content(); ?></div>
				</article>
				<?php
			endwhile;
		endif;
		?>

	</main><!-- #main -->

<?php
get_template_part( 'template-parts/cta' );
get_footer();
