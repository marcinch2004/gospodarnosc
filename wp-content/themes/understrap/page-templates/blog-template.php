<?php
/**
 * Template Name: Blog
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<!-- /*to add page title NEWS*/ -->
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>


<!-- querry to get only news posts -->


<?php

//paggination wasn't working, had add line below to get it fixed
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$news_posts_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'category_name' => 'news', 'paged' => $paged));
	$count = 0;
		if ( $news_posts_query->have_posts() ) {
			while ($news_posts_query->have_posts()) {
				$count++; 
				$news_posts_query->the_post();
				?>

				<div class="col-md-8 col-md-offset-2 news">
					<span id="news-<?php echo $count ?>" class="spacer"></span>
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

			
			<?php endwhile; // end of the loop. ?>
			
			</main><!-- #main -->


		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
