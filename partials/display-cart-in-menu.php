<?php  #woocommerce_mini_cart(); ?>
<?php #echo do_shortcode('[xoo_wsc_cart]') ?>
<?php #QM::debug(WC()->cart) ?>

<div id="secondary-sidebar" class="new-widget-area">
    <?php if(is_checkout() || is_cart()): ?>
    <?= WC()->cart->get_cart_subtotal(); echo WC()->cart->get_cart_contents_count(); ?>
    <?php elseif(is_active_sidebar('Mini Cart')) : ?>
    <?php dynamic_sidebar('Mini Cart'); ?>
    <?php endif; ?>
</div>