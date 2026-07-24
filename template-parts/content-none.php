<?php
/**
 * Aucun contenu trouvé — Neodyr Access.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Rien à afficher', 'neodyr' ); ?></h1>
	</header>

	<div class="page-content">
		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Aucun résultat ne correspond à votre recherche. Essayez d’autres mots-clés.', 'neodyr' ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( 'Aucun contenu n’est disponible pour le moment.', 'neodyr' ); ?></p>
		<?php endif; ?>

		<?php get_search_form(); ?>
	</div>
</section>
