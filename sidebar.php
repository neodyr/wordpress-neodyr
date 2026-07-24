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

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area container" role="complementary" aria-label="<?php esc_attr_e( 'Barre latérale', 'neodyr' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
