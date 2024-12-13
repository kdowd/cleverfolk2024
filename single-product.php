<?php get_header(); ?>



<?php

//https://www.vintagefootballclub.com/en/shop/argentina-1986-retro-football-shirt/
// Now you have access to (see above)...

// <!-- https://woocommerce.com/documentation/plugins/woocommerce/getting-started/ -->

// all woo up to  9.3
// https://wp-kama.com/plugin/woocommerce/function


//https://developer.woocommerce.com/docs/useful-core-functions/
//$product = WC()->wc_get_product($post->get_id());
// $cats = wc_get_product_category_list($product->get_id());
 
 

?>

<!-- // variations solution ? -->
<!-- //https://www.businessbloomer.com/class/1-hour-woocommerce-challenge-lets-recreate-the-nike-product-page/ -->
<div class="single-product-wrapper">
    <?php if ( is_active_sidebar( 'woo-breadcrumb' ) ) : ?>
    <?php dynamic_sidebar( 'woo-breadcrumb' ); ?>
    <?php endif; ?>

    <?php 
    # echo do_shortcode('[shop_messages]'); 

     if ( have_posts() ) :
        while ( have_posts() ) : the_post();
        the_content();
        endwhile; 
       
    endif;
   
    ?>
</div>
<hr />
<?php #echo do_shortcode('[products limit="3" columns="3" category="football, rugby, cycling"  ]') ?>
<?php #echo do_shortcode('[sale_products_test]'); ?>
<?php #echo do_shortcode('[related_products limit="4" columns="4" orderby="price"]'); ?>

<?php
$categories = get_categories();
$tempID =get_the_ID();
$termsObj = get_the_terms( $tempID , 'product_cat');
 
$args = array(
    'post_type'   => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'post__not_in'=> [$tempID ],
    'tax_query' => [
        [
            'taxonomy' => $termsObj[0]->taxonomy,
            'terms' => $termsObj[0]->term_id 
        ]]
 
);
$the_query = new WP_Query($args);
?>


<?php get_template_part('partials/custom-related-products', null, array('items_to_display'=>4)); ?>

<?php get_footer(); ?>