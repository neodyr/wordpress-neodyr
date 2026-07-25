<?php
/**
 * Pied de page — Neodyr Access.
 *
 * Repère contentinfo (RGAA 12.6). Footer en colonnes : marque + zones de
 * widgets, puis barre inférieure (copyright + liens légaux + réseaux).
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container footer-main">
			<div class="footer-brand">
				<p class="footer-title"><?php bloginfo( 'name' ); ?></p>
				<?php
				$neodyr_about = get_theme_mod( 'neodyr_footer_about', '' );
				if ( '' !== $neodyr_about ) :
					?>
					<p class="footer-about"><?php echo esc_html( $neodyr_about ); ?></p>
					<?php
				endif;

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
					<nav class="footer-social-nav" aria-label="<?php esc_attr_e( 'Réseaux sociaux', 'neodyr-access' ); ?>">
						<?php foreach ( $neodyr_socials as $neodyr_item ) : ?>
							<a class="footer-social" href="<?php echo esc_url( $neodyr_item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
								<svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="<?php echo esc_attr( $neodyr_item['net']['path'] ); ?>"/></svg>
								<span class="screen-reader-text"><?php echo esc_html( $neodyr_item['net']['label'] ); ?> <?php esc_html_e( '(nouvel onglet)', 'neodyr-access' ); ?></span>
							</a>
						<?php endforeach; ?>
					</nav>
				<?php endif; ?>
			</div><!-- .footer-brand -->

			<?php
			foreach ( array( 'footer-1', 'footer-2', 'footer-3' ) as $neodyr_fa ) :
				if ( is_active_sidebar( $neodyr_fa ) ) :
					?>
					<div class="footer-col"><?php dynamic_sidebar( $neodyr_fa ); ?></div>
					<?php
				endif;
			endforeach;
			?>
		</div><!-- .footer-main -->

		<div class="footer-bottom">
			<div class="container footer-bottom-inner">
				<p class="site-info">
					<?php
					$neodyr_copyright = get_theme_mod( 'neodyr_footer_copyright', '' );
					if ( '' !== $neodyr_copyright ) {
						echo esc_html( $neodyr_copyright );
					} else {
						printf(
							/* translators: %s : année. */
							esc_html__( '© %s', 'neodyr-access' ),
							esc_html( gmdate( 'Y' ) )
						);
						echo ' ' . esc_html( get_bloginfo( 'name' ) ) . '. ';
						printf(
							/* translators: %s : nom du thème et lien. */
							esc_html__( 'Thème %s.', 'neodyr-access' ),
							'<a href="https://neodyr.com">Neodyr Access</a>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						);
					}
					?>
				</p>
				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Liens légaux et informations', 'neodyr-access' ); ?>">
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
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
