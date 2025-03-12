<?php
get_header();
laddo_banner();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('laddo_1300X700', ['class' => 'img-fluid rounded-3 mb-10']); ?>
            <?php endif; ?>
            <h4 class="fs-60 mb-4"><?php the_title() ?></h4>
            <p class="text-black fs-18 mb-3"><?php echo wpautop(get_the_excerpt()); ?></p>
        </div>
    </div>
</div>
<?php
while (have_posts()) : the_post();
    the_content();
endwhile;

get_footer();
