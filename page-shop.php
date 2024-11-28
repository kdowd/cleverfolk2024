<?php

    get_header(); ?>
<!-- an order page -->
<!-- https://cleverfolk.co.nz/checkout/order-received/189/?key=wc_order_NjHTbXj19RCOy -->
<!-- https://wp-kama.com/plugin/woocommerce/function -->
<!-- https://woocommerce.com/documentation/plugins/woocommerce/getting-started/ -->



<?php #do_action('get-custom-products'); ?>

<div class="stuff">

    <?php do_action('new-get-custom-products'); ?>
    <!-- end shop-content -->
</div>



<?php get_footer(); ?>



<!-- <div class="testy">
    <?php if ( is_active_sidebar( 'woo-filter' ) ) : ?>
    <?php dynamic_sidebar( 'woo-filter' ); ?>
    <?php endif; ?>

</div> -->