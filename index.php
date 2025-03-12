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

                        laddo_Theme_Helper()->pagination();
                        ?>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog_sidebar d-flex flex-column gap-10">
                        <div class="blog_sidebar_item">
                            <form action="#" class="position-relative">
                                <input type="text" class="subscribe form-control px-0 bg-transparent border-0 border-2  border-bottom border-black text-black rounded-0 py-3" placeholder="Search...">
                                <button type="submit" class="position-absolute top-2 end-0 border-0 bg-transparent">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#0A0C00" stroke-width="2" stroke-linecap="square" />
                                        <path d="M20.9984 21.0004L16.6484 16.6504" stroke="#0A0C00" stroke-width="2" stroke-linecap="square" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="blog_sidebar_item">
                            <h5 class="mb-6">Categories</h5>
                            <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                                <li>
                                    <a href="blog-list.html" class="text-decoration-none text-black fs-18 hover-text-primary">Archive (3)</a>
                                </li>
                                <li>
                                    <a href="blog-list.html" class="text-decoration-none text-black fs-18 hover-text-primary">Branding (6)</a>
                                </li>
                                <li>
                                    <a href="blog-list.html" class="text-decoration-none text-black fs-18 hover-text-primary">Company (2)</a>
                                </li>
                                <li>
                                    <a href="blog-list.html" class="text-decoration-none text-black fs-18 hover-text-primary">Design (1)</a>
                                </li>
                                <li>
                                    <a href="blog-list.html" class="text-decoration-none text-black fs-18 hover-text-primary">Business (4)</a>
                                </li>
                                <li>
                                    <a href="blog-list.html" class="text-decoration-none text-black fs-18 hover-text-primary">Modern (1)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog_sidebar_item">
                            <h5 class="mb-6">Recent Posts</h5>
                            <ul class="list-unstyled d-flex flex-column gap-5 mb-0">
                                <li class="d-flex align-items-center gap-3">
                                    <div class="flex-shrink-0">
                                        <img src="assets/img/blog_sidebar_1.png" alt="Image" class="img-fluid">
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                                            <p class="text-black fs-14 ff-heading mb-0">March 26, 2024</p>
                                            <span class="text-black fs-14">/</span>
                                            <a href="blog-details.html" class="text-decoration-none text-black fs-14 ff-heading mb-0">Development</a>
                                        </div>
                                        <a href="blog-details.html" class="text-decoration-none">
                                            <h5 class="text-black fs-18 hover-text-primary mb-0">Everything You Should Know About Return</h5>
                                        </a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <div class="flex-shrink-0">
                                        <img src="assets/img/blog_sidebar_2.png" alt="Image" class="img-fluid">
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                                            <p class="text-black fs-14 ff-heading mb-0">March 26, 2024</p>
                                            <span class="text-black fs-14">/</span>
                                            <a href="blog-details.html" class="text-decoration-none text-black fs-14 ff-heading mb-0">Development</a>
                                        </div>
                                        <a href="blog-details.html" class="text-decoration-none">
                                            <h5 class="text-black fs-18 hover-text-primary mb-0">Witness AI is building for generative AI models</h5>
                                        </a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <div class="flex-shrink-0">
                                        <img src="assets/img/blog_sidebar_3.png" alt="Image" class="img-fluid">
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                                            <p class="text-black fs-14 ff-heading mb-0">March 26, 2024</p>
                                            <span class="text-black fs-14">/</span>
                                            <a href="blog-details.html" class="text-decoration-none text-black fs-14 ff-heading mb-0">Development</a>
                                        </div>
                                        <a href="blog-details.html" class="text-decoration-none">
                                            <h5 class="text-black fs-18 hover-text-primary mb-0">Kickstarter now lets pledge after a campaign closes</h5>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="blog_sidebar_item">
                            <h5 class="mb-6">Tags</h5>
                            <ul class="list-unstyled d-flex align-items-center gap-3 flex-wrap mb-0">
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">Agency</a></li>
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">Marketing</a></li>
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">Awards</a></li>
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">Contemporary</a></li>
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">Design</a></li>
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">Ideas</a></li>
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">Business</a></li>
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">Modern</a></li>
                                <li><a href="blog-list.html" class="tag_item bg-info px-4 py-2 text-black fw-medium">creative</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
get_footer();