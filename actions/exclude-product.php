<?php

$args = [
    'post_type'              => ['jobs'],
    'nopaging'               => false,
    'posts_per_page'         => '5',
    'ignore_sticky_posts'    => false,
    'post__not_in'           => [get_the_ID()]
];

$query = new WP_Query($args);

if ($query->have_posts()) : 
    while ($query->have_posts()) : $query->the_post();
        // HTML template
    endwhile;
endif; 

wp_reset_postdata();