<?php
$logo = laddo_opt('preloader_logo');

if ( laddo_opt('is_preloader') ) {
    ?>
    <div class="preloader bg-light-subtle">
        <div class="preloader-wrap">
            <img src="<?php echo esc_url($logo['url']) ?>" alt="<?php esc_attr_e('Preloader Logo', 'laddo'); ?>" class="img-fluid">
            <div class="loading-bar"></div>
        </div>
    </div>
    <?php
}