<div class="floating-cart-info" onclick="jQuery('.wc-block-mini-cart__button').click();">
    <?php #if(is_checkout() || is_cart()): ?>
    <div class="bubble">
        <span>
            <?= WC()->cart->get_cart_contents_count(); ?>
        </span>
    </div>

    <?php #endif; ?>
    <img src="<?= CODE_BASE . '/assets/svgs/MaterialSymbolsShoppingCartOutlineRounded.svg' ?>" width="60" height="60"
        alt="view cart" />
</div>