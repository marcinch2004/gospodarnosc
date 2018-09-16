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

<div class="top wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content">

        <!-- display program posutlat posts -->
        <h1>Nasza wizja Rumi</h1>
        <h5>Chcemy, żeby Rumia była mejscem gdzie się dobrze żyje</h5>
        <span class="spacer"></span>
        <span class="spacer"></span>

        <div class="row">
            <?php
            $recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'postulat'));
            $count = 0;
                while ($recent_posts_query->have_posts()) {
                    $count++; 
                    $recent_posts_query->the_post();
            ?>

            <div class='col-md-4 <?php echo $category[0]->slug; ?>'>
                <h3><?php the_title(); ?></h3>
                <?php the_post_thumbnail('thumbnail') ?>
                <?php the_excerpt(); ?>
                <a class="btn btn-secondary understrap-read-more-link show page-scroll" href="program/#program-<?php echo $count ?>">czytaj więcej</a>
            </div>

            <?php
            }
                ?>
        </div> 
    </div>
        <div class="row col-md-12 justify-content-center">
            <a href="#" class="jump-to-page">Zobacz cały program</a>
        </div>
</div>



<div class="<?php echo esc_attr( $container ); ?>" id="content">

    <div class="row">

        <div class="col-md-12 content-area" id="primary">

            <main class="site-main" id="main" role="main">

<div class="row">

<!-- display news -->
    <div class='news col-md-8 <?php echo $category[0]->slug; ?>'>
        <h5>Wiadomości</h5>

        <!-- query news -->

        <?php
            $recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'news'));
            $count = 0;
                while ($recent_posts_query->have_posts()) {
                    $count++; 
                    $recent_posts_query->the_post();
		if(has_category())
		$category = get_the_category();
			{
				$category[0]->cat_name;
            } ?>
                <div class="news__container">
                    <!-- <?php echo $category[0]->slug; ?> -->
                    <h3><?php the_title(); ?></h3>
                    <small><?php the_date(); ?></small>
                    <?php the_post_thumbnail('large') ?>
                    <?php the_excerpt(); ?>
                    <a class="btn btn-secondary understrap-read-more-link show page-scroll" href="news/#news-<?php echo $count ?>">czytaj więcej</a>
                </div>
            <?php
            }
        ?>
    </div>

    <div class='col-md-4 porady'>
        <!-- <h5>Porady</h5> -->

        <!-- querry porady -->



        <?php
            $linki = array (
                'http://localhost/gospodarni/jak-glosowac/',
                'http://localhost/gospodarni/kandydaci/',
                'http://localhost/gospodarni/program/'
            );
            // echo '<span>udało się:'. $linki[0] . '</span>' ;
        ?>


        <?php
            $recent_posts_query = new WP_Query(array('post_type' => 'post', 'category_name' => 'porady'));
                $count = -1;
                while ($recent_posts_query->have_posts()) {
                    $count++; 
                    $recent_posts_query->the_post(); ?>

                <!-- display number of news -->
                <!-- <?php echo $count ?> -->


                <a href=" <?php echo  $linki[$count]  ; ?> ">
                    <figure></figure>
                    <h4><?php the_title(); ?></h4>
                    <?php the_content(); ?>
                </a>

               
                <?php
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
