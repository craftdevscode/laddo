<?php
/**
 * Template Name: laddo Fullwidth
 */

get_header();
laddo_banner();
?>
    <div class="full-width-page">
		<?php
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
		?>
    </div>
<?php

get_footer();