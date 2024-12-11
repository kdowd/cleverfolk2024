<?php get_header(); ?>

<!-- rest cart stuff -->
<!-- https://rudrastyh.com/woocommerce/add-product-to-cart-programmatically.html -->
<!-- https://www.businessbloomer.com/woocommerce-get-cart-info-total-items-etc-from-cart-object/ -->

<?php
if (have_posts()) : while (have_posts()) : the_post(); $post_type = get_post_type();
?>



<div class="entry-content section-inner">
    <?php the_content(); ?>
</div>



<?php
    endwhile; endif;
?>

<?php get_footer(); ?>