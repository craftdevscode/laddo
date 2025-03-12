<?php
$thumb_size           = is_active_sidebar( 'sidebar_widgets' ) ? 'laddo_848x594' : 'full';
$blog_continue_read   = laddo_opt( 'blog_continue_read', esc_html__( 'Read More', 'laddo' ) );
?>

<div class="col-12">
    <div class="hover_scale_item service_1_item rounded-2">
        <?php
        if ( is_sticky() ) {
	        echo '<p class="sticky-label">' . esc_html__( 'Featured', 'laddo' ) . '</p>';
        }
        if ( ! is_search() ) { ?>
            <div class="overflow-hidden rounded-3">
		        <?php the_post_thumbnail($thumb_size, ['class' => 'img-fluid w-100 hover_scale_thumb']); ?>
            </div>
            <?php
        }
        ?>
        <div class="py-7 pe-4">
            <div class="d-flex align-items-center gap-3 flex-wrap mb-4">
                <p class="text-black ff-heading mb-0"><?php the_time(get_option( 'date_format' )); ?></p>
                <span class="text-black fs-20">/</span>
                <a href="<?php echo Laddo_Theme_Helper()->first_taxonomy_link(); ?>" class="text-decoration-none text-black ff-heading mb-0">
                    <?php echo Laddo_Theme_Helper()->first_taxonomy() ?>
                </a>
            </div>

            <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                <h5 class="text-black fs-48 hover-text-primary mb-7"><?php the_title() ?></h5>
            </a>

            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-black ff-heading fw-semibold text-uppercase hover-text-primary d-flex align-items-center gap-2">
                <?php echo esc_html($blog_continue_read) ?>
                <span class="btn_arrow_style">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>