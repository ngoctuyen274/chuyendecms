<?php get_header(); ?>
<div class="container">
    <div class="content py-5">
        <div class="row">
            <div class="col-md-8">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="card <?php echo esc_attr($gute_view_class); ?> ">
                        <div class="<?php echo esc_attr($gute_text_column); ?> card-body">
                            <?php the_title('<h5 class="card-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>'); ?>
                            <p class="card-text">
                                <?php echo wp_trim_words(get_the_content(), '30') ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-dark shadow"><?php esc_html_e('Read more', 'gute'); ?></a>
                        </div>
                    </div>
                </article>
            </div>
            <?php if (is_active_sidebar('sidebar-1') && $gute_layout == 'right' && have_posts()) : ?>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>
<?php get_footer(); ?>