<?php

$categories = get_categories();
$tempID = get_the_ID();
$termsObj = get_the_terms($tempID, 'product_cat');


// since 7.1, destructuring, nice.
['items_to_display' => $items_to_display] = $args;

$query_args = array(
    'post_type'   => 'product',
    'post_status' => 'publish',
    'posts_per_page' => $items_to_display,
    'post__not_in' => [$tempID],
    'tax_query' => [
        [
            'taxonomy' => $termsObj[0]->taxonomy,
            'terms' => $termsObj[0]->term_id
        ]
    ]

);
$the_query = new WP_Query($query_args);

?>


<div class="related-products-wrapper">

    <!-- no access to $product , need to make it ourselves -->
    <?php if ($the_query->have_posts()) : ?>
    <h2>Alternatives</h2>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <?php $product = wc_get_product(get_the_ID()); ?>

    <?php if (is_a($product, 'WC_Product')) : ?>

    <div class="related-product-card">
        <!-- $product->get_image(array( 50, 80 ) ) -->
        <div class="card-content">

            <a class="" style="" href=<?= $product->get_permalink(); ?> target="_self" rel="nofollow">
                <?= $product->get_image(); ?>
            </a>


            <a class="button product_type_simple"
                style="font-size: 18px; padding: 0.618em 1em; border-radius: 3px; line-height: 1;"
                href=<?= $product->get_permalink(); ?> target="_self" rel="nofollow">
                <span>View More</span>
            </a>
        </div>

    </div>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata(); ?>
</div>