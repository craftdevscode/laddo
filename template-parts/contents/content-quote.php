<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package laddo
 */
$post_author_id = get_post_field( 'post_author', get_the_ID() );

?>
<blockquote class="shadow-sm">
    <?php Laddo_Theme_Helper()->get_html_tag( 'blockquote', get_the_content()); ?>
    <a href="<?php echo get_author_posts_url($post_author_id) ?>" class="author">
        <?php echo get_the_author_meta('display_name') ?>
    </a>
</blockquote>