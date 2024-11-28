<?php
$args = array(
    'post_type'   => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 4
);
$the_query = new WP_Query($args);
?>
<ul class="products">
    <?php
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) : $the_query->the_post();
            wc_get_template_part('content', 'product');
        endwhile;
    } else {
        echo 'No products found';
    }
    wp_reset_postdata();
    ?>
</ul>
?>



/*
// IDEAS
https://marketpress.com/news/
https://marketpress.com/woocommerce-referral-program/


WooCommerce Developer Resources Portal
https://developer.woocommerce.com/


WooCommerce Community Forum
https://wordpress.org/support/plugin/woocommerce/

WooCommerce Developer Slack Channel
https://woocommerce.com/community-slack/

Hire a WooCommerce Expert
https://woocommerce.com/experts/
*/