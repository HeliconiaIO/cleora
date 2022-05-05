<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cleora
 */

?>
	<!-- #footer -->
	<footer class="relative">
		<div class="max-w-7xl mx-auto px-4 sm:px-6">
				<div class="flex justify-center items-center border-t-2 border-gray-100 py-3 md:space-x-10">
						<?php
						wp_nav_menu( array(
							'theme_location'    => 'footer',
							'depth'             => 1,
							'container'         => false,
							'menu_class'        => 'footer-menu',
							// 'fallback_cb'       => 'Cleora_Nav_Walker::fallback',
							'walker'            => new Cleora_Nav_Walker(),
						) );
						?>
				</div>
		</div>
		<p class="text-center text-gray-700 my-1">
			<small>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. All Rights Reserved.</small>
		</p>
		<p class="text-center text-gray-500 text-sm">
				<?php
					printf(
						/* translators: %s: WordPress. */
						esc_html__( 'Made with ❤️ by developer of  %s.', 'cleora' ),
						'<a href="' . esc_url( __( 'https://www.fancytextpro.com/', 'cleora' ) ) . '">Fancy Text Generator</a>'
					);
				?>
		</p>
	</footer>
	<!-- #footer -->
	<?php wp_footer(); ?>

</body>
</html>
