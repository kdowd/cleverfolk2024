<div class="floating-cart-info" onclick="test(event)">
    <?php #if(is_checkout() || is_cart()): ?>
    <div class="bubble">
        <span>
            <?= WC()->cart->get_cart_contents_count(); ?>
        </span>
    </div>

    <?php #endif; ?>
    <img src="<?php echo CODE_BASE . '/assets/svgs/MaterialSymbolsShoppingCartOutlineRounded.svg' ?>" width="60"
        height="60" alt="view cart" />
</div>


<script>
//  jQuery(document).on('mouseenter', '.vi-wpvs-variation-wrap-option-available .vi-wpvs-option-wrap', function (e) {
// 	if (!jQuery(this).hasClass('vi-wpvs-option-wrap-selected') && !jQuery(this).hasClass('vi-wpvs-option-wrap-disable') && !jQuery(this).hasClass('vi-wpvs-product-link')) {
// 		jQuery(this).removeClass('vi-wpvs-option-wrap-default').addClass('vi-wpvs-option-wrap-hover');
// 	}
// }); 

jQuery('body').on('wc-blocks_added_to_cart', function(e) {
    console.log("SWEEEET");
});

jQuery('body').on('wc-blocks_removed_from_cart', function(e) {
    console.log("SWEEEET");
});

jQuery('body').on('updated_cart_totals', function(e) {
    console.log("SWEEEET");
});


jQuery('body').on('updated_checkout', function(e) {
    console.log("SWEEEET");
});

jQuery('body').on('updated_checkout', function(e) {
    console.log("SWEEEET");
});

jQuery('body').on('ajaxComplete', function(e) {
    console.log("SWEEEET");
});






function test(evt) {
    console.log("triggering now");
    jQuery("[class = 'wc-block-mini-cart__button']").trigger("click");
}
</script>