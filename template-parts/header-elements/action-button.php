<?php
$is_menu_btn = laddo_opt('is_cta_menu_btn', '1');
$menu_btn = laddo_opt('cta_menu_btn', 'Work with Us');

if ($is_menu_btn == '1' && is_array($menu_btn) && isset($menu_btn['text'], $menu_btn['url'])) {
    ?>
    <div class="d-flex align-items-center gap-5 flex-wrap">
        <a href="<?php echo esc_url($menu_btn['url']); ?>" class="btn btn-lg btn-primary rounded-pill text-white fs-14 ff-heading fw-semibold text-uppercase" target="<?php echo esc_attr($menu_btn['target'] ?? '_self'); ?>">
            <span class="btn_content_1"><?php echo esc_html($menu_btn['text']); ?></span>
            <span class="btn_content_2"><?php echo esc_html($menu_btn['text']); ?></span>
        </a>
    </div>
    <?php
}