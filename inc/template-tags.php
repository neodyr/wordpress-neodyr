<?php
/**
 * Fonctions d'affichage réutilisables — Neodyr Access.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'neodyr_posted_on' ) ) :
	/**
	 * Date de publication, avec <time> et datetime machine-lisible.
	 */
	function neodyr_posted_on() {
		$time = sprintf(
			'<time class="entry-date published" datetime="%1$s">%2$s</time>',
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
		printf(
			'<span class="posted-on">%1$s %2$s</span>',
			esc_html__( 'Publié le', 'neodyr' ),
			$time // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- déjà échappé.
		);
	}
endif;

if ( ! function_exists( 'neodyr_posted_by' ) ) :
	/**
	 * Auteur de l'article.
	 */
	function neodyr_posted_by() {
		printf(
			'<span class="byline"> %1$s <span class="author vcard">%2$s</span></span>',
			esc_html__( 'par', 'neodyr' ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'neodyr_entry_footer' ) ) :
	/**
	 * Catégories et étiquettes, avec des intitulés de liens explicites.
	 */
	function neodyr_entry_footer() {
		if ( 'post' !== get_post_type() ) {
			return;
		}
		$categories = get_the_category_list( ', ' );
		if ( $categories ) {
			printf(
				'<div class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</div>',
				esc_html__( 'Catégories :', 'neodyr' ),
				$categories // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- sortie WP échappée.
			);
		}
		$tags = get_the_tag_list( '', ', ' );
		if ( $tags ) {
			printf(
				'<div class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</div>',
				esc_html__( 'Étiquettes :', 'neodyr' ),
				$tags // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- sortie WP échappée.
			);
		}
	}
endif;

if ( ! function_exists( 'neodyr_post_thumbnail' ) ) :
	/**
	 * Image à la une (décorative dans la liste : alt vide pour ne pas polluer,
	 * l'information étant portée par le titre-lien adjacent — RGAA 1.2).
	 */
	function neodyr_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) {
			echo '<figure class="post-thumbnail">';
			the_post_thumbnail( 'large' );
			echo '</figure>';
		} else {
			printf(
				'<a class="post-thumbnail" href="%1$s" tabindex="-1" aria-hidden="true">%2$s</a>',
				esc_url( get_permalink() ),
				get_the_post_thumbnail( null, 'medium', array( 'alt' => '' ) ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}
	}
endif;

if ( ! function_exists( 'neodyr_pagination' ) ) :
	/**
	 * Pagination des listes d'articles, dans une <nav> étiquetée.
	 */
	function neodyr_pagination() {
		$links = paginate_links(
			array(
				'type'      => 'list',
				'prev_text' => __( '← Précédent', 'neodyr' ),
				'next_text' => __( 'Suivant →', 'neodyr' ),
			)
		);
		if ( ! $links ) {
			return;
		}
		printf(
			'<nav class="pagination" aria-label="%1$s">%2$s</nav>',
			esc_attr__( 'Pagination des articles', 'neodyr' ),
			$links // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- sortie WP échappée.
		);
	}
endif;
