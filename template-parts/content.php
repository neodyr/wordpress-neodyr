<?php
/**
 * Fragment d'affichage d'un article (liste ou vue détaillée) — Neodyr Access.
 *
 * Hiérarchie de titres cohérente (RGAA 9.1) : titre d'article en <h2> dans les
 * listes, en <h1> sur la vue détaillée.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				neodyr_posted_on();
				neodyr_posted_by();
				?>
			</div>
			<?php
		endif;
		?>
	</header>

	<?php neodyr_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) :
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s : titre de l'article, masqué visuellement. */
						__( 'Continuer la lecture<span class="screen-reader-text"> de « %s »</span>', 'neodyr' ),
						array( 'span' => array( 'class' => array() ) )
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before'      => '<nav class="page-links" aria-label="' . esc_attr__( 'Pages de l’article', 'neodyr' ) . '">' . esc_html__( 'Pages :', 'neodyr' ),
					'after'       => '</nav>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				)
			);
		else :
			the_excerpt();
		endif;
		?>
	</div>

	<?php if ( is_singular() ) : ?>
		<footer class="entry-footer">
			<?php neodyr_entry_footer(); ?>
		</footer>
	<?php endif; ?>

</article>
