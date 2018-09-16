<?php
/**
 * Template Name: Kandydaci
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

					
					<div style="clear: both;"></div>


<?php

$recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'people'));

//Get list of people subcategory names
	$cat = get_category( get_query_var( 'cat' ) );
	$cat_id = 4;
	$child_categories=get_categories(
		array( 'parent' => $cat_id )
	);
	?>


	<ul class="nav">
		<?php
		$isFirst = true;

		$i=1;   

		foreach ( $child_categories as $child ) {

			// Here I'm showing as a list...
			//first element on list is checked candidates
			// if($i==1) {
			// 	echo '<input id="'.$child ->slug.'" type="radio" name="tabs" checked="checked">';
			// }
			// else
			// {
			// 	echo '<input id="'.$child ->slug.'" type="radio" name="tabs" >';
			// }
			// 	$i++;
			// 	echo '<label for="'.$child ->slug.'"><span>'.$child ->cat_name.'</span></label>';

			echo '<li class="nav-item"><a class="page-scroll nav-link" href="#'.$child ->slug.'">'.$child ->cat_name.'</a></li>';
			$i++;
		}
		?>
	</ul>

	<div class="d-flex flex-wrap">

	<?php
	while ($recent_posts_query->have_posts()) {
		$recent_posts_query->the_post();
		if(has_category())
		$category = get_the_category();
			{
				$category[0]->cat_name;
			}
		?>

		<!-- <div class="d-flex flex-row"> -->
			<div id="<?php echo $category[0]->slug; ?>" class='post <?php echo $category[0]->slug; ?>  col-md-6'>
				<!-- <p class="date"><?php the_date(); ?></p> -->
				<!-- <a href="<?php echo site_url();?>/blog"> -->

				<!-- <div><?php the_post_thumbnail('thumbnail') ?></div> -->

				<small><b><?php echo $category[0]->name; ?></b></small>
				<h3><?php the_title(); ?></h3>
				<?php
					// global $more;
					// $more = 0;
					// the_excerpt();
					the_content();
				?>
			
			</div>
		<!-- </div> -->

		<!-- clearing WP fucking float -->
		<!-- <div style="clear: both;"></div> -->
		
		<?php
		}
?>


<a class="btn btn-secondary" href="<?php echo esc_url( get_permalink(81) ); ?>">Zobacz nasz program</a>


<!-- <?php $the_query = new WP_Query( 'posts_per_page=5' );
 	while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

<?php the_excerpt(__('(more…)'));
 

endwhile;
wp_reset_postdata();
?> -->





				<?php endwhile; // end of the loop. ?>


				</div><!-- flex row -->

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
