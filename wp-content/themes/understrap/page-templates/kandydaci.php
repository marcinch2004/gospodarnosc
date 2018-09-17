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

					
	<div style="clear: both;margin-bottom: 3rem;"></div>


<?php

	$recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'people'));

	//Get list of people subcategory names
	$cat = get_category( get_query_var( 'cat' ) );
	$cat_id = 4;
	$child_categories=get_categories(
		array( 'parent' => $cat_id )
	);
	?>

	<div id="okregi-spacer" class=""></div>
	<!-- LIST OF OKREGI -->
	<ul id="okregi" class="nav d-flex justify-content-between">
		<?php
		$isFirst = true;
		$i=1;   

		foreach ( $child_categories as $child ) {

			echo '<li class="nav-item"><a class="jump-to-page page-scroll-okregi nav-link" href="#'.$child ->slug.'">'.$child ->cat_name.'</a></li>';
			$i++;
		}
		?>
	</ul>

	
	<!-- <ul id="okregi" class="nav d-flex justify-content-between">
		<?php
		$isFirst = true;
		$i=1;   

		foreach ( $child_categories as $child ) {
			?>

			<span>wrap<?php echo $child->cat_name; ?>
			
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

							<div id="<?php echo $category[0]->slug; ?>" class='post <?php echo $category[0]->slug; ?>  col-md-6'>
								<small><b><?php echo $category[0]->name; ?></b></small>
								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>
							</div>
					<?php }	?>
				</div>
			
			
			</span>
			
			<?php
			$i++;
		}
		?>
	</ul> -->

	<!-- show candidates -->
	<!-- <div class="d-flex flex-wrap">
		<?php
			while ($recent_posts_query->have_posts()) {
				$recent_posts_query->the_post();
				if(has_category())
				$category = get_the_category();
					{
						$category[0]->cat_name;
					}
				?>

				<div id="<?php echo $category[0]->slug; ?>" class='post <?php echo $category[0]->slug; ?>  col-md-6'>
					<small><b><?php echo $category[0]->name; ?></b></small>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</div>
		<?php 
		}	
	?>
	</div> -->

<?php


	for ($i=1;  $i < 5;) {
	
	?>
		<div class="container-fluid people-category d-flex flex-row flex-wrap align-items-baseline">
			<h2>OKRĘG <?php echo $i ?></h2>
			<a href="../wp-content/themes/understrap/uploads/2018/09/<?php echo $i ?>.png" data-featherlight="image">zobacz mapkę i listę ulic</a>
		</div>

		<div class="d-flex flex-wrap">
			<?php
				$recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'okreg-'.$i.''));
				while ($recent_posts_query->have_posts()) {
					$recent_posts_query->the_post();
					if(has_category())
					$category = get_the_category();
						{
							$category[0]->cat_name;
						}
					?>

					<div id="<?php echo $category[0]->slug; ?>" class='post <?php echo $category[0]->slug; ?>  col-md-6'>
						<!-- <small><b><?php echo $category[0]->name; ?></b></small> -->
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					</div>
				<?php 
				}
			?>
				
		</span> <?php
			$i++;
		 }
?>







					<?php endwhile; // TEMPLATE WHILE end of the loop. ?>

				</div><!-- flex row -->

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
