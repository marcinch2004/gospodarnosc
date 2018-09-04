<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">


<!-- display program posutlat posts -->
 <h2>Nasza wizja Rumi</h2>

    <div class="row">
    <?php
    $recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'postulat'));
        while ($recent_posts_query->have_posts()) {
            $recent_posts_query->the_post();
            ?>

        <div class='col-md-4 <?php echo $category[0]->slug; ?>'>
            <h3><?php the_title(); ?></h3>
            <?php the_post_thumbnail('thumbnail') ?>
            <?php the_content(); ?>
        </div>

        <?php
        }
            ?>
    </div>



<div class="row">

<!-- display news -->
    <div class='col-md-8 <?php echo $category[0]->slug; ?>'>
        <h2>Wiadomości</h2>
        <!-- query news -->
        <?php
            $recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'news'));
                while ($recent_posts_query->have_posts()) {
                    $recent_posts_query->the_post(); ?>

                    <h3><?php the_title(); ?></h3>
                    <?php the_post_thumbnail('thumbnail') ?>
                    <?php the_excerpt(); 
                }
        ?>
    </div>

    <div class='col-md-4 <?php echo $category[0]->slug; ?>'>
        <h2>Porady</h2>
        <!-- querry porady -->
        <?php
            $recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'porady'));
                while ($recent_posts_query->have_posts()) {
                    $recent_posts_query->the_post(); ?>

                    <h3><?php the_title(); ?></h3>
                    <?php the_post_thumbnail('thumbnail') ?>
                    <?php the_excerpt(); 
                }
        ?>


    </div>


</div>


				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
