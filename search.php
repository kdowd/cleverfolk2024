<?php get_header(); ?>

<div class="section-inner">

    <?php

    $archive_title_elem     = is_front_page() || (is_home() && get_option('show_on_front') == 'posts') ? 'h2' : 'h1';
    $archive_title             = get_the_archive_title();
    $archive_description     = get_the_archive_description();

    if ($archive_title || $archive_description) :
    ?>

    <header class="page-header">
        <h1>Search Results</h1>
        <?php if ($archive_description) : ?>
        <div class="page-description">
            <?php echo wpautop(wp_kses_post($archive_description)); ?>
        </div>
        <?php endif; ?>
    </header><!-- .page-header -->



    <?php
    endif;

    if (have_posts()) :

        $old_year = '1'; ?>

    <div class="posts" id="posts">

        <?php
            while (have_posts()) : the_post();

                // Get the date of the current post
                $current_year = get_the_date('Y');

                // If it's different than the old year, we need a new wrapper
                if ($current_year != $old_year) :

                    // If it's a proper year, and not the one we added as a default before the loop, we have an open wrapper that needs closing
                    if (1 != $old_year) {
                        echo '</ul><!-- /' . $old_year . '-->';
                    }

                    // Wrap the new year
                    echo '<ul>';

                    if (!is_date()) :

            ?>

        <li>
            <h3 class="list-title"><a
                    href="<?php echo esc_url(get_year_link($current_year)); ?>"><?php echo $current_year; ?></a>
            </h3>
        </li>

        <?php

                    endif;

                    // Update the old_year variable
                    $old_year = $current_year;

                endif;

                get_template_part('content', get_post_type());

            endwhile;
            ?>

    </div><!-- .posts -->

    <?php endif; ?>
    <h6>Another search:</h6>
    <?php get_search_form(); ?>
</div><!-- .section-inner -->

<?php

get_template_part('pagination');

get_footer(); ?>