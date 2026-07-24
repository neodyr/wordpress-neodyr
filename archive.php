<?php
/**
 * Archives (catégorie, étiquette, date, auteur) — Neodyr Access.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

	<main id="main" class="site-main container" tabindex="-1">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;

			neodyr_pagination();

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
