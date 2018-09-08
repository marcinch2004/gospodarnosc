<?php /* Template Name: blog */

get_header();


if (have_posts()) :
	while (have_posts()) : the_post(); 
?>



<h1>blog proba</h1>
<main  class="clearfix">


	<?php the_post_thumbnail('full'); ?>xxx
	<article>

	    	<?php wp_nav_menu(); ?>

<!-- hrset -->
<!-- 		<h2><?php the_title(); ?></h2> -->

		<?php the_content(); ?>
	</article>

</main>

	<?php endwhile;

	else :
		echo '<p>No content found</p>';

	endif;

get_footer();

?>