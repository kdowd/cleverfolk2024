<?php
get_header(); ?>

<hr>



<div class="entry-content section-inner">
    <?php the_content(); ?>
    <?php echo do_shortcode('[generic_inline_form]'); ?>
</div>


<?php get_footer(); ?>