<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-primary">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>xxx</h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"  ?>

							<!-- logo -->
							<svg 
								xmlns="http://www.w3.org/2000/svg" width="242" height="40" viewBox="0 0 242 40"><path d="M17.3 20.9h4v7.7c-2.1 1.6-5 2.4-7.7 2.4 -6 0-10.4-4.1-10.4-9.8 0-5.7 4.4-9.8 10.5-9.8 3.3 0 6.1 1.1 8 3.3l-2.8 2.6c-1.4-1.5-3-2.1-4.9-2.1 -3.7 0-6.2 2.5-6.2 6.1 0 3.6 2.5 6.1 6.2 6.1 1.2 0 2.3-0.2 3.4-0.8V20.9z" fill="#00007A"/><path d="M23.4 21.2c0-5.7 4.4-9.8 10.4-9.8 6 0 10.4 4.2 10.4 9.8s-4.4 9.8-10.4 9.8C27.8 31.1 23.4 26.9 23.4 21.2zM39.7 21.2c0-3.6-2.6-6.1-6-6.1 -3.4 0-6 2.5-6 6.1s2.6 6.1 6 6.1C37.2 27.3 39.7 24.8 39.7 21.2z" fill="#00007A"/><path d="M45.2 28.9l1.5-3.3c1.6 1.2 4 2 6.3 2 2.6 0 3.7-0.9 3.7-2 0-3.6-11.1-1.1-11.1-8.2 0-3.2 2.6-5.9 8-5.9 2.4 0 4.8 0.6 6.6 1.7l-1.4 3.3c-1.8-1-3.6-1.5-5.3-1.5 -2.6 0-3.6 1-3.6 2.2 0 3.5 11.1 1.1 11.1 8.1 0 3.2-2.6 5.9-8.1 5.9C49.9 31.1 46.9 30.2 45.2 28.9z" fill="#00007A"/><path d="M79.7 18.6c0 4.2-3.2 6.9-8.3 6.9h-3.8v5.2h-4.4v-19h8.2C76.6 11.7 79.7 14.3 79.7 18.6zM75.3 18.6c0-2.1-1.4-3.3-4.1-3.3h-3.6v6.6h3.6C73.9 21.9 75.3 20.7 75.3 18.6z" fill="#00007A"/><path d="M101.6 11.7h8.6c6.2 0 10.5 3.8 10.5 9.5s-4.3 9.5-10.5 9.5h-8.6V11.7zM110 27.1c3.8 0 6.3-2.3 6.3-5.9s-2.5-5.9-6.3-5.9h-4v11.8H110z" fill="#00007A"/><path d="M135.5 26.7h-8.8l-1.7 4.1h-4.5l8.5-19h4.3l8.5 19h-4.6L135.5 26.7zM134.1 23.3l-3-7.3 -3 7.3H134.1z" fill="#00007A"/><path d="M155.1 30.7l-3.7-5.3h-0.2 -3.8v5.3h-4.4v-19h8.2c5.1 0 8.3 2.6 8.3 6.9 0 2.9-1.4 4.9-3.9 6l4.3 6.1H155.1zM150.9 15.3h-3.6v6.6h3.6c2.7 0 4.1-1.3 4.1-3.3C155 16.5 153.6 15.3 150.9 15.3z" fill="#00007A"/><path d="M179.6 11.7v19h-3.6l-9.5-11.6v11.6h-4.3v-19h3.6l9.5 11.6V11.7H179.6z" fill="#00007A"/><path d="M182.1 21.2c0-5.7 4.4-9.8 10.4-9.8 6 0 10.4 4.2 10.4 9.8s-4.4 9.8-10.4 9.8C186.5 31.1 182.1 26.9 182.1 21.2zM198.4 21.2c0-3.6-2.6-6.1-6-6.1 -3.4 0-6 2.5-6 6.1 0 3.6 2.6 6.1 6 6.1C195.9 27.3 198.4 24.8 198.4 21.2z" fill="#00007A"/><path d="M203.9 28.9l1.5-3.3c1.6 1.2 4 2 6.3 2 2.6 0 3.7-0.9 3.7-2 0-3.6-11.1-1.1-11.1-8.2 0-3.2 2.6-5.9 8-5.9 2.4 0 4.8 0.6 6.6 1.7l-1.4 3.3c-1.8-1-3.6-1.5-5.3-1.5 -2.6 0-3.6 1-3.6 2.2 0 3.5 11.1 1.1 11.1 8.1 0 3.2-2.6 5.9-8.1 5.9C208.6 31.1 205.6 30.2 203.9 28.9zM213.2 6.2h4.6l-4.9 3.9h-3.3L213.2 6.2z" fill="#00007A"/><path d="M220.7 21.2c0-5.7 4.4-9.8 10.3-9.8 3.3 0 6 1.2 7.8 3.4l-2.8 2.6c-1.3-1.5-2.9-2.2-4.8-2.2 -3.6 0-6.1 2.5-6.1 6.1 0 3.6 2.5 6.1 6.1 6.1 1.9 0 3.5-0.8 4.8-2.3l2.8 2.6c-1.8 2.2-4.5 3.4-7.9 3.4C225.1 31.1 220.7 27 220.7 21.2zM232.1 6.2h4.6l-4.9 3.9h-3.3L232.1 6.2z" fill="#00007A"/><path d="M82 11.7V23c0 0 5.6 0.5 8.6-2.9 3-3.4 5-4.9 8.6-4.9v-3.5H82zM89 15.5v1 0.1h-1v-0.7l-0.9-0.6v3.6h-1v-3.6l-0.9 0.6v0.7h-1v-0.1 -1l2.4-1.5L89 15.5 89 15.5z" fill="#F00"/><path d="M90.6 23.2c-3.3 2.5-8.2 2.1-8.2 2.1 2 6.3 8.2 5.9 8.2 5.9 8.5-0.5 8.6-8 8.6-8v-5.7C95.2 17.6 93.9 20.7 90.6 23.2zM96.3 25.7c0 1.2-1 2.2-2.2 2.2s-2.2-1-2.2-2.2c0-1.2 1-2.2 2.2-2.2S96.3 24.5 96.3 25.7z" fill="#F00"/><circle cx="94.1" cy="25.7" r="2.2" fill="#FFD900"/><polygon points="84.2 15.5 84.2 16.5 84.2 16.6 85.2 16.6 85.2 15.9 86.1 15.3 86.1 18.9 87.1 18.9 87.1 15.3 88 15.9 88 16.6 89 16.6 89 16.5 89 15.5 89 15.5 86.6 14 " fill="#FFD900"/>
							</svg>
							
							</a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>



				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
		</div><!-- .container -->
		<?php endif; ?>
		
	</nav><!-- .site-navigation -->
	
	<!-- homepage image -->
	<?php if ( is_front_page() ) : ?>
	
		<figure>
			<section>
				<h1>Rumia gotowa na&nbsp;zmiany</h1>
				<svg 
					xmlns="http://www.w3.org/2000/svg" width="242" height="40" viewBox="0 0 242 40"><path d="M17.3 20.9h4v7.7c-2.1 1.6-5 2.4-7.7 2.4 -6 0-10.4-4.1-10.4-9.8 0-5.7 4.4-9.8 10.5-9.8 3.3 0 6.1 1.1 8 3.3l-2.8 2.6c-1.4-1.5-3-2.1-4.9-2.1 -3.7 0-6.2 2.5-6.2 6.1 0 3.6 2.5 6.1 6.2 6.1 1.2 0 2.3-0.2 3.4-0.8V20.9z" fill="#00007A"/><path d="M23.4 21.2c0-5.7 4.4-9.8 10.4-9.8 6 0 10.4 4.2 10.4 9.8s-4.4 9.8-10.4 9.8C27.8 31.1 23.4 26.9 23.4 21.2zM39.7 21.2c0-3.6-2.6-6.1-6-6.1 -3.4 0-6 2.5-6 6.1s2.6 6.1 6 6.1C37.2 27.3 39.7 24.8 39.7 21.2z" fill="#00007A"/><path d="M45.2 28.9l1.5-3.3c1.6 1.2 4 2 6.3 2 2.6 0 3.7-0.9 3.7-2 0-3.6-11.1-1.1-11.1-8.2 0-3.2 2.6-5.9 8-5.9 2.4 0 4.8 0.6 6.6 1.7l-1.4 3.3c-1.8-1-3.6-1.5-5.3-1.5 -2.6 0-3.6 1-3.6 2.2 0 3.5 11.1 1.1 11.1 8.1 0 3.2-2.6 5.9-8.1 5.9C49.9 31.1 46.9 30.2 45.2 28.9z" fill="#00007A"/><path d="M79.7 18.6c0 4.2-3.2 6.9-8.3 6.9h-3.8v5.2h-4.4v-19h8.2C76.6 11.7 79.7 14.3 79.7 18.6zM75.3 18.6c0-2.1-1.4-3.3-4.1-3.3h-3.6v6.6h3.6C73.9 21.9 75.3 20.7 75.3 18.6z" fill="#00007A"/><path d="M101.6 11.7h8.6c6.2 0 10.5 3.8 10.5 9.5s-4.3 9.5-10.5 9.5h-8.6V11.7zM110 27.1c3.8 0 6.3-2.3 6.3-5.9s-2.5-5.9-6.3-5.9h-4v11.8H110z" fill="#00007A"/><path d="M135.5 26.7h-8.8l-1.7 4.1h-4.5l8.5-19h4.3l8.5 19h-4.6L135.5 26.7zM134.1 23.3l-3-7.3 -3 7.3H134.1z" fill="#00007A"/><path d="M155.1 30.7l-3.7-5.3h-0.2 -3.8v5.3h-4.4v-19h8.2c5.1 0 8.3 2.6 8.3 6.9 0 2.9-1.4 4.9-3.9 6l4.3 6.1H155.1zM150.9 15.3h-3.6v6.6h3.6c2.7 0 4.1-1.3 4.1-3.3C155 16.5 153.6 15.3 150.9 15.3z" fill="#00007A"/><path d="M179.6 11.7v19h-3.6l-9.5-11.6v11.6h-4.3v-19h3.6l9.5 11.6V11.7H179.6z" fill="#00007A"/><path d="M182.1 21.2c0-5.7 4.4-9.8 10.4-9.8 6 0 10.4 4.2 10.4 9.8s-4.4 9.8-10.4 9.8C186.5 31.1 182.1 26.9 182.1 21.2zM198.4 21.2c0-3.6-2.6-6.1-6-6.1 -3.4 0-6 2.5-6 6.1 0 3.6 2.6 6.1 6 6.1C195.9 27.3 198.4 24.8 198.4 21.2z" fill="#00007A"/><path d="M203.9 28.9l1.5-3.3c1.6 1.2 4 2 6.3 2 2.6 0 3.7-0.9 3.7-2 0-3.6-11.1-1.1-11.1-8.2 0-3.2 2.6-5.9 8-5.9 2.4 0 4.8 0.6 6.6 1.7l-1.4 3.3c-1.8-1-3.6-1.5-5.3-1.5 -2.6 0-3.6 1-3.6 2.2 0 3.5 11.1 1.1 11.1 8.1 0 3.2-2.6 5.9-8.1 5.9C208.6 31.1 205.6 30.2 203.9 28.9zM213.2 6.2h4.6l-4.9 3.9h-3.3L213.2 6.2z" fill="#00007A"/><path d="M220.7 21.2c0-5.7 4.4-9.8 10.3-9.8 3.3 0 6 1.2 7.8 3.4l-2.8 2.6c-1.3-1.5-2.9-2.2-4.8-2.2 -3.6 0-6.1 2.5-6.1 6.1 0 3.6 2.5 6.1 6.1 6.1 1.9 0 3.5-0.8 4.8-2.3l2.8 2.6c-1.8 2.2-4.5 3.4-7.9 3.4C225.1 31.1 220.7 27 220.7 21.2zM232.1 6.2h4.6l-4.9 3.9h-3.3L232.1 6.2z" fill="#00007A"/><path d="M82 11.7V23c0 0 5.6 0.5 8.6-2.9 3-3.4 5-4.9 8.6-4.9v-3.5H82zM89 15.5v1 0.1h-1v-0.7l-0.9-0.6v3.6h-1v-3.6l-0.9 0.6v0.7h-1v-0.1 -1l2.4-1.5L89 15.5 89 15.5z" fill="#F00"/><path d="M90.6 23.2c-3.3 2.5-8.2 2.1-8.2 2.1 2 6.3 8.2 5.9 8.2 5.9 8.5-0.5 8.6-8 8.6-8v-5.7C95.2 17.6 93.9 20.7 90.6 23.2zM96.3 25.7c0 1.2-1 2.2-2.2 2.2s-2.2-1-2.2-2.2c0-1.2 1-2.2 2.2-2.2S96.3 24.5 96.3 25.7z" fill="#F00"/><circle cx="94.1" cy="25.7" r="2.2" fill="#FFD900"/><polygon points="84.2 15.5 84.2 16.5 84.2 16.6 85.2 16.6 85.2 15.9 86.1 15.3 86.1 18.9 87.1 18.9 87.1 15.3 88 15.9 88 16.6 89 16.6 89 16.5 89 15.5 89 15.5 86.6 14 " fill="#FFD900"/>
				</svg>
			</section>
			<a href="#full-width-page-wrapper" class="page-scroll">zobacz</a>
		</figure>
	
	<?php else : ?>
	
	<?php endif; ?>

	</div><!-- #wrapper-navbar end -->
