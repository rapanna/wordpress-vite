<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sablona-wp
 */

?>

	<footer class="footer">
		<div class="container">
			<div class="container__left">
				<?php 
					the_custom_logo();

					if ( is_active_sidebar( 'muj-widget' ) ) :
						dynamic_sidebar( 'muj-widget' );
					endif;
				?>
			</div>
			<div class="container__right">


			</div>
		</div>
	</footer>
	<div class="copyright">© Copyright 2023 - <?php echo date('Y'); ?> | Všechna práva vyhrazena - použití obsahu nebo jeho částí je možné pouze se souhlasem sablona-wp | <a href="http://timesoft.cz">Správa webu</a></div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
