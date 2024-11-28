<?php get_header(); ?>


<?php
if (have_posts()) : while (have_posts()) : the_post(); $post_type = get_post_type();
?>

<article <?php post_class(); ?>>
    <hr>
    <div class="entry-content section-inner">
        <?php the_content(); ?>
    </div>
</article>


<?php
    endwhile; endif;
?>

<?php get_footer(); ?>