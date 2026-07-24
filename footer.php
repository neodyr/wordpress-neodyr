<?php
/**
 * Pied de page — Neodyr Access.
 *
 * Repère contentinfo (RGAA 12.6). Menu de pied de page optionnel.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Menu du pied de page', 'neodyr' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'depth'          => 1,
						)
					);
					?>
				</nav>
			<?php endif; ?>

			<p class="site-info">
				<?php
				printf(
					/* translators: %s : année. */
					esc_html__( '© %s', 'neodyr' ),
					esc_html( gmdate( 'Y' ) )
				);
				echo ' ' . esc_html( get_bloginfo( 'name' ) ) . '. ';
				printf(
					/* translators: %s : nom du thème et lien. */
					esc_html__( 'Propulsé par WordPress · thème %s.', 'neodyr' ),
					'<a href="https://neodyr.com">Neodyr Access</a>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
				?>
			</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
