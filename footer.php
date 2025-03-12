<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package laddo
 */

$footer_el_layout = laddo_setting_apply('footer_el_layout');

if ( ! is_404() ) {
	if ( $footer_el_layout && ( get_post( $footer_el_layout ) ) && in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
        <footer id="laddo-footer" class="laddo-footer <?php echo esc_attr( get_post( $footer_el_layout )->post_name ); ?>">
			<?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($footer_el_layout); ?>
        </footer>
		<?php
	} else {
		?>
        <footer id="site_footer" class="site-footer">
            <div class="site-info">
                <div class="container">
                    <div class="site-info-wrapper text-center">
                        <div class="copyright">
							<?php
							$copy_text = laddo_opt( 'footer_copyright_text' );
							if ( ! empty( $copy_text ) ) {
								echo wp_kses_post($copy_text);
							} else {
								echo sprintf( esc_html__( '&copy; %1$s %2$s - All Rights Reserved Made by %3$s', 'laddo' ), date( 'Y' ), get_bloginfo( 'name' ), '<a href="' . esc_url( 'http://spider-themes.net/' ) . '">' . esc_attr( 'SpiderThemes' ) . '</a>' );
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		<?php
	}
}

wp_footer();

?>

</body>
</html>