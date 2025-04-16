<?php  /* Template Name: Sport-Template */  ?>

<?php
get_header(); ?>


<?php #get_template_part('partials/show-cart-icon'); 
?>

<div class="entry-content section-inner">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content() ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php
$paramVar = sanitize_text_field(get_query_var('sectionNameParam'));
?>



<?php get_template_part('partials/get-products-in-category'); ?>



<?php get_footer();
