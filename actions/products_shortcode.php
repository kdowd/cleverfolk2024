<?php

add_shortcode( 'sale_products_test', 'sale_products' );


function sale_products( $atts ){
    global $woocommerce_loop, $woocommerce;

    extract( shortcode_atts( array(
        'per_page'      => '12',
        'columns'       => '3',
        'orderby'       => 'title',
        'category'      => 'clearance',
        'order'         => 'asc'
        ), $atts ) );

    // Get products on sale
    $product_ids_on_sale = woocommerce_get_product_ids_on_sale();

    $meta_query = array();
    $meta_query[] = $woocommerce->query->visibility_meta_query();
    $meta_query[] = $woocommerce->query->stock_status_meta_query();

    $args = array(
        'posts_per_page'=> $per_page,
        'orderby'       => $orderby,
        'order'         => $order,
        'no_found_rows' => 1,
        'post_status'   => 'publish',
        'post_type'     => 'product',
        'orderby'       => 'date',
        'order'         => 'ASC',
        'meta_query'    => $meta_query,
        'post__in'      => $product_ids_on_sale,
        'tax_query' => array( array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $category,
        )),
    );

    ob_start();

    $products = new WP_Query( $args );

    $woocommerce_loop['columns'] = $columns;

    if ( $products->have_posts() ) : ?>

<?php woocommerce_product_loop_start(); ?>

<?php while ( $products->have_posts() ) : $products->the_post(); ?>

<?php wc_get_template_part( 'content', 'product-test' ); ?>

<?php endwhile; // end of the loop. ?>

<?php woocommerce_product_loop_end(); ?>

<?php endif;

    wp_reset_postdata();

    return ob_get_clean();
}