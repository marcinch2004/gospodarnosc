<?php
/**
 * Template Name: Program
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

<!-- <?php wp_list_categories( ); ?>	 -->



<?php

$news_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'program wyborczy'));
	$count = 0;
	if ( $news_posts_query->have_posts() ) {
		while ($news_posts_query->have_posts()) {
			$count++; 
			$news_posts_query->the_post();
			?>
		

		<span id="program-<?php echo $count ?>" class="spacer"></span>
		<div class='post <?php echo $category[0]->slug; ?> col-md-8 col-md-offset-2'>

				<h3><?php the_title(); ?></h3>
				<div><?php the_post_thumbnail('thumbnail') ?></div>

				<?php the_content(); ?>
		
		</div>

						<?php 
			} 
		wp_reset_postdata();
		wp_reset_query();
		}
?>
		
		<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
			

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
