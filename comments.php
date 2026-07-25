<?php
/**
 * Zone de commentaires — Neodyr Access.
 *
 * Formulaire de commentaire accessible (étiquettes reliées, champs requis
 * signalés autrement que par la seule couleur — RGAA 11.x). La liste des
 * commentaires est un repère de navigation étiqueté.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area" aria-label="<?php esc_attr_e( 'Commentaires', 'neodyr-access' ); ?>">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$neodyr_count = get_comments_number();
			printf(
				/* translators: %s : nombre de commentaires. */
				esc_html( _n( '%s commentaire', '%s commentaires', $neodyr_count, 'neodyr-access' ) ),
				esc_html( number_format_i18n( $neodyr_count ) )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation(
			array(
				'screen_reader_text' => __( 'Navigation dans les commentaires', 'neodyr-access' ),
				'aria_label'         => __( 'Commentaires', 'neodyr-access' ),
			)
		);

		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Les commentaires sont fermés.', 'neodyr-access' ); ?></p>
			<?php
		endif;
	endif;

	comment_form(
		array(
			'title_reply'         => __( 'Laisser un commentaire', 'neodyr-access' ),
			'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Les champs signalés par un astérisque (obligatoire) sont requis. Votre adresse e-mail ne sera pas publiée.', 'neodyr-access' ) . '</p>',
			'label_submit'        => __( 'Publier le commentaire', 'neodyr-access' ),
		)
	);
	?>

</section><!-- #comments -->
