<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
        $post_type = get_post_type();
?>

<article <?php post_class(); ?>>
    <?php if (has_post_thumbnail() && !post_password_required()) : ?>

    <div class="featured-image">
        <?php the_post_thumbnail('mcluhan_fullscreen-image'); ?>
    </div>

    <?php endif; ?>

    <header class="entry-header section-inner">


        <?php
                the_title('<h1 class="entry-title">', '</h1>');


                // Make sure we have a custom excerpt
                if (has_excerpt()) {
                    echo '<p class="excerpt">' . get_the_excerpt() . '</p>';
                }

                // Only output post meta data on single
                if (is_single() || is_attachment()) : ?>



        <div class="meta">

            <time><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></time>

            <?php if (!is_attachment()) : ?>

            <span>
                <?php the_category(', '); ?>
            </span>

            <?php endif; ?>

        </div>

        <?php endif; ?>

    </header><!-- .entry-header -->
    <?php if (is_privacy_policy()) : ?>
    <hr>
    <?php endif; ?>
    <div class="entry-content section-inner">
        <?php the_content(); ?>
    </div>
</article>

<?php

        wp_link_pages(array(
            'before' => '<p class="section-inner linked-pages">' . __('Pages', 'mcluhan') . ':',
        ));

        if ($post_type == 'post' && get_the_tags()) : ?>
<div class="meta bottom section-inner">
    <p class="tags">
        <?php the_tags(' #', ' #', ' '); ?></p>
</div> <!-- .meta -->

<?php endif;
        if (is_single() && !is_attachment() && (get_previous_post_link() || get_next_post_link())) : ?>

<div class="post-pagination section-inner">

    <div class="previous-post">
        <?php if (get_previous_post_link()) : ?>
        <?php echo get_previous_post_link('%link', '<span>%title</span>'); ?>
        <?php endif; ?>
    </div>

    <div class="next-post">
        <?php if (get_next_post_link()) : ?>
        <?php echo get_next_post_link('%link', '<span>%title</span>'); ?>
        <?php endif; ?>
    </div>

</div><!-- .post-pagination -->

<?php endif;

        // Output comments wrapper if comments are open, or if there's a comment number – and check for password
        if ((comments_open() || get_comments_number()) && !post_password_required()) : ?>

<div class="comments-section-inner section-inner wide">
    <?php comments_template(); ?>
</div><!-- .comments-section-inner -->

<?php endif; ?>



<?php

        if ($post_type == 'post') {
            get_template_part('related-posts');
        }

    endwhile;

endif;

get_footer(); ?>