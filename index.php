<?php
/**
 * Gabarit principal (liste des articles) — Neodyr Access.
 *
 * Le repère <main id="main"> est la cible du lien d'évitement (tabindex=-1
 * pour recevoir le focus programmatiquement — RGAA 12.7).
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

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

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
	<?php get_sidebar(); ?>
	</div><!-- .content-grid -->

<?php
get_footer();
