<?php
$currency_symbol = get_woocommerce_currency_symbol("NZD");
?>

<!-- new api ? -->
<!-- https://woocommerce.github.io/code-reference/files/woocommerce-includes-wc-product-functions.html -->

<style>
    .grid-wrapper {
        display: grid;
        grid-gap: 1rem;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        grid-auto-rows: 1.2rem;
        grid-auto-flow: dense;
        width: 96%;
        margin: 3rem auto;

        >div {
            position: relative;
            overflow: clip;
        }
    }

    .grid-wrapper .product-card-new {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-bottom: 4rem;
    }

    .grid-wrapper .product-card-new>img:first-of-type {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }


    .grid-wrapper>div:nth-child(1n) {
        grid-column: span 2;
        grid-row: span 16;
    }

    .grid-wrapper>div:nth-child(2n) {

        grid-column: span 2;
        grid-row: span 20;
    }

    .grid-wrapper>div:nth-child(3n) {
        grid-column: span 2;
        grid-row: span 18;
    }

    .card {
        display: flex;
        align-items: center;
        justify-content: space-between;

        background-color: rgba(0, 0, 0, 1);
        min-height: 80px;
        margin: auto 1rem;
        width: 100%;
        position: absolute;
        box-sizing: border-box;
        bottom: 0;

        border-radius: 0.15rem;
        color: snow;
        text-align: left;
        text-wrap: balance;
        font-size: 1.35rem;
        padding: 0.4rem;

    }

    .small-info-new {
        display: flex;
        justify-content: space-between;
        padding: 0 1rem;
    }

    p {
        font-family: system-ui;
        padding: 1rem;
        line-height: 1.6rem;
    }

    img {
        max-width: 100%;
        height: auto;
        vertical-align: middle;
        display: inline-block;
    }

    .update-col {
        background-color: darkslategray;
    }
</style>
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




        <div class="product-card-new">
            <?php echo $product->get_image($size = 'woocommerce_single', $attr = array("alt" => "vintage football jersey", "class" => "img-aspect", "loading" => "eager"), $placeholder = true); ?>
            <div class="card">
                <!-- ============================= -->

                <div class="small-info-new">

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


                    <a class="button product_type_simple_with-icon update-col" href=<?php echo $product->get_permalink() ?>
                        target="_self" rel="nofollow">
                        <img src='<?php echo CODE_BASE . '/assets/svgs/t-shirt-basic.svg' ?>' /><span>Choose Size</span>
                    </a>


                </div>



                <!-- ============================= -->
            </div>
        </div>



    <?php endforeach; ?>
</div>