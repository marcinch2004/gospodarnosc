<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info d-flex justify-content-between">

						<a href="https://www.facebook.com/GospodarnoscRumia/" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect x="7" y="2.3" width="15" height="21.7" fill="#FFF"/><path d="M22.7 0H1.3C0.6 0 0 0.6 0 1.3v21.4C0 23.4 0.6 24 1.3 24h11.5v-9.3H9.7v-3.6h3.1V8.4c0-3.1 1.9-4.8 4.7-4.8 1.3 0 2.5 0.1 2.8 0.1V7l-1.9 0c-1.5 0-1.8 0.7-1.8 1.8v2.3h3.6l-0.5 3.6h-3.1V24h6.1c0.7 0 1.3-0.6 1.3-1.3V1.3C24 0.6 23.4 0 22.7 0z" fill="#3B5998"/></svg>
						</a>
						<span>Gospodarność ©2018</span>
						<a href="mailto:lubierumie@gospodarnosc.pl">lubierumie@gospodarnosc.pl</a>

						<!-- go to top button -->
						<a href="#page" id="gototop" class="go-to-page-top page-scroll">
							<span>wróć do góry</span>
						</a>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

