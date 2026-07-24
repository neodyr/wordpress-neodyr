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

			<?php
			$neodyr_socials = array();
			foreach ( neodyr_social_networks() as $neodyr_key => $neodyr_net ) {
				$neodyr_url = get_theme_mod( "neodyr_social_{$neodyr_key}", '' );
				if ( $neodyr_url ) {
					$neodyr_socials[ $neodyr_key ] = array(
						'net' => $neodyr_net,
						'url' => $neodyr_url,
					);
				}
			}
			if ( ! empty( $neodyr_socials ) ) :
				?>
				<nav class="footer-social-nav" aria-label="<?php esc_attr_e( 'Réseaux sociaux', 'neodyr' ); ?>">
					<?php foreach ( $neodyr_socials as $neodyr_item ) : ?>
						<a class="footer-social" href="<?php echo esc_url( $neodyr_item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
							<svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="<?php echo esc_attr( $neodyr_item['net']['path'] ); ?>"/></svg>
							<span class="screen-reader-text"><?php echo esc_html( $neodyr_item['net']['label'] ); ?> <?php esc_html_e( '(nouvel onglet)', 'neodyr' ); ?></span>
						</a>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>

			<p class="site-info">
				<?php
				$neodyr_copyright = get_theme_mod( 'neodyr_footer_copyright', '' );
				if ( '' !== $neodyr_copyright ) {
					echo esc_html( $neodyr_copyright );
				} else {
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
				}
				?>
			</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
