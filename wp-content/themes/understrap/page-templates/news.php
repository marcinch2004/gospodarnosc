<?php
/**
 * Template Name: News
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

<!-- <?php wp_list_categories( ); ?>	 -->



<?php

$recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'news'));
	while ($recent_posts_query->have_posts()) {
		$recent_posts_query->the_post();
		?>

		<div class='post <?php echo $category[0]->slug; ?> col-md-8 col-md-offset-2'>
			<!-- <p class="date"><?php the_date(); ?></p> -->
			<!-- <a href="<?php echo site_url();?>/blog"> -->
				<h3><?php the_title(); ?>xxx</h3>

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










				<?php endwhile; // end of the loop. ?>






			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
