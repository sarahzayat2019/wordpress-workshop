<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fictional-library
 */

get_header();

$books_args = array(
    'post_type' => 'books',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
);
$query_books = new WP_Query($books_args);
$post_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
);
$query_posts = new WP_Query($post_args);
?>
    <main id="primary" class="site-main">
        <div class="page-banner">
            <div class="page-banner__bg-image"
                 style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
            <div class="page-banner__content container t-center c-white">
                <h1 class="headline headline--large">Welcome!</h1>
                <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
                <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>books</strong> you&rsquo;re
                    interested in?</h3>
                <a href="#" class="btn btn--large btn--blue">Find Your Book</a>
            </div>
        </div>
        <div class="full-width-split group">
            <div class="full-width-split__one">
                <div class="full-width-split__inner">
                    <h2 class="headline headline--small-plus t-center">Upcoming Books</h2>
                    <?php if ($query_books->have_posts()) :
                        while ($query_books->have_posts()) :
                            $query_books->the_post();
                            ?>
                            <div class="event-summary">
                                <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                                    <span class="event-summary__month"><?php echo get_the_date('M') ?></span>
                                    <span class="event-summary__day"><?php echo get_the_date('d') ?></span>
                                </a>
                                <div class="event-summary__content">
                                    <h5 class="event-summary__title headline headline--tiny"><a
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h5>
                                    <p>
                                        <?php the_excerpt(); ?>
                                        <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
                                    </p>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        ?>
                        Oops, there are no books.
                    <?php
                    endif;
                    ?>
                    <p class="t-center no-margin"><a href="<?= get_post_type_archive_link('books'); ?>"
                                                     class="btn btn--blue">View All Books</a></p>
                </div>
            </div>
            <div class="full-width-split__two">
                <div class="full-width-split__inner">
                    <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
                    <?php if ($query_posts->have_posts()) :
                        while ($query_posts->have_posts()) :
                            $query_posts->the_post();
                            ?>
                            <div class="event-summary">
                                <a class="event-summary__date event-summary__date--beige t-center"
                                   href="<?php the_permalink(); ?>">
                                    <span class="event-summary__month"><?= get_the_date('M') ?></span>
                                    <span class="event-summary__day"><?= get_the_date('d') ?></span>
                                </a>
                                <div class="event-summary__content">
                                    <h5 class="event-summary__title headline headline--tiny">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
                                    <p><?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="nu gray">
                                            Read more</a>
                                    </p>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo 'Oops there are no articles';
                    endif;
                    ?>
                    <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('post'); ?>"
                                                     class="btn btn--yellow">View All Blog Posts</a></p>
                </div>
            </div>
        </div>
        <div class="hero-slider">
            <div class="owl-carousel">
                <?php
                if (have_rows('slides')):
                    while (have_rows('slides')) : the_row();
                        $slide_title = get_sub_field('title');
                        $slide_subtitle = get_sub_field('subtitle');
                        $slide_image = get_sub_field('image');
                        $slide_link = get_sub_field('button');
                        ?>
                        <div class="item">
                            <div class="hero-slider__slide" style="background-image: url(<?= $slide_image['url'] ?>)">
                                <div class="hero-slider__interior container">
                                    <div class="hero-slider__overlay">
                                        <h2 class="headline headline--medium t-center"><?= $slide_title ?></h2>
                                        <p class="t-center"><?= $slide_subtitle ?></p>
                                        <p class="t-center no-margin"><a href="<?= $slide_link['url']; ?>"
                                                                         class="btn btn--blue">Learn more</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </main><!-- #main -->
<?php
get_footer();
