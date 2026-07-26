<?php
/**
 * Formulaire de recherche accessible — Neodyr Access.
 *
 * Étiquette explicite reliée au champ (RGAA 11.1) — pas de simple placeholder en guise
 * d'étiquette. Rendu via get_search_form() : le formulaire reste filtrable.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$neodyr_search_id = 'search-field-' . wp_unique_id();
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $neodyr_search_id ); ?>" class="search-label"><?php esc_html_e( 'Rechercher sur le site', 'neodyr-access' ); ?></label>
	<input type="search" id="<?php echo esc_attr( $neodyr_search_id ); ?>" class="search-field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
	<button type="submit" class="search-submit"><?php esc_html_e( 'Rechercher', 'neodyr-access' ); ?></button>
</form>
