<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package laddo
 */

if ( ! is_active_sidebar( 'sidebar_widgets' ) ) {
    return;
}
?>

<div class="col-lg-4">
    <div class="blog_sidebar pl-10">
        <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
    </div>
</div>