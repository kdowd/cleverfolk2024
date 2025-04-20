<?php
$currency_symbol = get_woocommerce_currency_symbol("NZD");
?>

<!-- new api ? -->
<!-- https://woocommerce.github.io/code-reference/files/woocommerce-includes-wc-product-functions.html -->


<!-- <li class="categories-holder"> <?php get_template_part('partials/display-categories-dropdown');  ?> </li> -->
<div class="grid-wrapper">

    <?php #WC_Admin_Notices::add_notice( 'regenerating_lookup_table' );
    ?>
    <!-- Start of product cards -->
    <?php foreach ($args['results'] as $product): ?>
    <!-- fuller stock details not on $product i think use this: -->
    <?php #QM::debug(wc_get_product_stock_status_options());
        ?>
    <?php #QM::debug($product->get_stock_status()); 
        ?>
    <?php #QM::debug($product->get_low_stock_amount()); 
        ?>




    <div class="product-card">
        <?php echo $product->get_image($size = 'woocommerce_single', $attr = array("alt" => "vintage football jersey", "class" => "img-aspect", "loading" => "eager"), $placeholder = true); ?>
        <div class="card-info-wrapper">
            <!-- ============================= -->

            <div class="small-info">

                <span><?php echo $product->get_name() ?></span>

                <span>

                    <?php if ($product->is_on_sale()) : ?>
                    <?php echo "<span class='old-price'>WAS { $currency_symbol . $product->get_price()}</span>" ?>
                    <?php echo "{ $currency_symbol . $product->get_sale_price()} " ?>

                    <?php else : ?>
                    <?php echo $currency_symbol . $product->get_price() ?>
                    <?php endif; ?>

                </span>

            </div>

            <div class="cart-buttons-grid">

                <?php
                    // if (($product->stock_controlled) && ($product->quantity > 0)){
                    // currently not stock controlled
                    //}
                    ?>


                <a class="button product_type_simple_with-icon" href=<?php echo $product->get_permalink() ?>
                    target="_self" rel="nofollow">
                    <img src='<?php echo CODE_BASE . '/assets/svgs/t-shirt-basic.svg' ?>' /><span>Choose Size</span>
                </a>


            </div>



            <!-- ============================= -->
        </div>
    </div>



    <?php endforeach; ?>
</div>