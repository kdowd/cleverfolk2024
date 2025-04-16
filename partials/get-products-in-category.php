<?php
$section_slug = (get_queried_object()->post_name);

if (!empty($section_slug) && is_string($section_slug)) {
    $args = array('limit' => -1, 'status', 'publish', 'category' => array($section_slug));


    $query = new WC_Product_Query($args);
    $results = $query->get_products();



    if (count($results) > 0) {
        // get_template_part( 'partials/display-product', NULL, array('results'=>$results )) ;
        get_template_part('partials/display-product-masonry', NULL, array('results' => $results));
    } else {
        get_template_part('partials/no-products-message', NULL);
    }
}
