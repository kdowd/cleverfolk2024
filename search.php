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
        </header>



    <?php

    endif;

    if (have_posts()) :  ?>

        <div class="search-results-table">
            <ol>
                <?php
                while (have_posts()) : the_post();
                    get_template_part('content', get_post_type());
                endwhile;
                ?>
            </ol>
        </div>

    <?php endif; ?>
    <h5 style="margin-bottom: 0.5rem; margin-top: 2rem;">Another search:</h5>
    <?php get_search_form(); ?>
</div>

<?php

get_template_part('pagination');

get_footer(); ?>