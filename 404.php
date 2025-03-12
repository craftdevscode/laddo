<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
get_header();
$title  = laddo_opt('error_heading', esc_html__( 'Error. We can’t find the page you’re looking for.', 'laddo' ));
$subtitle  = laddo_opt('error_content', esc_html__( 'Sorry for the inconvenience. Go to our homepage or check out our latest collections for Fashion,Chair, Decoration...', 'laddo' ));
$btn_title  = laddo_opt('error_btn_title', esc_html__( 'Back to Home Page', 'laddo' ));
?>
    <section class="error_area bg_color">
        <div class="error_dot one"></div>
        <div class="error_dot two"></div>
        <div class="error_dot three"></div>
        <div class="error_dot four"></div>
        <div class="container">
            <div class="error_content_two text-center">
                <div class="error_img">
                    <img class="position-absolute error_shap" src="<?php echo BIOPRESS_DIR_IMG . '/404/404_bg.png' ?>" alt="<?php esc_attr_e('background shape', 'laddo'); ?>">
                    <div class="one wow clipInDown" data-wow-delay="1s">
                        <img class="img_one" src="<?php echo BIOPRESS_DIR_IMG . '/404/404_two.png' ?>" alt="<?php esc_attr_e('error image', 'laddo'); ?>">
                    </div>
                    <div class="two wow clipInDown" data-wow-delay="1.5s">
                        <img class="img_two" src="<?php echo BIOPRESS_DIR_IMG . '/404/404_three.png' ?>" alt="<?php esc_attr_e('error image', 'laddo'); ?>">
                    </div>
                    <div class="three wow clipInDown" data-wow-delay="1.8s">
                        <img class="img_three" src="<?php echo BIOPRESS_DIR_IMG . '/404/404_one.png' ?>" alt="<?php esc_attr_e('error image', 'laddo'); ?>">
                    </div>
                </div>
                <h2><?php echo esc_html($title) ?></h2>
                <p><?php echo esc_html($subtitle) ?></p>
                <form action="<?php echo esc_url(home_url('/')) ?>" class="error_search">
                    <input type="text" class="form-control" name="s" placeholder="<?php esc_attr_e('Search', 'laddo' ) ?>">
                </form>
                <a href="<?php echo esc_url(home_url('/')) ?>" class="btn btn-brand">
	                <?php echo esc_html($btn_title) ?>
                </a>
            </div>
        </div>
    </section>
    <?php
get_footer();