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

$recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'program wyborczy'));
	while ($recent_posts_query->have_posts()) {
		$recent_posts_query->the_post();
		?>


		<div class='post <?php echo $category[0]->slug; ?>'>
			<!-- <p class="date"><?php the_date(); ?></p> -->
			<!-- <a href="<?php echo site_url();?>/blog"> -->
				<h3><?php the_title(); ?></h3>

			<div><?php the_post_thumbnail('thumbnail') ?></div>
			</a>

		<?php
			the_content();
		?>
		
		</div>
		<!-- clearing WP fucking float -->
		<div style="clear: both;"></div>
		
		<?php
		}
?>





<!-- <?php $the_query = new WP_Query( 'posts_per_page=5' );
 	while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

<?php the_excerpt(__('(more…)'));
 

endwhile;
wp_reset_postdata();
?> -->





				<?php endwhile; // end of the loop. ?>






			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
