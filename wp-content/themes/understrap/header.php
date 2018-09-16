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
								xmlns="http://www.w3.org/2000/svg" width="280" height="64" viewBox="0 0 280 64"><path d="M21.1 22.7h4.6v8.8c-2.4 1.8-5.7 2.8-8.8 2.8C10 34.3 5 29.6 5 23c0-6.6 5-11.3 12-11.3 3.8 0 7 1.3 9.1 3.8l-3.2 3c-1.6-1.7-3.4-2.5-5.6-2.5 -4.2 0-7.1 2.8-7.1 7 0 4.1 2.9 7 7.1 7 1.4 0 2.6-0.2 3.9-0.9V22.7z" fill="#00007A"/><path d="M28.1 23c0-6.5 5-11.3 11.9-11.3 6.9 0 11.9 4.8 11.9 11.3S46.9 34.3 40 34.3C33.1 34.3 28.1 29.5 28.1 23zM46.8 23c0-4.1-2.9-7-6.8-7s-6.8 2.8-6.8 7 2.9 7 6.8 7S46.8 27.2 46.8 23z" fill="#00007A"/><path d="M53.1 31.8l1.7-3.8c1.8 1.3 4.6 2.3 7.2 2.3 3 0 4.2-1 4.2-2.3 0-4.1-12.7-1.3-12.7-9.4 0-3.7 3-6.8 9.2-6.8 2.7 0 5.5 0.7 7.6 1.9l-1.6 3.8c-2-1.2-4.1-1.7-6-1.7 -3 0-4.1 1.1-4.1 2.5 0 4 12.7 1.2 12.7 9.3 0 3.6-3 6.8-9.3 6.8C58.5 34.3 55 33.3 53.1 31.8z" fill="#00007A"/><path d="M92.7 20c0 4.9-3.6 7.9-9.5 7.9h-4.4v6h-5V12.1h9.4C89 12.1 92.7 15.2 92.7 20zM87.5 20c0-2.4-1.6-3.8-4.6-3.8h-4.1v7.6h4.1C86 23.8 87.5 22.4 87.5 20z" fill="#00007A"/><path d="M117.7 12.1h9.9c7.1 0 12 4.3 12 10.9s-4.9 10.9-12 10.9h-9.9V12.1zM127.3 29.8c4.3 0 7.2-2.6 7.2-6.8s-2.8-6.8-7.2-6.8h-4.6v13.5H127.3z" fill="#00007A"/><path d="M156.5 29.3h-10.1l-1.9 4.7h-5.2l9.7-21.8h5l9.7 21.8h-5.3L156.5 29.3zM154.9 25.4l-3.5-8.3 -3.5 8.3H154.9z" fill="#00007A"/><path d="M179 33.9l-4.2-6.1h-0.2 -4.4v6.1h-5V12.1h9.4c5.8 0 9.5 3 9.5 7.9 0 3.3-1.7 5.7-4.5 6.9l4.9 7H179zM174.2 16.2h-4.1v7.6h4.1c3.1 0 4.6-1.4 4.6-3.8C178.9 17.6 177.3 16.2 174.2 16.2z" fill="#00007A"/><path d="M207 12.1v21.8h-4.1L192 20.7v13.2h-5V12.1h4.2l10.8 13.2V12.1H207z" fill="#00007A"/><path d="M209.9 23c0-6.5 5-11.3 11.9-11.3 6.9 0 11.9 4.8 11.9 11.3s-5.1 11.3-11.9 11.3C214.9 34.3 209.9 29.5 209.9 23zM228.7 23c0-4.1-2.9-7-6.8-7 -3.9 0-6.8 2.8-6.8 7 0 4.1 2.9 7 6.8 7C225.7 30 228.7 27.2 228.7 23z" fill="#00007A"/><path d="M234.9 31.8l1.7-3.8c1.8 1.3 4.6 2.3 7.2 2.3 3 0 4.2-1 4.2-2.3 0-4.1-12.7-1.3-12.7-9.4 0-3.7 3-6.8 9.2-6.8 2.7 0 5.5 0.7 7.6 1.9l-1.6 3.8c-2-1.2-4.1-1.7-6-1.7 -3 0-4.1 1.1-4.1 2.5 0 4 12.7 1.2 12.7 9.3 0 3.6-3 6.8-9.3 6.8C240.3 34.3 236.8 33.3 234.9 31.8zM245.5 5.9h5.2l-5.6 4.5h-3.8L245.5 5.9z" fill="#00007A"/><path d="M254.2 23c0-6.6 5-11.3 11.8-11.3 3.8 0 6.9 1.4 9 3.9l-3.2 3c-1.5-1.7-3.3-2.6-5.5-2.6 -4.1 0-7 2.9-7 7 0 4.1 2.9 7 7 7 2.2 0 4-0.9 5.5-2.6l3.2 3c-2.1 2.5-5.2 3.9-9 3.9C259.2 34.3 254.2 29.6 254.2 23zM267.2 5.9h5.2l-5.6 4.5H263L267.2 5.9z" fill="#00007A"/><path d="M95.2 12.1V25c0 0 6.4 0.5 9.9-3.4 3.4-3.9 5.7-5.6 9.9-5.6v-4H95.2zM103.2 16.5v1.1 0.1h-1.1v-0.8l-1-0.6v4.1h-1.1v-4.1l-1 0.6v0.8h-1.1v-0.1 -1.1l2.7-1.7L103.2 16.5 103.2 16.5z" fill="#F00"/><path d="M105.1 25.3c-3.8 2.9-9.4 2.4-9.4 2.4 2.2 7.2 9.4 6.8 9.4 6.8 9.8-0.6 9.9-9.2 9.9-9.2v-6.5C110.3 18.9 108.8 22.4 105.1 25.3zM111.6 28.1c0 1.4-1.1 2.5-2.5 2.5 -1.4 0-2.5-1.1-2.5-2.5 0-1.4 1.1-2.5 2.5-2.5C110.5 25.7 111.6 26.8 111.6 28.1z" fill="#F00"/><circle cx="109.1" cy="28.1" r="2.5" fill="#FFD900"/><polygon points="97.8 16.5 97.8 17.6 97.8 17.7 98.9 17.7 98.9 16.9 99.9 16.3 99.9 20.4 101 20.4 101 16.3 102.1 16.9 102.1 17.7 103.2 17.7 103.2 17.6 103.2 16.5 103.2 16.5 100.5 14.8 " fill="#FFD900"/><path d="M6.4 42h3.2v11h6.8v2.6h-10V42z" fill="#00007A"/><path d="M28.7 53.1v2.5H18.2V42h10.3v2.5h-7.2v3h6.3V50h-6.3v3.2H28.7z" fill="#00007A"/><path d="M30.2 54.3l1.1-2.4c1.1 0.8 2.9 1.4 4.5 1.4 1.9 0 2.6-0.6 2.6-1.5 0-2.5-7.9-0.8-7.9-5.9 0-2.3 1.9-4.2 5.7-4.2 1.7 0 3.5 0.4 4.7 1.2l-1 2.4c-1.3-0.7-2.6-1.1-3.8-1.1 -1.9 0-2.6 0.7-2.6 1.6 0 2.5 7.9 0.8 7.9 5.8 0 2.3-1.9 4.2-5.8 4.2C33.5 55.9 31.4 55.2 30.2 54.3z" fill="#00007A"/><path d="M54.7 53.1v2.6H42.8v-2l7.5-9h-7.3V42h11.5v2l-7.5 9H54.7z" fill="#00007A"/><path d="M67.2 53.1v2.5H56.7V42H67v2.5h-7.2v3h6.3V50h-6.3v3.2H67.2z" fill="#00007A"/><path d="M74.7 50.3l-1.8 1.9v3.4h-3.1V42h3.1v6.4l6-6.4h3.5l-5.6 6.1 6 7.5h-3.7L74.7 50.3z" fill="#00007A"/><path d="M94.6 50.3l-1.8 1.9v3.4h-3.1V42h3.1v6.4l6-6.4h3.5l-5.6 6.1 6 7.5H99L94.6 50.3z" fill="#00007A"/><path d="M104 42h3.2v13.6H104V42z" fill="#00007A"/><path d="M121 53.1v2.5h-10.5V42h10.3v2.5h-7.2v3h6.3V50h-6.3v3.2H121z" fill="#00007A"/><path d="M132.1 55.6l-2.6-3.8h-0.2 -2.7v3.8h-3.2V42h5.9c3.6 0 5.9 1.9 5.9 4.9 0 2-1 3.5-2.8 4.3l3.1 4.4H132.1zM129.2 44.6h-2.6v4.7h2.6c1.9 0 2.9-0.9 2.9-2.4C132.1 45.5 131.1 44.6 129.2 44.6z" fill="#00007A"/><path d="M136.7 54.3l1.1-2.4c1.1 0.8 2.9 1.4 4.5 1.4 1.9 0 2.6-0.6 2.6-1.5 0-2.5-7.9-0.8-7.9-5.9 0-2.3 1.9-4.2 5.7-4.2 1.7 0 3.5 0.4 4.7 1.2l-1 2.4c-1.3-0.7-2.6-1.1-3.8-1.1 -1.9 0-2.6 0.7-2.6 1.6 0 2.5 7.9 0.8 7.9 5.8 0 2.3-1.9 4.2-5.8 4.2C140.1 55.9 137.9 55.2 136.7 54.3z" fill="#00007A"/><path d="M161.2 53.1v2.6h-11.9v-2l7.5-9h-7.3V42h11.5v2l-7.5 9H161.2z" fill="#00007A"/><path d="M175.7 42v13.6h-2.6l-6.8-8.3v8.3h-3.1V42h2.6l6.8 8.3V42H175.7z" fill="#00007A"/><path d="M178.9 42h3.2v13.6h-3.2V42z" fill="#00007A"/><path d="M190.3 50.3l-1.8 1.9v3.4h-3.1V42h3.1v6.4l6-6.4h3.5l-5.6 6.1 6 7.5h-3.7L190.3 50.3z" fill="#00007A"/><path d="M199.7 42h3.2v13.6h-3.2V42z" fill="#00007A"/><path d="M216.6 53.1v2.5h-10.5V42h10.3v2.5h-7.2v3h6.3V50h-6.3v3.2H216.6z" fill="#00007A"/><path d="M239.5 42l-4.5 13.6h-3.4l-3-9.2 -3.1 9.2h-3.4L217.8 42h3.3l3.1 9.6 3.2-9.6h2.9l3.1 9.6 3.2-9.6H239.5z" fill="#00007A"/><path d="M241.3 42h3.2v13.6h-3.2V42z" fill="#00007A"/><path d="M246.8 48.8c0-4.1 3.2-7 7.4-7 2.4 0 4.3 0.9 5.6 2.4l-2 1.9c-0.9-1.1-2.1-1.6-3.4-1.6 -2.5 0-4.4 1.8-4.4 4.4s1.8 4.4 4.4 4.4c1.4 0 2.5-0.5 3.4-1.6l2 1.9c-1.3 1.6-3.2 2.4-5.6 2.4C250 55.9 246.8 52.9 246.8 48.8z" fill="#00007A"/><path d="M272.9 53.1v2.6H261v-2l7.5-9h-7.3V42h11.5v2l-7.5 9H272.9z" fill="#00007A"/>
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
				<h1>Lubię Rumię</h1>
			</section>
			<a href="#full-width-page-wrapper" class="page-scroll">zobacz</a>
		</figure>
	
	<?php else : ?>
	
	<?php endif; ?>

	</div><!-- #wrapper-navbar end -->
