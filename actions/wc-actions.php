<?php


// custom hook
add_action('new-get-custom-products', 'new_custom_products_callback', 10, 2);

function new_custom_products_callback($count = -1)
{
    wc_clear_notices();
    // add_wc_notices_div();

    $args = array('limit' => $count, 'orderby' => 'date');
    $args['status'] = 'publish';
    $args['stock_status'] = 'instock';

    //'return' => 'ids',

    //https://wp-kama.com/plugin/woocommerce/function/WC_Product_Query
    $query = new WC_Product_Query($args);
    $products = $query->get_products();

    if (count($products) > 0) {
        get_template_part('partials/display-product-masonry', NULL, array('results' => $products));
    } else {
        get_template_part('partials/no-products-message', NULL);
    }
}

//apply_filters( 'woocommerce_product_object_query_args', $this->get_query_vars() )
//  apply_filters( 'woocommerce_product_object_query', $results, $args )