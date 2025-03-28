<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package laddo
 */

get_header();
laddo_banner();
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
?>

    <section class="blog_list pt-120 pb-120">
        <div class="container">
            <div class="row g-4 g-xxl-5">

                <div class="col-lg-8">
                    <div class="row gap-10">

						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/contents/content', get_post_format() );
							endwhile;
						else :
							get_template_part( 'template-parts/contents/content', 'none' );
						endif;

						Laddo_Theme_Helper()->pagination();
						?>

                    </div>
                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>

<?php
get_footer();