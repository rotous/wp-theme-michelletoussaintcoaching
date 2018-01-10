<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package zerif-lite
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<?php zerif_after_header_trigger(); ?>

<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-12">

			<div id="primary" class="content-area">

				<main id="main" class="site-main">

					<article>

						<header class="entry-header">
							<h1 class="entry-title">Oeps, we kunnen de pagina die je zoekt niet vinden!</h1>
						</header><!-- .entry-header -->

						<div class="entry-content">

							<p>Misschien kunnen de volgende links je op weg helpen:</p><br><br>

							<?php
								$zerif_ourfocus_show = get_theme_mod( 'zerif_ourfocus_show' );

								if ( isset( $zerif_ourfocus_show ) && $zerif_ourfocus_show != 1 ) :
									zerif_before_our_focus_trigger();
									get_template_part( 'sections/our_focus' );
									zerif_after_our_focus_trigger();
								endif;
							?>

						</div><!-- .entry-content -->

					</article><!-- #post-## -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div>

		<?php/* zerif_sidebar_trigger(); */?>

	</div><!-- .container -->

<?php get_footer(); ?>
