<?php
/**
 * Page 404 (introuvable) — Neodyr Access.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

	<main id="main" class="site-main container" tabindex="-1">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Page introuvable', 'neodyr' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'La page demandée n’existe pas ou a été déplacée. Vous pouvez lancer une recherche ou revenir à l’accueil.', 'neodyr' ); ?></p>
				<?php get_search_form(); ?>
				<p><a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Retour à l’accueil', 'neodyr' ); ?></a></p>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
