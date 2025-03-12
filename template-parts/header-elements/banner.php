<?php
$is_banner = laddo_setting_apply( 'is_page_banner' );
$bg_img    = laddo_setting_apply( 'banner_bg_img' );

if ( $is_banner ) {
    ?>
    <section class="breadcrumb_area banner_space_top pb-120 position-relative z-2">

		<?php if ( ! empty( $bg_img['url'] ) ) : ?>
            <img src="<?php echo esc_url( $bg_img['url'] ) ?>" alt="<?php esc_attr_e( 'Banner Image', 'laddo' ); ?>"
                 class="img-fluid w-100 h-100 position-absolute top-0 start-0 z-n1">
		<?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white fs-90 mb-4">
						<?php
						if ( is_home() || is_front_page() ) {
							echo get_the_title( get_option( 'page_for_posts' ) );
						} else {
							echo single_post_title( '', false );
						}
						?>
                    </h1>
					<?php laddo_breadcrumbs( 'd-flex align-items-center' ); ?>
                </div>
            </div>
        </div>

    </section>
	<?php
}