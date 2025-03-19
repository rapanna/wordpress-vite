<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sablona-wp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); 
		$front_fotka = get_field('front_fotka', 'option');


?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sablona-wp' ); ?></a>
	<?php
	if ( is_front_page() && is_home() ) {
		echo '	<header id="masthead" class="header header--front " style="background-image: url('. $front_fotka['url'] .');">';
	} else {
		echo '	<header id="masthead" class="header">';
	} ?>

			<div class="container">
				<div class="branding">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					} else {
						echo '<div class="branding__brand"><a href="'. esc_url( home_url( '/' ) ) .'" rel="home">'. bloginfo( 'name' ) .'</a></div>';
					} ?>
				</div><!-- .site-branding -->

				<div id="navigation" class="navigation " >
					<button class="nav__toggle js-nav__toggle" aria-label="Menu" aria-controls="primary-menu" aria-expanded="false">
						<span class="nav__icon"></span>
					</button>					
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1', // Změň podle potřeby
						'menu_class'     => 'nav__list js-nav__list',
						'container'      => 'nav',
						'container_class'=> 'head__nav nav',
						'container_role' => 'navigation',
						'walker'         => new Custom_Nav_Walker()
					) );
					?>
				</div><!-- #site-navigation -->

				<div class="contakt">
					<a href="" class="contakt__link"><?php esc_html_e( 'Contact as', 'sablona-wp' ); ?></a>
				</div>
			</div>
		</div>
		<?php
		if ( is_front_page() && is_home() ) {
			$front_text = get_field('front_text', 'option');
			$front_link = get_field('front_link', 'option');
			?>
			<div class="container container__h1">
				<?php 
				if($front_link) {
					echo '<h1 class="header__h1"><a href="'.$front_link["url"].'">'.$front_text.'</a></h1>';
				} else {
					echo '<h1 class="header__h1">'.$front_text.'</h1>';
				}
				?>
			</div>
			<?php
		} else {
			?>
			<div class="container">
				<h1 class="header_subpage"><?php the_title(); ?></h1>
			</div>
			<?php
		} // endif;
		?>
	</header><!-- #masthead -->
