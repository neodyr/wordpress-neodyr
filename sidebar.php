<?php
/**
 * Barre latérale — Neodyr Access.
 *
 * Repère de complément étiqueté (RGAA 12.6). N'apparaît que si des widgets
 * y sont placés.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// La barre latérale n'apparaît que sur le blog, les archives, la recherche et les
// articles — jamais empilée en bas des pages (Contact, À propos…).
if ( ! neodyr_has_sidebar() || ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Barre latérale', 'neodyr' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
