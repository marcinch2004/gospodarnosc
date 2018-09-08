<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

<!-- querry to get only news posts -->


<?php

//paggination wasn't working, had add line below to get it fixed
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$news_posts_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 2, 'category_name' => 'news', 'paged' => $paged));
		if ( $news_posts_query->have_posts() ) {
			while ($news_posts_query->have_posts()) {
				$news_posts_query->the_post();
				?>

				<div class="col-md-8 col-md-offset-2">

					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>

				</div>
				
				<?php 
			} 
		wp_reset_postdata();
		wp_reset_query();
		}
?>


			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			</main><!-- #main -->


		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
