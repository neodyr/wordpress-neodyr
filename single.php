<?php
/**
 * Article isolé — Neodyr Access.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$neodyr_sidebar = neodyr_has_sidebar();
?>

	<div class="container content-grid<?php echo $neodyr_sidebar ? ' has-sidebar' : ''; ?>">
	<main id="main" class="site-main" tabindex="-1">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// Navigation entre articles, dans une <nav> étiquetée (RGAA 12.x).
			the_post_navigation(
				array(
					'prev_text'          => '<span class="nav-subtitle">' . esc_html__( 'Article précédent', 'neodyr' ) . '</span> <span class="nav-title">%title</span>',
					'next_text'          => '<span class="nav-subtitle">' . esc_html__( 'Article suivant', 'neodyr' ) . '</span> <span class="nav-title">%title</span>',
					'screen_reader_text' => __( 'Navigation entre les articles', 'neodyr' ),
					'aria_label'         => __( 'Articles', 'neodyr' ),
				)
			);

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>
	</main><!-- #main -->
	<?php get_sidebar(); ?>
	</div><!-- .content-grid -->

<?php
get_footer();
