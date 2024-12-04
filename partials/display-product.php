<?php
$currency_symbol = get_woocommerce_currency_symbol("NZD");
?>

<!-- new api ? -->
<!-- https://woocommerce.github.io/code-reference/files/woocommerce-includes-wc-product-functions.html -->

<ul class="products">
    <li class="categories-holder"> <?php get_template_part('partials/display-categories-dropdown');  ?> </li>
    <?php #WC_Admin_Notices::add_notice( 'regenerating_lookup_table' );?>
    <?php foreach ($args['results'] as $product): ?>
    <!-- fuller stock details not on $product i think use this: -->
    <?php #QM::debug(wc_get_product_stock_status_options()); ?>
    <?php #QM::debug($product->get_stock_status()); ?>
    <?php #QM::debug($product->get_low_stock_amount()); ?>



    <li>
        <div class="product-card">
            <div class="clever-notices">
                <?php if ($product->is_on_sale()) : ?>
                <h1 class="notices-item sale">SALE</h1>
                <?php endif; ?>
                <?php if (($product->get_stock_status() == "instock") && ($product->get_low_stock_amount())) : ?>
                <h1 class="notices-item low-stock">low stock</h1>
                <?php endif; ?>

                <?php if ($product->get_stock_status() == "outofstock") : ?>
                <h1 class="notices-item no-stock">out of stock</h1>
                <?php endif; ?>
            </div>

            <div>
                <a href=<?php echo $product->get_permalink(); ?> target="_self" rel="nofollow">
                    <?php echo $product->get_image( $size = 'woocommerce_single', $attr = array("alt" => "wax wrap", "class" => "img-aspect", "loading" => "eager"), $placeholder = true ); ?>
                </a>

            </div>

            <div class="card-details">
                <div class="small-info">
                    <div>
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
                    <div>
                        <!-- <span><?php #echo $product->avail['availability'] 
                                            ?></span> -->
                        <span>
                            <?php
                                    #$var1 = $product->attribute_array['standard']['name'];
                                    #$var2 = $product->attribute_array['standard']['options'][0];
                                    #echo "Size: {$var1} : {$var2}"; 
                                    ?>
                        </span>

                    </div>
                </div>

                <hr />

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

            </div>
        </div>

    </li>

    <?php endforeach; ?>
</ul>