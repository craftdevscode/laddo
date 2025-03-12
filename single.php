<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package laddo
 */
get_header();
laddo_banner();

global $laddo_opt;
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$thumb_size  = is_active_sidebar( 'sidebar_widgets' ) ? 'laddo_771x445' : 'full';

if ( isset( $_GET['elementor_library'] ) ) {
	while ( have_posts() ) : the_post();
		the_content();
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'laddo' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'laddo' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
	endwhile;
} else {
	?>

    <section class="blog-details-area bg-gray pb-lg-130 pb-100 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-<?php echo esc_attr( $blog_column ) ?> mb-50">
                    <div class="details-content blog_single_post wow fadeIn">

						<?php
						the_post_thumbnail( $thumb_size, array( 'class' => 'rounded-5 mb-30' ) );

						while ( have_posts() ) : the_post();
							$user_desc = get_the_author_meta( 'description' );
							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'laddo' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'laddo' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						endwhile;
						?>

                    </div>
					<?php if ( has_tag() || class_exists( 'CSF' ) ) {
						?>
                        <div class="social-content d-flex justify-content-between wow fadeInUP">
							<?php
							if ( has_tag() ) {
								?>
                                <div class="post-tags">
                                    <span><?php esc_html_e( 'Tags:', 'laddo' ); ?></span>
									<?php the_tags( '', ',', '' ); ?>
                                </div>
								<?php
							}
							if ( class_exists( 'CSF' ) ) {
								?>
                                <div class="social-item d-flex">
                                    <p class="share-text mr-10"><?php esc_html_e( 'Share:', 'laddo' ); ?></p>
                                    <div class="social-list d-flex justify-content-center">
										<?php laddo_Theme_Helper()->social_share(); ?>
                                    </div>
                                </div>
								<?php
							}
							?>
                        </div>
						<?php
					}

					// If comments are open, or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>

                </div>

				<?php get_sidebar() ?>

            </div>
        </div>
    </section>
	<?php
}

get_footer();